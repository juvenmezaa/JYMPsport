<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{asset('css/estilosPDF.css')}}" rel="stylesheet">
	<meta charset="UTF-8">
	<title>JYMPstore</title>
</head>
<body>
	<span id="barraLogo">
		<img id="logo" src="{{asset('/img/barraPDF.png')}}"" alt="">
	</span>
	<div>
	<div class="panel-heading" id="pedido"> <h2>Pedido Enviado</h2></div>
		<div id="datosPedido">
			<label style="font-weight: bold; font-size: 20px;">Datos del pedido</label> <br>
			<label style="font-weight: bold;">No. de pedido </label>

			<table class="table table-hover">
			</table>
		</div><br>
		<div id="datosCliente">
			<label style="font-weight: bold; font-size: 20px;">Datos del cliente</label> <br>
			<label style="font-weight: bold;">Nombre </label><br>
			<label style="font-weight: bold;">Apellido</label>
		</div><br>
		<div id="datosEnvio">
			<label style="font-weight: bold; font-size: 20px;">Datos del envío</label> <br>
			<label style="font-weight: bold;">Método de envío</label><br>
			<label style="font-weight: bold;">País</label><br>
			<label style="font-weight: bold;">Estado</label><br>
			
		</div>

	</div>
</body>
</html>