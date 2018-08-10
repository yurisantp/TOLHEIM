<?php
session_start();
require_once '../config.php';

$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);



if(isset($_POST["idclientes"]) && isset($_POST["celularclientes"]) && isset($_POST["telefoneclientes"]) && isset($_POST["ruaclientes"]) && isset($_POST["bairroclientes"]) && isset($_POST["cidadeclientes"]) && isset($_POST["estadoclientes"]) && isset($_POST["numeroclientes"]) && isset($_POST["complementoclientes"]) && isset($_POST["cepclientes"]) && isset($_POST["nomeclientes"])){

   if(!empty($_POST["idclientes"]) && !empty($_POST["celularclientes"]) && !empty($_POST["telefoneclientes"]) && !empty($_POST["ruaclientes"]) && !empty($_POST["bairroclientes"]) && !empty($_POST["cidadeclientes"]) && !empty($_POST["estadoclientes"]) && !empty($_POST["numeroclientes"]) && !empty($_POST["complementoclientes"]) && !empty($_POST["cepclientes"]) && !empty($_POST["nomeclientes"])){

$end = '';

$end .= 'Rua '.$_POST['ruaclientes'].','.$_POST['numeroclientes'].' '.$_POST['complementoclientes'].'- Bairro'.$_POST['bairroclientes'].'/ CEP-'.$_POST['cepclientes'].'-'.$_POST['cidadeclientes'].' '.$_POST['estadoclientes'];


      $sql = "update cliente set CELULAR = '".$_POST['celularclientes']."', TELEFONE = '".$_POST['telefoneclientes']."', RUA = '".$_POST['ruaclientes']."', ENDERECO = '".$end."', NOME = '".$_POST['nomeclientes']."', CIDADE = '".$_POST['cidadeclientes']."', UF = '".$_POST['estadoclientes']."', NUMERO = '".$_POST['numeroclientes']."', COMPLEMENTO = '".$_POST['complementoclientes']."', CEP = '".$_POST['cepclientes']."' where cliente.ID = '".$_POST['idclientes']."'";

      if($con->query($sql) == true){





      



         echo 
         "
         <script>
   
                 window.location.href='../tables/funcionarios.php';
         </script>
         ";




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
   
         </script>
         ";


?>