<?php

session_start();
require_once '../config.php';




$datafunc = $_POST["datafunc"];

$date1 = strtr($datafunc, '/', '-');
$sqlDate = date('Y-m-d', strtotime($date1));


$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);




if(isset($_POST["nomedespesa"]) && isset($_POST["valordespesa"]) && isset($sqlDate) && isset($_POST["idempresadespesa"])){

   if(!empty($_POST["nomedespesa"]) && !empty($_POST["valordespesa"]) && !empty($sqlDate) && !empty($_POST["idempresadespesa"])){


      $sql = "insert into despesa(ID, NOME, VALOR, DATA_VENCIMENTO, EMPRESA_ID) values(null,'".$_POST['nomedespesa']."','".$_POST['valordespesa']."','".$sqlDate."','".$_POST['idempresadespesa']."')";


      if($con->query($sql) == true){


         echo 
         "
         <script>
         alert('Despesa inserido com sucesso!');
                 window.location.href='../forms/despesas.php';
       

         </script>
         ";



      }
      else{

 echo 
         "
         <script>
         alert('Erro ao cadastrar a despesa!');
                 window.location.href='../forms/despesas.php';
         </script>
         ";

      }
$con->close();

}

 echo 
         "
         <script>
         alert('Digite em todos os campos!');
                 window.location.href='../forms/despesas.php';
         </script>
         ";


}

 echo 
         "
         <script>
                  alert('Se fuder velho!');
                 window.location.href='../forms/despesas.php';
         </script>
         ";


?>