<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => ['required', 'numeric'],
            'email'    => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo'    => ['nullable', 'image', 'max:1024'],
            'status'   => ['required']
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        $user->forceFill([
            'name'   => $input['name'],
            'email'  => $input['email'],
            'phone'  => $input['phone'],
            'status_id' => $input['status']
        ])
//        dd($user->status);
        ->save();
    }
}
