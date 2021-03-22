<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
use App\User;
use Hash;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    
    protected $redirectTo = '/';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // public function getEmail()
    // {
    //     return view('frontend.forget');
    // }

    // public function postEmail(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //     ]);

    //     $token = str_random(64);

    //     DB::table('password_resets')->insert(
    //         ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
    //     );

    //     Mail::send('auth.reset', ['token' => $token], function ($message) use ($request) {
    //         $message->to($request->email);
    //         $message->subject('Reset Password Notification');
    //     });

    //     return back()->with('message', 'We have e-mailed your password reset link!');
    // }

     public function getPassword($token)
     {
         return view('auth.reset', ['token' => $token]);
     }

     public function postPassword(Request $request)
     {

        /* $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required',

         ]); */

         $updatePassword = DB::table('password_resets')
             ->where(['email' => $request->email, 'token' => $request->token])
             ->first();

         if (!$updatePassword)
             return back()->withInput()->with('error', 'Invalid token!');

         $user = User::where('email', $request->email)
             ->update(['password' => Hash::make($request->password)]);

         DB::table('password_resets')->where(['email' => $request->email])->delete();

         return redirect('/login')->with('message', 'Your password has been changed!');
     }
}
