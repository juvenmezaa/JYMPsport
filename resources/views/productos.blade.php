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
            <a class="navbar-brand page-scroll" href="{{ url('/') }}">JYMPstore</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbarcollapse-1">
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
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::User()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::User()->type==1)
                        <li><a href="{{ url('/panel') }}">Administrador</a></li>
                        @else
                        <li><a href="{{ url('/pedidosUser') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> Pedidos</span></a></li>
                        <li><a href="{{ url('/comprasUser') }}"><span class="glyphicon glyphicon-saved" aria-hidden="true"> Compras</a></a></li>
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
<br><br><br><br>
<div class="container">
    <div class="row col-lg-4">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('productos')}}/{{$breadcrumb[0]}}">{{$breadcrumb[0]}}</a></li>
            @if(isset($breadcrumb[1]))
                <li><a href="#">{{$breadcrumb[1]}}</a></li>
            @endif
        </ul>
    </div>
    <div class="row col-lg-8 text-right">
        <h1>{{$breadcrumb[0]}}</h1>
    </div>
</div> 
    
@stop
@section("1")
<section id="productos">
	<article>
			@foreach($productos as $producto)
				<div class="panel panel-warning" id="producto">
				  <div class="panel-heading">
				    <h2 class="panel-title" style="font-size: 15px">{{$producto->descripcion }}</h2>
				  </div>
				  <div class="panel-body">
				  	<a  href="{{url('/detalleProducto')}}/{{$producto->id}}" >
				   	 <img id= "imagen_producto" src="{{ asset("img/productos/$producto->imagen") }}" onerror="this.src='{{ asset('img/categorias')}}/{{$producto->generica}}'" />
				   	</a><br>
				    Precio: ${{$producto->precio}}<br>
				    Color: <a class="glyphicon glyphicon-stop" style="color:{{$producto->color}}; font-size:1.5em"></a><br>
				  </div>
				</div>
			@endforeach
		</article>
        <div id="paginas">
            {!! $productos->render() !!}
        </div>
</section>
@stop