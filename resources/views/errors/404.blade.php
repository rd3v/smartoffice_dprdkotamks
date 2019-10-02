<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/v2') }}/plugins/images/favicon.png">
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/assets/v2') }}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('public/assets/v2') }}/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('public/assets/v2') }}/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('public/assets/v2') }}/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('public/assets/v2') }}/css/colors/default.css" id="theme" rel="stylesheet">
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
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">TIDAK DI TEMUKAN !</h3>
                <p class="text-muted m-t-30 m-b-30">SEPERTI NYA APA YANG ANDA CARI TIDAK ADA PADA KAMI.</p>
                <a href="{{ url('/') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Kembali</a> </div>
            <footer class="footer text-center">2019 © HD Solution.</footer>
        </div>
    </section>
    <!-- jQuery -->
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('public/assets/v2') }}/bootstrap/dist/js/tether.min.js"></script>
    <script src="{{ asset('public/assets/v2') }}/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
   
</body>

</html>
