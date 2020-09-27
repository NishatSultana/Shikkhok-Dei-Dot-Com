<?php

namespace App\Http\Controllers;

use App\CoreMechanism\Files;
use App\Teacher;
use App\TeacherTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class TeacherController extends Controller
{
    public function index()
    {
        $data['teachers'] = Teacher::all()->where('display', 1);
        return view('cms.teachers.index', $data);
    }

    public function create()
    {
        return view('cms.teachers.create');
    }

    public function store(Files $fileObj, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'excerpt' => 'required',
            'describes' => 'required',
            'order_by' => 'required',
            'display' => 'required',
            'front_page_image' => 'required',
            'details_page_image' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request, $fileObj) {

            $title = $request->input('title');
            $excerpt = $request->input('excerpt');
            $describes = $request->input('describes');
            $order_by = $request->input('order_by');
            $display = $request->input('display');
            $slug = strtolower(str_replace(' ', '-', $title));
            $dir_name = "teachers_image";

            if ($request->hasFile('front_page_image')) {
                $files = $request->file('front_page_image');
                $image = $fileObj->upload_file($files, $dir_name);
                $title_input = $request->input($dir_name);
                $front_page_image = !empty($title_input) ? $title_input : $image;
            }
            if ($request->hasFile('details_page_image')) {
                $files = $request->file('details_page_image');
                $image = $fileObj->upload_file($files, $dir_name);
                $title_input = $request->input($dir_name);
                $details_page_image = !empty($title_input) ? $title_input : $image;
            }

            $created_by = auth()->user()->id;
            $new_teacher = new Teacher();
            $new_teacher->title = $title;
            $new_teacher->slug = $slug;
            $new_teacher->excerpt = $excerpt;
            $new_teacher->describes = $describes;
            $new_teacher->order_by = $order_by;
            $new_teacher->display = $display;
            $new_teacher->front_page_image = $front_page_image;
            $new_teacher->details_page_image = $details_page_image;
            $new_teacher->save();

            $teacher_table_id = $new_teacher->id;
            $objectBox = [];
            $name_designation = $request->input('facility_title');
            $total_title = count($name_designation);
            if (count($name_designation) > 0) {
                $message = $request->input('facility_body');
                if (count($message) > 0) {
                    $total_body = count($message);
                    if ($total_body == $total_title) {
                        for ($i = 0; $i < $total_title; $i++) {
                            array_push($objectBox, [
                                'name_designation' => $name_designation[$i],
                                'message' => $message[$i],
                                'created_by' => $created_by,
                                'updated_by' => $created_by,
                                'teachers_id' => $teacher_table_id
                            ]);
                        }
                    }
                }
            }
            TeacherTestimonial::insert($objectBox);
        });

        session()->flash('message', 'Teacher has been created successfully.');
        return redirect('/teachers');
    }

    public function edit($id)
    {
        $data['teachers'] = Teacher::find($id);
        $data['teachers_testimonial'] = TeacherTestimonial::where('teachers_id', $id)->get();

        return view('cms.teachers.edit', $data);
    }


    public function update(Files $fileObj, Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'order_by' => 'required |unique:teachers,order_by,' . $request->input('order_by'),
            'title' => 'required',
            'describes' => 'required',
            'excerpt' => 'required',
            'display' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        DB::transaction(function () use ($request, $fileObj, $id) {
            $data['teachers_image'] = Teacher::where('id', $id)->select('details_page_image', 'front_page_image')->first();

            $created_by = auth()->user()->id;
            $title = $request->input('title');
            $slug = strtolower(str_replace(' ', '-', $title));
            $excerpt = $request->input('excerpt');
            $describes = $request->input('describes');
            $order_by = $request->input('order_by');
            $display = $request->input('display');

            $dir_name = 'teachers_image';

            if ($request->hasFile('front_page_image')) {
                $files = $request->file('front_page_image');
                $image = $fileObj->upload_file($files, $dir_name);
                $title_input = $request->input($dir_name);
                $front_page_image = !empty($title_input) ? $title_input : $image;
            }
            if ($request->hasFile('front_page_image')==null) {
                $front_page_image = $data['teachers_image']->front_page_image;
            }
            if ($request->hasFile('details_page_image')) {
                $files = $request->file('details_page_image');
                $image = $fileObj->upload_file($files, $dir_name);
                $title_input = $request->input($dir_name);
                $details_page_image = !empty($title_input) ? $title_input : $image;
            }
            if ($request->hasFile('details_page_image')==null) {
                $details_page_image = $data['teachers_image']->details_page_image;
            }

            TeacherTestimonial::where('teachers_id', $id)->delete();

            Teacher::where('id', $id)->update([
                'title' => $title,
                'slug' => $slug,
                'excerpt' => $excerpt,
                'describes' => $describes,
                'order_by' => $order_by,
                'display' => $display,
                'details_page_image' => $details_page_image,
                'front_page_image' => $front_page_image,
            ]);

            $offer_table_id = $id;

            $objectBox = [];
            $name_designation = $request->input('facility_title');
            $total_title = count($name_designation);
            if (count($name_designation) > 0) {
                $message = $request->input('facility_body');
                if (count($message) > 0) {
                    $total_body = count($message);
                    if ($total_body == $total_title) {
                        for ($i = 0; $i < $total_title; $i++) {
                            array_push($objectBox, [
                                'name_designation' => $name_designation[$i],
                                'message' => $message[$i],
                                'created_by' => $created_by,
                                'updated_by' => $created_by,
                                'teachers_id' => $offer_table_id
                            ]);
                        }
                    }
                }
            }

            TeacherTestimonial::insert($objectBox);
        });

        session()->flash('message', 'Teachers has been updated successfully.');
        return redirect('/teachers');
    }


    public function destroy($id)
    {
        $teachers = Teacher::find($id);

        if (!empty($teachers)) {
            $teachers->delete();
            TeacherTestimonial::where('teachers_id', $id)->delete();
            session()->flash('message', 'Teacher has been deleted successfully.');
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
        }
        return redirect('/teachers');
    }

    public function get_teacher_details($slug)
    {
        $data['details'] = Teacher::where('slug', '=', $slug)->get();
        $data['details'] = $data['details'][0];
        $data['testimonial_details'] = TeacherTestimonial::where('teachers_id', '=', $data['details']->id)->get();

        return view('frontend.pages.teacher_profile', $data);
    }

    public function all_teachers()
    {
        $where  = [
            ['status', '<>', '0'],
            ['display', '=', '1'],
        ];

        $data['teachers'] = Teacher::where($where)->orderBy('order_by', 'ASC')->get();
        return view('frontend.pages.teacher', $data);
    }
}
