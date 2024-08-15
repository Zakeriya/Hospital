<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('back.user.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::forUser(Auth::guard('admin')->user())->authorize('add_user')) {
            // The user can update the post...
        }
        return view('back.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datt=$request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed'
        ]);

        User::create($datt);

        return to_route('back.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('back.user.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (Gate::forUser(Auth::guard('admin')->user())->authorize('edit_user')) {
            // The user can update the post...
        }
        return view('back.user.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'password'=>'required|confirmed'
        ]);

        $user->update($data);

        return to_route('back.users.show',$user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return to_route('back.users.index');
    }
}
