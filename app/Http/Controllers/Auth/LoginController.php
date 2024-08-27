<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember' => ['sometimes', 'nullable', 'boolean']
        ]);

        if ($validator->fails()) {
            return new ErrorResource(false, $validator->errors(), 422);
        }

        try {
            if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
                return new ErrorResource(false, 'Email or password is incorrect', 401);
            }

            if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Super Admin') {
                return new SuccessResource(true, 'Welcome back, ' . auth()->user()->name, [
                    'redirect' => route('admin.dashboard')
                ]);
            }

            return new SuccessResource(true, 'Welcome back, ' . auth()->user()->name, [
                'redirect' => route('home')
            ]);
        } catch (\Exception $e) {
            return new ErrorResource(false, 'Terjadi kesalahan pada server', 500);
        }
    }
}
