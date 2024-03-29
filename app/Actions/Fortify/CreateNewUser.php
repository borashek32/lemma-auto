<?php

namespace App\Actions\Fortify;

use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => ['required', 'numeric', 'unique:users'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'status'   => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name'     => $input['name'],
            'email'    => $input['email'],
            'phone'    => $input['phone'],
            'status_id'=> $input['status'],
            'password' => Hash::make($input['password']),
            ]);
        $user->assignRole('user');
        
        return $user;
    }
}
