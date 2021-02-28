<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        //sessionのIDを元に、登録されている場合はデータを取得してbladeに表示
        return view('user.home');
    }

    public function register(Request $request)
    {
        // バリデーションを定義
        // TODO: 最大文字数の定義
        $request->validate([
            'attendance' => 'required',
            'allergie' => 'max:100',
            'information' => 'max:1000',
            'message' => 'max:1000',
        ]);

        // 入力値の受け取り
        $attendance = $request->input('attendance');
        $allergie = $request->input('allergie');
        $information = $request->input('information');
        $message = $request->input('message');

        // TDOO:DB登録処理実装
        $registerMessage = 1;

        return view('user.home')->with([
            'registerMessage' => $registerMessage,
        ]);
    }
}
