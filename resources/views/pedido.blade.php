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
                    <a class="page-scroll" href="#portfolio">Colecciones</a>
                </li>
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
<br><br><br>
@section("1")
<div style="margin-left: 5%;">
	<div class="panel panel-warning" style="width: 95%;">
		<div class="panel-heading"> <h1>GENERAR PEDIDO </h1></div>
		<div class="panel-body">
			<h4>Datos del Pedido</h4><br>
			<table class="table table-hover">
				<tr>
					<th>Id. del producto</th>
					<th>Imagen</th>
					<th>Descripcion</th>
					<th>Cantidad</th>
					<th>Talla</th>
				</tr>
				<tr>
					<td>{{$producto[0]->id}}</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>

				</tr>
			</table>
			<h4>Datos del Cliente</h4><br>
			<div class="panel panel-default" style="width: 90%; margin-left: 5%;">
				<div class="panel-body" style="text-align: center;">
					<div class="col-lg-2">
						<label for="">Nombre</label><br><br><br>
						<label for="">Apellido Paterno</label><br><br><br>
						<label for="">Apellido Materno</label><br><br><br>
					</div>
					<div class="col-lg-8">
						<input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2"><br>
						<input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2"><br>
						<input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2"><br>
					</div>
				</div>


			</div>
			<h4>Datos de Envio</h4><br>
			Método de Envio: <select name="" id=""></select>
			País <select name="" id=""></select><br>	
			Estado <select name="" id=""></select><br>
			Ciudad <select name="" id=""></select><br>
			Calle <input type="text"><br>
			Número Interior <input type="text"><br>
			Número Exterior <input type="text"><br>
			Télefono <input type="text"><br>
		</div>
	</div>
</div>
@stop