<?php

namespace App\Http\Controllers;

use App\FilesSubmission;
use Illuminate\Http\Request;

use App\Group;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\CoreMechanism\Acl;

use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function index(Acl $acl)
    {
        $acl->has_permissions('view_users');

        $logged_user = auth()->user();

        $where = [
            ['group_id', '=', '4'],
            ['id', '<>', $logged_user->id],
        ];

        $data['users'] = User::with('group')->where($where)->get();

        return view('users.index', $data);
    }

    public function create(Acl $acl)
    {
        $acl->has_permissions('add_users');
        // Show Only Admin and Office Employee Groups
        $data['groups'] = Group::select('id', 'name')->whereIn('id', [2, 3])->get();
        return view('users.create', $data);
    }

    public function store(Acl $acl, Request $request)
    {

        $acl->has_permissions('add_users');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'mobile' => 'required|unique:users,mobile|min:11|max:11',
            'group' => 'required',
            'is_staff' => 'required'
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $logged_user = auth()->user();
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $password = $request->input('password');
        $group = $request->input('group');
        $is_staff = $request->input('is_staff');

        User::insert([
            'full_name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'password' => Hash::make($password),
            'group_id' => $group,
            'is_staff' => $is_staff,
            'created_by' => $logged_user->id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        session()->flash('message', 'User has been created successfully.');
        return redirect('/users/office');
    }

    public function destroy(Acl $acl, $id)
    {
        $acl->has_permissions('delete_users');

        $user = User::find($id);
        if (!empty($user)) {
            $logged_user = auth()->user();
            if ($user->status == 1) {
                User::where('id', $id)->update(['status' => 0, 'updated_by' => $logged_user->id, 'updated_at' => date('Y-m-d H:i:s')]);
            } else {
                User::where('id', $id)->update(['status' => 1, 'updated_by' => $logged_user->id, 'updated_at' => date('Y-m-d H:i:s')]);
            }
            session()->flash('message', 'User has been deleted successfully.');
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
        }
        return back();
    }

    public function students_guardians_list(Acl $acl)
    {
        $acl->has_permissions('view_students_guardian');

        $logged_user = auth()->user();

        $where = [
            ['group_id', '=', '3'],
            ['id', '<>', $logged_user->id],
        ];

        $data['users'] = User::with('group')->where($where)->get();

        return view('users.students_list', $data);
    }

    public function office_employees_list(Acl $acl)
    {
        $acl->has_permissions('view_office_users');

        $logged_user = auth()->user();

        $where = [
            ['group_id', '=', '2'],
            ['id', '<>', $logged_user->id],
        ];

        $data['users'] = User::with('group')->where($where)->get();

        return view('users.employees_list', $data);
    }
}
