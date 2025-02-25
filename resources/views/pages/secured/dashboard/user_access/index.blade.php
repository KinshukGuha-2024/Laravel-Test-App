<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #map { height: 500px; width: 100%; }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <title>{{ config('app.name') }} | All Mails</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/10856/10856864.png" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('component.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('component.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Users</h1>
                    </div>

                    <div class="all-mails">
                        <!-- Unread Mails -->
                        @if(count($unread_users) > 0)
                            <label style="color: #b35e49; font-weight: bold;" for="">Recent Visits</label>
                            <div style="height: auto; overflow: auto; padding-bottom:50px;">
                                <table class="table" style="overflow: hidden; width: 100%; ">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Device Information</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Time Zone</th>
                                            <th scope="col">Visited</th>
                                            <th scope="col">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($unread_users as $key => $user)
                                            <tr>
                                                <th scope="row">{{$key + 1 }}</th>
                                                <td style="font-weight: bold;">{{ $user->device_type . ' ,' . $user->browser . ' ,' . $user->os}}</td>
                                                <td style="font-weight: bold; color:#4976b3;">{{ $user->city . ' ,' . $user->state . ' - ' . $user->zipcode . ' ,' . $user->country}}</td>
                                                <td style="font-weight: bold; color:#b38649; ">{{ $user->timezone }}</td>
                                                <td style="font-weight: bold; color:#7ab96b; ">{{ $user->time_ago != 'now' ? $user->time_ago. " ago" : $user->time_ago }}</td>
                                                <td>
                                                    <img onclick="viewUser(('{{ $user }}'))" style="width: 25px;height: 25px; cursor:pointer;" title="View User" src="{{ asset('storage/images/assets/icons/eye.png') }}" alt="">
                                                    <img style="width: 25px;height: 25px; cursor:pointer;margin-left:6px;" title="Mark As Read" src="{{ asset('storage/images/assets/icons/check.png') }}">
                                                </td>        
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>
                        @endif

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('component.footer')

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            initMap();
        });
        initMap();

        function viewUser(user) {
            

            // Show the modal
            $('#userInfoModal').modal('show');
        }

        function markAsRead(id ,from = null) {
            data = new FormData();
            data.append('id', id);
            data.append('type', 'new_mail');
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            data.append('csrf-token', csrfToken); // Append CSRF token
            const baseUrl = "<?php echo env('APP_URL'); ?>";
            $.ajax({
                url: baseUrl + '/secured/notification-readed', 
                type: 'POST', 
                processData: false, 
                contentType: false,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Ensure CSRF is sent in headers
                },
                dataType: 'json', 
                success: function(response) {
                    if(response.success && from != 'view')
                    {
                        window.location.reload();
                    }
                    console.log('Success:', response); 
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); 
                }
            });
        }
    </script>
    <script>
        var lat = 40.7128;  // Change this to your latitude
        var lng = -74.0060; // Change this to your longitude

        async function initMap() {
            // Request needed libraries.
            const { Map } = await google.maps.importLibrary("maps");
            const myLatlng = { lat: lat, lng: lng };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: myLatlng,
            });
            // Create the initial InfoWindow.
            let infoWindow = new google.maps.InfoWindow({
                content: "Click the map to get Lat/Lng!",
                position: myLatlng,
            });

            infoWindow.open(map);
            // Configure the click listener.
            map.addListener("click", (mapsMouseEvent) => {
                // Close the current InfoWindow.
                infoWindow.close();
                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({
                position: mapsMouseEvent.latLng,
                });
                infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2),
                );
                infoWindow.open(map);
            });
        }
    </script>

</body>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

</html>