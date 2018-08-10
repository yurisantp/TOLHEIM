<?php

require_once '../../../pages/config.php';


$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);


$sql = "SELECT * FROM PRODUTO LIMIT 10";

$result = $con->query($sql);


if($result->num_rows > 0){

$vs = mysqli_fetch_all($result,MYSQLI_ASSOC);



}


$sql = "SELECT SUM(VALOR) FROM PRODUTO LIMIT 10";

$result = $con->query($sql);


if($result->num_rows > 0){

$vfi = mysqli_fetch_all($result,MYSQLI_ASSOC);


}








?>
$(function () {

    getMorris('donut', 'donut_chart');
});


function getMorris(type, element) {

if (type === 'donut') {
        Morris.Donut({
            element: element,
            data: [<?php $i = 1; $concatfinal = 0; ?>
<?php foreach ($vs as &$produto) { ?>
            {
                label: '<?php echo $produto['NOME']; ?>',
                value:  <?php 

$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);


$sql = "SELECT sum(TOTAL) FROM item_venda WHERE PRODUTO_ID = '".$produto['ID']."'"; 

            $v = $con->query($sql);

        $vf = mysqli_fetch_assoc($v);

                        if(empty($vf['sum(TOTAL)'])) {


$vf['sum(TOTAL)'] = 0;

        }


        echo $vf['sum(TOTAL)'];
   
    $concatfinal += $vf['sum(TOTAL)'];

$sql = "SELECT COUNT(*) FROM PRODUTO LIMIT 10";

$resulti = $con->query($sql);


if($resulti->num_rows > 0){

$vb = mysqli_fetch_all($resulti,MYSQLI_ASSOC);



}?>
}
<?php if($i < $vb[0]['COUNT(*)']) { ?>, <?php } $i++; } ?>

],<?php $i = 1; ?>
            colors: [
<?php foreach ($vs as &$produto) { 
    

$sql = "SELECT COUNT(*) FROM PRODUTO LIMIT 10";

$resulti = $con->query($sql);


if($resulti->num_rows > 0){

$vb = mysqli_fetch_all($resulti,MYSQLI_ASSOC);




}?>

            'rgb(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>)'<?php if($i < $vb[0]['COUNT(*)']) { ?>, <?php } $i++; } ?>
],
            formatter: function (y) {
                return 'R$' + y.toFixed(2)
            }
        });
    }
}
