@extends("principal")
@section("navbar")
<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="{{url('/')}}">JYMPstore</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a class="page-scroll" href="#">Hombres</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">Mujeres</a>
                </li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::User()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::User()->type==1)
                        <li><a href="{{ url('/panel') }}">Administrador</a></li>
                        @endif
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <!-- <li class="divider"></li> -->
                    </ul>
                </li>
                @else
                <li>
                    <a class="page-scroll" href="{{url('/login')}}">Iniciar Sesión</a>
                </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
@stop
@section("2")
<header>
       <!-- <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Bienvenidos a JYMPstore!</div>
                <div class="intro-heading">Me alegra que estes aquí</div>
                <a href="#destacados" class="page-scroll btn btn-xl">Conoce nuestros productos</a>
            </div>
        </div>
        <section id="destacados">-->
        <div id="carrusel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carrusel" data-slide-to="0" class="active"></li>
              <li data-target="#carrusel" data-slide-to="1"></li>
              <li data-target="#carrusel" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                  <a href="http://google.com">
                    <img src="{{asset('img/carrusel/m4.jpg')}}" alt="..." width="100%">
                  </a>
                  <div class="carousel-caption">
                     <button class="highlight-caption"><h3>COMPRAR JEANS</h3></button>
                  </div>
                </div>
                <div class="item">
                  <img src="{{asset('img/carrusel/m3.jpg')}}" alt="..." width="100%">
                  <div class="carousel-caption">
                    <button class="highlight-caption"><h3>COMPRAR PARA ELLA</h3></button>
                  </div>
                </div>
                <div class="item">
                  <img src="{{asset('img/carrusel/m6.jpg')}}" alt="..." width="100%">
                  <div class="carousel-caption">
                     <button class="highlight-caption"><h3>COMPRAR PARA EL </h3></button>
                  </div>
                </div>
            </div>
 
            <!-- Controls -->
            <a class="left carousel-control" href="#carrusel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carrusel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div> <!-- Carousel -->
<!--</section>-->
</header>
@stop
@section("1")
@stop