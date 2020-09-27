<?php

namespace App\Http\Controllers;

use App\CoreMechanism\Acl;
use App\TutorJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TutorJobController extends Controller
{
    public function index(Acl $acl)
    {
        $acl->has_permissions('view_jobs');

        $logged_user = auth()->user();
        if (auth()->user()->group_id == 1) {
            $data['jobs'] = TutorJob::all();
        } else {
            $where = [
                ['users', '=', $logged_user->id],
            ];

            $data['jobs'] = TutorJob::where($where)->get();
        }
        return view('jobs.index', $data);
    }

    public function create(Acl $acl)
    {
        $acl->has_permissions('add_jobs');

        return view('jobs.add');
    }

    public function edit(Acl $acl, $id)
    {
        $acl->has_permissions('change_jobs');

        $logged_user = auth()->user();

        $where = [
            ['users', '=', $logged_user->id],
            ['id', '=', $id],
        ];

        $data['jobs'] = TutorJob::where($where)->first();
        return view('jobs.edit', $data);
    }

    public function update(Acl $acl, Request $request, $id)
    {
        $acl->has_permissions('change_jobs');

        $logged_user = auth()->user();
        $validator = Validator::make($request->all(), [
            'tutor_type' => 'required',
            'institute_name' => 'required',
            'job_location' => 'required',
            'salary' => 'required',
            'no_of_students' => 'required',
            'day_per_week' => 'required',
            'student_category' => 'required',
            'hiring_time' => 'required',
            'student_class' => 'required',
            'subject_list' => 'required',
            'student_gender' => 'required',
            'tutor_gender' => 'required',
            'requirements' => 'required',
        ]);
        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        TutorJob::where('id', $id)->update([
            'tutor_type' => $request->input('tutor_type'),
            'institute_name' => $request->input('institute_name'),
            'job_location' => $request->input('job_location'),
            'no_of_students' => $request->input('no_of_students'),
            'day_per_week' => $request->input('day_per_week'),
            'salary' => $request->input('salary'),
            'student_category' => $request->input('student_category'),
            'hiring_time' => $request->input('hiring_time'),
            'student_class' => $request->input('student_class'),
            'subject_list' => $request->input('subject_list'),
            'student_gender' => $request->input('student_gender'),
            'tutor_gender' => $request->input('tutor_gender'),
            'requirements' => $request->input('requirements'),
            'users' => $logged_user->id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        session()->flash('message', 'Job Request has been updated successfully.');
        return redirect('/view-jobs');
    }

    public function view(Acl $acl, $id)
    {
        $acl->has_permissions('details_jobs');

        $logged_user = auth()->user();

        $where = [
            ['users', '=', $logged_user->id],
            ['id', '=', $id],
        ];

        $data['jobs'] = TutorJob::where($where)->first();

        return view('jobs.details', $data);
    }

    public function store(Acl $acl, Request $request)
    {
        $acl->has_permissions('add_jobs');

        $validator = Validator::make($request->all(), [
            'tutor_type' => 'required',
            'institute_name' => 'required',
            'job_location' => 'required',
            'no_of_students' => 'required',
            'day_per_week' => 'required',
            'salary' => 'required',
            'student_category' => 'required',
            'hiring_time' => 'required',
            'student_class' => 'required',
            'subject_list' => 'required',
            'student_gender' => 'required',
            'tutor_gender' => 'required',
            'requirements' => 'required',
        ]);
        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        $logged_user = auth()->user();
        TutorJob::insert([
            'tutor_type' => $request->input('tutor_type'),
            'institute_name' => $request->input('institute_name'),
            'job_location' => $request->input('job_location'),
            'no_of_students' => $request->input('no_of_students'),
            'day_per_week' => $request->input('day_per_week'),
            'salary' => $request->input('salary'),
            'student_category' => $request->input('student_category'),
            'hiring_time' => $request->input('hiring_time'),
            'student_class' => $request->input('student_class'),
            'subject_list' => $request->input('subject_list'),
            'student_gender' => $request->input('student_gender'),
            'tutor_gender' => $request->input('tutor_gender'),
            'requirements' => $request->input('requirements'),
            'users' => $logged_user->id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        session()->flash('message', 'Job Request has been created successfully.');
        return redirect('/view-jobs');
    }

    public function destroy(Acl $acl, $id)
    {
        $acl->has_permissions('delete_jobs');

        $jobs = TutorJob::find($id);
        if (!empty($jobs)) {
            $jobs->delete();
            session()->flash('message', 'Job has been deleted successfully.');
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
        }
        return redirect('/view-jobs');
    }
}
