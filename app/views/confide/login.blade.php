<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
                <!-- Theme style -->
                {{ HTML::style('AdminLTE/css/AdminLTE.css') }}


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
 @if (Session::get('error'))
                                    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                                    @endif

                                    @if (Session::get('notice'))
                                    <div class="alert">{{{ Session::get('notice') }}}</div>
                                    @endif
        <div class="form-box" id="login-box">
            <div class="header">Sign In to Selia</div>
            <form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                 <div class="body bg-gray">
                                    <div class="form-group">
                        <label for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
                        <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                    </div>
                    <div class="form-group">
                        <label for="password">
                            {{{ Lang::get('confide::confide.password') }}}

                        </label>
                        <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="remember" class="checkbox">Remember&nbsp;me&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="hidden" name="remember" value="0">
                            <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                        </label>
                        </div>
                    </div>
                    <div class="footer">
                    <div class="form-group">
                        <button tabindex="3" type="submit" class="btn bg-olive btn-block">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                        <p><a href="{{{ URL::to('/users/forgot_password') }}}">I forgot my password</a></p>
                        <a href="{{{ URL::to('/users/forgot_password') }}}" class="text-center">Register a new membership</a>
                    </div>
                </div>

            </form>


        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>