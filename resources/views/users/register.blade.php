<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Register</title>
    <!-- Custom fonts for this template-->
    <link href="plugin/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::to('js/script.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient-primary">

    <div class="container">
    <div class="loader" style="display:none">Please Wait ,LOADING...</div>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                        <div id="msg_error" class="msg_error"></div>

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form id="insert-register-data" class="user" method="POST" action="{{ url('register') }}">

                               {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="f_name" id="f_name"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="l_name"  id="l_name"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"   placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password"   id="password"  placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                             name="password_confirmation" id="password_confirmation" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <a href="#" id="submitRegisterData" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="crm-login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

        </script>
</body>

</html>
