<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $userId = Auth::id();
        $currentDate = Carbon::now()->toDateString();
        $workedhrs = Attendance::select('in_time')->where('employee_id', $userId)->where('date', $currentDate)->get();
        $loggedInTime = Carbon::parse($workedhrs[0]->in_time);
        $currentTime = Carbon::now();
        $timeWorked = $loggedInTime->diff($currentTime)->format('%h hours %i minutes');
        $totalHoursInDay = 7;
        $percentageWorked = round(($loggedInTime->diffInHours($currentTime) / $totalHoursInDay) * 100);
        $currentMonth = Carbon::now()->startOfMonth();
        $nextMonth = Carbon::now()->endOfMonth();

        $attendanceReport = Attendance::select('in_time','out_time','date')->whereBetween('date', [$currentMonth, $nextMonth])->where('employee_id',$userId)->get();
        return view('admin.dashboard.index', compact('timeWorked', 'percentageWorked', 'attendanceReport'));
    }

    public function AdminLogout(Request $request)
    {

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    public function PunchOut(Request $request)
    {
        $userId = Auth::id();
        $currentDate = Carbon::now()->toDateString();
        $workedhrs = Attendance::select('id', 'out_time')->where('employee_id', $userId)->where('date', $currentDate)->get();
        $currentTime = Carbon::now()->format('H:i:s');
        if (!$workedhrs[0]->out_time) {
            $workedhrs[0]->update([
                'out_time' => $currentTime,
                'updated_at' => now(),
                'logout_lgn' => $request->longitude,
                'logout_lat' => $request->latitude,
                'logout_accuracy' => $request->accuracy,
            ]);
        }

        return redirect(route('admin.logout'));
    }

    public function AdminLogin()
    {
        return view('admin.login');
    }
}
