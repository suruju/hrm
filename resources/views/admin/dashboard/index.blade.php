@extends('admin.admin_dashboard')
@section('content')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i
                            data-feather="calendar" class="text-primary"></i></span>
                    <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date"
                        data-input>
                </div>
                <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                </button>
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Download Report
                </button>
            </div>
        </div>

        {{-- <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Timesheet</h6>
                            </div>
                            <div class="row">

                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">3,897</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>+3.3%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Statistics</h6>
                                <div class="dropdown mb-2">
                                    <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px"
                                            data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="eye"
                                                class="icon-sm me-2"></i> <span
                                                class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="edit-2"
                                                class="icon-sm me-2"></i> <span
                                                class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="trash"
                                                class="icon-sm me-2"></i> <span
                                                class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="printer"
                                                class="icon-sm me-2"></i> <span
                                                class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="download"
                                                class="icon-sm me-2"></i> <span
                                                class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">35,084</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-danger">
                                            <span>-2.8%</span>
                                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Today Activity</h6>
                                <div class="dropdown mb-2">
                                    <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px"
                                            data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="eye"
                                                class="icon-sm me-2"></i> <span
                                                class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="edit-2"
                                                class="icon-sm me-2"></i> <span
                                                class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="trash"
                                                class="icon-sm me-2"></i> <span
                                                class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="printer"
                                                class="icon-sm me-2"></i> <span
                                                class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="javascript:;"><i data-feather="download"
                                                class="icon-sm me-2"></i> <span
                                                class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">89.87%</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>+2.8%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row --> --}}

        {{-- <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Revenue</h6>
                        <div class="dropdown">
                            <a type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="eye" class="icon-sm me-2"></i> <span
                                        class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                        class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                        class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="printer" class="icon-sm me-2"></i> <span
                                        class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="download" class="icon-sm me-2"></i> <span
                                        class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start">
                        <div class="col-md-7">
                            <p class="text-muted tx-13 mb-3 mb-md-0">Revenue is the income that a business
                                has from its normal business activities, usually from the sale of goods and
                                services to customers.</p>
                        </div>
                        <div class="col-md-5 d-flex justify-content-md-end">
                            <div class="btn-group mb-3 mb-md-0" role="group"
                                aria-label="Basic example">
                                <button type="button" class="btn btn-outline-primary">Today</button>
                                <button type="button"
                                    class="btn btn-outline-primary d-none d-md-block">Week</button>
                                <button type="button" class="btn btn-primary">Month</button>
                                <button type="button" class="btn btn-outline-primary">Year</button>
                            </div>
                        </div>
                    </div>
                    <div id="revenueChart"></div>
                </div>
            </div>
        </div>
    </div> <!-- row --> --}}

        <div class="row">
            {{-- <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Monthly sales</h6>
                        <div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="eye" class="icon-sm me-2"></i> <span
                                        class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="edit-2" class="icon-sm me-2"></i> <span
                                        class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="trash" class="icon-sm me-2"></i> <span
                                        class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="printer" class="icon-sm me-2"></i> <span
                                        class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                        data-feather="download" class="icon-sm me-2"></i> <span
                                        class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted">Sales are activities related to selling or the number of goods or
                        services sold in a given time period.</p>
                    <div id="monthlySalesChart"></div>
                </div>
            </div>
        </div> --}}
            <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <form action="{{ route('punchout') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Timesheet</h6>
                            </div>
                            <div id="map"></div>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <input type="hidden" name="accuracy" id="accuracy">
                            <div id="storageChart"></div>
                            <div class="row mb-3">
                                <div class="col-6 d-flex justify-content-end">
                                    <div>
                                        <label
                                            class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total
                                            Work Hour <span class="p-1 ms-1 rounded-circle bg-success"></span></label>
                                        <h5 class="fw-bolder mb-0 text-end">7Hrs</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span
                                                class="p-1 me-1 rounded-circle bg-warning"></span> Worked Hour</label>
                                        <h5 class="fw-bolder mb-0">{{ $timeWorked }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">Punch Out</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Statistics</h6>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 90px;"></th>
                                        <th style="width: 173px;">Progress Bar</th>
                                        <th style="width: 75px;">Compare</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-muted tx-12">Today</p>
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                    role="progressbar" style="width: {{ $percentageWorked }}%"
                                                    aria-valuenow="{{ $percentageWorked }}" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-muted tx-12">{{ round((int) $timeWorked) }} / 7 hrs</p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-muted tx-12">This Week</p>
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                                    role="progressbar" style="width: 75%" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-muted tx-12">16 / 42 hrs</p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-muted tx-12">This Month</p>
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                                    role="progressbar" style="width: 90%" aria-valuenow="90"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-muted tx-12">125 / 175 hrs</p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-muted tx-12">Remaining</p>
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                    role="progressbar" style="width: 50%" aria-valuenow="50"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-muted tx-12"></p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-muted tx-12">Leave Taken</p>
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                                    role="progressbar" style="width: 100%" aria-valuenow="100"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-muted tx-12">2 / 2 days</p>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- row -->

        <div class="row">
            {{-- <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Inbox</h6>
                            <div class="dropdown mb-2">
                                <a type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span
                                            class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="trash" class="icon-sm me-2"></i> <span
                                            class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="printer" class="icon-sm me-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="download" class="icon-sm me-2"></i> <span
                                            class="">Download</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                                <div class="me-3">
                                    <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35"
                                        alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="text-body mb-2">Leonardo Payne</h6>
                                        <p class="text-muted tx-12">12.30 PM</p>
                                    </div>
                                    <p class="text-muted tx-13">Hey! there I'm available...</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                                <div class="me-3">
                                    <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35"
                                        alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="text-body mb-2">Carl Henson</h6>
                                        <p class="text-muted tx-12">02.14 AM</p>
                                    </div>
                                    <p class="text-muted tx-13">I've finished it! See you so..</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                                <div class="me-3">
                                    <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35"
                                        alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="text-body mb-2">Jensen Combs</h6>
                                        <p class="text-muted tx-12">08.22 PM</p>
                                    </div>
                                    <p class="text-muted tx-13">This template is awesome!</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                                <div class="me-3">
                                    <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35"
                                        alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="text-body mb-2">Amiah Burton</h6>
                                        <p class="text-muted tx-12">05.49 AM</p>
                                    </div>
                                    <p class="text-muted tx-13">Nice to meet you</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                                <div class="me-3">
                                    <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35"
                                        alt="user">
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="text-body mb-2">Yaretzi Mayo</h6>
                                        <p class="text-muted tx-12">01.19 AM</p>
                                    </div>
                                    <p class="text-muted tx-13">Hey! there I'm available...</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Attendance Report</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Date</th>
                                        <th class="pt-0">Punch In</th>
                                        <th class="pt-0">Punch Out</th>
                                        <th class="pt-0">Remark</th>
                                        <th class="pt-0">Work Hours</th>
                                        <th class="pt-0">Early Left</th>
                                        <th class="pt-0">Overtime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendanceReport as $attendance)
                                        <tr>
                                            @php
                                                $inTime = \Carbon\Carbon::parse($attendance->in_time);
                                                $outTime = \Carbon\Carbon::parse($attendance->out_time);
                                                $duration = $outTime->diff($inTime)->format('%h hours %i minutes');
                                                $remark = $inTime->gt(\Carbon\Carbon::parse('10:05:00')) ? '<span class="badge bg-danger">Late</span>' : '<span class="badge bg-success">On Time</span>';
                                            @endphp
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('M j, Y, l') }}</td>
                                            <td>{{ $attendance->in_time }}</td>
                                            <td>{{ $attendance->out_time }}</td>
                                            <td>{!! $remark !!}</td>
                                            <td>{{ $duration }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="checkCheckedDisabled" disabled checked>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="checkCheckedDisabled" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->

    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 0;
            height: 1px;
            overflow: hidden;
            visibility: hidden;
        }
    </style>
@endsection
@section('script')
    <script src="{{ asset('assets/js/dashboard-dark.js') }}"></script>
    <script>
        $(document).ready(function() {

            // New Worked Hours Status
            workStat([{!! json_encode($percentageWorked) !!}]);
            // New Worked Hours Status - END
        })
    </script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Initialize Leaflet map
        var map = L.map('map').setView([0, 0], 2); // Default center and zoom level

        // Add a tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Get user's location
        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var accuracy = position.coords.accuracy

                    // Update hidden form fields
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;
                    document.getElementById('accuracy').value = accuracy;
                }, function(error) {
                    console.error('Error getting user location:', error);
                });
            } else {
                console.error('Geolocation is not supported by this browser.');
            }
        }

        // Call getUserLocation() when the page loads
        getUserLocation();
    </script>
@endsection
