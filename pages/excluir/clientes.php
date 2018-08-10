<?php

session_start();
require_once 'config.php';




$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);




if(isset($_GET['id'])){

   if(!empty($_GET['id'])){


      $sql = "Delete from cliente where ID = '".$_GET['id']."';";

      if($con->query($sql) == true){


         echo 
         "
         <script>
         alert('Cliente deletado com sucesso!');
                 window.location.href='../tables/clientes.php';
       

         </script>
         ";



      }
      else{

 echo 
         "
         <script>
         alert('ID inexistente!');
                 window.location.href='../tables/clientes.php';

         </script>
         ";

      }
$con->close();

}

 echo 
         "
         <script>
         alert('Digite o id!');
                 window.location.href='../tables/clientes.php';

         </script>
         ";

}

 echo 
         "
         <script>
                 window.location.href='../tables/clientes.php';

         </script>
         ";













?>