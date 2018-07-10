<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="<?php echo URL::to('/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo URL::to('/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo URL::to('/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo URL::to('/vendors/animate.css/animate.min.css');?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo URL::to('/build/css/custom.min.css');?>" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo url('do_login')?>">
                        {{ csrf_field() }}
                        <h1>Login Form</h1>
                        <div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <input type="text" name="username" class="form-control" placeholder="Username" required="required" /> 
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span> @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" name="password" class="form-control" placeholder="Password" required="required" /> 
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> @endif
                            </div>

                            <div>
                                <input type="submit" name="submit" value="Log in" class="btn btn-default submit">
                                <a class="reset_pass" href="#">Lost your password?</a>
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-paw"></i> Admin Panel!</h1>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                </div>
                </div>
            </div>
</body>
</html>