<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Selia POS | Registration Page</title>
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
            <div class="alert alert-error alert-danger">
                @if (is_array(Session::get('error')))
                    {{ head(Session::get('error')) }}
                @endif
            </div>
        @endif

        @if (Session::get('notice'))
            <div class="alert">{{ Session::get('notice') }}</div>
        @endif
        <div class="form-box" id="login-box">
            <div class="header">Sign up for a free Selia trial</div>
           <form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
               <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="store__name" class="form-control" placeholder="Store Name"/>
                    </div>
                    <div class="row form-group">
                    <div class="col-xs-6">
                     <input type="text" name="first_name" class="form-control" placeholder="Your First Name"/>
                    </div>
                    <div class="col-xs-6">
                         <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
                    </div>

                    </div>
                    <div class="form-group">
                         <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                    </div>
                </div>
                <div class="footer">                    
                     <button type="submit" class="btn bg-olive btn-block">{{{ Lang::get('confide::confide.signup.submit') }}}</button>


                    <a href="/login" class="text-center">I already have a membership</a>
                </div>
            </form>


        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>