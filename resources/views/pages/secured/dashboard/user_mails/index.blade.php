<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                        <h1 class="h3 mb-0 text-gray-800">All Mails</h1>
                    </div>

                    <div class="all-mails">
                        <!-- Unread Mails -->
                        @if(count($unread_mails) > 0)
                            <label style="color: #b35e49; font-weight: bold;" for="">Unread Mails</label>
                            <div style="height: auto; overflow: auto; padding-bottom:50px;">
                                <table class="table" style="overflow: hidden; width: 100%; ">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Recieved</th>
                                            <th scope="col">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($unread_mails as $mail)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td style="font-weight: bold;">{{ $mail->name }}</td>
                                                <td style="font-weight: bold; color:#4976b3;">{{ $mail->email }}</td>
                                                <td style="font-weight: bold; color:#7ab96b; ">{{ $mail->time_ago != 'now' ? $mail->time_ago. " ago" : $mail->time_ago }}</td>
                                                <td>
                                                    <img onclick="viewFullMail('{{ addslashes($mail->name) }}', '{{ addslashes($mail->email) }}', '{{ addslashes($mail->time_ago) }}', '{{ addslashes($mail->subject) }}', '{{ addslashes($mail->message) }}', '{{ addslashes($mail->id) }}')" style="width: 25px;height: 25px; cursor:pointer;" title="View Mail" src="{{ asset('storage/images/assets/icons/eye.png') }}" alt="">
                                                    <img onclick="markAsRead('{{ $mail->id }}')" style="width: 25px;height: 25px; cursor:pointer;margin-left:6px;" title="Mark As Read" src="{{ asset('storage/images/assets/icons/check.png') }}">
                                                </td>        
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>
                        @endif

                        <!-- Already Read Mails -->
                        @if(count($all_mails) > 0)
                            <label style="color: #49b34c; font-weight: bold;" for="">Already Readed Mails</label>
                            <div style="height: auto; overflow: auto;">
                                <table class="table" style="overflow: hidden; width: 100%;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Recieved</th>
                                            <th scope="col">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_mails as $mail)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td style="font-weight: bold;">{{ $mail->name }}</td>
                                                <td style="font-weight: bold; color:#4976b3;">{{ $mail->email }}</td>
                                                <td style="font-weight: bold; color:#7ab96b; ">{{ $mail->time_ago != 'now' ? $mail->time_ago. " ago" : $mail->time_ago }}</td>
                                                <td>
                                                    <img onclick="viewFullMail('{{ addslashes($mail->name) }}', '{{ addslashes($mail->email) }}', '{{ addslashes($mail->time_ago) }}', '{{ addslashes($mail->subject) }}', '{{ addslashes($mail->message) }}', '{{ addslashes($mail->id) }}')" style="width: 25px;height: 25px; cursor:pointer;" title="View Mail" src="{{ asset('storage/images/assets/icons/eye.png') }}" alt="">
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
        function viewFullMail(name, email, timeAgo, subject, message, id) {
            // Set modal title with sender's name
            document.getElementById('emailModalLabel').innerHTML = `Received From - ${name}`;

            // Set time ago label
            let formattedTime = timeAgo !== 'now' ? timeAgo + " ago" : timeAgo;
            document.getElementById('timeAgoLabel').innerText = formattedTime;

            // Set recipient email
            document.getElementById('recipient-email').innerText = email;

            // Set subject field
            document.getElementById('recipient-subject').value = subject;

            // Set message field
            document.getElementById('message-text').value = message;

            // Show the modal
            $('#emailModal').modal('show');
            markAsRead(id, 'view');
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