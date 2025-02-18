<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->name = $attributes['name'];

        if ($request->hasFile('profile_pic')) {
            // Delete old profile picture if it exists
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $path = $request->file('profile_pic')->store('profile_pictures', 'public');
            $user->profile_pic = $path;
        }

        $user->save();

        return redirect()->route('profile.show')
            ->with('success', 'Profile updated successfully!');
    }

    public function editPassword()
    {
        return view('profile.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
            'new_password_confirmation' => ['required'],
        ]);

        $user = Auth::user();

        // Check if current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        // Update password
        $user->forceFill([
            'password' => Hash::make($request->new_password),
        ])->save();

        return redirect()
            ->route('profile.show')
            ->with('success', 'Password updated successfully!');
    }
}
