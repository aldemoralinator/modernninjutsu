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
        // $imageName = $request->file('avatar')->getRealPath();
        // return Cloudder::upload($request->file('avatar'), null);

        $validated = request()->validate([
            // 'avatar' => [
            //     'required', 
            //     'file'
            // ],
            'avatar'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
            'firstname' => 'nullable|string|max:24',
            'lastname' => 'nullable|string|max:24',
            'username' => [
                'required',
                'string',
                'max:255',
                // 'unique:users',
                Rule::unique('users')->ignore($profile),
                'alpha_dash'
            ],
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                // 'unique:users',
                Rule::unique('users')->ignore($profile),
            ],
            'contact_number' => 'nullable|string|max:11',
        ]);
        // $profile->firstname = $validated['firstname'];
        // $profile->lastname = $validated['lastname'];
        // $profile->username = $validated['username'];
        // $profile->email = $validated['email'];
        // $profile->contact_number = $validated['contact_number'];
        // $profile->save();
         
        // $validated['avatar'] = Cloudder::upload($imageName, null);

        // $image = $request->file('avatar');
 
        // $name = $request->file('avatar')->getClientOriginalName();
 
        $avatar = $request->file('avatar')->getRealPath();
 
        Cloudder::upload($avatar, null);
 
        list($width, $height) = getimagesize($avatar);
 
        $validated['avatar'] = Cloudder::show(Cloudder::getPublicId(), [
            "width" => $width, "height"=>$height
        ]);
 
        // $validated['avatar'] = request('avatar')->store('avatars', 'google');

        $profile->update($validated);

        return redirect(route('profile_show', [
            'profile'=>auth()->user()->username
        ]));
    }
}
