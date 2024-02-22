<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class AttendanceController extends Controller
{
    public function AttendanceList()
    {
        // return $request->ip();
        //return Location::get('27.34.77.19');
        $currentDate = Carbon::now()->toDateString();
        // $data = User::with('getAttendance')->where('getAttendance.date', $currentDate)->get();
        $dataJson = Attendance::with('getUser')->where('date', $currentDate)->orderBy('in_time','asc')->get();
        $datas = json_decode($dataJson, true);
        // return $datas;
        return view('attendance.attendance_list',compact('datas'));

    }

    // public function AttendanceCheck($id){
    //     $currentDate = Carbon::now()->toDateString();
    //     $result = Attendance::select('in_time')->where('in_time', $currentDate)->where($id,'employee_id')->first();
    //     return $result;
    // }
}
