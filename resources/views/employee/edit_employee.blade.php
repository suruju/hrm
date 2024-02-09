@extends('admin.admin_dashboard')
@section('content')
    <div class="page-content">

        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card rounded">
                            <div class="card-body">

                                <h6 class="card-title">Edit Employee</h6>

                                <form id="validateForm" class="forms-sample" method="POST"
                                    action="{{ route('update.employee') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <input type="hidden" name="employee_id" value="{{ $data->id }}">
                                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                                        <div class="form-group col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $data->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ $data->address }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="form-group col-sm-9">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ $data->contactnumber }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="form-group col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email"
                                                autocomplete="off" value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" rows="8">{{ $data->more_info }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Designation</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="designation" name="designation"
                                                value="{{ $data->designation }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Department</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single form-select" name="department"
                                                data-width="100%">
                                                @foreach ($departments as $department)
                                                <option {{ $data->department === $department->name ? 'selected' : '' }} value="{{$department->name}}">{{$department->name}}
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Role</label>
                                        <div class="col-sm-9">

                                            <select class="js-example-basic-single form-select" name="role"
                                                data-width="100%">
                                                {{-- @foreach ($roles as $role)
                                                <option {{ $data->role_as === $role->name ? 'selected' : '' }} value="{{$role->name}}">{{$role->name}}
                                                </option>
                                                @endforeach --}}

                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="formFile">Photo</label>
                                        <input class="form-control" name="avatar" type="file" id="image">
                                    </div>
                                    <div class="form-check mb-3">
                                        <img id="showImage" class="wd-80 rounded-circle"
                                            src="{{ !empty($data->avatar) ? url('uploads/profile_images/' . $data->avatar) : url('uploads/no_image.jpg') }}"
                                            alt="">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <input type="checkbox" {{ $data->login_access == '1' ? 'checked' : '' }}
                                            id="allow_login" value="1" name="allow_login" class="form-check-input"
                                            id="allow_login">
                                        <label class="form-check-label" for="allow_login">Allow Member Login</label>

                                    </div> --}}
                                    <div id="loginBox" class="hidden-block">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ $data->username }}">
                                        </div>
                                    </div>



                                    <button type="submit" class="btn btn-primary me-2">Save</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            //Image Upload Display
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);

                }
                reader.readAsDataURL(e.target.files['0']);
            });
            //End Image Section



            //Form Validation

            $('#validateForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },


                },
                messages: {
                    name: {
                        required: 'Please Enter Employee Name',
                    },
                    email: {
                        required: 'Please Enter Email Address',
                    },
                    phone: {
                        required: 'Please Enter Contact Number',
                    },


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
            //End Form Validation

            $('#allow_login').on('change', function() {
                if ($('#allow_login').is(':checked')) {
                    $('#loginBox').removeClass('hidden-block');
                } else {
                    $('#loginBox').addClass('hidden-block');
                }
            });

            if ($('#allow_login').is(':checked')) {
                $('#loginBox').removeClass('hidden-block');
            };


        })
    </script>
@endsection
@section('styles')
    <style>
        .hidden-block {
            display: none;
        }
    </style>
@endsection
