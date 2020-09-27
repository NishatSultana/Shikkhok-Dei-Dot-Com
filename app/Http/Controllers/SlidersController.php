<?php

namespace App\Http\Controllers;

use App\CoreMechanism\Files;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SlidersController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::all()->where('status', 1);

        return view('cms.sliders.index', $data);
    }


    public function create()
    {
        return view('cms.sliders.create');
    }


    public function store(Files $fileObj,  Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'featured' => 'required',
            'order_by' => 'required |unique:sliders,order_by',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        $title = $request->input('title');
        $description = $request->input('description');
        $order_by = $request->input('order_by');
        $featured = $request->input('featured');

        if ($request->hasFile('image')) {
            $dir_name = "slider_image";
            $files = $request->file('image');
            $image = $fileObj->upload_file($files, $dir_name);
            $title_input = $request->input($dir_name);
            $profile_pic = !empty($title_input) ? $title_input : $image;

        }

        Slider::insert([
            'title' => $title,
            'description' => $description,
            'featured' => $featured,
            'order_by' => $order_by,
            'image' => $profile_pic
        ]);

        session()->flash('message', 'Slider has been created successfully.');
        return redirect('/sliders');
    }


    public function edit($id)
    {
        $data['sliders'] = Slider::find($id);
        return view('cms.sliders.edit', $data);
    }


    public function update(Files $fileObj, Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'featured' => 'required',
            'order_by' => 'required |unique:sliders,order_by,' . $id,
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $title = $request->input('title');
        $description = $request->input('description');
        $order_by = $request->input('order_by');
        $featured = $request->input('featured');

        if ($request->hasFile('image')) {
            $dir_name = "slider_image";
            $files = $request->file('image');
            $image = $fileObj->upload_file($files, $dir_name);
            $title_input = $request->input($dir_name);
            $profile_pic = !empty($title_input) ? $title_input : $image;
        }
        if($request->checkimage) {
            $profile_pic = $request->checkimage;
        }
        if (!($request->checkimage) and !($request->hasFile('image'))){
            $profile_pic = null;
        }

        Slider::where('id', $id)->update([
            'title' => $title,
            'description' => $description,
            'featured' => $featured,
            'order_by' => $order_by,
            'image' => $profile_pic
        ]);

        session()->flash('message', 'Slider has been updated successfully.');
        return redirect('/sliders');
    }


    public function destroy($id)
    {
        Slider::where('id', $id)->update([
            'status' => 0
        ]);

        session()->flash('message', 'Slider has been deleted successfully.');
        return redirect('/sliders');
    }
}
