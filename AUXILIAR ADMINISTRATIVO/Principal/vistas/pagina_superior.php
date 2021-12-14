<!DOCTYPE html>



<!-- link estilos boostrap -->
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dash Lion</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>


    <body class="sb-nav-fixed jus">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-light border-bottom border-light shadow ">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 mb-1 bg-primary p-3" href="http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/principal/principal.php">Principal</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars fa-2x " style="color:black"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw" style="color:black"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="http://localhost/lion_group_system/Login/cerrar.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Modulos </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Menu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/eps/eps.php">EPS</a>
                                    <a class="nav-link" href="http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/comision/comision.php">Comision</a>
                                    <a class="nav-link" href="http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/tiposalud/tiposalud.php">tipo salud</a>
                                    <a class="nav-link" href="http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/tipopension/tipopension.php">tipo pension</a>
                                    <a class="nav-link" href="http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/formulario/formulario.php">formulario</a>
                                    <a class="nav-link" href="http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/estado/estado.php">estado</a>
                                    <a class="nav-link" href="http://localhost/lion_group_system/AUXILIAR ADMINISTRATIVO/reclamaciones/reclamaciones.php">reclamaciones</a>

                                </nav>
                            </div>
                           
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                        </div>
                    </div>

                    <!-- footer -->

                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php 

                        include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
                        echo $_SESSION['nombre2'];
                         ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            
