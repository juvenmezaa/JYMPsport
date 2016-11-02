<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Correo de confirmación</title>
</head>
<body>
	<h1>Gracias por registrarte!</h1>

	Porfavor <a href="{{ url("register/confirm/{$user->token}") }}">confirma tu correo electrónico</a>.
</body>
</html>