<?php
session_start();
require_once 'config.php';

$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);



if(isset($_POST["iddespesa"]) && isset($_POST["nomedespesa"]) && isset($_POST["datavencimentodespesa"]) && isset($_POST["valordespesa"]) && isset($_POST["idempresadespesa"])){

   if(!empty($_POST["iddespesa"]) && !empty($_POST["nomedespesa"]) && !empty($_POST["datavencimentodespesa"]) && !empty($_POST["valordespesa"]) && !empty($_POST["idempresadespesa"])){


      $sql = "update despesa set NOME = '".$_POST['nomedespesa']."', VALOR = '".$_POST['valordespesa']."', DATA_VENCIMENTO = '".$_POST['datavencimentodespesa']."', EMPRESA_ID = '".$_POST['idempresadespesa']."' where despesa.ID = '".$_POST['iddespesa']."'";

      if($con->query($sql) == true){


         echo 
         "
         <script>

                 window.location.href='tables.php';    

         </script>
         ";



      }
      else{

 echo 
         "
         <script>
                 window.location.href='tables.php';
         </script>
         ";

      }
$con->close();

}
}


?>