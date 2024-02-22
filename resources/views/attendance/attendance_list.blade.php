@extends('admin.admin_dashboard')
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Staff at Office</h6>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['get_user']['name'] }}</td>
                                            <td>{{ $data['get_user']['department'] }}</td>
                                            <td>{{ $data['in_time'] }}</td>
                                            <td>{{ $data['out_time'] }}</td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                    onclick="showmap({{ $data['login_lat'] }},{{ $data['login_lgn'] }},{{ $data['login_accuracy'] }})"
                                                    class="btn btn-outline-warning btn-xs">View in Map</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Current / Logged In Location</h6>
                        <div id="map"></div>

                    </div>
                </div>
            </div>
        </div>

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
            width: 100%;
            height: 75vh;
        }
    </style>
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Map initialization
        function showmap(lat, lng, acc) {
            // var map = L.map('map').setView([lat, lng], 10);
            var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });
            osm.addTo(map);
            marker = L.marker([lat, lng])
            circle = L.circle([lat, lng], {
                radius: acc
            })

            var featureGroup = L.featureGroup([marker, circle]).addTo(map)

            map.fitBounds(featureGroup.getBounds())
            console.log("Your coordinate is: Lat: " + lat + " Long: " + lng + " Accuracy: " + acc)
        }


        var map = L.map('map').setView([27.7018, 85.3206], 10);

        //osm layer
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        osm.addTo(map);

        if (!navigator.geolocation) {
            console.log("Your browser doesn't support geolocation feature!")
        } else {

            navigator.geolocation.getCurrentPosition(getPosition)
        }

        var marker, circle;

        function getPosition(position) {
            // console.log(position)
            var lat = position.coords.latitude
            var long = position.coords.longitude
            var accuracy = position.coords.accuracy

            if (marker) {
                map.removeLayer(marker)
            }

            if (circle) {
                map.removeLayer(circle)
            }

            marker = L.marker([lat, long])
            circle = L.circle([lat, long], {
                radius: accuracy
            })

            var featureGroup = L.featureGroup([marker, circle]).addTo(map)

            map.fitBounds(featureGroup.getBounds())

            console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy)
        }
    </script>
@endsection
