<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Smart Office DPRD Kota Makassar">
    <meta name="author" content="HD Solution">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/v2/images/favicon.ico') }}">
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('public/assets/v2') }}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('public/assets/v2') }}/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ URL::asset('public/assets/v2') }}/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ URL::asset('public/assets/v2') }}/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ URL::asset('public/assets/v2') }}/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-19175540-9', 'auto');
    ga('send', 'pageview');
    </script>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box text-center">
            <img src="{{ URL::asset('public/assets/v2') }}/plugins/images/dprd.jpeg" alt="dprd logo" style="margin-bottom:1em" width="100px">
                <form class="form-horizontal form-material" id="loginform" action="{{ route('login') }}" method="post" role="form">
                    @csrf
                    <h3 class="box-title m-b-20 text-center">Sistem Arsip Digital<br>{{ config('app.name') }}</h3>                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                        <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" type="text" value="{{ old('name') }}" placeholder="Username" required>
                             @if(session()->has('login_error'))
                                <div class="alert alert-danger">
                                  {{ session()->get('login_error') }}
                                </div>
                              @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required placeholder="Password">
                            @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Masuk</button>
                        </div>
                    </div>
                   
                </form>

            </div>
        </div>
    </section>
    </section>
    <!-- jQuery -->
    <script src="{{ URL::asset('public/assets/v2') }}/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('public/assets/v2') }}/bootstrap/dist/js/tether.min.js"></script>
    <script src="{{ URL::asset('public/assets/v2') }}/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('public/assets/v2') }}/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ URL::asset('public/assets/v2') }}/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{ URL::asset('public/assets/v2') }}/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('public/assets/v2') }}/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="{{ URL::asset('public/assets/v2') }}/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>