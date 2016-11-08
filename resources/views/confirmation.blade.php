<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Correo de confirmación</title>
	<link rel="stylesheet" href="{{asset("css/CorreoConfirmacion.css")}}">
</head>
<body>
	<h1>Bienvenido/a</h1>
	<h2>Gracias por registrarte!</h2>

	<span id="texto">El equipo administrativo de JYMPStore se complace en darle la más cordial bienvenida a nuestro sitio web, esperamos que su experiencia sea placentera y estamos abiertos a cualquier queja o sugerencia que usted pueda tener. Para terminar el registro de su cuenta, por favor confirma tu correo electrónico entrando al siguiente <a href="{{url("register/confirm/{$user->token}")}}">enlace.</a></span>
	
	<form action="{{url('register/confirm')}}/{{$user->token}}" method="GET">
		<input type="submit" value="Confirmación de correo electrónico" style="width: 75px;background: blue;">
	</form>
</body>
</html>