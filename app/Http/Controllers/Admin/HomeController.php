<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Attendance;

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
}
