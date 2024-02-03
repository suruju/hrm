@extends('admin.admin_dashboard')
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Department</h4>
                        <form id="validateForm" method="post" action="{{ route('update.department') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Department Name</label>
                                <input type="hidden" name="department_id" value="{{$data->id}}">
                                <input id="name" class="form-control" name="name" type="text"
                                    value="{{ $data->name }}">

                            </div>
                            <div class="mb-3">
                                <label for="companyname" class="form-label">Note</label>
                                <textarea id="maxlength-textarea" name="note" class="form-control" id="defaultconfig-4" maxlength="230"
                                    rows="8" placeholder="This textarea has a limit of 230 chars.">{{ $data->note }}</textarea>
                            </div>



                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" {{ $data->status == 'active'?'checked':'' }} name="status" id="active"
                                            value="active">
                                        <label class="form-check-label" for="active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" {{ $data->status == 'inactive'?'checked':'' }} name="status" id="inactive"
                                            value="inactive">
                                        <label class="form-check-label" for="inactive">
                                            Inactive
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {


            $('#validateForm').validate({
                rules: {
                    name: {
                        required: true,
                    }


                },
                messages: {
                    name: {
                        required: 'Please Enter Department Name',
                    }


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        })
    </script>
@endsection
