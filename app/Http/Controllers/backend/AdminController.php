<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Timeslot;
use App\Booking;
use App\Wallet;
use App\Point;
use App\CreditRequest;
use App\ScoreDetails;

use Carbon\Carbon;
use Session;
use Auth;
use Config;
use FHelper;
use BHelper;
use Notifynder;
use Snowfire\Beautymail\Beautymail as Beautymail;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {

            if (Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password')], true)) {
                return redirect('backend');
            } else {
                $request->session()->flash('danger', 'Invalid Username or password!');
                return redirect('backend/login');
            }
        }
        return view('backend.login');
    }

    public function forget(Request $request)
    {
        return view('backend.forget');
    }
    public function home(Request $request)
    {
        return view('backend.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('backend/login');
    }

    public function adduser(Request $request)
    {
        if ($request->isMethod('POST')) {
            if (User::where('email', '=', $request->email)->count() > 0) {
                $request->session()->flash('danger', 'User already exist!');
                return redirect()->back();
            }

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            $data = User::find($user->id);
            $data->ww_id = FHelper::playerid($user->id);
            $data->save();

            // $wallet = new Wallet;
            // $wallet->amount = 1;
            // $wallet->action = 'added';
            // $wallet->data = 'admin as sign up bonus';
            // $wallet->user_id = $user->id;
            // $wallet->save();

            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('frontend.email.admin-welcome', ['user' => $request->input()], function ($message) use ($request) {
                $message
                    ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                    ->to($request->input('email'), $request->input('name'))
                    ->subject('Welcome to Super Squad!');
            });

            $request->session()->flash('success', 'User added successfully! Password is sent via email.');
            return redirect()->back();
        }
        return view('backend.users.add');
    }

    public function viewusers(Request $request)
    {
        return view('backend.users.manage');
    }

    public function deleteuser(Request $request)
    {
        User::where('id', '=', $request->route('id'))
            ->delete();

        return "User deleted successfully!";
    }


    public function usersdata(Request $request)
    {

        $user = User::where('type', '=', 3)
            ->orderBy('id', 'desc')
            ->get();

        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                return '<a href="' . url() . '/backend/users/profile/' . $user->id . '" class="btn btn-xs btn-success"><i class="fa fa-user"></i></a> <button data-id="' . $user->id . '" class=" delete btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
            })
            // ->addColumn('ww_id', function ($user) {
            //     return FHelper::playerid($user->id);
            // })
            ->addColumn('points', function ($user) {
                return FHelper::points($user->id);
            })
            ->addColumn('wallet', function ($user) {
                return FHelper::wallet($user->id);
            })
            ->addColumn('matches', function ($user) {
                return FHelper::matches($user->id);
            })
            ->addColumn('joined', function ($user) {
                return date('d F, Y', strtotime($user->created_at));
            })
            ->make(true);
    }

    public function viewwallet(Request $request)
    {
        return view('backend.pages.wallet');
    }

    public function walletdata(Request $request)
    {

        $user = User::where('type', '=', 3)
            ->orderBy('id', 'desc')
            ->get();

        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                return '<div class="col-sm-6"><input data-id="' . $user->id . '" type="text" style="width:50px" class="form-control wallet"></div><div class="col-sm-4"><button class="btn btn-info add-to-wallet"><i class="fa fa-plus"></i></button></div>';
            })
            ->addColumn('wallet', function ($user) {
                return '<span class="amount">' . FHelper::wallet($user->id) . '</span>';
            })
            ->make(true);
    }

    public function viewcreditrequest(Request $request)
    {
        return view('backend.pages.creditrequest');
    }

    public function creditrequestdata(Request $request)
    {

        $user = CreditRequest::leftJoin('users as u', 'u.id', '=', 'credit_requests.user_id')
            ->groupBy('credit_requests.id')
            ->get(['credit_requests.*', 'u.name', 'u.email', 'u.ww_id']);

        return Datatables::of($user)
            ->addColumn('date', function ($user) {
                return date('d F,Y', strtotime($user->created_at));
            })
            // ->addColumn('ww_id',function ($user){
            //     return FHelper::playerid($user->user_id);
            // })
            ->addColumn('credit', function ($user) {
                return '<input type="hidden" class="credit" data-id="' . $user->id . '" value="' . $user->credit . '">' . $user->credit;
            })
            ->addColumn('amount', function ($user) {
                return '<input type="hidden" class="amount" data-id="' . $user->id . '" value="' . $user->amount . '">' . $user->amount;
            })
            ->addColumn('action', function ($user) {
                if ($user->status == 0) {
                    return '<button class="btn btn-success btn-xs accept" id="accept' . $user->id . '"><i class="fa fa-check"></i></button> <button href="" class="btn  btn-xs btn-danger reject"><i class="fa fa-times"></i></button>';
                } else {
                    if ($user->status == 1) {
                        return '<h5 class="text-success">Approved</h5>';
                    } else {
                        return '<h5 class="text-danger">Declined</h5>';
                    }
                }
            })

            ->make(true);
    }

    public function cancelcreditrequest(Request $request)
    {
        $cr = CreditRequest::find($request->route('id'));
        $cr->status = 2;
        $cr->save();

        $credit = $cr->credit;

        Notifynder::category('creditrequestcancel')
            ->from(Auth::user()->id)
            ->to($cr->user_id)
            ->url('token/history')
            ->extra(compact('credit'))
            ->send();

        return 'Credit request is declined successfully!';
    }

    public function viewpoints(Request $request)
    {
        $request->session()->put('bookingdate', date('d-m-Y'));
        $timeslot = Timeslot::orderBy('start', 'asc')->get();
        return view('backend.pages.points', ['timeslots' => $timeslot]);
    }

    public function setplayers(Request $request)
    {
        $request->session()->put('timeslot', $request->route('timeslot'));
        $request->session()->put('court', $request->route('court'));
        return redirect('backend/scores/add');
    }



    public function pointsdata(Request $request)
    {

        $user = User::where('type', '=', 3)
            ->orderBy('id', 'desc')
            ->get();

        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                return '<div class="col-sm-6"><input data-id="' . $user->id . '" type="text" style="width:50px" class="form-control wallet"></div><div class="col-sm-4"><button class="btn btn-info add-to-wallet"><i class="fa fa-plus"></i></button></div>';
            })
            ->addColumn('points', function ($user) {
                return '<span class="amount">' . FHelper::points($user->id) . '</span>';
            })
            ->make(true);
    }

    public function notificationdata(Request $request)
    {

        $notification = User::find(Auth::user()->id)->getNotifications();

        return Datatables::of($notification)
            ->addColumn('user', function ($notification) {
                return '<a href="users/profile/' . $notification->from->id . '">' . $notification->from->name . '</a>';
            })
            // ->addColumn('ww_id', function ($notification) {
            //     return FHelper::playerid($notification->from->id);
            // })
            ->addColumn('time', function ($notification) {
                return date('d F,Y - h:i A', strtotime($notification->created_at));
            })
            ->make(true);
    }

    public function viewbooking(Request $request)
    {
        return view('backend.pages.booking');
    }

    public function bookingdata(Request $request)
    {

        $booking = Booking::leftJoin('users as u', 'u.id', '=', 'bookings.user_id')
            ->get(['bookings.*', 'u.name', 'u.email', 'u.ww_id']);

        return Datatables::of($booking)
            ->addColumn('data', function ($booking) {
                return BHelper::bookingdata($booking->id);
            })
            ->addColumn('status', function ($booking) {
                if ($booking->cancel == 0) {
                    return '<label class="label label-success">Booked</label>';
                } else {
                    return '<label class="label label-danger">Cancelled</label>';
                }
            })
            ->addColumn('payment', function ($booking) {
                if ($booking->paid == 1) {
                    return '<label class="label label-success">Paid</label>';
                } else {
                    return '<label class="label label-danger">Pay Later</label>';
                }
            })
            ->addColumn('date', function ($booking) {
                return date('d F, Y', strtotime($booking->date));
            })
            ->addColumn('user', function ($booking) {
                return $booking->name . '<br>' . $booking->email;
            })
            ->make(true);
    }

    public function timeslot(Request $request)
    {
        if ($request->isMethod('POST')) {
            $time = new Timeslot;
            $time->start = date('H:i:s', strtotime($request->start));
            $time->end = date('H:i:s', strtotime($request->end));
            $time->save();
            $request->session()->flash('success', 'New timeslot is added successfully');
            return redirect()->back();
        }
        $timeslots = Timeslot::orderBy('start', 'asc')->get();
        return view('backend.timeslot', ['timeslots' => $timeslots]);
    }

    public function delete(Request $request)
    {
        if ($request->route('table') == 'timeslot') {
            Timeslot::where('id', '=', $request->route('id'))
                ->delete();
            $request->session()->flash('success', 'Timeslot is deleted successfully!');
            return redirect()->back();
        }
    }

    public function addwallet(Request $request)
    {

        if ($request->credit_request) {

            $cr = CreditRequest::find($request->route('id'));
            $cr->status = 1;
            $cr->save();

            $credit = $cr->credit;

            if ($request->new_credit != '') {
                $credit = $request->new_credit;
            }


            Notifynder::category('creditrequestaccept')
                ->from(Auth::user()->id)
                ->to($cr->user_id)
                ->url('token/history')
                ->extra(compact('credit'))
                ->send();



            $wallet = new Wallet;
            $wallet->amount = $credit;
            $wallet->action = 'added';
            $wallet->data = 'admin';
            $wallet->user_id = $cr->user_id;
            $wallet->save();

            $amount = $request->amt;

            // Notifynder::category('addwallet')
            //        ->from(Auth::user()->id)
            //        ->to($cr->user_id)
            //        ->url('wallet/history')
            //        ->extra(compact('amount'))
            //        ->send();

            $users = User::where('id', '=', $cr->user_id)->get();
            foreach ($users as $user) {
            }
            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('frontend.email.walletadd', ['users' => $users, 'credit' => $amount], function ($message) use ($user, $amount) {
                $message
                    ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                    ->to($user->email, $user->name)
                    ->subject('Admin added ' . $amount . ' tokens to your profile.');
            });


            return 'Token request is approved successfully!';
        }

        $wallet = new Wallet;
        $wallet->amount = $request->amt;
        $wallet->action = 'added';
        $wallet->data = 'admin';
        $wallet->user_id = $request->route('id');
        $wallet->save();

        $amount = $request->amt;

        Notifynder::category('addwallet')
            ->from(Auth::user()->id)
            ->to($request->route('id'))
            ->url('token/history')
            ->extra(compact('amount'))
            ->send();


        return 'Token updated successfully!';
    }

    public function addpoints(Request $request)
    {
        $wallet = new Point;
        $wallet->point = $request->amt;
        $wallet->user_id = $request->route('id');
        $wallet->save();

        $amount = $request->amt;

        Notifynder::category('addpoint')
            ->from(Auth::user()->id)
            ->to($request->route('id'))
            ->url('points')
            ->extra(compact('amount'))
            ->send();

        return 'Points updated successfully!';
    }

    public function profile(Request $request)
    {
        $user = User::where('id', '=', $request->id)->get();
        return view('backend.users.profile', ['users' => $user]);
    }

    public function notifications(Request $request)
    {
        return view('backend.users.notifications');
    }

    public function adminprofile(Request $request)
    {
        if ($request->route('action') == 'updateinfo') {
            if ($request->isMethod('POST')) {
                $user = User::find(Auth::user()->id);
                $user->name = $request->name;
                $user->save();
                $request->session()->flash('success', 'Profile updated successfully!');
                return redirect()->back()->withInput();
            }
        } else if ($request->route('action') == 'changeavatar') {
            if ($request->hasFile('newavatar')) {

                $pic = $request->file('newavatar')->move('public/avatar/', Auth::user()->name . '_' . Auth::user()->id);

                $user = User::find(Auth::user()->id);
                $user->pic = $pic;
                $user->save();

                $request->session()->flash('success', 'Avatar changed successfully!');
                return redirect()->back();
            }
        } else if ($request->route('action') == 'changepassword') {
            if ($request->isMethod('POST')) {
                if (User::where('password', '=', bcrypt($request->oldpassword))->count()) {
                    $user = User::find(Auth::user()->id);
                    $user->password = bcrypt($request->newpassword);
                    $user->save();
                    $request->session()->flash('success', 'Password changed successfully!');
                } else {
                    $request->session()->flash('danger', 'Old password is incorrect!');
                }
                return redirect()->back();
            }
        }
        return view('backend.profile');
    }

    public static function makebooking(Request $request)
    {
        $date = Carbon::parse('today')->toDateString();
        // if(strtotime($date) > strtotime(Carbon::parse('today')->toDateString())){
        //     $date = Carbon::parse('this friday')->toDateString();
        // }
        $request->session()->put('bookingdate', $date);
        $timeslots = Timeslot::orderBy('start', 'asc')
            ->where('block', '=', 0)
            ->get();
        return view('backend.booking.make', ['timeslots' => $timeslots]);
    }

    public static function confirmbooking(Request $request)
    {
        if (!in_array($request->route('courtid'), [1])) {
            return redirect()->back();
        }
        $request->session()->put('court', $request->route('courtid'));
        $request->session()->put('timeslot', $request->route('slotid'));
        return redirect(url() . '/backend/bookings/confirm');
    }

    public static function confirm(Request $request)
    {
        return view('backend.booking.confirm');
    }

    public static function checkuser($email)
    {
        $count  = User::where('email', '=', $email)->count();
        if ($count == 0) {
            return $count;
        }
        return User::where('email', '=', $email)->pluck('id');
    }

    public static function confirmation(Request $request)
    {

        $userID = $request->userID;
        $paid = 0;
        if ($request->pay == 0 && FHelper::wallet($request->userID) > 3) {
            return "Please pay using tokens.";
        }


        if ($request->pay == 3) {

            if (FHelper::wallet($request->userID) < 1) {
                return "Sorry! User don't have sufficient tokens for booking!";
            }

            $paid = 3;
            $wallet = new Wallet;
            $wallet->amount = -3;
            $wallet->user_id = $request->userID;
            $wallet->action = 'deducted for booking';
            $wallet->save();
        }

        if (Booking::where('date', '=', date('Y-m-d', strtotime(Session::get('bookingdate'))))->where('timeslot_id', '=', Session::get('timeslot'))->where('user_id', '=', $userID)->where('cancel', '=', 0)->count() > 0) {
            return 'Sorry, You can not make more than one booking in single timeslot!';
        }
        $exist = Booking::where('date', '=', date('Y-m-d', strtotime(Session::get('bookingdate'))))
            ->where('timeslot_id', '=', Session::get('timeslot'))
            ->where('court', '=', Session::get('court'))
            ->where('position', '=', $request->route('position'))
            ->where('cancel', '=', '0')
            ->count();
        if ($exist == 0) {
            // if(FHelper::wallet() >= 1){

            $team = 'A';
            if ($request->route('position') >= 8 && $request->route('position') <= 14) {
                $team = 'B';
            }

            $type = 2;
            if ($request->route('position') == 1 || $request->route('position') == 8) {
                $type = 1;
            }


            $booking = new Booking;
            $booking->user_id = $userID;
            $booking->timeslot_id = Session::get('timeslot');
            $booking->court = Session::get('court');
            $booking->date = date('Y-m-d', strtotime(Session::get('bookingdate')));
            $booking->position = $request->route('position');
            $booking->team = $team;
            $booking->bib_number = $request->bip;
            $booking->player_type = $type;
            $booking->paid = $paid;
            $booking->save();

            $timeslot = FHelper::timeslot(Session::get('timeslot'));
            $court = Session::get('court');
            $date = Session::get('bookingdate');

            Notifynder::category('book')
                ->from($userID)
                ->to(1)
                ->url('bookings')
                ->extra(compact('timeslot', 'court', 'date'))
                ->send();

            $users = User::where('id', '=', $userID)->get();
            foreach ($users as $user) {
            }


            $msg = 'We have new booking on ' . Session::get('bookingdate');
            $msg .= '<br><p>Booking Details</p>';
            $msg .= '<p><b>User Name:</b>' . $user->name . '</p>';
            $msg .= '<p><b>User Email:</b>' . $user->email . '</p>';
            $msg .= '<p><b>Court:</b>' . Session::get('court') . '</p>';
            $msg .= '<p><b>Position:</b>' . $booking->position . '</p>';
            $msg .= '<p><b>Team:</b>' . $booking->team . '</p>';
            $msg .= '<p><b>Type:</b>' . ($booking->player_type == '1' ? 'Goal Keeper' : 'Outfield Player') . '</p>';
            $msg .= '<p><b>Timeslot:</b>' . FHelper::timeslot(Session::get('timeslot')) . '</p>';
            $msg .= '<p><b>Date:</b>' . Session::get('bookingdate') . '</p></div>';

            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('frontend.email.admin', ['linktext' => 'View Bookings', 'link' => 'backend/bookings', 'msg' => $msg], function ($message) {
                $message
                    ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                    ->to('hello@supersquadsoccer.com')
                    ->subject('User booked a court on ' . Session::get('bookingdate'));
            });



            $msg = 'Thanks for booking';
            $msg .= '<br><p>Booking Details</p>';
            $msg .= '<p><b>Name:</b>' . $user->name . '</p>';
            $msg .= '<p><b>Email:</b>' . $user->email . '</p>';
            $msg .= '<p><b>Court:</b>' . Session::get('court') . '</p>';
            $msg .= '<p><b>Position:</b>' . $booking->position . '</p>';
            $msg .= '<p><b>Team:</b>' . $booking->team . '</p>';
            $msg .= '<p><b>Type:</b>' . ($booking->player_type == '1' ? 'Goal Keeper' : 'Outfield Player') . '</p>';
            $msg .= '<p><b>Timeslot:</b>' . FHelper::timeslot(Session::get('timeslot')) . '</p>';
            $msg .= '<p><b>Date:</b>' . Session::get('bookingdate') . '</p></div>';

            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('frontend.email.user', ['linktext' => 'View Booking', 'link' => 'bookings', 'msg' => $msg, 'name' => $user->name],  function ($message) use ($user) {
                $message
                    ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                    ->to($user->email, $user->name)
                    ->subject('Thanks for booking!');
            });



            return "Thanks for booking on the behalf of " . $user->name . " (" . $user->email . ")";
            // }
            // else{
            // return "You do not have sufficient funds!";
            // }
        } else {
            return "This position is already booked!";
        }
    }


    public static function timeslotblock($id)
    {
        $block = Timeslot::where('id', '=', $id)->pluck('block');
        if ($block == 0) {
            $t = Timeslot::find($id);
            $t->block = 1;
            $t->save();
            return 1;
        }
        $t = Timeslot::find($id);
        $t->block = 0;
        $t->save();
    }

    public static function timeslotblockmsg(Request $request)
    {
        $t = Timeslot::find($request->route('timeslotID'));
        $t->msg = $request->input('msg');
        $t->save();
    }

    public static function assignbip(Request $request)
    {
        /* $count = Booking::where('bib_number','=',$request->bip)
        ->where('timeslot_id','=',Session::get('timeslot'))
        ->count();

        if($count >  0) {
            return "BIP already assigned to someone!";
        }*/


        $booking = Booking::where('id', '=', $request->bookingID)->first();
        $booking->bib_number = $request->bip;
        $booking->save();

        return "BIP assigned successfully!";
    }
}
