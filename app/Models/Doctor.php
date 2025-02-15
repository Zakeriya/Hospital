<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    // public function patients()
    // {
    //     $this->hasMany(Patient::class);
    // }

    public function appointments()
    {
       return $this->hasMany(Appointment::class);
    }
}
