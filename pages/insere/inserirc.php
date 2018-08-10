<?php

session_start();
require_once '../config.php';







$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);




if(isset($_POST["celularclientes"]) && isset($_POST["telefoneclientes"]) && isset($_POST["ruaclientes"]) && isset($_POST["bairroclientes"]) && isset($_POST["cidadeclientes"]) && isset($_POST["estadoclientes"]) && isset($_POST["numeroclientes"]) && isset($_POST["complementoclientes"]) && isset($_POST["cepclientes"]) && isset($_POST["cpfclientes"]) && isset($_POST["nomeclientes"]) && isset($_POST["emailclientes"])){

   if(!empty($_POST["celularclientes"]) && !empty($_POST["telefoneclientes"]) && !empty($_POST["ruaclientes"]) && !empty($_POST["bairroclientes"]) && !empty($_POST["cidadeclientes"]) && !empty($_POST["estadoclientes"]) && !empty($_POST["numeroclientes"]) && !empty($_POST["complementoclientes"]) && !empty($_POST["cepclientes"]) && !empty($_POST["cpfclientes"]) && !empty($_POST["nomeclientes"]) && !empty($_POST["emailclientes"])){

$end = '';

$end .= 'Rua '.$_POST['ruaclientes'].','.$_POST['numeroclientes'].' '.$_POST['complementoclientes'].'- Bairro'.$_POST['bairroclientes'].'/ CEP-'.$_POST['cepclientes'].'-'.$_POST['cidadeclientes'].' '.$_POST['estadoclientes'];

      $sql = "insert into cliente(ID, CPF, NOME, EMAIL, TELEFONE, CELULAR, UF, CIDADE, BAIRRO, RUA, CEP, NUMERO, COMPLEMENTO, ENDERECO) values(null,'".$_POST['cpfclientes']."','".$_POST['nomeclientes']."','".$_POST['emailclientes']."','".$_POST["telefoneclientes"]."','".$_POST['celularclientes']."','".$_POST['estadoclientes']."','".$_POST['cidadeclientes']."','".$_POST['bairroclientes']."','".$_POST['ruaclientes']."','".$_POST['cepclientes']."','".$_POST['numeroclientes']."','".$_POST['complementoclientes']."','".$end."')";


      if($con->query($sql) == true){




         echo 
         "
         <script>
         alert('Cliente inserido com sucesso!');
                 window.location.href='../forms/cliente.php';
       

         </script>
         ";

}
      else{

 echo 
         "
         <script>
         alert('Erro ao cadastrar o cliente!');
                          window.location.href='../forms/cliente.php';

         </script>
         ";

      }
$con->close();

}

 echo 
         "
         <script>
         alert('Digite em todos os campos!');
                          window.location.href='../forms/cliente.php';

         </script>
         ";


}

 echo 
         "
         <script>
                 window.location.href='../forms/cliente.php';
         </script>
         ";


?>