<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Wiki</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        @if(Auth::check())
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->full_name }} <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Another action</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li><a href="{{ route('logout') }}">Salir</a></li>
            </ul>
          </div>
        @else
          <br>
          {{ Form::open(array('class'=>'form-inline', 'route'=>'login', 'method'=>'POST', 'role'=>'form')) }}
            {{ Form::text('username', '', array('class'=>'form-control', 'placeholder'=>'Usuario')) }}
            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Contraseña')) }}
            {{ Form::checkbox('remember', 1) }} <span style="color:white">Recuerdame</span>
            {{ Form::submit('Ingresar', array('class'=>'btn btn-primary')) }}
          {{ Form::close() }}
          @if(Session::has('login_error'))
            <p style="color:white">No has podido ingresar</p>
          @endif
          <br>
        @endif
    </nav>  
    <br><br>
    <div class="container">
    	@yield('content')
    </div>

    <footer>
    	
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
