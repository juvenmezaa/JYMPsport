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
            <a class="navbar-brand page-scroll" href="#page-top">JYMPstore</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown" >
                    <a class="page-scroll" href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button">Hombres<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('productos/hombres')}}">Ver todo</a></li>
                        @foreach($categoriasH as $c)
                        <li><a href= "{{url('productosCategoria')}}/{{$c->nombre}}">{{$c->nombre}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown" >
                    <a class="page-scroll" href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button">Mujeres<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('productos/mujeres')}}">Ver todo</a></li>
                        @foreach($categoriasM as $c)
                        <li><a href= "{{url('productosCategoria')}}/{{$c->nombre}}">{{$c->nombre}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#destacados">Destacados</a>
                </li>
               <!-- <li>
                    <a class="page-scroll" href="#portfolio">Colecciones</a>
                </li>-->
                <li>
                    <a class="page-scroll" href="#about">Acerca de</a>
                </li>
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
@section("header")
<header>
       <!-- <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Bienvenidos a JYMPstore!</div>
                <div class="intro-heading">Me alegra que estes aquí</div>
                <a href="#destacados" class="page-scroll btn btn-xl">Conoce nuestros productos</a>
            </div>
        </div>-->
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
                   <button class="highlight-caption"><a href="" style="color:black;"><h3>COMPRAR JEANS</h3></a></button>
               </div>
           </div>
           <div class="item">
              <img src="{{asset('img/carrusel/m3.jpg')}}" alt="..." width="100%">
              <div class="carousel-caption">
                <button class="highlight-caption">
                    <a href="{{url('productos/mujeres')}}" style="color:black;"><h3>COMPRAR PARA ELLA</h3></a>
                </button>
            </div>
        </div>
        <div class="item">
          <img src="{{asset('img/carrusel/m6.jpg')}}" alt="..." width="100%">
          <div class="carousel-caption">
           <button class="highlight-caption"><a href="{{url('productos/hombres')}}" style="color:black;"><h3>COMPRAR PARA EL </h3></a></button>
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
</header>
<hr>
<h4>RECIEN LLEGADOS</h4><br>
<section id="losmasvendidos">
    <div id="carrusel-articulos" class="carousel slide">
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
         <!-- Slide 1 -->
         <div class="item active">
            <div class="row">
                <ul>
                    @foreach($recientess1 as $p)
                    <li class="col-sm-3 col-xs-6">
                        <figure class="itemcarrusel">
                            <a href="{{url('detalleProducto')}}/{{$p->id}}">
                                <input type="hidden" value="{{$p->id}}" name="id_art">
                                <img id="imagen_producto" src="{{ asset("img/productos/$p->imagen") }}" alt="{{$p->descripcion}}" onerror="this.src='{{ asset('img/categorias')}}/{{$p->generica}}'">
                            </a>
                        </figure>
                        <div id="info">

                            <p>{{$p->descripcion}}</p>
                            <p><b>${{$p->precio}}</b></p>
                        </div></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Slide 2-->
            <div class="item">
                <div class="row">
                 @foreach($recientess2 as $p)
                 <li class="col-sm-3 col-xs-6">
                    <figure class="itemcarrusel">
                        <a href="{{url('detalleProducto')}}/{{$p->id}}">
                            <input type="hidden" value="{{$p->id}}" name="id_art">
                            <img id="imagen_producto" src="{{ asset("img/productos/$p->imagen") }}" alt="{{$p->descripcion}}" onerror="this.src='{{ asset('img/categorias')}}/{{$p->generica}}'">
                        </a>
                    </figure>
                    <div id="info">

                        <p>{{$p->descripcion}}</p>
                        <p><b>${{$p->precio}}</b></p>
                    </div></li>
                    @endforeach
                </div>
            </div>
            <!-- Slide 3-->
            <div class="item">
                <div class="row">
                    @foreach($recientess3 as $p)
                    <li class="col-sm-3 col-xs-6">
                        <figure class="itemcarrusel">
                            <a href="{{url('detalleProducto')}}/{{$p->id}}">
                                <input type="hidden" value="{{$p->id}}" name="id_art">
                                <img id="imagen_producto" src="{{ asset("img/productos/$p->imagen") }}" alt="{{$p->descripcion}}" onerror="this.src='{{ asset('img/categorias')}}/{{$p->generica}}'">
                            </a>
                        </figure>
                        <div id="info">

                            <p>{{$p->descripcion}}</p>
                            <p><b>${{$p->precio}}</b></p>
                        </div></li>
                        @endforeach
                    </div>
                </div>

            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carrusel-articulos" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#carrusel-articulos" data-slide="next">
                <span class="icon-next"></span>
            </a>

        </section>
        <hr>
        @stop
        @section("1")
        <section id="destacados">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Destacados</h2>
                        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">E-Commerce</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Responsive Design</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Web Security</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                </div>
            </div>
        </section><!--Wrapper for slides -->

        @stop
        @section("2")
        @stop
        @section("3")
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Acerca de</h2>
                        <h3 class="section-subheading text-muted">Equipo JYMPstore</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image">
                                    <img id="equipo" class="img-circle img-responsive" src="{{asset('img/about/equipoPebble.jpg')}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>Pebble Arrambí</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="{{asset('img/about/equipoYukie.jpg')}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>Yukie Ley</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted"></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="{{asset('img/about/equipoJuven.jpg')}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>Juven Meza</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="{{asset('img/about/equipoMonica.jpg')}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>Monica Salazar</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted"></p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-image">
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="{{asset('img/about/equipoJorge.jpg')}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>Jorge Treviño</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted"></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @stop
