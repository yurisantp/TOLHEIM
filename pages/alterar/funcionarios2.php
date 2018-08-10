<?php
session_start();
require_once '../config.php';

$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$datafunc = $_POST["datafunc"];

$date1 = strtr($datafunc, '/', '-');
$sqlDate = date('Y-m-d', strtotime($date1));

if(isset($_POST["idfunc"]) && isset($_POST["celularfunc"]) && isset($_POST["telefonefunc"]) && isset($sqlDate) && isset($_POST["ruafunc"]) && isset($_POST["bairrofunc"]) && isset($_POST["cidadefunc"]) && isset($_POST["estadofunc"]) && isset($_POST["numerofunc"]) && isset($_POST["complementofunc"]) && isset($_POST["cepfunc"]) && isset($_POST["cpffunc"]) && isset($_POST["nomefunc"]) && isset($_POST["rgfunc"]) && isset($_POST["idempresafunc"]) && isset($_POST["loginfunc"]) && isset($_POST["senhafunc"]) && isset($_POST["tipofunc"]) && isset($_POST["salariofunc"])){

   if(!empty($_POST["idfunc"]) && !empty($_POST["celularfunc"]) && !empty($_POST["telefonefunc"]) && !empty($sqlDate) && !empty($_POST["ruafunc"]) && !empty($_POST["bairrofunc"]) && !empty($_POST["cidadefunc"]) && !empty($_POST["estadofunc"]) && !empty($_POST["numerofunc"]) && !empty($_POST["complementofunc"]) && !empty($_POST["cepfunc"]) && !empty($_POST["cpffunc"]) && !empty($_POST["nomefunc"]) && !empty($_POST["rgfunc"]) && !empty($_POST["idempresafunc"]) && !empty($_POST["loginfunc"]) && !empty($_POST["senhafunc"]) && !empty($_POST["tipofunc"]) && !empty($_POST["salariofunc"])){

$end = '';

$end .= 'Rua '.$_POST['ruafunc'].','.$_POST['numerofunc'].' '.$_POST['complementofunc'].'- Bairro'.$_POST['bairrofunc'].'/ CEP-'.$_POST['cepfunc'].'-'.$_POST['cidadefunc'].' '.$_POST['estadofunc'];


      $sql = "update funcionario set CELULAR = '".$_POST['celularfunc']."', DATA_ADMISSAO = '".$sqlDate."', TELEFONE = '".$_POST['telefonefunc']."', RUA = '".$_POST['ruafunc']."', ENDERECO = '".$end."', NOME = '".$_POST['nomefunc']."', CPF = '".$_POST['cpffunc']."', RG = '".$_POST['rgfunc']."', SALARIO = '".$_POST['salariofunc']."', CIDADE = '".$_POST['cidadefunc']."', ESTADO = '".$_POST['estadofunc']."', NUMERO = '".$_POST['numerofunc']."', COMPLEMENTO = '".$_POST['complementofunc']."', cep = '".$_POST['cepfunc']."', EMPRESA_ID = '".$_POST['idempresafunc']."' where funcionario.ID = '".$_POST['idfunc']."'";

      if($con->query($sql) == true){





      

            $sql2 = "update usuario set login = '".$_POST['loginfunc']."', senha = '".$_POST['senhafunc']."', tipo = '".$_POST['tipofunc']."' where usuario.funcionario_id = '".$_POST['idfunc']."'";


      if($con->query($sql2) == true){


         echo 
         "
         <script>
   
                 window.location.href='../tables/funcionarios.php';
         </script>
         ";



      }

    }

      else{

 echo 
         "
         <script>

                 window.location.href='../tables/funcionarios.php';
         </script>
         ";



      }
$con->close();

}

         echo 
         "
         <script>
   
                 window.location.href='../tables/funcionarios.php';
         </script>
         ";

}
         echo 
         "
         <script>
   
                 window.location.href='../tables/funcionarios.php';
         </script>
         ";


?>