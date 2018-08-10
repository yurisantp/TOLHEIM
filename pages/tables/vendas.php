<?php
session_start();


if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
    unset($_SESSION['validar']);

  header('location:index.php');


  }
if($_SESSION['validar']['tipo'] != "Gerente" AND $_SESSION['validar']['tipo'] != "Administrador")
{

header('location:../../hud.php');



}
require_once '../listar.php';
$dadosv = listarVendas();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Vendas</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="../../hud.php">TOLHEIM ADMIN</a>
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
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login']; ?></div>
                    <div class="email"><?php echo $_SESSION['validar']['tipo'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="../sair.php"><i class="material-icons">input</i>Sair</a></li>
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
                        <a href="../../hud.php">
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
                                <a href="../../pages/forms/produtos.php">Produtos</a>
                            </li>
                                                        <li>
                                <a href="../../pages/forms/vendas.php">Vendas</a>
                            </li>

                            <?php if($_SESSION['validar']['tipo'] == "Gerente" OR $_SESSION['validar']['tipo'] == "Administrador")
{ ?>
                                                        <li>
                                <a href="../../pages/forms/funcionarios.php">Funcionarios</a>
                            </li>
                                                        <li>
                                <a href="../../pages/forms/despesas.php">Despesas</a>
                            </li>

                            <?php } ?>
                            <li>
                                <a href="../../pages/forms/cliente.php">Clientes</a>
                            </li>
<?php if($_SESSION['validar']['tipo'] == "Administrador")
{ ?>

                            <li>
                                <a href="../../pages/forms/empresas.php">Empresas</a>
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
                                <a href="../../pages/tables/produtos.php">Produtos</a>
                            </li>
                            <li>
                                <a href="../../pages/tables/vendas.php">Vendas</a>
                            </li>

                            <?php if($_SESSION['validar']['tipo'] == "Gerente" OR $_SESSION['validar']['tipo'] == "Administrador")
{ ?>
                            <li>
                                <a href="../../pages/tables/funcionarios.php">Funcionarios</a>
                            </li>
                             <li>
                                <a href="../../pages/tables/despesas.php">Despesas</a>
                            </li>

                            <li>
                                <a href="../../pages/tables/clientes.php">Clientes</a>
                            </li>
                                                                                    <?php } ?>


                            <?php if($_SESSION['validar']['tipo'] == "Administrador")
{ ?>

                            <li>
                                <a href="../../pages/tables/empresas.php">Empresas</a>
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
                                <a href="../../pages/charts/produtos.php">Produtos</a>
                            </li>

                            <?php if($_SESSION['validar']['tipo'] == "Gerente" OR $_SESSION['validar']['tipo'] == "Administrador")
{ ?>
                            <li>
                                <a href="../../pages/charts/funcionarios.php">Funcionarios</a>
                            </li>
                                                                                                                <?php } ?>
                                                      <?php if($_SESSION['validar']['tipo'] == "Administrador")
{ ?>

                            <li>
                                <a href="../../pages/charts/empresas.php">Empresas</a>
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
                <h2>
                    TOLHEIM ADMIN                 
                </h2>
            </div>
            <!-- Basic Examples -->
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VENDAS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
      <th>ID</th>
      <th>Valor</th>
      <th>Descrição</th>
      <th>Data da Venda</th>
            <th>Hora da Venda</th>
                  <th>Cpf do Cliente</th>
      <th>Id do Funcionario</th>
                        <th>Excluir</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
      <th>ID</th>
      <th>Valor</th>
      <th>Descrição</th>
      <th>Data da Venda</th>
            <th>Hora da Venda</th>
                  <th>Cpf do Cliente</th>
      <th>Id do Funcionario</th>
                        <th>Excluir</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php if($dadosv) : ?>


      <?php foreach($dadosv as $venda) : ?>

        <tr>

          <td><?php echo $venda['ID']; ?></td>
          <td><?php echo $venda['VALOR']; ?></td>
          <td><?php echo $venda['DESCRICAO']; ?></td>
          <td><?php $datafunc = $venda["DATA_VENDA"];

$sqlDate = date("d/m/Y",strtotime($datafunc));  echo $sqlDate; ?></td>
          <td><?php echo $venda['HORA_VENDA']; ?></td>
          <td><?php echo $venda['CLIENTE_CPF']; ?></td>
          <td><?php echo $venda['FUNCIONARIO_ID']; ?></td>
   <td>  <a href="../excluir/vendas.php?id=<?php echo $venda['ID']; ?>" class="btn btn-danger">Excluir</a></td> 
</tr>



        <?php endforeach; ?>

      <?php else : ?>

        <tr>

        <td colspan="6">Nenhum registro encontrado.</td>
        </tr>
      <?php endif; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>