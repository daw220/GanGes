<?php
    session_start();
    include "../lib/misfunciones.php";

    session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>La mejor aplicacion de gestion fanadera - GANGES</title>
    <link rel="stylesheet" href="../css/style.css">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="shortcut icon" href="../src/logo1.png">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand" href="index.php"><img src="../src/logo.png" height="50px"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="./inicio.php">Inicio de sesion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./registro.php">Registro</a>
        </li>
    </div>
</nav>
<div class="principal">
    <section class="seccion b">
        <div class="accordian">
            <ul>
                <li>
                    <div class="titulo">
                        <p>Mision</p>
                    </div> 
                    <div class="cuerpo">
                        <p>Somos una empresa de desarrollo de aplicaciones WEB que ofrece un servicio de gestión estructurada de explotaciones ganaderas enfocada a las familias de ganaderos de pastoreo, para mejorar su calidad de vida y su empeño diario en su trabajo </p>
                    </div>
                </li>
                <li>
                    <div class="titulo">
                        <p>Vision</p>
                    </div> 
                    <div class="cuerpo">
                        <p> Queremos ser la aplicación que de referencia para los ganaderos en España, para ayudar en su día a día y mejorar su calidad de vida.</p>
                    </div>
                </li>
                <li>
                    <div class="titulo">
                        <p>Valores</p>
                    </div>
                    <div class="cuerpo">  
                        <p> 
                            Simplificación de procesos: ayudaremos a simplificar las tareas cotidianas.
                            <br/>
                            <br/>
                            Ayuda a la modernización: se asistirá a la gestión sin perdida de los datos que se generan de los procesos cotidianos.
                        </p>                                      
                    </div>
                </li>
               
            </ul>
        </div>
    </section> 
    <section class="seccion a">
        <div class="contacto">
            <div class="card">
                <div class="card-header bg-success text-white">Contactanos
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Introduzca su nombre..." required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Introduzca su correo electronico..." required>
                            <small id="emailHelp" class="form-text text-muted">Su correo no se compartira con nadie ajeno a esta empresa.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Comentario</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-success text-right">Enviar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="seccion c">
        <footer class="footer-basic">
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="inicio.php">Inicar sesion</a></li>
                <li class="list-inline-item"><a href="registro.php">Registro</a></li>
            </ul>
            <p class="copyright">GanGes © 2023</p>
        </footer>
    </section>
</div>
</body>
</html>