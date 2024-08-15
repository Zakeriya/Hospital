<?php
// namespace App\Helpers ;

use Illuminate\Support\Facades\Auth;

function permission($permission)
{
   return Auth::guard('admin')->user()->hasPermissionTo($permission);
}