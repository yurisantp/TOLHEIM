<?php
session_start();
require_once '../config.php';

$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);



if(isset($_POST["idproduto"]) && isset($_POST["estoqueproduto"]) && isset($_POST["nomeproduto"]) && isset($_POST["descricaoproduto"]) && isset($_POST["valorproduto"]) && isset($_POST["idempresaproduto"])){

   if(!empty($_POST["idproduto"]) && !empty($_POST["estoqueproduto"]) && !empty($_POST["nomeproduto"]) && !empty($_POST["descricaoproduto"]) && !empty($_POST["valorproduto"]) && !empty($_POST["idempresaproduto"])){


      $sql = "update produto set QUANTIDADE = '".$_POST['estoqueproduto']."', NOME = '".$_POST['nomeproduto']."', DESCRICAO = '".$_POST['descricaoproduto']."', VALOR = '".$_POST['valorproduto']."', EMPRESA_ID = '".$_POST['idempresaproduto']."' where produto.ID = '".$_POST['idproduto']."'";

      if($con->query($sql) == true){


         echo 
         "
         <script>
                 window.location.href='../tables/produtos.php';
       

         </script>
         ";



      }
      else{

 echo 
         "
         <script>
                 window.location.href='../tables/produtos.php';
         </script>
         ";

      }
$con->close();

}


 echo 
         "
         <script>
                 window.location.href='../tables/produtos.php';
         </script>
         ";
}

 echo 
         "
         <script>       

         </script>
         ";


?>