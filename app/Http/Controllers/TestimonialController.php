<?php

namespace App\Http\Controllers;

use App\CoreMechanism\Files;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function index()
    {

        $data['testimonials'] = Testimonial::all()->where('status', 1);

        return view('cms.testimonials.index', $data);
    }


    public function create()
    {
        return view('cms.testimonials.create');
    }


    public function store(Files $fileObj, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
            'message' => 'required',
            'featured' => 'required',
            'order_by' => 'required |unique:testimonials,order_by',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        $name = $request->input('name');
        $designation = $request->input('designation');
        $message = $request->input('message');
        $order_by = $request->input('order_by');
        $featured = $request->input('featured');

        if ($request->hasFile('image')) {
            $dir_name = "testimonial_user_image";
            $files = $request->file('image');
            $image = $fileObj->upload_file($files, $dir_name);
            $title_input = $request->input($dir_name);
            $profile_pic = !empty($title_input) ? $title_input : $image;

        }

        Testimonial::insert([
            'name' => $name,
            'designation' => $designation,
            'message' => $message,
            'featured' => $featured,
            'order_by' => $order_by,
            'image' => $profile_pic,
        ]);

        session()->flash('message', 'Testimonial has been created successfully.');
        return redirect('/testimonials');
    }


    public function edit($id)
    {
        $data['testimonials'] = Testimonial::find($id);

        return view('cms.testimonials.edit', $data);
    }


    public function update(Files $fileObj, Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'designation' => 'required',
            'message' => 'required',
            'order_by' => 'required |unique:testimonials,order_by,' . $id,
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $designation = $request->input('designation');
        $message = $request->input('message');
        $order_by = $request->input('order_by');
        $featured = $request->input('featured');

        if ($request->hasFile('image')) {
            $dir_name = "testimonial_user_image";
            $files = $request->file('image');
            $image = $fileObj->upload_file($files, $dir_name);
            $title_input = $request->input($dir_name);
            $profile_pic = !empty($title_input) ? $title_input : $image;
        }
        if ($request->checkimage) {
            $profile_pic = $request->checkimage;
        }
        if (!($request->checkimage) and !($request->hasFile('image'))) {
            $profile_pic = null;
        }

        Testimonial::where('id', $id)->update([
            'name' => $name,
            'designation' => $designation,
            'message' => $message,
            'featured' => $featured,
            'order_by' => $order_by,
            'image' => $profile_pic
        ]);

        session()->flash('message', 'Testimonial has been updated successfully.');
        return redirect('/testimonials');
    }


    public function destroy($id)
    {

        Testimonial::where('id', $id)->update([
            'status' => 0
        ]);

        session()->flash('message', 'Testimonial has been deleted successfully.');
        return redirect('/testimonials');
    }
}
