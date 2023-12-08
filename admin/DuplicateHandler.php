<?php include('../includes/session.php') ?>
<?php include('../includes/config.php') ?>
<?php
	$pre_codon=$_POST['pre_codon'];
	$cod_utilizador=$_SESSION['codigoutilizador'];
    $query = mysqli_query($conn,"select * from tblon where cod_on='$pre_codon'");
    while($row = mysqli_fetch_array($query)){
        $cod_cliente=$row['cod_cliente'];
    }
	$_SESSION['codigocliente'] =  $cod_cliente;	
    
	date_default_timezone_set('Europe/Lisbon');
	$datamomento=date('Y-m-d G:i:s ', strtotime("now"));
	$_SESSION['data'] = $datamomento;    
	$query = "INSERT INTO tblon (cod_utilizador, cod_cliente, data, estado, cod_ontracking) VALUES ('$cod_utilizador', '$cod_cliente', '$datamomento', '0', '$pre_codon')";
    $result = mysqli_query($conn, $query);
    
    $query = "SELECT cod_on FROM tblon ORDER BY cod_on DESC LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $last_id = $row['cod_on'];            
        } else {
           
        }
    } else {
        echo "Query error: " . mysqli_error($conn);
    }
    
    $_SESSION['codon']=$last_id;
    $total_data = [];
    $query = mysqli_query($conn,"select * from tblonlinhas where cod_on='$pre_codon'");
    while($row = mysqli_fetch_array($query)){
        $data=[];
        array_push($data, $last_id);
        array_push($data, $row['referencia']);
        array_push($data, $row['nomeartigo']);
        array_push($data, $row['unidade']);
        array_push($data, $row['quantidade']);
        array_push($data, $row['precounitario']);
        array_push($data, $row['iva']);
        array_push($data, $row['descontol']);
        array_push($data, $row['precol']);
        array_push($data, $row['valoriva']);
        array_push($data, $row['totallinha']);
        array_push($data, $row['totaldescontos']);
        array_push($data, $row['totalmerc']);
        array_push($total_data, $data);

    }
    $length = count($total_data);
    for ($i=0; $i<$length; $i++) {
        $cod_on = $total_data[$i][0];
        $referencia = $total_data[$i][1];
        $nomeartigo = $total_data[$i][2];
        $unidade = $total_data[$i][3];
        $quantidade = $total_data[$i][4];
        $precounitario = $total_data[$i][5];
        $iva = $total_data[$i][6];
        $descontol = $total_data[$i][7];
        $precol = $total_data[$i][8];
        $valoriva = $total_data[$i][9]; 
        $totallinha = $total_data[$i][10];
        $totaldescontos = $total_data[$i][11];
        $totalmerc = $total_data[$i][12];
        mysqli_query($conn, "INSERT INTO tblonlinhas(cod_on,referencia,nomeartigo,unidade,quantidade,precounitario,iva,descontol,precol, valoriva, totallinha,totaldescontos,totalmerc) 
        VALUES('$cod_on', '$referencia', '$nomeartigo', '$unidade', '$quantidade', '$precounitario', '$iva', '$descontol', '$precol', '$valoriva', '$totallinha', '$totaldescontos', '$totalmerc')") or die(mysqli_error());
    }   
    header("Location: criaron2.php");

?>