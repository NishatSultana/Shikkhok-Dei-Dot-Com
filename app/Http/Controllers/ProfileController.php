<?php

namespace App\Http\Controllers;

use App\CoreMechanism\Acl;
use DateTime;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\CoreMechanism\Files;
use App\CoreMechanism\ProfileProgress;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function password_change_index(Acl $acl)
    {
        $acl->has_permissions('change_password');
        $data['user'] = auth()->user();
        return view('user_profile.password_change', $data);
    }

    public function password_update(Acl $acl, Request $request)
    {
        $acl->has_permissions('change_password');
        $logged_user = auth()->user();
        if ($request->passwordchange === '1') {
            $validator = Validator::make($request->all(), [
                'password' => 'required|required_with:confpass|same:confpass | min:8',
                'confpass' => 'required',
            ]);
            if ($validator->fails()) {
                $notification = array('message' => 'Something Wents Wrong !', 'alert-type' => 'error');
                return back()->withErrors($validator)->withInput()->with($notification);
            }

            User::where('id', $logged_user->id)->update(['password' => Hash::make(trim($request->password))]);
            session()->flash('message', 'Password Updated');
            session()->flash('alert_tag', 'alert-success');

        } else {
            $validator = Validator::make($request->all(), [
                'password' => 'required|required_with:confpass|same:confpass|min:8',
                'confpass' => 'required',
                'old_password' => 'required',
            ]);
            if ($validator->fails()) {
                $notification = array('message' => 'Something Wents Wrong !', 'alert-type' => 'error');
                return back()->withErrors($validator)->withInput()->with($notification);
            }
            $previous_password = User::where('id', $logged_user->id)->first(['password']);
            if (Hash::check($request->old_password, $previous_password->password)) {
                User::where('id', $logged_user->id)->update(['password' => Hash::make(trim($request->password))]);
                session()->flash('message', 'Password Updated');
                session()->flash('alert_tag', 'alert-success');
            } else {
                session()->flash('message', 'Password Mismatched !');
                session()->flash('alert_tag', 'alert-danger');
            }
        }

        return back()->withInput();
    }

    public function profile_index(Acl $acl)
    {
        $acl->has_permissions('view_profile');

        return view('user_profile.show');
    }

    public function profile_update_view(Acl $acl, ProfileProgress $pg, Request $request)
    {
        $acl->has_permissions('change_profile');

        return view('user_profile.edit_profile');
    }

    public function profile_update(Acl $acl, Files $fileObj, Request $request)
    {

        $acl->has_permissions('change_profile');

        if ($request->etin_varify === '1') {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'present_address' => 'required',
                'permanent_address' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'profile_pic' => 'nullable|image|mimes:jpg,png,jpeg,gif',
                'bio' => 'required'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'present_address' => 'required',
                'permanent_address' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'profile_pic' => 'nullable|image|mimes:jpg,png,jpeg,gif',
                'bio' => 'required'
            ]);
        }

        if ($validator->fails()) {
            session()->flash('message', 'Error !! Insert Data Again !');
            session()->flash('alert_tag', 'alert-danger');
            return back()->withErrors($validator)->withInput();
        }
        $logged_user = auth()->user();
        if ($request->hasFile('profile_pic')) {
            $dir_name = "user_image";
            $files = $request->file('profile_pic');
            $image = $fileObj->upload_file($files, $dir_name);
            $title_input = $request->input($dir_name);
            $profile_pic = !empty($title_input) ? $title_input : $image;

        } else if (!$request->hasFile('profile_pic')) {
            $profile_pic = $logged_user->profile_pic;;
        }

        $name = $request->input('full_name');
        $bio = $request->input('bio');
        $mobile = $request->input('mobile');
        $present_address = trim($request->present_address);
        $permanent_address = trim($request->permanent_address);
        $dob = $request->dob;
        $gender = $request->gender;


        User::where('id', $logged_user->id)->update([
            'full_name' => $name,
            'bio' => $bio,
            'mobile' => $mobile,
            'profile_pic' => $profile_pic,
            'present_address' => $present_address,
            'permanent_address' => $permanent_address,
            'dob' => $dob,
            'gender' => $gender,
            'updated_by' => $logged_user->id,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        session()->flash('message', 'User has been updated successfully.');
        return redirect('/profile-view');
    }

}
