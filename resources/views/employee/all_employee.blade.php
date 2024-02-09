@extends('admin.admin_dashboard')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('add.employee') }}" class="btn btn-inverse-info">Add Employee</a>
            </li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Employees</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Designation</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $employee)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img class="wd-60 rounded-circle"
                                                src="{{ !empty($employee->avatar) ? url('uploads/profile_images/' . $employee->avatar) : url('uploads/no_image.jpg') }}"
                                                alt="{{ $employee->name }}">
                                        </td>
                                        <td><a href="{{ route('edit.employee', $employee->id) }}">{{ $employee->name }}</a>
                                        </td>
                                        <td><span class="badge border border-warning text-warning">{{ $employee->role_as }}</span></td>
                                        <td>{{$employee->designation}}</td>
                                        <td>{{$employee->contactnumber}}</td>
                                        <td>
                                            <div class="form-check form-switch mb-2">
                                                <input rel="{{ route('status.employee', $employee->id) }}" type="checkbox"
                                                    class="form-check-input statuschange"
                                                    {{ $employee->status === 'active' ? 'checked' : '' }}
                                                    id="{{ $employee->id }}">

                                            </div>

                                        </td>
                                        <td>
                                            <a href="{{ route('edit.employee', $employee->id) }}"
                                                class="btn btn-secondary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i data-feather="edit-3"></i>
                                            </a>
                                            <a href="{{ route('delete.employee', $employee->id) }}"
                                                class="btn btn-danger btn-icon listdelete" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i data-feather="trash-2"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
