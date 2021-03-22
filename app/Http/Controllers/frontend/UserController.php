<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\ScoreDetails;
use App\Booking;
use App\Wallet;
use App\Point;
use App\CreditRequest;
use Auth;
use FHelper;
use Validator;
use Notifynder;
use Snowfire\Beautymail\Beautymail as Beautymail;
use Config;
use Session;
use Input;
use URL;
use Redirect;
use Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        if (basename(URL::previous()) === 'timeslot') {
            Session::put('back', '1');
        }

        if ($request->isMethod('POST')) {

            $rules = array(
                'name'             => 'required',                        // just a normal required validation
                'email'            => 'required|email|unique:users',     // required and must be unique in the ducks table
                'password'         => 'required',
                'password_confirm' => 'required|same:password',
                'dob'              => 'required',
                'telephone'        => 'required',
                // 'country'          => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                $messages = $validator->messages();
                return Redirect::to('login')
                    ->withErrors($validator);
            }

            $exist = User::where('email', '=', $request->input('email'))->count();
            if ($exist > 0) {
                $request->session()->flash('danger', 'User with email ' . $request->input('email') . ' already exist.');
                return redirect()->back();
            }
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->telephone = $request->input('telephone');
            $user->dob = $request->input('dob');
            $user->password = bcrypt($request->input('password'));
            $user->country = $request->input('country');
            $user->save();
            $data = User::find($user->id);
            $data->ww_id = FHelper::playerid($user->id, $user->country);
            $data->save();

            // $wallet = new Wallet;
            // $wallet->amount = 1;
            // $wallet->action = 'added';
            // $wallet->data = 'admin as sign up bonus';
            // $wallet->user_id = $user->id;
            // $wallet->save();


            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true);


            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('frontend.email.welcome', ['user' => $request->input()], function ($message) use ($request) {
                $message
                    ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                    ->to($request->input('email'), $request->input('name'))
                    ->subject('Welcome to Super Squad Soccer!');
            });

            Notifynder::category('register')
                ->from(Auth::user()->id)
                ->to(1)
                ->url('users/profile/' . Auth::user()->id)
                ->send();

            if (Session::get('back') == 1) {
                Session::put('back', '0');
                return redirect()->intended();
            }

            return redirect('profile');
        }
        return view('frontend.login');
    }

    public function registerTeam(Request $request)
    {
        if ($request->isMethod('POST')) {

            $rules = array(
                'team_name'        => 'required',
                'email'            => 'required|email|unique:users'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                $messages = $validator->messages();
                return redirect()->back()
                    ->withErrors($validator);
            }

            $exist = User::where('email', '=', $request->input('email'))->count();
            if ($exist > 0) {
                $request->session()->flash('danger', 'User with email ' . $request->input('email') . ' already exist.');
                return redirect()->back();
            }
            $user = new User;
            $user->team_name = $request->input('team_name');
            $user->company_name = $request->input('company_name');
            $user->email = $request->input('email');
            $user->package  = $request->input('package_list');
            $user->save();
            $request->session()->flash('success', 'Thank you for your registration.');
            //return redirect()->back();
            $data = User::find($user->id);
            $data->ww_id = FHelper::playerid($user->id);
            $data->save();


            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('frontend.email.welcometeam', ['user' => $request->input()], function ($message) use ($request) {
                $message
                    ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                    ->to($request->input('email'), $request->input('team_name'))
                    ->subject('Welcome to Super Squad Soccer!');
            });
        }
        return redirect('teambattle');
    }


    public function login(Request $request)
    {
        if (basename(URL::previous()) == 'timeslot') {
            Session::put('back', '1');
        }

        if ($request->isMethod('POST')) {
            $admin = User::where('email', '=', $request->email)
                ->where('type', '=', 1)
                ->count();
            if ($admin == 1) {
                $request->session()->flash('error', 'Please login at backend.');
                return redirect('login');
            }
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {
                if (Session::get('back') == 1) {
                    Session::put('back', '0');
                    return redirect()->intended();
                }
                return redirect('profile');
            } else {
                $request->session()->flash('error', 'Invalid E-mail or password.');
                return redirect('login');
            }
        }
        return view('frontend.login');
    }

    public function forget(Request $request)
    {
        if ($request->isMethod('POST')) {

            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {
                if (Auth::user()->type == 0) {
                    return redirect('complete/step1');
                } else {
                    return redirect()->intended();
                }
            } else {
                $request->session()->flash('danger', 'Invalid E-mail or password!');
                return redirect('login');
            }
        }
        return view('frontend.forget');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flash('success', 'Thanks! You have successfully logged out.');
        return redirect('login');
    }

    public function profile(Request $request)
    {
        if ($request->route('action') == 'updateinfo') {
            if ($request->isMethod('POST')) {
                $user = User::find(Auth::user()->id);
                $user->name = $request->name;
                $user->telephone = $request->telephone;
                $user->dob = $request->dob;
                $user->next_kin = $request->next_kin;
                $user->nextkin_con = $request->nextkin_con;
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
                if (Hash::check($request->oldpassword, User::where('id', '=', Auth::user()->id)->pluck('password'))) {
                    $user = User::find(Auth::user()->id);
                    $user->password = bcrypt($request->newpassword);
                    $user->save();
                    $request->session()->flash('success', 'Password changed successfully!');
                } else {
                    $request->session()->flash('danger', 'Old password is incorrect!');
                }
                return redirect()->back();
            }
        } else if ($request->route('action') == 'edit') {
            return view('frontend.user.edit-profile');
        }
        return view('frontend.user.profile');
    }

    public function wallet(Request $request)
    {
        if ($request->route('action') == 'transfer') {
            if ($request->isMethod('POST')) {

                $validator = Validator::make($request->all(), [
                    'amount' => 'required|min:1|integer',
                ]);
                if ($validator->fails()) {
                    $request->session()->flash('danger', 'Please enter a valid amount.');
                    return redirect()->back();
                }

                $exist = User::where('email', '=', $request->email)->count();
                if ($exist == 0) {
                    $request->session()->flash('danger', $request->email . ' does not exist in our database.');
                    return redirect()->back();
                }
                if ($request->email == Auth::user()->email) {
                    $request->session()->flash('danger', 'Oops! You cannot transfer token to yourself.');
                    return redirect()->back();
                }
                if ($request->amount > FHelper::wallet()) {
                    $request->session()->flash('danger', 'You do not have sufficient token amount.');
                    return redirect()->back();
                }
                if ($request->amount)

                    $id = User::where('email', '=', $request->email)->pluck('id');

                $wallet = new Wallet;
                $wallet->amount = -$request->amount;
                $wallet->user_id = Auth::user()->id;
                $wallet->action = 'transferred to';
                $wallet->data = $request->email;
                $wallet->save();

                $wallet = new Wallet;
                $wallet->amount = $request->amount;
                $wallet->user_id = $id;
                $wallet->action = 'transferred by';
                $wallet->data = Auth::user()->email;
                $wallet->save();

                $request->session()->flash('success', $request->amount . ' token successfully transferred to your friend profile.');

                $user = Auth::user()->name . '(' . Auth::user()->email . ')';
                $amount = $request->amount;

                Notifynder::category('transferwallet')
                    ->from(Auth::user()->id)
                    ->to($id)
                    ->url('token/history')
                    ->extra(compact('user', 'amount'))
                    ->send();

                $users = User::find($id)->get();
                foreach ($users as $user) {
                }
                $msg = 'Your friend ' . Auth::user()->name . ' (' . Auth::user()->email . ') transferred <big><b>' . $amount . '</b></big> token(s) to your account!';

                $beautymail = app()->make(Beautymail::class);
                $beautymail->send('frontend.email.user', ['linktext' => 'View Wallet', 'link' => 'wallet', 'msg' => $msg, 'name' => $user->name], function ($message) use ($user) {
                    $message
                        ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                        ->to($user->email, $user->name)
                        ->subject('Token transferred by friend!');
                });

                return redirect()->back();
            }
        } else if ($request->route('action') == 'history') {
            $history = Wallet::where('user_id', '=', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('frontend.user.history', ['histories' => $history]);
        }

        return view('frontend.user.wallet');
    }

    public function bookings(Request $request)
    {
        $booking = Booking::where('user_id', '=', Auth::user()->id)
            ->orderBy('date', 'desc')
            ->paginate(10);
        return view('frontend.user.bookings', ['bookings' => $booking]);
    }

    public function points(Request $request)
    {
        $points = ScoreDetails::where(['user_id' => Auth::user()->id], ['season' => '2']) //where('user_id','=',Auth::user()->id)
            ->orderBy('created_at', 'desc')->get();
        //->paginate(10);
        return view('frontend.user.point', ['points' => $points]); //compact('points'));
    }

    public function creditrequest(Request $request)
    {

        if ($request->credit < 1 || $request->credit > 100) {
            return "Amount not in list.";
        }
        if ($request->credit == 1) {
            $amount = '3.00';
        }
        if ($request->credit == 5) {
            $amount = '15.00';
        }
        if ($request->credit == 10) {
            $amount = '30.00';
        }
        // if ($request->credit == 20) {
        //     $amount = '20.00';
        // }
        // if ($request->credit == 30) {
        //     $amount = '30.00';
        // }

        $cr = new CreditRequest;
        $cr->user_id = Auth::user()->id;
        $cr->amount = $amount;
        $cr->credit = $request->credit;
        $cr->save();

        $credit = $request->credit;

        Notifynder::category('creditrequest')
            ->from(Auth::user()->id)
            ->to(1)
            ->url('token/requests')
            ->extra(compact('credit'))
            ->send();

        $request->session()->flash('popup', '<p style="text-align:left; color:black">We have successfully received your request for a token top up.<br>Kindly make your payment either through:<br><br>- BIBD cash deposit machine or<br>- Cash payment at iCentre office (during office hours) or<br>- Cash payment at Game day on event venue<br><br>Bank deposit can be made to BIBD account number 1010050773 and WhatsApp or Email your proof of deposit slip together with your SS_ID to +673 823 7789');


        $msg = 'We have received a new credit request';
        $msg .= '<div style="border:1px dotted black"><p>Details</p>';
        $msg .= '<p><b>User Name:</b>' . Auth::user()->name . '</p>';
        $msg .= '<p><b>User Email:</b>' . Auth::user()->email . '</p>';
        $msg .= '<p><b>Token:</b>' . $credit . '</p></div>';

        $beautymail = app()->make(Beautymail::class);
        $beautymail->send('frontend.email.admin', ['linktext' => 'View Token Requests', 'link' => 'backend/wallet/requests', 'msg' => $msg], function ($message) use ($credit) {
            $message
                ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                ->to('hello@supersquadsoccer.com')
                ->subject('Token request for ' . $credit . ' token(s) is received.');
        });

        return redirect()->back();
    }


    public function notifications(Request $request)
    {
        return view('frontend.user.notifications');
    }

    public function run()
    {
        // $users = User::get();
        // foreach ($users as $user) {
        //     $data = User::find($user->id);
        //     $data->ww_id = FHelper::playerid($user->id);
        //     $data->save();
        // }

        $players = ScoreDetails::get();
        foreach ($players as $player) {

            $result = 0;

            if ($player->result == 1) {
                $result = 10;
            }
            if ($player->result == 0) {
                $result = 5;
            }


            $total_point = 1 + $result + ($player->goals_conceded) * (-1) + ($player->goals) * (1) + ($player->assist) * (1) + ($player->clean_sheet) * (3) + ($player->red) * (-5) + ($player->yellow) * (-2);
            $date = date('Y-m-d', strtotime($player->created_at));
            $position = Booking::where('date', '=', $date)
                ->where('user_id', '=', $player->user_id)
                ->pluck('position');

            $goalkeeper = 0;

            if ($position == 1 || $position == 6) {
                $goalkeeper = 1 + $result + ($player->goals) * (2) + ($player->goals_conceded) * (-1) + ($player->assist) * (1) + ($player->clean_sheet) * (3) + ($player->red) * (-5) + ($player->yellow) * (-2);
            }

            $topplayer = 1 + $result + ($player->goals) * (2) + ($player->assist) * (1) + ($player->red) * (-5) + ($player->yellow) * (-2);

            $point = new Point;
            $point->point = $total_point;
            $point->top_scorer = $topplayer;
            $point->top_goalkeeper = $goalkeeper;
            $point->user_id = $player->user_id;
            $point->save();
        }
    }

    public function contact(Request $request)
    {

        $msg = 'We have received a new contact form';
        $msg .= '<div style="border:1px dotted black"><p>Details</p>';
        $msg .= '<p><b>Name:</b>' . $request->name . '</p>';
        $msg .= '<p><b>Email:</b>' . $request->email . '</p>';
        $msg .= '<p><b>Contact:</b>' . $request->contact . '</p>';
        $msg .= '<p><b>Message:</b>' . $request->message . '</p></div>';

        $beautymail = app()->make(Beautymail::class);
        $beautymail->send('frontend.email.contact', ['msg' => $msg], function ($message) use ($request) {
            $message
                ->from('do-not-reply@supersquadsoccer.com', 'Super Squad')
                ->to('hello@supersquadsoccer.com')
                ->subject($request->subject);
        });

        $request->session()->flash('success', 'We have received your message! One of our team member will be in contact with you soon.');

        return redirect()->back();
    }

    public function resetpassword(Request $request)
    {
        $msg = 'Welcome to SuperSquadSoccer';

        $beautymail = app()->make(Beautymail::class);
        $beautymail->send('frontend.email.contact', ['msg' => $msg], function ($message) use ($request) {
            $message
                ->from('hello@supersquadsoccer.com', 'Super Squad')
                ->to('connectkannan@gmail.com')
                ->subject('Super Squad Soccer');
        });

        $request->session()->flash('success', 'We have received your message! One of our team member will be in contact with you soon.');

        return redirect()->back();
    }
}
