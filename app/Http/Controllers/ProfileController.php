<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Storage;

use JD\Cloudder\Facades\Cloudder;

class ProfileController extends Controller
{
    public function show(User $profile)
    {
        return view('profiles.show', [
            'profile'=>$profile,
            'projects'=>$profile->projects
        ]);
    }

    public function edit(User $profile)
    { 
        return view('profiles.edit', [
            'profile'=>$profile
        ]);
    }

    public function update(Request $request, User $profile)
    {   
        $validated = request()->validate([ 
            'avatar'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
            'firstname' => 'nullable|string|max:24',
            'lastname' => 'nullable|string|max:24',
            'username' => [
                'required',
                'string',
                'max:255', 
                Rule::unique('users')->ignore($profile),
                'alpha_dash'
            ],
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255',  
                Rule::unique('users')->ignore($profile),
            ],
            'contact_number' => 'nullable|string|max:11',
        ]);       
 
        $avatar = $request->file('avatar')->getRealPath();
 
        Cloudder::upload($avatar, null);
 
        list($width, $height) = getimagesize($avatar);
 
        $validated['avatar'] = Cloudder::show(Cloudder::getPublicId(), [
            "width" => $width, "height"=>$height
        ]);

        $profile->update($validated);

        return redirect(route('profile_show', [
            'profile'=>auth()->user()->username
        ]));
    }
}
