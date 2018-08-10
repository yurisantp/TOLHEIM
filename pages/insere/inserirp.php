<?php

session_start();
require_once '../config.php';







$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);




if(isset($_POST["estoqueproduto"]) && isset($_POST["nomeproduto"]) && isset($_POST["descricaoproduto"]) && isset($_POST["valorproduto"])){

   if(!empty($_POST["estoqueproduto"]) && !empty($_POST["nomeproduto"]) && !empty($_POST["descricaoproduto"]) && !empty($_POST["valorproduto"])){


      $sql = "insert into produto(ID, QUANTIDADE, NOME, DESCRICAO, VALOR, EMPRESA_ID, img) values(null,'".$_POST['estoqueproduto']."','".$_POST['nomeproduto']."','".$_POST['descricaoproduto']."','".$_POST['valorproduto']."','".$_POST['idempresaproduto']."', null)";


      if($con->query($sql) == true){


         echo 
         "
         <script>
         alert('Produto inserido com sucesso!');
                 window.location.href='../forms/produtos.php';
       

         </script>
         ";



      }
      else{

 echo 
         "
         <script>
         alert('Erro ao cadastrar o produto!');
                 window.location.href='../forms/produtos.php';
         </script>
         ";

      }
$con->close();

}

 echo 
         "
         <script>
         alert('Digite em todos os campos!');
                 window.location.href='../forms/produtos.php';
         </script>
         ";


}

 echo 
         "
         <script>
                 window.location.href='../forms/produtos.php';
         </script>
         ";


?>