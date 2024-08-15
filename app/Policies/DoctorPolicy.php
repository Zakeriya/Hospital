<?php

namespace App\Policies;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DoctorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        $doctors=Doctor::all();

        foreach ($doctors as $doctor) {
            if( $user->id == $doctor->user_id)
            {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Doctor $doctor)
    {
        // تحقق مما إذا كان دور المستخدم هو طبيب

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user )
    {
        // dd($doctor->user_id);

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Doctor $doctor)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Doctor $doctor)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Doctor $doctor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Doctor $doctor)
    {
        //
    }
}
