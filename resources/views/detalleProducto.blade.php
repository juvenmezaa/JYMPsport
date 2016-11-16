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
@section("header")
<br><br><br><br>
<div class="container">
    <div class="row col-lg-4">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            @if($producto[0]->genero==0)
                <li><a href="{{url('productos/mujeres')}}">Mujeres</a></li>
                <li><a href="{{url('productosCategoria')}}/mujeres/{{$producto[0]->nombreCat}}">{{$producto[0]->nombreCat}}</a></li>
            @else
                <li><a href="{{url('productos/hombres')}}">Hombres</a></li>
                <li><a href="{{url('productosCategoria')}}/hombres/{{$producto[0]->nombreCat}}">{{$producto[0]->nombreCat}}</a></li>
            @endif
        </ul>
    </div>
    <div class="row col-lg-8 text-right">
        @if($producto[0]->genero==0)
            <h1>Mujeres</h1>
        @else
            <h1>Hombres</h1>
        @endif
    </div>
</div>    
@stop
@section("1")
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img id="{{$producto[0]->id}}" src="{{asset('img/productos')}}/{{$producto[0]->imagen}}" alt="{{$producto[0]->descripcion}}" data-zoom-image="{{asset('img/productos')}}/{{$producto[0]->imagen}}" width="350px" onerror="this.src='{{ asset('img/categorias')}}/{{$producto[0]->generica}}'">
        </div>
        <div class="col-md-3">
            <h6>{{$producto[0]->descripcion}}</h6>
            <h2>MNX {{$producto[0]->precio}}</h2>
            <h5>Colores</h5>
            <hr>
            <h2><a class="glyphicon glyphicon-stop" style="color:{{$producto[0]->color}}"></a></h2>
            <hr>
            <h5>Tallas</h5>
            @foreach($tallas as $t)
                <h6>- {{$t->talla}}</h6>
            @endforeach
            <a href="#" class="btn btn-primary">Generar Pedido</a>
            <br><br>
            @if(Auth::check())
                <h6>Califica</h6>
                <form action="{{url('/rating')}}" method="POST" class="form-inline">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" value="{{$producto[0]->id}}" name="idprod">
                    <input type="submit" class="btn btn-primary">

                
                    <fieldset class="rating">
                        @for($i = 5; $i > 0; $i--)
                            @if(count($calificacion)>0)
                                @if($i == $calificacion[0]->calificacion)
                                    <input type="radio" id="star{{$i}}" name="rating" value="{{$i}}" checked /><label class = "full" for="star{{$i}}" title="{{$i}} stars"></label>
                                @else
                                    <input type="radio" id="star{{$i}}" name="rating" value="{{$i}}" /><label class = "full" for="star{{$i}}" title="{{$i}} stars"></label>
                                @endif
                            @else
                                <input type="radio" id="star{{$i}}" name="rating" value="{{$i}}" /><label class = "full" for="star{{$i}}" title="{{$i}} stars"></label>
                            @endif
                        @endfor
                    </fieldset>
                </form>
            @else
            <a href="{{url('/login')}}"><h6>Inicia sesión para calificar</h6></a>
            @endif
        </div>
        <div class="col-md-4" id="zoom"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#{{$producto[0]->id}}").elevateZoom({tint:true, tintColour:'black', tintOpacity:0.5, zoomWindowPosition: "zoom", borderSize: 0, easing:true});
}); 
</script>
@stop
@section("2")
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-9">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">Fecha</th>
                    <th class="col-md-2">Usuario</th>
                    <th>Comentario</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($comentarios))
                    @foreach($comentarios as $c)
                        <tr>
                            <th>{{$c->fecha}}</th>
                            <th>{{$c->name}}</th>
                            <th>{{$c->comentario}}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>
    </div>
    <div id="paginas">
        {!! $comentarios->render() !!}
    </div>
    <hr>
</div>
@if(Auth::check())
    <div class="container">
        <div class="row">
            <form action="{{url('/comentar')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-lg-5">
                    <textarea class="form-control" rows="3" name="txtComentario" style="margin: 0px -76.8438px 10px 0px;"></textarea>
                </div>
                <div class="form-group  col-md-12">
                    <input type="submit" class="btn btn-primary">
                </div>
                <input type="hidden" value="{{$producto[0]->id}}" name="idprod">
            </form>
        </div>
    </div>  
@else
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <a href="{{url('/login')}}"><h6>Inicia sesión para comentar</h6></a>
            </div>
        </div>
    </div>
@endif      
@stop
@section("3")

@stop