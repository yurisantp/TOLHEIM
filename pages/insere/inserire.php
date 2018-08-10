<?php

session_start();
require_once '../config.php';







$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);




if(isset($_POST["nomeempresa"]) && isset($_POST["responsavelempresa"]) && isset($_POST["enderecoempresa"]) && isset($_POST["telefoneempresa"]) && isset($_POST["cnpjempresa"])){

   if(!empty($_POST["nomeempresa"]) && !empty($_POST["responsavelempresa"]) && !empty($_POST["enderecoempresa"]) && !empty($_POST["telefoneempresa"]) && !empty($_POST["cnpjempresa"])){


      $sql = "insert into empresa(ID, NOME, RESPONSAVEL, ENDERECO, TELEFONE, CNPJ) values(null,'".$_POST['nomeempresa']."','".$_POST['responsavelempresa']."','".$_POST['enderecoempresa']."','".$_POST['telefoneempresa']."','".$_POST['cnpjempresa']."')";


      if($con->query($sql) == true){


         echo 
         "
         <script>
         alert('Empresa cadastrada com sucesso!');
                 window.location.href='../forms/empresas.php';
       

         </script>
         ";



      }
      else{

 echo 
         "
         <script>
         alert('Erro ao cadastrar a empresa!');
                 window.location.href='../forms/empresas.php';
         </script>
         ";

      }
$con->close();

}

 echo 
         "
         <script>
         alert('Digite em todos os campos!');
                 window.location.href='../forms/empresas.php';
         </script>
         ";


}

 echo 
         "
         <script>
                 window.location.href='../forms/empresas.php';
         </script>
         ";


?>