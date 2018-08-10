<?php
session_start();
require_once '../config.php';

$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$datafunc = $_POST["datafunc"];

$date1 = strtr($datafunc, '/', '-');
$sqlDate = date('Y-m-d', strtotime($date1));

if(isset($_POST["iddespesa"]) && isset($_POST["nomedespesa"]) && isset($sqlDate) && isset($_POST["valordespesa"]) && isset($_POST["idempresadespesa"])){

   if(!empty($_POST["iddespesa"]) && !empty($_POST["nomedespesa"]) && !empty($sqlDate) && !empty($_POST["valordespesa"]) && !empty($_POST["idempresadespesa"])){


      $sql = "update despesa set NOME = '".$_POST['nomedespesa']."', VALOR = '".$_POST['valordespesa']."', DATA_VENCIMENTO = '".$sqlDate."' where despesa.ID = '".$_POST['iddespesa']."'";

      if($con->query($sql) == true){


         echo 
         "
         <script>
                 window.location.href='../tables/despesas.php';
       

         </script>
         ";



      }
      else{

 echo 
         "
         <script>
                 window.location.href='../tables/despesas.php';
         </script>
         ";

      }
$con->close();

}


 echo 
         "
         <script>
                 window.location.href='../tables/despesas.php';
         </script>
         ";
}

 echo 
         "
         <script>       
                 window.location.href='../tables/despesas.php';
         </script>
         ";


?>