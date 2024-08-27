<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'gender' => ['required', 'in:M,F'],
        ]);

        if ($validator->fails()) {
            return new ErrorResource(false, $validator->errors(), 422);
        }

        try {
            $username = generateSlug(User::class, $request->name, 'username', true);

            $user = User::create([
                'username' => $username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $roleUser = Role::where('name', 'User')->first();
            $user->assignRole($roleUser);

            auth()->login($user, true);

            return new SuccessResource(true, 'Pendaftaran berhasil', [
                'redirect' => route('home')
            ]);
        } catch (\Exception $e) {
            return new ErrorResource(false, $e->getMessage(), 500);
        }
    }
}
