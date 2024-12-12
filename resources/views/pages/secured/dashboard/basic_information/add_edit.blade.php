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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

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
                        <h1 class="h3 mb-0 text-gray-800">Save Basic Information</h1>
                    </div>

                    <button class="back-btn" onclick="redirectBack();">
                        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                        <span>Back</span>
                    </button>
                    <div class="container-fluid" style="padding: 20px;">
                        <form class="form">
                            <p class="title">Add New User </p>
                            <div style="display: flex; flex: 3; justify-content: space-between; gap: 20px;">
                                <div style="flex: 1;">
                                    <label for="firstname" class="form-label">First Name <strong style="color: red;">*</strong></label>
                                    <input id="firstname" required type="text" class="form-control" >
                                </div>

                                <div style="flex: 1;">
                                    <label for="lastname" class="form-label">Last Name <strong style="color: red;">*</strong></label>
                                    <input id="lastname" required type="text" class="form-control" >
                                </div>

                                <div style="flex: 1;">
                                    <label for="lastname" class="form-label">Active State</label>
                                    <select name="active" class="form-control" id="active">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                                    
                            <div style="display: flex; flex: 2; justify-content: space-between; gap: 20px;">
                                <div style="flex: 1;">
                                    <label for="email" class="form-label">Email Address <strong style="color: red;">*</strong></label>
                                    <input id="email" required type="email" class="form-control" >
                                </div>

                                <div style="flex: 1;">
                                    <label for="mobile" class="form-label">Contact Number <strong style="color: red;">*</strong></label>
                                    <input id="mobile" required type="tel" class="form-control" >
                                </div>
                            </div>

                            <div style="display: flex; flex: 4; justify-content: space-between; gap: 20px;">
                                <div style="flex: 1;">
                                    <label for="county" class="form-label">Country <strong style="color: red;">*</strong></label>
                                    <input id="county" required type="text" class="form-control" >
                                </div>

                                <div style="flex: 1;">
                                    <label for="state" class="form-label">State <strong style="color: red;">*</strong></label>
                                    <input id="state" required type="text" class="form-control" >
                                </div>

                                <div style="flex: 1;">
                                    <label for="city" class="form-label">City <strong style="color: red;">*</strong></label>
                                    <input id="city" required type="text" class="form-control" >
                                </div>

                                <div style="flex: 1;">
                                    <label for="pincode" class="form-label">Postal Code <strong style="color: red;">*</strong></label>
                                    <input id="pincode" required type="num" class="form-control" >
                                </div>
                            </div>

                            <div style="display: flex; flex: 3; justify-content: space-between; gap: 20px;">

                                <div style="flex: 1;">
                                    <label for="pincode" class="form-label">Facebook ID</label>
                                    <input id="instagaram"  type="text" class="form-control" >
                                </div>

                                <div style="flex: 1;">
                                    <label for="pincode" class="form-label">Linked-In ID</label>
                                    <input id="instagaram"  type="text" class="form-control" >
                                </div>

                                <div style="flex: 1;">
                                    <label for="pincode" class="form-label">Github ID</label>
                                    <input id="instagaram"  type="text" class="form-control" >
                                </div>

                                
                            </div>
                            <div style="display: flex; flex: 2; justify-content: left; gap: 20px;">
                                    <label class="custum-file-upload" for="file">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
                                        </div>
                                        <div class="text">
                                            <span>Click to upload image <strong style="color: red;">*</strong></span>
                                        </div>
                                        <input type="file" id="file">
                                    </label>
                                    <img style="height:200px;width:200px;" src="https://xsgames.co/randomusers/assets/avatars/male/74.jpg" >

                            </div>


                            <br>
                            <div style="display: flex; justify-content: flex-end; align-items:center;">
                                <button class="submit">Submit</button>
                            </div>
                        </form>
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
    function redirectBack() {
        window.location.href="{{ route('secured.basic.info.get') }}";
    }
</script>

</html>