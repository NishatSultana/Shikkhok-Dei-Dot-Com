<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPassword;
use App\Mail\VerificationEmail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|unique:users,mobile|min:11|max:11',
            'profession' => 'required',
            'password' => 'required|required_with:repeat_password|same:repeat_password',
            'repeat_password' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            $notification = array('message' => 'Something Wents Wrong. Please Check Again', 'alert-type' => 'success');
            return redirect()->back()->WithErrors($validator)->withInput()->with($notification);
        }

        $name = $request->input('full_name');
        $email = $request->input('email');
        $mobile = $request->input('mobile_number');
        $password = $request->input('password');
        $profession = $request->input('profession');

        if ($profession == 1)
            $group_id = 3;
        elseif ($profession == 2)
            $group_id = 4;

        $verify_token = md5(rand(1, 10) . microtime());

        User::insert([
            'full_name' => $name,
            'status' => 0,
            'email' => $email,
            'mobile' => $mobile,
            'profession' => $group_id,
            'group_id' => $group_id,
            'password' => Hash::make($password),
            'email_verification_token' => $verify_token,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user = ['full_name' => $user->full_name, 'email_verification_token' => $user->email_verification_token];
            Mail::send(['text' => 'mailusers.account_verify'], $user, function ($message) use ($request) {
                $message->to($request->email)->subject('Account Verification');
                $message->from(config('mail.from.username'), 'Shikhok Dei');
            });
            $notification = array('message' => 'Registration Done Successfully! Please check email for account verification.', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
            return redirect('sign-up');
        }

    }

    protected function account_verification($token)
    {
        $data = User::where([['email_verification_token', $token], ['status', 0]])->first();
        if ($data) {
            $to = Carbon::parse($data->created_at);
            $from = Carbon::parse(date('Y-m-d H:i:s'));
            $duration = $from->diffInHours($to);
            $duration = (gmdate('H', $duration));
            if ($duration <= 2) {
                User::where('email_verification_token', $token)->update(['status' => 1]);
                session()->flash('message', 'Your Account Activated. Please Login');
                session()->flash('alert_tag', 'alert-success');
                return redirect('login');
            }
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
            return redirect('set_password');
        }
    }

    protected function set_password()
    {
        return view('frontend.pages.set_password');
    }

    protected function forgetpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            $notification = array('message' => 'Something Wents Wrong. Please Check Again', 'alert-type' => 'success');
            return redirect()->back()->WithErrors($validator)->withInput()->with($notification);
        }

        $email = $request->input('email');
        $verify_token = md5(rand(1, 10) . microtime());
        $isExistEmail = User::where('email', $request->email)->update(['email_verification_token' => $verify_token]);
        if ($isExistEmail) {
            $user = User::where('email', $request->email)->first();
            $user = ['full_name' => $user->full_name, 'email_verification_token' => $user->email_verification_token];

            Mail::send(['text' => 'mailusers.forget_password'], $user, function ($message) use ($request) {
                $message->to($request->email)->subject('Account Verification');
                $message->from(config('mail.from.username'), 'Shikhok Dei');
            });

            session()->flash('message', 'Please check email for Password Reset.');
            session()->flash('alert_tag', 'alert-success');
            return back();
        } else {
            session()->flash('message', 'Email Not Found.');
            session()->flash('alert_tag', 'alert-danger');
            return redirect('lost-password');
        }
    }

    protected function passwordupdateverify($token)
    {

        $data = User::where([['email_verification_token', $token]])->first();
        if ($data) {
            $to = Carbon::parse($data->created_at);
            $from = Carbon::parse(date('Y-m-d H:i:s'));
            $duration = $from->diffInHours($to);
            $duration = (gmdate('H', $duration));
            if ($duration <= 2) {
                User::where('email_verification_token', $token)->update(['status' => 1]);
                session()->flash('message', 'Please Reset your password');
                session()->flash('alert_tag', 'alert-success');
                return view('frontend.pages.set_password')->with(array('token' => $token));
            }
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
            return redirect('login');
        }
    }

    protected function passwordupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|required_with:repeat_password|same:repeat_password',
            'repeat_password' => 'required',
            'token' => 'required'
        ]);

        // if validator fails
        if ($validator->fails()) {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
            return back();
        }

        $password = $request->input('password');
        $token = $request->input('token');

        $data = User::where([['email_verification_token', $token]]);

        if ($data) {
            User::where('email_verification_token', $token)->update(['password' => Hash::make($password), 'email_verification_token' => '']);
            session()->flash('message', 'Password Updated Successfully');
            session()->flash('alert_tag', 'alert-success');
            return redirect('login');
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
            return redirect('login');
        }
    }
}
