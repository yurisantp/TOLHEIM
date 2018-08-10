<?php


require_once 'config.php';

function listarProdutos(){

$conn = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "select * from produto";

$result = $conn->query($sql);


if($result->num_rows > 0){

return $lista = mysqli_fetch_all($result,MYSQLI_ASSOC);



}

}
function listarVendasOrdem(){

$conn = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "select * 
from venda
ORDER BY DATA_VENDA DESC, HORA_VENDA DESC
LIMIT 6;";

$result = $conn->query($sql);


if($result->num_rows > 0){

return $lista = mysqli_fetch_all($result,MYSQLI_ASSOC);



}





$conn->close();


}
function listarClientesOrdem(){

$conn = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "select * 
from cliente
ORDER BY ID DESC
LIMIT 6;";

$result = $conn->query($sql);


if($result->num_rows > 0){

return $lista = mysqli_fetch_all($result,MYSQLI_ASSOC);



}





$conn->close();


}

function listarVendas(){

$conn = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "select * from venda";

$result = $conn->query($sql);


if($result->num_rows > 0){

return $lista = mysqli_fetch_all($result,MYSQLI_ASSOC);



}






$conn->close();


}

function listarDespesas(){

$conn = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "select * from despesa";

$result = $conn->query($sql);


if($result->num_rows > 0){

return $lista = mysqli_fetch_all($result,MYSQLI_ASSOC);



}





$conn->close();


}

function listarFuncionarios(){

$conn = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "select * from funcionario";

$result = $conn->query($sql);


if($result->num_rows > 0){

return $lista = mysqli_fetch_all($result,MYSQLI_ASSOC);



}


else{

return "nenhum valor encontrado";




}



$conn->close();



}

function listarEmpresas(){

$conn = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "select * from empresa";

$result = $conn->query($sql);


if($result->num_rows > 0){

return $lista = mysqli_fetch_all($result,MYSQLI_ASSOC);



}


else{

return "nenhum valor encontrado";




}



$conn->close();


}

function listarClientes(){

$conn = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$sql = "select * from cliente";

$result = $conn->query($sql);


if($result->num_rows > 0){

return $lista = mysqli_fetch_all($result,MYSQLI_ASSOC);



}






$conn->close();


}

?>