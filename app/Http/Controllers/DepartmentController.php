<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Catch_;

class DepartmentController extends Controller
{
    public function AllDepartment() {
        $departments = Department::select('id','name','status')->orderBy('name','asc')->get();
        return view('department.all_department',compact('departments'));

    }

    public function AddDepartment(){
        return view('department.add_department');
    }

    public function StoreDepartment(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = department::insert([
            'name' => $request->name,
            'note' => $request->note,
            'status' => $request->status,
        ]);

        if ($data) {
            $notification = array(
                "message" => "Department Added Successfully",
                "alert_type" => "success",
            );
            return redirect()->route('department.list')->with($notification);
        } else {
            $notification = array(
                "message" => "Adding Department Failed",
                "alert_type" => "danger",
            );
            return redirect()->back()->with($notification);
        }
    }

    public function EditDepartment($id){
        try{
            $data = Department::findOrFail($id);
            return view('department.edit_department',compact('data'));

        }catch(\Exception $exception){
            Log::error('An exception occurred: ' . $exception->getMessage());
            return $exception->getMessage();
        }
    }

    public function UpdateDepartment(Request $request)
    {
        $id = $request->department_id;
        $data = department::findOrFail($id);
        $data->name = $request->name;
        $data->note = $request->note;
        $data->status = $request->status;
        $result = $data->save();
        if ($result) {
            $notification = array(
                "message" => "Department Updated Successfully",
                "alert_type" => "success",
            );
            return redirect()->route('department.list')->with($notification);
        } else {
            $notification = array(
                "message" => "Department Update Failed",
                "alert_type" => "success",
            );
            return redirect()->back()->with($notification);
        }
    }

    public function DeleteDepartment($id)
    {
        $data = department::findOrFail($id)->delete();
        $notification = array(
            "message" => "Department Deleted Successfully",
            "alert_type" => "success",
        );

        return redirect()->back()->with($notification);
    }

    public function StatusDepartment($id)
    {
        $data = department::findOrFail($id);
        $data->status = $data->status === 'active' ? 'inactive' : 'active';
        $data->save();
        $notification = array(
            "message" => "Department Status Updated",
            "alert_type" => "success",
        );
        return redirect()->back()->with($notification);
    }
}
