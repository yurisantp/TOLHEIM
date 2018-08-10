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

require_once '../config.php';
$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "select * from funcionario where ID = '".$_GET['id']."'";
$result = $con->query($sql);
if($result->num_rows > 0){
   
   $dados=$result->fetch_assoc();

}
$sql = "select * from usuario where FUNCIONARIO_ID = '".$_GET['id']."'";
$result = $con->query($sql);
if($result->num_rows > 0){
   
   $dadosu=$result->fetch_assoc();

}


require_once '../listar.php';
$dadose = listarEmpresas();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Funcionarios - Tolheim ADMIN</title>

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

    <!-- Colorpicker Css -->
    <link href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
      <script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>
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
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICAÇÕES</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
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
                <h2>FUNCIONARIOS</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FUNCIONARIOS
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
                                                        <div class="demo-masked-input">
                            <form action="funcionarios2.php" method="post">
                                                                 <div class="col-md-12">
                                                                       <label for="idfunc">ID</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="idfunc" id="idfunc" value="<?php echo $dados['ID']; ?>" class="form-control" placeholder="Digite o nome do funcionario." maxlength="80">
                                    </div>
                                </div>
                                                                       <label for="nomefunc">Nome</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nomefunc" id="nomefunc" class="form-control" value="<?php echo $dados['NOME']; ?>" placeholder="Digite o nome do funcionario." maxlength="80">
                                    </div>
                                </div>


                                                                                                       <label for="nomeproduto">Login</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="loginfunc" id="loginfunc" value="<?php echo $dadosu['login']; ?>" class="form-control" placeholder="Digite o login do funcionario." maxlength="80">
                                    </div>
                                </div>

                                                                                                       <label for="nomeproduto">Senha</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="senhafunc" id="senhafunc" value="<?php echo $dadosu['senha']; ?>" class="form-control" placeholder="Digite a senha do produto." maxlength="80">
                                    </div>
                                </div>


                                <label for="ruafunc">Rua</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ruafunc" id="ruafunc" class="form-control" value="<?php echo $dados['RUA']; ?>" placeholder="Digite a rua do funcionario." maxlength="80">
                                    </div>
                                </div>
                                                                <label for="bairrofunc">Bairro</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="bairrofunc" id="bairrofunc" class="form-control" value="<?php echo $dados['BAIRRO']; ?>" placeholder="Digite o bairro do funcionario." maxlength="80">
                                    </div>
                                </div>
                                                                <label for="cidadefunc">Cidade</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="cidadefunc" id="cidadefunc" class="form-control" value="<?php echo $dados['CIDADE']; ?>" placeholder="Digite a cidade do funcionario." maxlength="80">
                                    </div>
                                </div>

                                   <label for="numerofunc">Numero</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="numerofunc" id="numerofunc" class="form-control" value="<?php echo $dados['NUMERO']; ?>" placeholder="Digite o numero do funcionario." maxlength="80">
                                    </div>
                                </div>
                                   <label for="complementofunc">Complemento</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="complementofunc" id="complementofunc" class="form-control" value="<?php echo $dados['COMPLEMENTO']; ?>" placeholder="Digite o complemento do funcionario." maxlength="80">
                                    </div>
                                </div>
                            </div>

                                                                    <div class="col-md-12">
                                    <p>
                                        <b>Estado</b>
                                    </p>
                                    <select class="form-control show-tick" data-live-search="true" value="<?php echo $dados['ESTADO']; ?>" name="estadofunc" required>


        <option value="na">Selecione o Estado</option> 
        <option value="ac">Acre</option> 
        <option value="al">Alagoas</option> 
        <option value="am">Amazonas</option> 
        <option value="ap">Amapá</option> 
        <option value="ba">Bahia</option> 
        <option value="ce">Ceará</option> 
        <option value="df">Distrito Federal</option> 
        <option value="es">Espírito Santo</option> 
        <option value="go">Goiás</option> 
        <option value="ma">Maranhão</option> 
        <option value="mt">Mato Grosso</option> 
        <option value="ms">Mato Grosso do Sul</option> 
        <option value="mg">Minas Gerais</option> 
        <option value="pa">Pará</option> 
        <option value="pb">Paraíba</option> 
        <option value="pr">Paraná</option> 
        <option value="pe">Pernambuco</option> 
        <option value="pi">Piauí</option> 
        <option value="rj">Rio de Janeiro</option> 
        <option value="rn">Rio Grande do Norte</option> 
        <option value="ro">Rondônia</option> 
        <option value="rs">Rio Grande do Sul</option> 
        <option value="rr">Roraima</option> 
        <option value="sc">Santa Catarina</option> 
        <option value="se">Sergipe</option> 
        <option value="sp">São Paulo</option> 
        <option value="to">Tocantins</option> 

                                    </select>
                                </div>
                                 <div class="col-md-12">
                                        <b>Data de admissão</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="datafunc" class="form-control date" value="<?php echo $dados['DATA_ADMISSAO']; ?>" placeholder="Ex: 30/07/2016">
                                            </div>
                                        </div>


                                </div>
 <div class="col-md-12">
                                        <b>Celular</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text"  name="celularfunc" value="<?php echo $dados['CELULAR']; ?>" class="form-control mobile-phone-number" placeholder="Ex: (00) 00000-0000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <b>Telefone</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="telefonefunc" value="<?php echo $dados['TELEFONE']; ?>" class="form-control phone-number" placeholder="Ex: (00) 0000-0000">
                                            </div>
                                        </div>
                                    </div>

                                                               

                                                                    <div class="col-md-12">
                                        <b>CEP</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">pin_drop</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="cepfunc" value="<?php echo $dados['cep']; ?>" class="form-control cep-func" placeholder="Ex:  00000-000">
                                            </div>
                                        </div>
                                    </div>
                               
                                                                                        <div class="col-md-12">
                                        <b>CPF</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="cpffunc" value="<?php echo $dados['CPF']; ?>" class="form-control cpf-func" placeholder="Ex:  00000-000">
                                            </div>
                                        </div>
                                    </div>
<div class="col-md-12">
                                                                            <b>RG</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="rgfunc" value="<?php echo $dados['RG']; ?>" class="form-control rg-func" placeholder="Ex:  00.000.000-X">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
<label for="salariofunc">Salario</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="salariofunc" id="salariofunc" value="<?php echo $dados['SALARIO']; ?>" OnKeyPress="formatar('#######.00', this)" class="form-control" placeholder="Ex: 99999999.99" maxlength="10">
                                    </div>
                                </div>
                                    </div>




                                                                    <div class="col-md-12">
                                    <p>
                                        <b>Tipo de Funcionario</b>
                                    </p>
                                    <select class="form-control show-tick" data-live-search="true" value="<?php echo $dadosu['tipo']; ?>" name="tipofunc">



<?php if($_SESSION['validar']['tipo'] == 'Administrador'){ ?>

               
                <option value="Administrador">Administrador</option>
                <option value="Gerente">Gerente</option>
                <option value="Normal">Normal</option>


          <?php  } ?>

         <?php if($_SESSION['validar']['tipo'] == 'Gerente'){ ?> 


                <option value="Gerente">Gerente</option>
                <option value="Normal">Normal</option>
             


           <?php  } ?>
     



                                    </select>
                                </div>


                                                                    <div class="col-md-12">
                                    <p>
                                        <b>ID Da Empresa</b>
                                    </p>
                                    <select class="form-control show-tick" data-live-search="true" value="<?php echo $dados['EMPRESA_ID']; ?>" name="idempresafunc">

          <?php if($dadose) { ?>


          <?php foreach($dadose as $empresas){ ?>

                <option value="<?php echo $empresas['ID']?>"><?php echo $empresas['ID']?> - <?php echo $empresas['NOME']?></option>

            <?php }} ?>


                                    </select>
                                </div>






                                <br>
                                <input type="submit" class="btn btn-primary m-t-15 waves-effect"></input>
                   </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
            
            <!-- #END# Multi Column -->
    
    </section>

    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="../../plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="../../plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="../../plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="../../plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

</html>