<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        // $doctors=Doctor::paginate(2);
        $blogs=Blog::paginate(3);
        // $departments=Department::all();
        return view('front.index',get_defined_vars());
    }

    public function about()
    {
        return view('front.about');
    }

    public function doctors()
    {
        return view('front.doctors');
    }


    public function news(Request $request)
    {

        $blogs=Blog::paginate(20);
        return view('front.news',compact('blogs'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    
}
