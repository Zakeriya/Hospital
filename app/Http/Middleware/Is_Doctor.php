<?php

namespace App\Http\Middleware;

use App\Models\Doctor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Is_Doctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $doctors=Doctor::all();
        $user_id=Auth::user()->id;
        foreach ($doctors as $doctor)
         {
            if($user_id == $doctor->user_id)
            {
                return $next($request);
            }
        }

        return abort(404);
    }
}
