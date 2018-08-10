<?php

$login = $_POST['loginUsername'];
$senha = $_POST['loginPassword'];

session_start();


require_once 'config.php';


$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);



if(isset($_POST["loginUsername"]) && isset($_POST["loginPassword"])){

   if(!empty($_POST["loginUsername"]) && !empty($_POST["loginPassword"])){


   	$sql = "select * from usuario where login = '".$_POST['loginUsername']."' and senha = '".$_POST['loginPassword']."';";


   	$result = $con->query($sql);

   	if($result->num_rows > 0){

$_SESSION['validar']=$result->fetch_assoc();

   		echo 
   		"
   		<script>
   		alert('Bem vindo!');
   		window.location.href='../hud.php';
   		</script>
   		";

$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
   		
   	}
	
	else{
		


	echo 
   		"
   		<script>
   		alert('Login ou senha incorretos!');
   		window.location.href='../index.php';
   		</script>
   		";
		
			unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
 	}
	
	

   	$con->close();


   }

else{
header("location:index.php");

}

}
else{
header("location:index.php");

}


?>