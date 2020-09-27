<?php

namespace App\Http\Controllers;

use App\Application;
use App\CoreMechanism\Acl;
use App\TutorJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function index(Acl $acl)
    {
        $acl->has_permissions('view_online_application');
        $logged_user = auth()->user();
        $data['applications'] = Application::with('user', 'job')->where('user_id',$logged_user->id)->get();
        return view('applications.index', $data);
    }
    public function create(Acl $acl, $id)
    {
        $logged_user = auth()->user();

        Application::insert([
            'user_id' => $logged_user->id,
            'job_id' => $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $data['jobs'] = DB::table('tutor_jobs')->paginate(5);

        session()->flash('message', 'Application has been submitted successfully.');
        return view('jobs_board.index', $data);
    }

    public function view(Acl $acl, $id)
    {
        $acl->has_permissions('view_online_application');

        $where = [
            ['id', '=', $id],
        ];

        $data['jobs'] = TutorJob::where($where)->first();

        return view('applications.details', $data);
    }

    public function destroy(Acl $acl, $id)
    {

        $acl->has_permissions('delete_online_application');

        $job_application = Application::find($id);
        if (!empty($job_application)) {
            $job_application->delete();
            session()->flash('message', 'Application has been deleted successfully.');
        } else {
            session()->flash('message', 'Somethings went\'s wrong');
            session()->flash('alert_tag', 'alert-danger');
        }
        return redirect('/job-board');
    }
}
