<?php

session_start();
require_once '../config.php';



require_once '../listar.php';



$dadosp = listarProdutos();



$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);







if(isset($_POST["idfuncionariovenda"]) && isset($_POST["cpfvenda"])){

   if(!empty($_POST["idfuncionariovenda"]) && !empty($_POST["cpfvenda"])){

    date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');
$hora = date('H:i:s');

$sd = "SELECT COUNT(ID) AS total FROM produto;";



$result = $con->query($sd);



$number = mysqli_fetch_assoc($result);


      $sql = "insert into venda(ID, VALOR, DESCRICAO, OBSERVACAO, DATA_VENDA, HORA_VENDA, CLIENTE_CPF, FUNCIONARIO_ID) values(null,null,null,null,'".$data."','".$hora."','".$_POST['cpfvenda']."','".$_POST['idfuncionariovenda']."')";

echo $sql;
      if($con->query($sql) == true){
       
         $last = ("Select last_insert_id() as id");
        $id2 = $con->query($last);

        $id = mysqli_fetch_assoc($id2);
      
      
$totalf = 0;
$descfinal = '';
$b = 1;



        foreach($dadosp as $produto)
        {

$i = $produto['ID'];

    if($_POST[$i] > 0 AND isset($_POST[$i])){






$total = $produto['VALOR'] * $_POST[$i];


$totalf += $total;



$descfinal .= $_POST[$i].' x '.$produto['NOME'].' - '.$total.'/';


      $item = "insert into item_venda(ID, QUANTIDADE, NOME, DESCRICAO, VALOR_UNITARIO, TOTAL, PRODUTO_ID, VENDA_ID) values(null,'".$_POST[$i]."','".$produto['NOME']."','".$produto['NOME']."','".$produto['VALOR']."','".$total."','".$produto['ID']."','".$id['id']."')";

$quantf = $produto['QUANTIDADE'] - $_POST[$i];

      $con->query($item);

      $update = "update produto set QUANTIDADE = '".$quantf."' where produto.ID = '".$produto['ID']."';";
echo $update;
            $con->query($update);





$b++;


    }




}


    if($b == 1)
    {





 $del = "Delete from venda where id = '".$id['id']."'";


  $con->query($del);


      echo 
         "
         <script>
         alert('Voce não selecionou produtos!');
                          window.location.href='../forms/vendas.php';

         </script>
         ";



    }




else{


$update = "update venda set valor = '".$totalf."', descricao = '".$descfinal."' where venda.id = '".$id['id']."';";




     $con->query($update);


      echo 
         "
         <script>
         alert('Venda Cadastrada!');
                          window.location.href='../forms/vendas.php';

         </script>
         ";


}



      }
      else{

 echo 
         "
         <script>
         alert('Erro ao cadastrar a venda!');
                          window.location.href='../forms/vendas.php';

         </script>
         ";

      }
$con->close();

}

 echo 
         "
         <script>
                          window.location.href='../forms/vendas.php';
         </script>
         ";


}

 echo 
         "
         <script>        
                          window.location.href='../forms/vendas.php';
                           </script>
         ";


?>