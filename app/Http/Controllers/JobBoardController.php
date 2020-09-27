<?php

namespace App\Http\Controllers;

use App\CoreMechanism\Acl;
use App\Module;
use App\TutorJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JobBoardController extends Controller
{
    public function index(Acl $acl)
    {
        $acl->has_permissions('view_job_board');

        $data['jobs'] = DB::table('tutor_jobs')->paginate(5);

        return view('jobs_board.index', $data);
    }

    public function store(Acl $acl, $id)
    {
        $acl->has_permissions('apply_job_board');

        $data['jobs'] = DB::table('tutor_jobs')->paginate(5);

        return view('jobs_board.index', $data);
    }
}
