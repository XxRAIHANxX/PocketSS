<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Timeslot;
use App\Booking;
use App\Wallet;
use FHelper;
use Session;
use Auth;
use Carbon\Carbon;
use Snowfire\Beautymail\Beautymail as Beautymail;
use Config;
use Notifynder;

class BookingController9v9t1 extends Controller
{
    public static function make(Request $request)
    {
        $request->session()->put('bookingdate', $request->route('date'));
        return redirect('timeslot');
    }

    public static function booking(Request $request)
    {
        if (!in_array($request->route('courtid'), [1, 2])) {
            return redirect()->back();
        }

        $count  =  Timeslot::where('id', '=', $request->route('id'))
            ->count();

        if ($count == 0) {
            return redirect()->back();
        }

        $request->session()->put('court', $request->route('courtid'));
        $request->session()->put('timeslot', $request->route('id'));
        return redirect('confirm9v9');
    }

    public static function court(Request $request)
    {
        $request->session()->put('court', $request->route('id'));
        return redirect('confirm9v9');
    }
    //  Change Date & Time 
    //  Lines 58-65 
    public static function timeslot(Request $request)
    {
        $date = Carbon::createFromDate(2021, 3, 15)->toDateString();
        if (strtotime($date) > strtotime(Carbon::parse('today')->toDateString())) {
            $date = Carbon::createFromDate(2021, 3, 15)->toDateString();
        }
        $request->session()->put('bookingdate', $date);
        $timeslots = Timeslot::where('hidden', '=', '0')
            ->where('start', '>=', '19:00')
            ->where('start', '<=', '20:40')
            ->orderBy('start', 'asc')
            ->get();
        return view('frontend.slots9v9', ['timeslots' => $timeslots]);
    }

    public static function book(Request $request)
    {
        return view('frontend.book');
    }

    public static function confirm(Request $request)
    {
        if (empty(Session::get('court'))) {
            return redirect('timeslot');
        }
        return view('frontend.confirm9v9'); //
    }

    public static function cancellation(Request $request)
    {
        $booking = Booking::where('id', '=', $request->route('id'))
            ->where('user_id', '=', Auth::user()->id)
            ->where('cancel', '=', 0)->first();

        if (strtotime(date('Y-m-d H:i:s', strtotime($booking->date . ' ' . Timeslot::where('id', '=', $booking
            ->timeslot_id)->pluck('start')))) <= strtotime(\Carbon\Carbon::now()->addMinutes(1439))) {
            return "You cannot cancel your booking now. It can only be cancelled 24 hours before game play.";
        }

        $possible = Booking::where('id', '=', $request->route('id'))
            ->where('user_id', '=', Auth::user()->id)->where('cancel', '=', 0)->count();
        if ($possible == 0) {
            return "We are facing some problem, please try again after some time.";
        }

        $booking = Booking::where('id', '=', $request->route('id'))
            ->where('user_id', '=', Auth::user()
                ->id)->where('cancel', '=', 0)
            ->first();
        $booking->cancel = 1;
        $booking->save();

        if ($booking->paid == 1) {
            $wallet = new Wallet;
            $wallet->amount = 1;
            $wallet->user_id = Auth::user()->id;
            $wallet->action = 'refunded for booking cancellation';
            $wallet->save();
        }

        $timeslot = FHelper::timeslot($booking->timeslot_id);
        $court = $booking->court;
        $date = $booking->date;

        Notifynder::category('cancel')
            ->from(Auth::user()->id)
            ->to(1)
            ->url('bookings')
            ->extra(compact('timeslot', 'court', 'date'))
            ->send();

        Notifynder::category('cancel.user')
            ->from(1)
            ->to(Auth::user()->id)
            ->url('bookings')
            ->extra(compact('timeslot', 'court', 'date'))
            ->send();

        $msg = 'User cancelled booking on ' . $booking->date;
        $msg .= '<br><p>Booking Details</p>';
        $msg .= '<p><b>User Name:</b>   ' . Auth::user()->name . '</p>';
        $msg .= '<p><b>User Email:</b>  ' . Auth::user()->email . '</p>';
        $msg .= '<p><b>Court:</b>   ' . $booking->court . '</p>';
        $msg .= '<p><b>Position:</b>    No ' . $booking->position . ' ' . ($booking->player_type == '1' ? 'Goal Keeper' : player_type == '2' ? 'Left Back' : player_type == '3' ? 'Center Back' : player_type == '4' ? 'Right Back' : player_type == '5' ? 'Left Midfield' : player_type == '6' ? 'Center Midfield' : player_type == '7' ? 'Right Midfield' : player_type == '8' ? 'Left Center Forward' : 'Right Center Forward') . '</p>';
        $msg .= '<p><b>Team:</b>    ' . $booking->team . '</p>';
        $msg .= '<p><b>Timeslot:</b>    ' . FHelper::timeslot($booking->timeslot_id) . '</p>';
        $msg .= '<p><b>Date:</b>    ' . $booking->date . '</p></div>';

        $beautymail = app()->make(Beautymail::class);
        $beautymail->send(
            'frontend.email.admin',
            ['linktext' => 'View Bookings', 'link' => 'backend/bookings', 'msg' => $msg],
            function ($message) {
                $message
                    ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                    ->to('hello@supersquadsoccer.com')
                    ->subject('User cancelled booking of ' . Session::get('bookingdate'));
            }
        );

        $msg = 'You just cancelled your booking on ' . $booking->date;
        $msg .= '<br><p>Booking Details</p>';
        $msg .= '<p><b>User Name:</b>   ' . Auth::user()->name . '</p>';
        $msg .= '<p><b>User Email:</b>  ' . Auth::user()->email . '</p>';
        $msg .= '<p><b>Court:</b>   ' . $booking->court . '</p>';
        $msg .= '<p><b>Position:</b>    No ' . $booking->position . ' ' . ($booking->player_type == '1' ? 'Goal Keeper' : player_type == '2' ? 'Left Back' : player_type == '3' ? 'Center Back' : player_type == '4' ? 'Right Back' : player_type == '5' ? 'Left Midfield' : player_type == '6' ? 'Center Midfield' : player_type == '7' ? 'Right Midfield' : player_type == '8' ? 'Left Center Forward' : 'Right Center Forward') . '</p>';
        $msg .= '<p><b>Team:</b>    ' . $booking->team . '</p>';
        $msg .= '<p><b>Timeslot:</b>    ' . FHelper::timeslot($booking->timeslot_id) . '</p>';
        $msg .= '<p><b>Date:</b>    ' . $booking->date . '</p></div>';

        if ($booking->paid == 1) {
            $msg .= '<p>1 token is added back to your profile</p>';
        }

        $beautymail = app()->make(Beautymail::class);
        $beautymail->send(
            'frontend.email.user',
            ['linktext' => 'View Booking', 'link' => 'bookings', 'msg' => $msg, 'name' => Auth::user()->name],
            function ($message) {
                $message
                    ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                    ->to(Auth::user()->email, Auth::user()->name)
                    ->subject('Cancellation Successful!');
            }
        );
        return "Cancellation Successful!";
    }

    public static function confirmation(Request $request)
    {
        if (!in_array($request->pay, ['0', '1'])) { //try this for changing tokens value
            return "Invalid Input";
        }
        if (
            Booking::where('date', '=', date('Y-m-d', strtotime(Session::get('bookingdate'))))
            ->where('timeslot_id', '=', Session::get('timeslot'))
            ->where('user_id', '=', Auth::user()->id)
            ->where('cancel', '=', 0)->count() > 0
        ) {
            return 'Sorry, you cannot make more than one booking in a single timeslot!';
        }

        $exist = Booking::where('date', '=', date('Y-m-d', strtotime(Session::get('bookingdate'))))
            ->where('timeslot_id', '=', Session::get('timeslot'))
            ->where('court', '=', Session::get('court'))
            ->where('position', '=', $request->route('position'))
            ->where('cancel', '=', '0')
            ->count();
        if ($exist == 0) {

            $team = 'A';
            if ($request->route('position') >= 10 && $request->route('position') <= 18) {
                $team = 'B';
            }

            if ($request->route('position') == 9 || $request->route('position') == 18) {
                $type = 9;
            }
            if ($request->route('position') == 8 || $request->route('position') == 17) {
                $type = 8;
            }
            if ($request->route('position') == 7 || $request->route('position') == 16) {
                $type = 7;
            }
            if ($request->route('position') == 6 || $request->route('position') == 15) {
                $type = 6;
            }
            if ($request->route('position') == 5 || $request->route('position') == 14) {
                $type = 5;
            }
            if ($request->route('position') == 4 || $request->route('position') == 13) {
                $type = 4;
            }
            if ($request->route('position') == 3 || $request->route('position') == 12) {
                $type = 3;
            }
            if ($request->route('position') == 2 || $request->route('position') == 11) {
                $type = 2;
            }
            if ($request->route('position') == 1 || $request->route('position') == 10) {
                $type = 1;
            }

            if ($request->pay == 0) {

                $paid = 0;
                $payment_status = "Pay Later";
            } else if ($request->pay == 1) {

                $paid = 1;
                $payment_status = "Paid";
                if (FHelper::wallet() >= 1) {
                    $wallet = new Wallet;
                    $wallet->amount = -1;
                    $wallet->user_id = Auth::user()->id;
                    $wallet->action = 'deducted for booking';
                    $wallet->save();
                } else {
                    return "You do not have sufficient tokens!";
                }
            }

            $booking = new Booking;
            $booking->user_id = Auth::user()->id;
            $booking->timeslot_id = Session::get('timeslot');
            $booking->court = Session::get('court');
            $booking->date = date('Y-m-d', strtotime(Session::get('bookingdate')));
            $booking->position = $request->route('position');
            $booking->team = $team;
            $booking->paid = $paid;
            $booking->player_type = $type;
            $booking->bib_number = $request->bib_number;
            $booking->save();

            $timeslot = FHelper::timeslot(Session::get('timeslot'));
            $court = Session::get('court');
            $date = Session::get('bookingdate');

            Notifynder::category('book')
                ->from(Auth::user()->id)
                ->to(1)
                ->url('bookings')
                ->extra(compact('timeslot', 'court', 'date'))
                ->send();

            $msg = 'We have new booking on ' . Session::get('bookingdate');
            $msg .= '<br><p>Booking Details</p>';
            $msg .= '<p><b>User Name:</b>   ' . Auth::user()->name . '</p>';
            $msg .= '<p><b>User Email:</b>  ' . Auth::user()->email . '</p>';
            $msg .= '<p><b>Payment Status:</b>  ' . $payment_status . '</p>';
            $msg .= '<p><b>Court:</b>   ' . Session::get('court') . '</p>';
            $msg .= '<p><b>Position:</b>    No '  . $booking->position . ' ' . ($booking->player_type == '1' ? 'Goal Keeper' : player_type == '2' ? 'Left Back' : player_type == '3' ? 'Center Back' : player_type == '4' ? 'Right Back' : player_type == '5' ? 'Left Midfield' : player_type == '6' ? 'Center Midfield' : player_type == '7' ? 'Right Midfield' : player_type == '8' ? 'Left Center Forward' : 'Right Center Forward') . '</p>';
            $msg .= '<p><b>Team:    </b>    ' . $booking->team . '</p>';
            $msg .= '<p><b>Timeslot:    </b>' . FHelper::timeslot(Session::get('timeslot')) . '</p>';
            $msg .= '<p><b>Date:    </b>' . Session::get('bookingdate') . '</p></div>';

            $beautymail = app()->make(Beautymail::class);
            $beautymail->send(
                'frontend.email.admin',
                ['linktext' => 'View Bookings', 'link' => 'backend/bookings', 'msg' => $msg],
                function ($message) {
                    $message
                        ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                        ->to('hello@supersquadsoccer.com')
                        ->subject('User booked a court on ' . Session::get('bookingdate'));
                }
            );

            $msg = 'Thanks for booking!';
            $msg .= '<br><p>Booking Details</p>';
            $msg .= '<p><b>User Name:    </b>' . Auth::user()->name . '</p>';
            $msg .= '<p><b>User Email:   </b>' . Auth::user()->email . '</p>';
            $msg .= '<p><b>Payment Status:</b>' . $payment_status . '</p>';
            $msg .= '<p><b>Court:</b>' . Session::get('court') . '</p>';
            $msg .= '<p><b>Position:</b>    No ' . $booking->position . ' ' . ($booking->player_type == '1' ? 'Goal Keeper' : player_type == '2' ? 'Left Back' : player_type == '3' ? 'Center Back' : player_type == '4' ? 'Right Back' : player_type == '5' ? 'Left Midfield' : player_type == '6' ? 'Center Midfield' : player_type == '7' ? 'Right Midfield' : player_type == '8' ? 'Left Center Forward' : 'Right Center Forward') . '</p>';
            $msg .= '<p><b>Team:</b>' . $booking->team . '</p>';
            $msg .= '<p><b>Timeslot:</b>' . FHelper::timeslot(Session::get('timeslot')) . '</p>';
            $msg .= '<p><b>Date:</b>' . Session::get('bookingdate') . '</p></div>';
            $msg .= '<br>Please report in at least <b>15 minutes</b> before your game(s).';
            $msg .= '<br><br><b>Important Notice:</b> You cannot cancel your booked game(s) within 24 hours.';
            $msg .= '<br><br>For emergency, please contact:<br>Phone:+6738237789<br>Email:hello@supersquadsoccer.com</div>';

            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('frontend.email.user', ['linktext' => 'View Booking', 'link' => 'bookings', 'msg' => $msg, 'name' => Auth::user()->name], function ($message) {
                $message
                    ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                    ->to(Auth::user()->email, Auth::user()->name)
                    ->subject('Booking Info');
            });

            return "Thank you for booking with Super Squad!";
        } else {
            return "This position is already booked!";
        }
    }

    public function setMatchType($match_type)
    {
        if (!in_array($match_type, ['9v9'])) {
            return redirect('/');
        }
        Session::put('match_type', $match_type);
        return redirect('/ranking/top-player');
    }
}
