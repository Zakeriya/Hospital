<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.join');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }

    public function join_doctors(StoreDoctorRequest $request)
    {

        $data=$request->validated();
        // dd($request->user_id);
        $doctors=Doctor::all();
        if(count($doctors)>0)
        {
            $findDoctor=Doctor::find($request->user_id);
            if($findDoctor)
            {
                $doctorStatus=$findDoctor->status=='pending'?"Wait Till Your Status Is Approved":'You Have An Approved Account';

                 return to_route('front.index')->with('status',$doctorStatus);
            }

        }

        $data['user_id']=$request->user_id;
        $data['name']=Auth::user()->name;
        $data['image']=Storage::putFile('doctors',$data['image']);

        Doctor::create($data);

        return to_route('front.index')->with('success','Doctor Details Has Been sent to Admins');
    }

    public function myBlogs()
    {
        $this->authorize('viewAny', Doctor::class);
        $user_id=Auth::user()->id;
        $doctors=Doctor::where('user_id',$user_id)->get();
        // dd($doctors);

        foreach ($doctors as $doctor) {
            $blogs=Blog::where('doctor_id',$doctor->id)->paginate(7);
        }
        // dd($blogs);
        return view('front.myBlogs',compact('blogs'));
    }
    

    public function myPatients()
    {
        $this->authorize('viewAny', Doctor::class);
        $doctors=Doctor::where('user_id',Auth::user()->id)->get();
        // dd($doctors);

        // $myPatients=[];
        foreach ($doctors as $doctor) {

            $myPatients=Appointment::where('doctor_id',$doctor->id)->get();
            // dd($doctor->id);
            // dd($doctor->app)
        }

        // dd($myPatients);

        return view('front.myPatients',compact('myPatients'));
    }
}
