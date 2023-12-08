<?php include('../includes/session.php') ?>
<?php include('../includes/config.php') ?>
<?php
$nomeartigo="";
// var_dump($_POST['codartigo']);
$query = mysqli_query($conn, "select * from tblartigos");
    while ($row = mysqli_fetch_array($query)) {
        if($row['artigo']==$_POST['codartigo']) {
            $nomeartigo=$row['descricao'];            
            break;
        }
    }
$cod_onlinha = $_POST['cod_onlinha'];

$cod_on = $_SESSION['codon'];
$referencia = $_POST['codartigo'];

$unidade = $_POST['Unidade'];
$quantidade = $_POST['quantidadelinha'];
$descontol = $_POST['desconto'];
$iva = $_POST['iva'];
$price = $_POST['product_price'];


$precolimpo = str_replace(".", "", $price); // Remove the comma
$precon = floatval($precolimpo); // Convert the modified string to a float number
$desconton = floatval($descontol);
if ($desconton == 0) 
{
    $precol = $precon * $quantidade;
    $valoriva = ($precol * $iva) / 100;
    $totallinha = $precol + $valoriva;
    $totaldescontos = 0;
    $totalmerc = $precol;
}
else
{
    $precol1 = $precon * $quantidade;
    $precol2 = ($precol1 * $desconton) / 100;
    $precol = $precol1 - $precol2;
    $valoriva = ($precol * $iva) / 100;
    $totallinha = $precol + $valoriva;
    $totaldescontos = $precol2;
    $totalmerc = $precol1;
}

mysqli_query($conn, "UPDATE tblonlinhas SET cod_on='$cod_on', referencia='$referencia', nomeartigo='$nomeartigo', unidade='$unidade', quantidade='$quantidade', precounitario='$price', iva='$iva', descontol='$descontol', precol='$precol', valoriva='$valoriva', totallinha='$totallinha', totaldescontos='$totaldescontos', totalmerc='$totalmerc' WHERE cod_onlinha=$cod_onlinha") or die(mysqli_error($conn));

header("Location: criaron2.php");
?>