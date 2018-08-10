<?php

session_start();
require_once '../config.php';

$datafunc = $_POST["datafunc"];

$date1 = strtr($datafunc, '/', '-');
$sqlDate = date('Y-m-d', strtotime($date1));







$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);




if(isset($_POST["celularfunc"]) && isset($_POST["telefonefunc"]) && isset($sqlDate) && isset($_POST["ruafunc"]) && isset($_POST["bairrofunc"]) && isset($_POST["cidadefunc"]) && isset($_POST["estadofunc"]) && isset($_POST["numerofunc"]) && isset($_POST["complementofunc"]) && isset($_POST["cepfunc"]) && isset($_POST["cpffunc"]) && isset($_POST["nomefunc"]) && isset($_POST["rgfunc"]) && isset($_POST["idempresafunc"]) && isset($_POST["loginfunc"]) && isset($_POST["senhafunc"]) && isset($_POST["tipofunc"]) && isset($_POST["salariofunc"])){

   if(!empty($_POST["celularfunc"]) && !empty($_POST["telefonefunc"]) && !empty($sqlDate) && !empty($_POST["ruafunc"]) && !empty($_POST["bairrofunc"]) && !empty($_POST["cidadefunc"]) && !empty($_POST["estadofunc"]) && !empty($_POST["numerofunc"]) && !empty($_POST["complementofunc"]) && !empty($_POST["cepfunc"]) && !empty($_POST["cpffunc"]) && !empty($_POST["nomefunc"]) && !empty($_POST["rgfunc"]) && !empty($_POST["idempresafunc"]) && !empty($_POST["loginfunc"]) && !empty($_POST["senhafunc"]) && !empty($_POST["tipofunc"]) && !empty($_POST["salariofunc"])){

$end = '';

$end .= 'Rua '.$_POST['ruafunc'].','.$_POST['numerofunc'].' '.$_POST['complementofunc'].'- Bairro'.$_POST['bairrofunc'].'/ CEP-'.$_POST['cepfunc'].'-'.$_POST['cidadefunc'].' '.$_POST['estadofunc'];

      $sql = "insert into funcionario(ID, CELULAR, TELEFONE, DATA_ADMISSAO, ENDERECO, RUA, BAIRRO, CIDADE, ESTADO, NUMERO, COMPLEMENTO, cep, NOME, CPF, RG, SALARIO, EMPRESA_ID) values(null,'".$_POST['celularfunc']."','".$_POST['telefonefunc']."', '".$sqlDate."','".$end."','".$_POST['ruafunc']."','".$_POST['bairrofunc']."','".$_POST['cidadefunc']."','".$_POST['estadofunc']."','".$_POST['numerofunc']."','".$_POST['complementofunc']."','".$_POST['cepfunc']."','".$_POST['nomefunc']."','".$_POST['cpffunc']."','".$_POST['rgfunc']."','".$_POST['salariofunc']."','".$_POST['idempresafunc']."')";


      if($con->query($sql) == true){

                 $last = ("Select last_insert_id() as id");
        $id2 = $con->query($last);

        $id = mysqli_fetch_assoc($id2);

              $usuario = "insert into usuario(id, login, senha, tipo, funcionario_id) values(null,'".$_POST['loginfunc']."','".$_POST['senhafunc']."','".$_POST['tipofunc']."','".$id['id']."')";

      if($con->query($usuario) == true){


         echo 
         "
         <script>
         alert('Funcionario inserido com sucesso!');
                 window.location.href='../forms/funcionarios.php';
       

         </script>
         ";

}
         echo 
         "
         <script>
         alert('Erro!');
                 window.location.href='../forms/funcionarios.php';
       

         </script>
         ";
      }
      else{

 echo 
         "
         <script>
         alert('Erro ao cadastrar o produto!');
                          window.location.href='../forms/funcionarios.php';

         </script>
         ";

      }
$con->close();

}

 echo 
         "
         <script>
         alert('Digite em todos os campos!');
                          window.location.href='../forms/funcionarios.php';

         </script>
         ";


}

 echo 
         "
         <script>
                 window.location.href='../forms/funcionarios.php';
         </script>
         ";


?>