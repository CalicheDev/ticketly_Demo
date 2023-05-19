<?php
    session_start();
    include "config/config.php";
    if (!isset($_SESSION['user_id'])&& $_SESSION['user_id']==null) {
        header("location: index.php");
    }
?>
<?php 
    $id=$_SESSION['user_id'];
    $query=mysqli_query($con,"SELECT * from user where id=$id");
    while ($row=mysqli_fetch_array($query)) {
        $username = $row['username'];
        $name = $row['name'];
        $email = $row['email'];
        $profile_pic = $row['profile_pic'];
        $created_at = $row['created_at'];
  
    }
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="description" content="Sistema de informacion para mesas de ayuda y soporte técnico">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Carlos Bejarano">
        <link rel="shortcut icon" href="./images/favicon.ico">
        <title><?php echo $title." ".$name; ?> </title>

        
        <!-- Bootstrap -->
        <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-select.min.css"> 
        
        <!-- Font Awesome -->
        <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- NProgress -->
        <link href="css/nprogress/nprogress.css" rel="stylesheet">
          <!-- iCheck -->
       <link href="css/iCheck/skins/flat/green.css" rel="stylesheet">
       <!-- Datatables -->
        <link href="css/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables.net-bs/css/jquery.dataTables.min.css" rel="stylesheet">        

        <!-- jQuery custom content scroller -->
        <link href="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

        <!-- bootstrap-daterangepicker -->
        <link href="css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="css/custom.min.css" rel="stylesheet">  
        <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>-->

        <!-- Theme style -->
        <!-- <link rel="stylesheet" href="css/AdminLTE.min.css">-->
        <!-- MICSS button[type="file"] -->
        <link rel="stylesheet" href="css/micss.css">  
        

        <!-- Codigo ingresado por Carlos Bejarano-->
        <!-- FullCalendar -->
        <link href='css/fullcalendar.css' rel='stylesheet' />  
        <!-- Custom CSS -->
        <style>  
        #calendar {
            max-width: 980px;
            margin: 20px auto;
            padding: 0 10px;
        }
        .col-centered{
            float: none;
            margin: 0 auto;
        }        

        .embed-responsive-16by9::before {
          padding-top: 56.25%;
        }
        </style>


    </head>

    <body class="nav-md" class="font-lato right">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                          <a href="dashboard_2.php" class="site_title"><i class="fa fa-ticket"></i> <span>Softweb<strong>Tickets</strong></span></a>                        
                        </div>
                        <div class="clearfix"></div>

                            <!-- menu profile quick info -->
                                <div class="profile clearfix">
                                    <div class="profile_pic">
                                        <img src="images/profiles/<?php echo $profile_pic;?>" alt="<?php echo $name;?>" class="img-circle profile_img">
                                    </div>
                                    <div class="profile_info">
                                        <span>Bienvenido,</span>
                                        <h2><?php echo $name;?></h2>
                                    </div>
                                </div>
                            <!-- /menu profile quick info -->

                        <br />
