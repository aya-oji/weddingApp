<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['id', 'attendance', 'allergies', 'important_point', 'message'];
    //リストを取得
    public function getAttendanceList()
    {
        $attendanceList = DB::table('attendances')
            ->join('users', 'attendances.id', '=', 'users.id')
            ->select('users.id', 'users.sei', 'users.mei', 'attendances.attendance')
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
