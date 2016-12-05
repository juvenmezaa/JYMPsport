<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{asset('css/estilosPDF.css')}}" rel="stylesheet">
	<meta charset="UTF-8">
	<title>JYMPstore</title>
</head>
<body>
	<span id="barraLogo">
		<img id="logo" src="{{asset('img/barraPDF.png')}}">
	</span>
	<div>
	<div class="panel-heading" id="pedido"> <h2>Compra Finalizada</h2></div>
		<div id="datosPedido">
			<label style="font-weight: bold; font-size: 20px;">Datos de la compra</label> <br><br>
			<table>
				<tr>
					<td class="tdTitulos">No. de compra </td>
					<td class="tdDatos">#{{$compra->id}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Subtotal</td>
					<td class="tdDatos">${{$compra->subtotal}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Impuesto</td>
					<td class="tdDatos">${{$compra->impuesto}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Total</td>
					<td class="tdDatos">${{$compra->precio_total}}</td>
				</tr>
			</table>
			<table class="table table-hover">
			</table>
		</div><br>
		<div id="datosCliente">
			<label style="font-weight: bold; font-size: 20px;">Datos del cliente</label> <br><br>
			<table id="tablaUsuario">
				<tr>
					<td class="tdTitulos">Nombre</td>
					<td class="tdDatos">{{$usuario->name}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Apellido</td>
					<td class="tdDatos">{{$usuario->lastname}}</td>
				</tr>
			</table>
			<!--label style="font-weight: bold;">Nombre: </label> {{$usuario->name}}<br>
			<label style="font-weight: bold;">Apellido: </label> {{$usuario->lastname}}-->
		</div><br>
		<div id="datosEnvio">
			<label style="font-weight: bold; font-size: 20px;">Datos del envío</label> <br><br>
			<table>
				<tr>
					<td class="tdTitulos">Método de envío</td>
					<td class="tdDatos">{{$compra->metodo_envio}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Fecha</td>
					<td class="tdDatos">{{$compra->fecha}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">País</td>
					<td class="tdDatos">{{$compra->pais}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Estado</td>
					<td class="tdDatos">{{$compra->estado}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Ciudad</td>
					<td class="tdDatos">{{$compra->ciudad}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Código Postal</td>
					<td class="tdDatos">{{$compra->codigo_postal}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Colonia</td>
					<td class="tdDatos">{{$compra->colonia}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Calle</td>
					<td class="tdDatos">{{$compra->calle}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Número Exterior</td>
					<td class="tdDatos">{{$compra->num_ext}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Número Interior</td>
					<td class="tdDatos">{{$compra->num_int}}</td>
				</tr>
				<tr>
					<td class="tdTitulos">Telefono</td>
					<td class="tdDatos">{{$compra->tel}}</td>
				</tr>
			</table>
			
		</div>

	</div>
</body>
</html>