  <?php 
require_once '../../pages/config.php';


$con = mysqli_connect(DB_SERVER,DB_USUARIO,DB_SENHA,DB_BANCO);

$ano = "SELECT DISTINCT YEAR(DATA_VENDA) as ano FROM venda";
        $ano2 = $con->query($ano);

        if($ano2->num_rows > 0){

$anof = mysqli_fetch_all($ano2,MYSQLI_ASSOC);



}

foreach ($anof as &$row) {
    $ano = $row['ano'];






    for ($i=1; $i<=12; $i++) {
        $item = "SELECT SUM(valor) FROM venda WHERE YEAR(DATA_VENDA) = '".$ano."' AND MONTH(DATA_VENDA) = '".$i."'";



      $result = $con->query($item);



$venda[$i.$ano] = mysqli_fetch_assoc($result);

$venda[$i.$ano]['mes'] = $i;

$venda[$i.$ano]['ano'] = $ano;

        $item = "SELECT SUM(VALOR) FROM despesa WHERE YEAR(DATA_VENCIMENTO) = '".$ano."' AND MONTH(DATA_VENCIMENTO) = '".$i."'";

              $result = $con->query($item);



$venda[$i.$ano]['despesa'] = mysqli_fetch_assoc($result);


}

}



?>


var data = [], totalPoints = 110;
function getRandomData() {
    if (data.length > 0) data = data.slice(1);

    while (data.length < totalPoints) {
        var prev = data.length > 0 ? data[data.length - 1] : 50, y = prev + Math.random() * 10 - 5;
        if (y < 0) { y = 0; } else if (y > 100) { y = 100; }

        data.push(y);
    }

    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]]);
    }

    return res;
}

function getMorris(type, element) {
    if (type === 'line') {
        Morris.Line({
            element: element,
            data: [
<?php foreach ($venda as &$vf) { ?>
<?php if(null !== $vf['SUM(valor)'] AND null !== $vf['despesa']['SUM(VALOR)']) {   ?>

            {
                Periodo: '<?php echo $vf['mes']; ?>/<?php echo $vf['ano']; ?>',
                Vendas: <?php echo $vf['SUM(valor)']; ?>,
                Despesas: <?php echo $vf['despesa']['SUM(VALOR)']; ?>
            },

<?php } ?>
<?php } ?>

            ],
  xkey: 'Periodo',
            ykeys: ['Vendas', 'Despesas'],
            labels: ['Vendas', 'Despesas'],
            lineColors: ['rgb(0, 255, 127)', 'rgb(255, 0, 0)'],
            lineWidth: 3
        });
    }
}
