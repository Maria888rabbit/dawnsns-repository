<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:4', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:128' 'confirmed'],
        ], [
            'name.min' => 'ユーザー名は4文字以上12文字以内で入力してください。',
            'password.confirmed' => 'パスワードと確認の入力が一致しません。',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

public function rules(): array
{
    return [
        'password' => [
            'required',
            'string',
            'min:8',
            'max:128',
        ],
        'password_confirmation' => [
            'required',
            'same:password',
        ],
    ];
}

public function messages(): array
{
    return [
        'password.required' => 'パスワードを入力してください。',
        'password.min' => 'パスワードは8文字以上128文字以内で入力してください。',
        'password.max' => 'パスワードは8文字以上128文字以内で入力してください。',
        'password.regex' => 'パスワードには半角英数記号を入力してください。',

        'password_confirmation.required' => '確認用のパスワードを入力してください。',
        'password_confirmation.same' => 'パスワードと確認の入力が一致しません。',
    ];
}
