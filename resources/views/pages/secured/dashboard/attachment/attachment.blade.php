<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }} | Attachment</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/basic_info.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/10856/10856864.png" type="image/x-icon" />


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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} 
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }} 
                        </div>
                    @endif

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Attachment</h1>
                        <a href="{{ route('secured.attachment.save') }}" class="btn btn-primary d-flex align-items-center justify-content-center"> <i class="fa-solid fa-circle-plus"></i> &nbsp;Add Attachment</a>
                       
                    </div>

                    <div class="container-fluid" style="padding: 20px;">
                        <div class="row" style="height:auto;">
                            
                                    
                            <!-- First Card -->
                            @if(count($attachment_data) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Total Attachments</th>
                                        <th scope="col">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($attachment_data as $key => $data)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>{{ $data['name'] }}</td>
                                            <td>{{ $data['attachment_count'] }}</td>
                                            <td>
                                                <div >
                                                    <a href="{{ route('secured.attachment.edit', ['id' => $data['id']]) }}" style="margin-right:5px;" class="btn btn-success">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('secured.attachment.reset', ['id' => $data['id']]) }}" onclick="confirmDelete(event)" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                        Reset Attachments
                                                    </a>   
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div style="display: flex; justify-content: center; align-items: center; height: 500px; background-color: #f8f9fa; text-align: center; padding: 20px; width:100%; ">
                                    <div>
                                        <h1 style="color: #dc3545; font-family: 'Arial', sans-serif; font-weight: bold;">
                                            No Data Available
                                        </h1>
                                        <p style="font-size: 1.2rem; color: #6c757d;">
                                            You can add from the button above.
                                        </p>
                                    </div>
                                </div>
                            @endif



                            
                        </div>
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

<script>
    function confirmDelete(event) {
        var cnf = confirm('Are you sure you want to Reset all attachment(s) for this user?');

        if (!cnf) {
            event.preventDefault();  // Prevent the link from being followed
            return false;
        }

        // If confirmed, the link will be followed, no need for additional code
    }
</script>
</html>