@extends('admin.admin_dashboard')
@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('add.department') }}" class="btn btn-inverse-info">Add
                    Department</a></li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Department</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $key => $department)
                                    <tr>
                                        <td>{{ $loop -> iteration }}</td>
                                        <td><a
                                                href="{{ route('edit.department', $department->id) }}">{{ $department->name }}</a>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch mb-2">
                                                <input rel="{{ route('status.department', $department->id) }}"
                                                    type="checkbox" class="form-check-input statuschange"
                                                    {{ $department->status === 'active' ? 'checked' : '' }}
                                                    id="{{ $department->id }}">

                                            </div>

                                        </td>
                                        <td>

                                            <a href="{{ route('edit.department', $department->id) }}"
                                                class="btn btn-secondary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i data-feather="edit-3"></i>
                                            </a>


                                            <a href="{{ route('delete.department', $department->id) }}"
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
