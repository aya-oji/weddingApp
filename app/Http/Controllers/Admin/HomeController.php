<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Attendance;
use App\Http\Entity\PutCsv;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $attendance = new Attendance;
        $attendanceList = $attendance->getAttendanceList();

        return view('admin.home', [
            'attendanceList' => $attendanceList
        ]);
    }

    public function detail($id)
    {
        $attendance = new Attendance;
        $attendanceDetail = $attendance->getAttendanceDetail($id);

        return view('admin.detail', [
            'attendanceDetail' => $attendanceDetail
        ]);
    }

    public function putCsv()
    {
        //一覧画面に処理を埋め込んだらログイン後の画面遷移の挙動がおかしくなったので処理切り分け
        $attendance = new Attendance;
        $attendanceList = $attendance->getAttendanceList();

        $putCsv = new PutCsv;
        $putCsv->putCsv($attendanceList);

        return redirect()->route('admin.home');
    }
}
