<?php
session_start();


if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
    unset($_SESSION['validar']);

  header('location:index.php');


  }
  

require_once 'pages/config.php';
require_once 'pages/listar.php';
$dadosvo = listarVendasOrdem();
$dadosco = listarClientesOrdem();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>TOLHEIM</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

        <link href="plugins/morrisjs/morris.js" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />




</head>

<body class="theme-black">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Espere um pouco...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="O que deseja...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="hud.php">TOLHEIM ADMIN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                 
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login']; ?></div>
                    <div class="email"><?php echo $_SESSION['validar']['tipo'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="pages/sair.php"><i class="material-icons">input</i>Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU PRINCIPAL</li>
                    <li class="active">
                        <a href="hud.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>              
                   
                    <li>
                
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Cadastro</span>
                        </a>
                        <ul class="ml-menu">
                                                        <li>
                                <a href="pages/forms/produtos.php">Produtos</a>
                            </li>
                                                        <li>
                                <a href="pages/forms/vendas.php">Vendas</a>
                            </li>

                            <?php if($_SESSION['validar']['tipo'] == "Gerente" OR $_SESSION['validar']['tipo'] == "Administrador")
{ ?>
                                                        <li>
                                <a href="pages/forms/funcionarios.php">Funcionarios</a>
                            </li>
                                                        <li>
                                <a href="pages/forms/despesas.php">Despesas</a>
                            </li>

                            <?php } ?>
                            <li>
                                <a href="pages/forms/cliente.php">Clientes</a>
                            </li>
<?php if($_SESSION['validar']['tipo'] == "Administrador")
{ ?>

							<li>
                                <a href="pages/forms/empresas.php">Empresas</a>
                            </li>

                                                        <?php } ?>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Administração</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/tables/produtos.php">Produtos</a>
                            </li>
                            <li>
                                <a href="pages/tables/vendas.php">Vendas</a>
                            </li>

                            <?php if($_SESSION['validar']['tipo'] == "Gerente" OR $_SESSION['validar']['tipo'] == "Administrador")
{ ?>
                            <li>
                                <a href="pages/tables/funcionarios.php">Funcionarios</a>
                            </li>
                             <li>
                                <a href="pages/tables/despesas.php">Despesas</a>
                            </li>

                            <li>
                                <a href="pages/tables/clientes.php">Clientes</a>
                            </li>
                                                                                    <?php } ?>


                            <?php if($_SESSION['validar']['tipo'] == "Administrador")
{ ?>

							<li>
                                <a href="pages/tables/empresas.php">Empresas</a>
                            </li>

                                                                                    <?php } ?>
                        </ul>
                    </li>
                       
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">pie_chart</i>
                            <span>Gerenciamento</span>
                        </a>
                       <ul class="ml-menu">
                            <li>
                                <a href="pages/charts/produtos.php">Produtos</a>
                            </li>

                            <?php if($_SESSION['validar']['tipo'] == "Gerente" OR $_SESSION['validar']['tipo'] == "Administrador")
{ ?>
                            <li>
                                <a href="pages/charts/funcionarios.php">Funcionarios</a>
                            </li>
                                                                                                                <?php } ?>
                                                      <?php if($_SESSION['validar']['tipo'] == "Administrador")
{ ?>

                            <li>
                                <a href="pages/charts/empresas.php">Empresas</a>
                            </li>

                                                                                                                <?php } ?>
                        </ul>
                    </li>
                

            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 - 2018 <a href="javascript:void(0);">TOLHEIM</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">CORES</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                     <li data-theme="black" class="active">
                            <div class="black"></div>
                            <span>Preto</span>
                        </li>
                    
                       
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
 <?php if($_SESSION['validar']['tipo'] == "Gerente" OR $_SESSION['validar']['tipo'] == "Administrador"){ ?>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-deep-orange hover-expand-effect">
<div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">PRODUTO MAIS VENDIDO</div>
                            <div class="number"><p style="font-size:20px;"><?php
                            




$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);


$sql = "SELECT NOME, SUM(QUANTIDADE) QUANTIDADE FROM item_venda
GROUP BY NOME
ORDER BY QUANTIDADE DESC"; 

            $v = $con->query($sql);

        $vf = mysqli_fetch_assoc($v);


if(!empty($vf)) {



                        echo $vf['NOME'];    ?> - <?php echo $vf['QUANTIDADE'];?> Unid. <?php } else{  ?>Sem Vendas <?php } ?></p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="info-box-3 bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">MAIOR VENDA</div>
                            <div class="number"><?php
                            



$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "SELECT max(VALOR) FROM venda"; 

            $gg = $con->query($sql);

        $jonas = mysqli_fetch_assoc($gg);


$sql = "SELECT * FROM venda WHERE VALOR = '".$jonas['max(VALOR)']."'"; 


            $v = $con->query($sql);

        $vf = mysqli_fetch_assoc($v);


$sql = "SELECT login FROM usuario WHERE funcionario_id = '".$vf['FUNCIONARIO_ID']."'"; 

            $v = $con->query($sql);

        $vs = mysqli_fetch_assoc($v);

if(!empty($vs)) {

                        echo $vs['login'];?> - R$<?php echo $vf['VALOR']; } else{  ?> Sem Vendas <?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-light-green">
                        <div class="icon">
                            <span class="chart chart-line">9,4,6,5,6,4,7,3</span>
                        </div>
                        <div class="content">
                            <div class="text">LUCRO BRUTO MENSAL</div>
                            <div class="number">R$ <?php
                            

    date_default_timezone_set('America/Sao_Paulo');
$ANO = date('Y-m-d');
$MES = date('m');

$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);


$sql = "SELECT sum(VALOR) from venda where MONTH(DATA_VENDA) = '".$MES."' AND YEAR(DATA_VENDA) = '".$ANO."';"; 

            $v = $con->query($sql);

        $vf = mysqli_fetch_assoc($v);


if(!empty($vf['sum(VALOR)'])) {

                        echo $vf['sum(VALOR)']; } else{  ?> 0 <?php } ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-orange">
                        <div class="icon">
                            <span class="chart chart-line">9,4,6,5,6,4,7,3</span>
                        </div>
                        <div class="content">
                            <div class="text">DESPESA MENSAL</div>
                            <div class="number">R$ <?php
                            

    date_default_timezone_set('America/Sao_Paulo');
$ANO = date('Y-m-d');
$MES = date('m');

$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);


$sql = "SELECT sum(VALOR) from despesa where MONTH(DATA_VENCIMENTO) = '".$MES."' AND YEAR(DATA_VENCIMENTO) = '".$ANO."';"; 

            $v = $con->query($sql);

        $vf = mysqli_fetch_assoc($v);



if(!empty($vf['sum(VALOR)'])) {

                        echo $vf['sum(VALOR)']; } else{  ?> 0 <?php } ?></div>
                        </div>
                    </div>
                </div>
            </div>

<?php } 

else{ ?>


                <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-deep-orange hover-expand-effect">
<div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">PRODUTO MAIS VENDIDO</div>
                            <div class="number"><p style="font-size:20px;"><?php
                            




$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);


$sql = "SELECT NOME, SUM(QUANTIDADE) QUANTIDADE FROM item_venda
GROUP BY NOME
ORDER BY QUANTIDADE DESC"; 

            $v = $con->query($sql);

        $vf = mysqli_fetch_assoc($v);





if(!empty($vf)) {



                        echo $vf['NOME'];    ?> - <?php echo $vf['QUANTIDADE'];?> Unid. <?php } else{  ?>Sem Vendas <?php } ?></p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="info-box-3 bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">MAIOR VENDA</div>
                            <div class="number"><?php
                            



$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "SELECT max(VALOR) FROM venda"; 

            $gg = $con->query($sql);

        $jonas = mysqli_fetch_assoc($gg);


$sql = "SELECT * FROM venda WHERE VALOR = '".$jonas['max(VALOR)']."'"; 


            $v = $con->query($sql);

        $vf = mysqli_fetch_assoc($v);


$sql = "SELECT login FROM usuario WHERE funcionario_id = '".$vf['FUNCIONARIO_ID']."'"; 


            $v = $con->query($sql);

        $vs = mysqli_fetch_assoc($v);

if(!empty($vs)) {

                        echo $vs['login'];?> - R$<?php echo $vf['VALOR']; } else{  ?> Sem Vendas <?php } ?></div>
                        </div>
                    </div>
                </div>

            </div>
  <?php } ?>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
                <!-- Visitors -->
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
              

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="body bg-indigo">
                            <div class="font-bold m-b--35">ULTIMAS VENDAS</div>
                            <ul class="dashboard-stat-list">


     <?php
if(!empty($dadosvo)) {


    foreach($dadosvo as $vo) { ?>

                                <li>
                                    <?php echo $vo['HORA_VENDA']; ?> - <?php $datafunc = $vo["DATA_VENDA"];

$sqlDate = date("d/m/Y",strtotime($datafunc));  echo $sqlDate; ?>
                                    <span class="pull-right"><b><?php echo $vo['VALOR']; ?></b> <small>R$</small></span>
                                </li>
                                
                                        <?php 


                                    } 

                                }

      else{ ?>

                                <li>
                                    SEM RESULTADOS
                                    <span class="pull-right"><b></b> <small></small></span>
                                </li>
                                
      <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>

                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <script src="js/pages/widgets/infobox/infobox-4.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
<script src="js/pages/index.php"></script>
<script src="js/pages/index2.php"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>