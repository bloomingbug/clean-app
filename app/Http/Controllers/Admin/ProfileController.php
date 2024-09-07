<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        return view('pages.admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . auth()->id()],
            'old_password' => ['sometimes', 'nullable', 'string'],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['sometimes', 'nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'gender' => ['required', 'in:M,F'],
        ]);

        if ($request->filled('password')) {
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return back()->with('error', 'The old password is incorrect')->withErrors('old_password', 'The old password is incorrect');
            }
        }

        $user = User::where('id', auth()->id())->first();

        $fileName = $user->getRawOriginal('avatar');
        if ($request->hasFile('avatar')) {
            if ($user->getRawOriginal('avatar') != null) {
                Storage::disk('local')->delete('/public/avatar/' . $user->getRawOriginal('avatar'));
            }

            $file = $request->file('avatar');
            $fileName = date('YmdHis') . '-avatar-' . Str::slug(strtoupper($user->name)) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/public/avatar', $fileName);
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            'avatar' => $fileName,
            'gender' => $request->gender,
        ]);

        flash()->success('Profile updated successfully');
        return redirect()->route('admin.profile.index')->with('success', 'Profile updated successfully');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
