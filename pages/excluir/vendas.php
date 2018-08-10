<?php

session_start();
require_once '../config.php';




$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);




if(isset($_GET['id'])){

   if(!empty($_GET['id'])){


    $sql1 = "Delete from item_venda where VENDA_ID = '".$_GET['id']."';
";
$con->query($sql1);

      $sql2 = "Delete from venda where ID = '".$_GET['id']."';
";

      if($con->query($sql2) == true){


         echo 
         "
         <script>
         alert('Venda deletada com sucesso!');
                 window.location.href='../tables/vendas.php';
       

         </script>
         ";



      }
      else{

 echo 
         "
         <script>
         alert('ID inexistente!');
                 window.location.href='../tables/vendas.php';
         </script>
         ";

      }
$con->close();

}

 echo 
         "
         <script>
         alert('Digite o id!');
                 window.location.href='../tables/vendas.php';
         </script>
         ";

}

 echo 
         "
         <script>
                 window.location.href='../tables/vendas.php';
         </script>
         ";













?>