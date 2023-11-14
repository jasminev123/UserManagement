<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>User Management</title>

    <!-- ================= Favicon ================== -->

    <!-- Standard -->

    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">

    <!-- Retina iPad Touch Icon-->

    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">

    <!-- Retina iPhone Touch Icon-->

    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">

    <!-- Standard iPad Touch Icon-->

    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">

    <!-- Standard iPhone Touch Icon-->

    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">



    <!-- Styles -->

    <link href="Adminassets/css/lib/font-awesome.min.css" rel="stylesheet">

    <link href="Adminassets/css/lib/themify-icons.css" rel="stylesheet">

    <link href="Adminassets/css/lib/bootstrap.min.css" rel="stylesheet">

    <link href="Adminassets/css/lib/helper.css" rel="stylesheet">

    <link href="Adminassets/css/style.css" rel="stylesheet">

</head>



<body class="bg-primary">



    <div class="unix-login">

        <div class="container-fluid">

            <div class="row justify-content-center">

                <div class="col-lg-6">

                    <div class="login-content">

                        <div class="login-logo">

                            <a><span>Name of Organization</span></a>

                        </div>

                        <div class="login-form">

                            <h4>Login</h4>

                            <form action="/login" method="post">
                            @csrf
                                <div class="form-group">
                                    <label >Username</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label >Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                </div>
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="SignIn">
                                </div>
                            
                            </form>
                            

                        </div>
                        <div class="mb-3 row">
                            <a href="{{ route('register-form' ) }}" class="col-md-3 offset-md-5 btn btn-primary" >SignUp</a>
                        </div>
                        

                    </div>

                </div>

            </div>

        </div>

    </div>



</body>



</html>