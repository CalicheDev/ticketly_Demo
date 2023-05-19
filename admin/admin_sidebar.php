  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"><!-- sidebar menu -->
            <div class="menu_section" style="height: auto;">
                <ul class="nav side-menu">
                    <li class="<?php if(isset($active1)){echo $active1;}?>">
                        <a href="admin_dashboard_2.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li class="<?php if(isset($active2)){echo $active2;}?>">
                        <a href="../tickets.php"><i class="fa fa-ticket"></i>Agregar Ticket</a>
                    </li>

                    <li class="<?php if(isset($active3)){echo $active3;}?>">
                      <a href="#"> 
                        <i class="fa fa-sitemap"></i> <span>Tickets</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu" style="display: none;">                         
                         <a href="../Tickets_Registrados.php">
                            <i class="fa fa-ticket"></i> Tickets Registrados
                         </a>                        
                        </br><a href="../Tickets_Asignados.php"><i class="fa fa-ticket"></i> Tickets Asignados</a>
                        </br><a href="../Tickets_en_proceso.php"><i class="fa fa-ticket"></i> Tickets En Proceso</a>                      
                        </br><a href="../cerrados.php"><i class="fa fa-ticket"></i> Tickets Finalizados</a>
                        <!--</br><a href="tickets.php"><i class="fa fa-tags"></i> Agregar Tickets</a> -->
                        <!-- <li class=""><a href="asignados.php"><i class="fa fa-circle-o"></i> Tickets Asignados</a></li>-->
                        <!-- </br><a href="atender_casos.php"><i class="fa fa-tags"></i> Atender Tickets</a> -->
                        <!--<li class=""><a href="cancelados.php"><i class="fa fa-circle-o"></i> Tickets Con Incidencia</a></li>-->
                        <!--</br><a href="consulta_casos.php"><i class="fa fa-tags"></i> Consultar Tickets</a>-->
                      </ul>
                    </li>

                    <li class="<?php if(isset($active4)){echo $active4;}?>">
                        <a href="../projects.php"><i class="fa fa-list-alt"></i> Proyectos</a>
                    </li>

                    <li class="<?php if(isset($active5)){echo $active5;}?>">
                        <a href="../categories.php"><i class="fa fa-align-left"></i> Categorias</a>
                    </li>

                    <li class="<?php if(isset($active6)){echo $active6;}?>">
                        <a href="../reports.php"><i class="fa fa-area-chart"></i> Reportes</a>
                    </li>

                    <li class="<?php if(isset($active7)){echo $active7;}?>">
                      <a href="#"> 
                        <i class="fa fa-cog"></i> <span>Configuración</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu" style="display: none;">
                             <a href="../clientes.php"><i class="fa fa-child"></i> Clientes</a>                        
                        </br><a href="../users.php"><i class="fa fa-users"></i> Usuarios</a>                        
                        </br><a href="../asesor.php"><i class="fa fa-child"></i> Asesores</a>                    
                      </ul>
                    </li>
                    <!-- <li class="<?php if(isset($active9)){echo $active9;}?>">
                        <a href="about.php"><i class="fa fa-child"></i> Sobre Mi</a>
                    </li> -->
                </ul>
            </div>
        </div><!-- /sidebar menu -->
    </div>
</div> 
     
    <div class="top_nav"><!-- top navigation -->
        <div class="nav_menu">
            <nav>
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="btn-xs btn-success fa fa-bars" style="font-size:22px"></i></a>
                    <!--<a id="menu_toggle"><i class="fa fa-bars"></i></a> -->
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="images/profiles/<?php echo $profile_pic;?>" alt=""><?php echo $name;?>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="profile.php"><i class="fa fa-user"></i> Perfil</a></li>
                            <li><a href="action/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- /top navigation -->    