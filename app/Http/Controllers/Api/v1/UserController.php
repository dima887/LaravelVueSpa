<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->all());
        Auth::login($user);
    }

    /**
     * @throws ValidationException
     */
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials, true)) {
            return Auth::user();
        }
        throw ValidationException::withMessages([
            'error' => ['Логин и пароль не совпадает']
        ]);
    }

    public function logout(Request $request)
    {
        return Auth::logout();
    }
    public function isAuth()
    {
        return 15;
    }
}
