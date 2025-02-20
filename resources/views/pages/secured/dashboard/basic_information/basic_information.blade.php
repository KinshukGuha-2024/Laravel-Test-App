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
                        <h1 class="h3 mb-0 text-gray-800">Basic Information</h1>
                        <a href="{{ route('secured.basic.info.save') }}" class="btn btn-primary d-flex align-items-center justify-content-center"> <i class="fa-solid fa-circle-plus"></i> &nbsp;Create One</a>
                       
                    </div>

                    <div class="container-fluid" style="padding: 20px;">
                        <div class="row" style="height:auto;">
                            <!-- First Card -->
                             @if(count($user_data) > 0)
                                @foreach($user_data as $data)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-1">
                                    <div class="card" style="min-height: 630px;"> <!-- Set a fixed height here -->
                                        <div>
                                            <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/uploads/' . $data['image_path']) }}" alt="Card image cap">
                                        </div>
                                        <div class="card-body" style="height: calc(100% - 200px);">
                                            <h5 class="card-title"><b>{{ $data['name'] }} ({{ $data['role'] }})</b></h5>
                                            <ul style="padding-left:20px">
                                                @if($data['active'] == 'active')
                                                    <li style="color: green;"><strong>Active</strong></li>
                                                @else
                                                    <li style="color: #f74620;"><strong>Inactive</strong></li>
                                                @endif
                                            </ul>
                                            <p>+91 {{ $data['mobile'] }} | {{ $data['email'] }} </p>
                                            <p>{{ $data['country'] }} | {{ $data['state'] }} | {{ $data['city'] }} - {{ $data['pincode'] }}</p>
                                            <div style="display: flex; align-items:center; justify-content:center; width:100%; ">
                                                <ul class="wrapper">
                                                    @if($data['facebook_id'])
                                                        <li class="icon facebook">
                                                            <a href="{{ $data['facebook_id'] }}">

                                                                <span class="tooltip">Facebook</span>
                                                                <svg
                                                                viewBox="0 0 320 512"
                                                                height="1.2em"
                                                                fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                >
                                                                    <path
                                                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
                                                                    ></path>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @if( $data['github_id'] )
                                                        <li class="icon twitter">
                                                            <a target="_blank" href="{{ $data['github_id'] }}">
                                                                <span class="tooltip">GitHub</span>
                                                                <svg
                                                                    height="1.8em"
                                                                    fill="currentColor"
                                                                    viewBox="0 0 48 48"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="github"
                                                                >
                                                                    <path
                                                                        d="M24 0C10.744 0 0 10.744 0 24c0 10.661 6.944 19.698 16.55 22.947 1.213 0.224 1.655-0.528 1.655-1.179 0-0.585-0.021-2.136-0.033-4.198-6.073 1.322-7.363-2.946-7.363-2.946-0.991-2.514-2.423-3.19-2.423-3.19-1.975-1.347 0.15-1.318 0.15-1.318 2.187 0.154 3.327 2.247 3.327 2.247 1.943 3.32 5.103 2.365 6.337 1.807 0.196-1.404 0.761-2.366 1.383-2.91-4.75-0.515-9.738-2.373-9.738-10.561 0-2.338 0.836-4.259 2.209-5.75-0.221-0.514-0.954-2.594 0.209-5.387 0 0 1.795-0.57 5.874 2.19 1.707-0.474 3.542-0.709 5.351-0.709s3.644 0.235 5.351 0.709c4.079-2.76 5.874-2.19 5.874-2.19 1.163 2.793 0.43 4.873 0.209 5.387 1.373 1.491 2.209 3.412 2.209 5.75 0 8.202-4.996 10.042-9.746 10.552 0.777 0.677 1.462 2.017 1.462 4.052 0 2.91-0.021 5.268-0.021 5.978 0 0.654 0.444 1.404 1.673 1.174 9.606-3.249 16.55-12.286 16.55-22.947C48 10.744 37.256 0 24 0z"
                                                                    ></path>
                                                                </svg>
                                                            </a>

                                                        </li>
                                                    @endif

                                                    @if( $data['linked_in_id'] )
                                                        <li class="icon instagram">
                                                            <a target="_blank" href="{{ $data['linked_in_id'] }}">
                                                                <span class="tooltip">LinkedIn</span>
                                                                <svg
                                                                    height="1.8em"
                                                                    fill="currentColor"
                                                                    viewBox="0 0 16 16"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="linkedin"
                                                                >
                                                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                                                                </svg>
                                                            </a>

                                                        </li>
                                                    @endif

                                                    @if( !$data['linked_in_id'] && ( !$data['github_id'] && !$data['facebook_id']))
                                                        <div style="height:70px;"></div>
                                                    @endif
                                                </ul>
                                            </div>

                                            <div style="display: flex; flex: 3; justify-content: space-between; gap: 20px;">
                                                <a href="{{ route('secured.basic.info.edit', ['id' => $data['id']]) }}" class="btn btn-success" style="flex: 10;">
                                                    <b>Edit</b>
                                                </a>
                                                <a href="{{ route('secured.basic.info.delete', ['id' => $data['id']]) }}"  onclick="return confirmDelete();" style="flex: 1;" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            @else
                                <div style="display: flex; justify-content: center; align-items: center; height: 500px; background-color: #f8f9fa; text-align: center; padding: 20px; width:100%; ">
                                    <div>
                                        <h1 style="color: #dc3545; font-family: 'Arial', sans-serif; font-weight: bold;">
                                            No Data Available
                                        </h1>
                                        <p style="font-size: 1.2rem; color: #6c757d;">
                                            You can create one from the button above.
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
    function confirmDelete() {
        var cnf = confirm('Are you sure you want to delete this user?');

        if(!cnf) {
            return false;
        }
    }
</script>
</html>