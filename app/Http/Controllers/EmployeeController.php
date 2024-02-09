<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function EmployeeList()
    {
        $data = User::select('name', 'avatar', 'role_as','designation', 'contactnumber', 'status', 'id')->orderBy('name', 'asc')->get();
        return view('employee.all_employee', compact('data'));
    }

    public function AddEmployee()
    {
        // $roles = Role::select('id', 'name')->orderBy('name', 'asc')->get();
        $departments = Department::select('name')->orderBy('name', 'asc')->get();
        return view('employee.add_employee', compact('departments'));
    }

    public function StoreEmployee(Request $request)
    {
        // return $request;
        $filename = '';

        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile_images'), $filename);
        }
        $data = User::insert([
            'name' => $request->name,
            'address' => $request->address,
            'contactnumber' => $request->phone,
            'designation' => $request->designation,
            'department' => $request->department,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'more_info' => $request->description,
            'avatar' => $filename,
        ]);

        // if ($request->role) {
        //     $data->assignRole($request->role);
        // }

        $notification = array(
            "message" => "Employee Added Successfully",
            "alert_type" => "success",
        );
        return redirect()->route('employee.list')->with($notification);
    }

    public function EditEmployee($id)
    {
        $data = User::find($id);
        // $roles = Role::select('id', 'name')->orderBy('name', 'asc')->get();
        $departments = department::select('name')->orderBy('name', 'asc')->get();
        return view('employee.edit_employee', compact(['data', 'departments']));
    }

    public function UpdateEmployee(Request $request)
    {
        // return $request;
        $data = User::find($request->employee_id);

        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile_images'), $filename);
            @unlink(public_path('uploads/profile_images/' . $data->avatar));
            $data->avatar = $filename;
        }
        if ($data) {
            $data->name = $request->name;
            $data->username = $request->username;
            $data->address = $request->address;
            $data->email = $request->email;
            $data->designation = $request->designation;
            $data->department = $request->department;
            $data->more_info = $request->description;
            $data->contactnumber = $request->phone;

            $result = $data->save();

            // if ($request->role) {
            //     $data->roles()->detach();
            //     $data->assignRole($request->role);
            // }
            if ($result) {
                $notification = array(
                    "message" => "Employee Record Updated Successfully",
                    "alert_type" => "success",
                );
                return redirect()->route('employee.list')->with($notification);
            }
        } else {
            $notification = array(
                "message" => "Employee Record Update Failed",
                "alert_type" => "danger",
            );
            return redirect()->back()->with($notification);
        }
    }

    public function DeleteEmployee($id)
    {
        $data = User::findOrFail($id)->delete();
        @unlink(public_path('uploads/profile_images/' . $data->avatar));
        $notification = array(
            "message" => "Employee Deleted Successfully",
            "alert_type" => "success",
        );

        return redirect()->back()->with($notification);
    }

    public function EmployeeStatus($id)
    {
        $data = User::findOrFail($id);
        $data->status = $data->status === 'active' ? 'inactive' : 'active';
        $data->save();
        $notification = array(
            "message" => "Employee Status Updated",
            "alert_type" => "success",
        );
        return redirect()->back()->with($notification);
    }
}
