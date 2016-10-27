<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('jymp.ico')}}"/>

    <title>JYMPstore</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Theme CSS -->
    <link href="{{asset('css/agency.min.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" class="index">

    @yield("navbar")

    <!-- Header -->
    @yield("header")

    <!-- Destacados Section -->
    @yield("1")

    <!-- Colecciones Grid Section -->
    @yield("2")

    <!-- About Section -->
    @yield("3")

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; JYMPstore 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="{{url('/twitter')}}"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="{{url('/facebook')}}"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="{{url('/instagram')}}"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#politicasModal" class="portfolio-link" data-toggle="modal">Politicas de Privacidad</a>
                        </li>
                        <li><a href="#terminosModal" class="portfolio-link" data-toggle="modal">Terminos de Uso</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Politicas Modal -->
    <div class="portfolio-modal modal fade" id="politicasModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Politicas de Privacidad</h2>
                                <p class="item-intro text-muted">JYMPstore</p>
                                <p>
                                    1.Cada vez que usa este sitio web estará bajo la aplicación de la política de privacidad vigente en cada momento (en adelante, la Política de Privacidad), debiendo revisar dicho texto para comprobar que está conforme con él.
                                </p>
                                <p>
                                    2.Los datos personales que nos aporta serán objeto de tratamiento en una base de datos responsabilidad de JYMPstore cuyas finalidades son:
                                    <ul>
                                    <li>
                                        El desarrollo, cumplimiento y ejecución del contrato de compraventa de los productos que haya adquirido o de cualquier otro contrato entre ambos; 
                                    </li>    
                                    <li>
                                        Para cumplir obligaciones derivadas de nuestras relaciones jurídicas que surjan con usted al contactarnos para compartir sus opiniones, quejas y sugerencias; información corporativa, affinity card, tarjetas regalo y atención al cliente en tiendas.
                                    </li>
                                    <li>
                                        Atender las solicitudes que nos plantee; 
                                    </li>
                                    <li>
                                        Asimismo, dentro de la relación entre usted y nosotros, estará comprendido proporcionarle información acerca de los productos de JYMPstore.
                                    </li>
                                    <li>
                                        En caso de que elija marcar la opción de guardar y activar compra rápida, nos autoriza expresamente al tratamiento de los datos necesarios para la activación y desarrollo de esta funcionalidad. El CVV de la tarjeta únicamente se utiliza para realizar la compra en curso, y no será almacenado ni tratado posteriormente como parte de sus datos de tarjetas. 
                                    </li>
                                    </ul>
                                </p>
                                <p>
                                    3.Usted podrá limitar el uso y/o divulgación de sus datos personales enviando su solicitud al Departamento de Protección de Datos a la dirección datospersonales@corporaciondeserviciosxxi.mx para México. Los requisitos para acreditar su identidad, así como el procedimiento para atender su solicitud se regirán por los mismos criterios señalados en el apartado anterior.
                                </p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Terminos Modal -->
    <div class="portfolio-modal modal fade" id="terminosModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Terminos de Uso</h2>
                                <p class="item-intro text-muted">JYMPstore</p>
                                <h3>Aceptación</h3>
                                <p>
                                    Al ingresar y utilizar este portal Web, identificado con nombre de dominio JYMPstore.mx, propiedad de JYMPstore &copy, el usuario acepta los Términos y Condiciones de Uso contenidos en este convenio y declara expresamente su aceptación utilizando para tal efecto medios electrónicos, en términos de lo dispuesto por el artículo 1803 y demás relativos del Código Civil Federal. 
                                </p>
                                <p>
                                    En caso de no aceptar en forma absoluta y completa los términos y condiciones de este convenio, el usuario deberá abstenerse de acceder, utilizar y observar el portal Web JYMPstore.mx. 
                                </p>
                                <p>
                                    Y en caso de que el usuario acceda, utilice y observe el sitio JYMPstore.mx se considerará como una absoluta y expresa aceptación de los Términos y Condiciones de Uso aquí estipulados. 
                                </p>
                                <p>
                                    La sola utilización de dicha página de Internet le otorga al público en general la condición de usuario (en adelante referido como el “usuario” o los “usuarios”) e implica la aceptación, plena se incondicional de todas y cada una de las condiciones generales y particulares incluidas en estos Términos y Condiciones de Uso publicados por JYMPstore.mx en el momento mismo en que el usuario acceda al portal Web. 
                                </p>
                                <p>
                                    Cualquier modificación a los presentes Términos y Condiciones de Uso será realizada cuando el titular de la misma, en este caso JYMPstore, lo considere apropiado, siendo exclusiva responsabilidad del usuario asegurarse de tomar conocimiento de tales modificaciones.
                                </p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
    <!-- Contact Form JavaScript -->
    <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('js/contact_me.js')}}"></script>

    <!-- Theme JavaScript -->
    <script src="{{asset('js/agency.min.js')}}"></script>

</body>

</html>
