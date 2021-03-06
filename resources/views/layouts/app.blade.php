<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Looneta</title>

    <!--ICONE BESTINHA DA ABA-->
    <link rel="shortcut icon" href="http://outdoorhill.com/wp-content/uploads/2015/06/4.png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <!--BOOTSTRAP BAIXADO DENTRO DA PASTA public/components-->
    <link href="{{asset ('components/bootstrap.min.css') }}" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .outline-right{ /*MUDAR*/
          /*border-right: 1px solid lightgray;*/
          width: 125px;
          text-align: center;
        }

        .outline-left{
          /*border-left: 1px solid lightgray;*/
          width: 125px;
          text-align: center;
        }

    </style>


    <script src="//code.jquery.com/jquery-1.12.2.min.js"></script>


</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
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
                <a class="navbar-brand outline-right" href="{{ url('/home') }}">
                    Looneta
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a class="outline-right" href="{{ url('/home') }}">Home</a></li>
                    @if(!Auth::guest())
                      <li><a class="outline-right" href="{{ url('/reclamacoes') }}">Reclamações</a></li> <!--ORIGINAL sem class="outlined"-->
                      <li><a class="outline-right" href="{{ url('/reclamar') }}">Reclamar</a></li>
                    @endif
                    @if(isset(Auth::user()->id))
                        @if(Auth::user()->possuiFuncoes(array('Administrador', 'Moderador')))
                            <li><a class="outline-right" href="{{ url('/painel') }}" style="width:120%">Painel Administrativo</a> </li>
                        @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a class="outline-right outline-left" href="{{ url('/login') }}">Entrar</a></li>
                        <li><a class="outline-right" href="{{ url('/register') }}">Cadastre-se</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle outline-right outline-left " data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
<script src="{{URL::to('src/js/app.js')}}"></script>
</html>
