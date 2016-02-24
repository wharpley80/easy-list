<!DOCTYPE html>
<html lang="en">
<head>
  <title>Easy List Maker</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://fonts.googleapis.com/css?family=Lakki+Reddy" rel="stylesheet" type="text/css"> 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Raleway" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <link href="{{asset('css/tooltipster.css')}}" rel="stylesheet" type="text/css" >
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" >
  <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    EasyListMaker
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Sign In</a></li>
                        <li><a href="{{ url('/register') }}">Sign Up</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
      <a href="http://williamharpleyportfolio.com/">
        <p class="designer">&copy; 2016 Design by William Harpley.</p>
      </a>
    </footer>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="{{asset('js/jquery.tooltipster.min.js') }}" type="text/javascript"></script>
    <script src="{{asset ('js/scripts.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset ('js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-68657371-1', 'auto');
      ga('send', 'pageview');

    </script>

    <!-- JavaScripts 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}-->
</body>
</html>
