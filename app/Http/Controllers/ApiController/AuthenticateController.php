<?php

namespace App\Http\Controllers\ApiController;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\ApiController\BaseController;

class AuthenticateController extends Controller
{
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Format email tidak valid.',
                'password.required' => 'Password harus diisi.',
            ]
        );

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return BaseController::jsonResponseSuccessError(false, 'Email atau Password salah');
        }

        return response()->json([
            'status' => true,
            'message' => 'Berhasil login!',
            'token' => $user->createToken('user login')->plainTextToken
        ]);
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki setidaknya 5 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 255 karakter.'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        $user = User::create($validateData);

        return BaseController::jsonResponseSuccessError(true, 'Registrasi Berhasil', $user);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return BaseController::jsonResponseSuccessError(true, 'Berhasil logout');
    }
}
