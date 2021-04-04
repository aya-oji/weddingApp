<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attendance extends Model
{
    protected $fillable = ['id', 'attendance', 'allergies', 'important_point', 'message'];
    //リストを取得
    public function getAttendanceList()
    {
        $attendanceList = DB::table('attendances')
            ->join('users', 'attendances.id', '=', 'users.id')
            ->select('users.id', 'users.sei', 'users.mei', 'users.sei_kana', 'users.mei_kana', 'users.email', 'users.phone_number', 'attendances.attendance', 'attendances.allergies', 'attendances.important_point', 'attendances.message')
            ->get();

        return $attendanceList;
    }

    // 詳細を取得
    public function getAttendanceDetail($id)
    {
        $attendanceDetail = DB::table('attendances')
            ->join('users', 'attendances.id', '=', 'users.id')
            ->where('users.id', $id)
            ->get();

        return $attendanceDetail[0];
    }
}
