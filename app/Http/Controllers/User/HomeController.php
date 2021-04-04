<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Model\Attendance;

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
        $id = Auth::user()->id;
        $attendance = intval($request->input('attendance'));
        $allergie = $request->input('allergie');
        $important_point = $request->input('information');
        $message = $request->input('message');

        // TDOO:DB登録処理実装
        $registerMessage = false;

        try {
            Attendance::insert(["id" => $id, "attendance" => $attendance, "allergies" => $allergie, "important_point" => $important_point, "message" => $message]);
            $registerMessage = true;
        } catch(Exeption $e) {
            // エラー処理
        }

        return view('user.home')->with([
            'registerMessage' => $registerMessage,
        ]);
    }
}
