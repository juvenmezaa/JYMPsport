@extends("principal")
@section("navbar")
<script src="{{asset('js/pedidosCascada.js')}}"></script>

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
@section("1")
<br><br><br>
<div style="margin-left: 5%;">
	<div class="panel panel-warning col-md-12">
        <div class="panel-heading row text-center"><h1>GENERAR COMPRA</h1></div>
        <div class="panel-body">
			<h4>Datos de la Compra</h4><br>
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
                        </tr>
                    @endforeach
                    <tr>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td><strong>SUBTOTAL</strong></td>
                    	<td></td>
                    	<td>{{$subtotal}}</td>
                    </tr>
                    <tr>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td><strong>IMPUESTO</strong></td>
                    	<td></td>
                    	<td>{{$impuesto}}</td>
                    </tr>
                    <tr>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td><strong>TOTAL</strong></td>
                    	<td></td>
                    	<td>{{$precio_total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
	<form action="{{url('/compraEnviada')}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<h4>Datos del Cliente</h4><br>
		<div class="panel panel-default" style="width: 90%; margin-left: 5%;">
			<div class="panel-body" style="text-align: center;">
				<div class="col-lg-2">
					<label for="">Nombre</label><br><br><br>
					<label for="">Apellido</label><br><br><br>
				</div>
				<div class="col-lg-8">
					<input type="hidden" value="{{$user->id}}" id="usuario_id" name="usuario_id">
					<input type="text" class="form-control" placeholder="Name" aria-describedby="sizing-addon2" disabled value ="{{$user->name}}" name="usuario_nombre" id="usuario_nombre"><br>
					<input type="text" class="form-control" placeholder="Last Name" aria-describedby="sizing-addon2" disabled value="{{$user->lastname}}" name="usuario_apellido" id="usuario_apellido"><br>
				</div>
			</div>
		</div>
		<h4>Datos de Envio</h4><br>
			<div class="panel panel-default" style="width: 90%; margin-left: 5%;">
				<div class="panel-body">
					<table class="table table-hover">	
						<tr>
							<td><label>Método de Envio</label></td>
							<td>
								<div class="col-sm-6">
									<select name="envio" id="envio" class="form-control">
									<option value="DHL">DHL</option>
									<option value="UPS">UPS</option>
									<option value="Tufesa">Tufesa</option>
									<option value="Correos de Mexico">Correos de Mexico</option>
								</select>
								</div>
								
							</td>		
						</tr>
						<tr>
							<td><label>País</label></td>
							<td >
								<div class="col-sm-6">
									{!! Form::select('pais',$paises,null,['class'=>'form-control','id'=>'pais']) !!}
								</div>
							</td>		
						</tr>
						<tr>
							<td><label>Estado</label></td>
							<td >
								<div class="col-sm-6">
									{!! Form::select('estado',['placeholder'=>'Selecciona'],null,['id'=>'estado','class'=>'form-control']) !!}	
								</div>
							</td>		
						</tr>
						<tr>
							<td><label >Ciudad</label></td>
							<td >
								<div class="col-sm-6">
									{!! Form::select('ciudad',['placeholder'=>'Selecciona'],null,['id'=>'ciudad', 'class'=>'form-control']) !!}	
								</div>										
							</td>		
						</tr>
						<tr>
							<td><label >Código Postal</label></td>
							<td>
								<div class="col-sm-6">
									<input type="text" id="codigoPostal" name="codigoPostal" class="form-control" required>
							
								</div>
							</td>		
						</tr>
						<tr>
							<td><label>Colonia</label></td>
							<td>
								<div class="col-sm-6">
									<input type="text" id="colonia" name="colonia" class="form-control" required>
							
								</div>
							</td>		
						</tr>
						<tr>
							<td><label>Calle</label></td>
							<td>
								<div class="col-sm-6">
									<input type="text" id="calle" name="calle" class="form-control" required>
							
								</div>
							</td>		
						</tr>
						<tr>
							<td><label>Número Exterior</label></td>
							<td>
								<div class="col-sm-6">
									<input type="text" id="numero_ext" name="numero_ext" class="form-control" required>
							
								</div>
							</td>		
						</tr>
						<tr>
							<td><label>Número Interior</label></td>
							<td>
								<div class="col-sm-6">
									<input type="text" id="numero_int" name="numero_int" class="form-control">
							
								</div>
							</td>		
						</tr>
						<tr>
							<td><label>Télefono</label></td>
							<td>
								<div class="col-sm-6">
											<input type="text" id="tel" name="tel" class="form-control" required>
							
								</div>
							</td>		
						</tr>
					</table>
				</div>
			</div>
		@if(count($pedidos)>0)
            <input type="submit" class="btn btn-primary" style="margin-left: 80%;">
        @else
            <input type="submit" class="btn btn-primary" style="margin-left: 80%;" disabled>
        @endif
	</form>
</div>

@stop