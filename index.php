<?php
session_start();

include "config/config.php";

if (isset($_SESSION['user_id']) && $_SESSION !== null) {
    header("location: dashboard_2.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Iniciar Sesión </title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- NProgress -->
    <link href="css/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.css/animate.min.css" rel="stylesheet">
    <!-- Morris Chart Styles-->
    <link href="js/morris.js/morris-0.4.3.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <link href="css/custom-styles.css" rel="stylesheet">
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="js/Lightweight-Chart/cssCharts.css">

</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <?php
                $invalid = sha1(md5("contrasena y email invalido"));
                if (isset($_GET['invalid']) && $_GET['invalid'] == $invalid) {
                    echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> Contraseña o correo Electrónico invalido
                                </div>";
                }
                ?>
                <section class="login_content">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                            <a href="#" class="h1"><b>Softweb</b>Tickets</a>
                        </div>
                        <div class="card-body">
                            <p class="login-box-msg">Inicia sesión para acceder a tu cuenta</p>
                            <form action="action/login.php" method="post">
                                <h1>Iniciar Sesión</h1>
                                <div class="form-group login-form-area has-feedback">
                                    <input name="email" type="text" class="form-control has-feedback-left" placeholder="Correo Electrónico" required>
                                    <i class="fa fa-user form-control-feedback left " aria-hidden="true"></i>
                                </div>

                                <div class="form-group login-form-area has-feedback">
                                    <input type="password" name="password" class="form-control has-feedback-left" placeholder="Contraseña" required>
                                    <i class="fa fa-lock form-control-feedback left" aria-hidden="true"></i>
                                </div>
                                <div>
                                    <button type="submit" name="token" value="Login" class="btn btn-default">Iniciar Sesion</button>
                                    <a class="reset_pass" href="#">Olvidaste Tu contraseña?</a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="separator">
                                    <div class="clearfix"></div>
                                    <br />
                                    <div>
                                        <h1><i class="fa fa-ticket"></i> <span>Softweb<strong>Tickets</strong></span></h1>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>