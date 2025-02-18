<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> {{ config('app.name') }} | Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <br><br>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}.
            </div>
        @endif

        @if (session('relogin'))
            <div class="alert alert-danger" role="alert">
                {{ session('relogin') }}.
            </div>
        @endif

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        
                        <div class="row">
                            <div class="col-lg-6   d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back Admin!</h1>
                                    </div>
                                    <form class="user" action="{{ route('auth.login.authorize') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="user_id" name="user_id" aria-describedby="emailHelp"
                                                placeholder="Userid">
                                        </div>
                                        @if ($errors->has('user_id'))
                                            <div class="text-danger">
                                                <strong>{{ $errors->first('user_id') }}</strong>
                                                
                                            </div>
                                        @endif
                                        <br>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Password">
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="text-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                                
                                            </div>
                                        @endif
                                        <br>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small" >
                                                <input type="checkbox" class="custom-control-input " name="customCheck" style="cursor: pointer;" id="customCheck">
                                                <label class="custom-control-label " style="cursor: pointer;" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        @if ($errors->has('error'))
                                            <div class="text-danger">
                                                <strong>{{ $errors->first('error') }}</strong>
                                                
                                            </div>
                                        @endif
                                        <br>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>