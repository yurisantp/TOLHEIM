<?php

require_once '../../../pages/config.php';


$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);


$sql = "SELECT SUM(VALOR) FROM VENDA";

$result = $con->query($sql);


if($result->num_rows > 0){

$vs = mysqli_fetch_all($result,MYSQLI_ASSOC);



}


$sql = "SELECT SUM(VALOR) FROM DESPESA";

$result = $con->query($sql);


if($result->num_rows > 0){

$vfi = mysqli_fetch_all($result,MYSQLI_ASSOC);


}

$sql = "SELECT * FROM EMPRESA";

$result = $con->query($sql);


if($result->num_rows > 0){

$emp = mysqli_fetch_all($result,MYSQLI_ASSOC);


}








?>
$(function () {
    getMorris('bar', 'bar_chart');
});


function getMorris(type, element) {
   
if (type === 'bar') {
        Morris.Bar({
            element: element,
            data: [{
                x: '<?php echo $emp[0]['NOME']; ?>',
                y: <?php echo $vs[0]['SUM(VALOR)']; ?>,
                z: <?php echo $vfi[0]['SUM(VALOR)'];?>,
            }],
            xkey: 'x',
            ykeys: ['y', 'z'],
            labels: ['Lucros', 'Despesas'],
            barColors: ['rgb(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>)', 'rgb(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>)'],
        });
     
    }
}