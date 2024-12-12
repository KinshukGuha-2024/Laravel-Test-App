<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }} | Basic Information</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Basic Information</h1>
                        <a href="{{ route('secured.basic.info.save') }}" class="btn btn-primary "> Create One</a>
                       
                    </div>

                    <div class="container-fluid" style="padding: 20px;">
                        <div class="row" style="height:auto;">
                            <!-- First Card -->
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                <div class="card" style="width: auto;">
                                    <img class="card-img-top" src="https://xsgames.co/randomusers/assets/avatars/male/74.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Kinshuk Guha (Web Developer)</b></h5>
                                        
                                        <ul style="padding-left:20px">
                                            <li style="color: green; "><strong>Active</strong></li>
                                            <!-- <li style="color: #f74620; "><strong>Inactive</strong></li> -->
                                        </ul>
                                        <p>+123 456 7890 | kinshukguha@example.com </p>
                                        <p>India | West Bengal | Kolkata - 700084</p>
                                        <a href="{{ route('secured.basic.info.edit') }}" class="btn btn-success w-100"><b>Edit</b></a>
                                    </div>
                                </div>
                            </div>

                            <!-- <div style="display: flex; justify-content: center; align-items: center; height: 500px; background-color: #f8f9fa; text-align: center; padding: 20px; width:100%; ">
                                <div>
                                    <h1 style="color: #dc3545; font-family: 'Arial', sans-serif; font-weight: bold;">
                                        No Data Available
                                    </h1>
                                    <p style="font-size: 1.2rem; color: #6c757d;">
                                        You can create one from the button above.
                                    </p>
                                </div>
                            </div> -->



                            
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

</html>