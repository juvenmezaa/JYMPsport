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

                        <li><a href= "{{url('productosCategoria')}}/hombres/{{$c->nombre}}">{{$c->nombre}}</a></li>
                        
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown" >
                    <a class="page-scroll" href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button">Mujeres<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('productos/mujeres')}}">Ver todo</a></li>
                        @foreach($categoriasM as $c)

                        <li><a href= "{{url('productosCategoria')}}/mujeres/{{$c->nombre}}">{{$c->nombre}}</a></li>

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
                <li>
                    <a class="page-scroll" href="#recientes">Recientes</a>
                </li>
                <!--<li>

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
                    <img src="{{asset('img/carrusel/m4.jpg')}}" alt="..." width="100%">

                  <div class="carousel-caption">
                     <button class="highlight-caption"><a href="{{url('/productosCategoria/mujeres/Jeans')}}" style="color:black;"><h3>COMPRAR JEANS</h3></a></button>
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
@stop
@section("1")
<section id="destacados" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Destacados</h2>
                <h3 class="section-subheading text-muted">Articulos mejor calificados</h3>
            </div>
        </div>
        
      <div id="carrusel-destacados" class="carousel slide">
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
           <!-- Slide 1 -->
        @for($i=0; $i < 3; $i++)
            @if($i == 0)
            <div class="item active">
            @else
            <div class="item">
            @endif
                <div class="row">
                    <ul>
                    @for($j=0+($i*3); $j < 3+($i*3); $j++)
                        <li class="col-sm-4 col-xs-6">
                            <figure class="itemcarrusel">
                                    <a href="{{url('detalleProducto')}}/{{$destacados[$j]->id}}">
                                <input type="hidden" value="{{$destacados[$j]->id}}" name="id_art">
                                <img id="imagen_producto" src="{{ asset('img/productos') }}/{{$destacados[$j]->imagen}}" alt="{{$destacados[$j]->descripcion}}">
                                </a>
                            </figure>
                            <div id="info">
                                <p>{{$destacados[$j]->descripcion}}</p>
                                <p><b>${{$destacados[$j]->precio}}</b></p>
                            </div>
                        </li>
                    @endfor
                    </ul>
                </div>
            </div>
            @endfor
      <!-- Controls -->
      <a class="left carousel-control" href="#carrusel-destacados" data-slide="prev">
        <span class="icon-prev"></span>
      </a>
      <a class="right carousel-control" href="#carrusel-destacados" data-slide="next">
        <span class="icon-next"></span>
      </a>
    </div>
</div>
</section><!--Wrapper for slides -->


<section id="recientes">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Recien llegados</h2>
                <h3 class="section-subheading text-muted">Top 12 de articulos ¡NUEVOS!</h3>
            </div>
        </div>
        
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
                    <img id="imagen_producto" src="{{ asset('img/productos') }}/{{$p->imagen}}" alt="{{$p->descripcion}}">
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
                    <img id="imagen_producto" src="{{ asset('img/productos') }}/{{$p->imagen}}" alt="{{$p->descripcion}}">
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
                    <img id="imagen_producto" src="{{ asset('img/productos') }}/{{$p->imagen}}" alt="{{$p->descripcion}}">
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
