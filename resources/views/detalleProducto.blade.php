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
                @if($producto[0]->genero==0)
                    <li>
                        <a class="page-scroll" href="#">Hombres</a>
                    </li>
                    <li class="active">
                        <a class="page-scroll" href="#">Mujeres</a>
                    </li>
                @else
                    <li class="active">
                        <a class="page-scroll" href="#">Hombres</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Mujeres</a>
                    </li>
                @endif
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
@section("header")
<br><br><br><br>
<div class="container">
    <div class="row col-lg-4">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            @if($producto[0]->genero==0)
                <li><a href="#">Mujer</a></li>
            @else
                <li><a href="#">Hombre</a></li>
            @endif
            <li><a href="#">{{$producto[0]->nombre}}</a></li>
        </ul>
    </div>
</div>    
@stop
@section("1")
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <img src="{{asset('img/productos')}}/{{$producto[0]->imagen}}" alt="">
        </div>
        <div class="col-lg-2">
            <h6>{{$producto[0]->descripcion}}</h6>
            <h2>MNX {{$producto[0]->precio}}</h2>
            <h4>Costo {{$producto[0]->costo}}</h4>
            <h2><a class="glyphicon glyphicon-stop" style="color:{{$producto[0]->color}}"></a></h2>
            <h5>Talla</h5>
            @foreach($tallas as $t)
                <h6>{{$t->talla}} - Cantidad: {{$t->cantidad}}</h6>
            @endforeach
            <a href="#" class="btn btn-primary">Generar Pedido</a>

        </div>
    </div>
</div>
@stop
@section("2")

@stop
@section("3")

@stop
