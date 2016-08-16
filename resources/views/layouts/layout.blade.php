<?php
use Carbon\Carbon;
?>

<html ng-app="moddingtrials">
<head>
    <title>The Modding Trials - @yield('title')</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/sweetalert.css">
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">The Modding Trials</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/rules">Rules</a></li>
                <li><a href="/competitors">Competitors</a></li>
                <li><a href="/results">Results</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

@yield('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" charset="utf-8"></script>
<script src="/assets/js/bootstrap.min.js" charset="utf-8"></script>
<script src="/assets/js/angular.min.js" charset="utf-8"></script>
<script src="/assets/js/SweetAlert.js" charset="utf-8"></script>
<script src="/assets/js/sweetalert.min.js" charset="utf-8"></script>
<script src="/assets/js/humanize-duration.js" charset="utf-8"></script>
<script src="/assets/js/moment-with-locales.js" charset="utf-8"></script>
<script src="/assets/js/angular-timer.min.js" charset="utf-8"></script>
<script src="https://code.angularjs.org/1.5.7/angular-animate.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.0.0/ui-bootstrap-tpls.min.js" charset="utf-8"></script>
<script src="/assets/js/main.js" charset="utf-8"></script>
@yield('javascript')
</body>
</html>
