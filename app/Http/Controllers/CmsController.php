<?php

namespace App\Http\Controllers;
use App\Slider;
use App\Teacher;
use App\Testimonial;

class CmsController extends Controller
{
    public  function index()
    {
        $where = [
            ['status', '<>', '0'],
            ['featured', '=', '1'],
        ];

        $teacher = [
            ['status', '<>', '0'],
            ['display', '=', '1'],
        ];

        $data['sliders'] = Slider::where($where)->orderBy('order_by', 'ASC')->get();
        $data['testimonials'] = Testimonial::where($where)->orderBy('order_by', 'ASC')->get();
        $data['teachers'] = Teacher::where($teacher)->limit(5)->get();

        return view('frontend.pages.home', $data);
    }

    public function about_us()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function login()
    {
        return view('frontend.pages.login');
    }

    public function signup()
    {
        return view('frontend.pages.signup');
    }

    public function lost_password()
    {
        return view('frontend.pages.lost_password');
    }
}
