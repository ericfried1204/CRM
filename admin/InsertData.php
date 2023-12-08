<?php include('../includes/session.php') ?>
<?php include('../includes/config.php') ?>
<?php


    $cod_on = $_SESSION['codon'];
    $referencia = $_POST['codartigo'];
    $nomeartigo = $_POST['product_name'];
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
    $output=[];    
    array_push($output, $cod_on);
    array_push($output, $referencia);
    array_push($output, $nomeartigo);
    array_push($output, $unidade);
    array_push($output, $quantidade);
    array_push($output, $descontol);
    array_push($output, $iva);
    array_push($output, $price);
    $txt=json_encode($output);
    $file = "example.txt";
    file_put_contents($file, $output);

 

    mysqli_query($conn, "INSERT INTO tblonlinhas(cod_on,referencia,nomeartigo,unidade,quantidade,precounitario,iva,descontol,precol, valoriva, totallinha,totaldescontos,totalmerc) 
    VALUES('$cod_on', '$referencia', '$nomeartigo', '$unidade', '$quantidade', '$price', '$iva', '$descontol', '$precol', '$valoriva', '$totallinha', '$totaldescontos', '$totalmerc')") or die(mysqli_error());
    header("Location: criaron2.php");

?>