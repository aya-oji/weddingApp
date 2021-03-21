<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('user');
    }

    // 新規登録画面
    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    // バリデーション
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'sei'     => ['required', 'string', 'max:255'],
            'mei'     => ['required', 'string', 'max:255'],
            'sei_kana'     => ['required', 'string', 'max:255'],
            'mei_kana'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'max:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // 登録処理
    protected function create(array $data)
    {
        $param = [
            'sei' => $data['sei'],
            'mei' => $data['mei'],
            'sei_kana' => $data['sei_kana'],
            'mei_kana' => $data['mei_kana'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'updated_at' => date("Y/m/d H:i:s"),
        ];

        // TODO
        // 初回登録時のみcreated_atを登録する処理
        return User::create($params);
    }
}