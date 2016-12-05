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
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::User()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::User()->type==1)
                        <li><a href="{{ url('/panel') }}">Administrador</a></li>
                        @else
                        <li><a href="{{ url('/pedidosUser') }}">Pedidos</a></li>
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
@section('1')
<br><br><br>
    <br><br>    
    <div class="container">
        <div class="row">
            <div class="panel panel-warning col-md-12">
                <div class="panel-heading row text-center"><h1>TUS PEDIDOS</h1></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-2">Fecha</th>
                                <th class="col-md-3">Producto</th>
                                <th class="col-md-3">Categoria</th>
                                <th class="col-md-2">Imagen</th>
                                <th class="col-md-1">Talla</th>
                                <th class="col-md-1">Cantidad</th>
                                <th class="col-md-2">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $p)
                                <tr>
                                    <td>{{$p->fecha}}</td>
                                    <td>{{$p->descripcion}}</td>
                                    <td>{{$p->nombreCat}}</td>
                                    <td style="width: 15%;">
                                        <img id= "imagenP" src="{{ asset('img/productos')}}/{{$p->imagen}}" style="width: 30%;" onerror="this.src='{{ asset('img/categorias')}}/{{$p->generica}}'" />
                                    </td>
                                    <td>{{$p->talla}}</td>
                                    <td>{{$p->cantidad}}</td>
                                    <td>{{$p->precio_total}}</td>
                                    <td>
                                        <a href="{{url('/eliminarPedido')}}/{{$p->id}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="paginas">
            {!! $pedidos->render() !!}
        </div>
        <div class="row text-center">
            <a href="{{url('/compra')}}" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> COMPRAR</span></a>
        </div>
        <hr>
    </div>

@stop