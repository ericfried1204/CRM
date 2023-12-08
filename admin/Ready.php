<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php

	$cod_utilizador=$session_id;
	$cod_cliente=$_POST['codcliente'];
	// $nomecliente=$_POST['nomecliente'];

	$_SESSION['codigocliente'] = $cod_cliente;
	$_SESSION['codigoutilizador'] = $cod_utilizador;


	date_default_timezone_set('Europe/Lisbon');
	$datamomento=date('Y-m-d G:i:s ', strtotime("now"));
	$_SESSION['data'] = $datamomento;
	$file = 'example.txt';
	$text = 'This is test'.$cod_cliente;

	// Write the text to the file
	file_put_contents($file, $text);

	mysqli_query($conn,"INSERT INTO tblon(cod_utilizador,cod_cliente,data,estado,cod_ontracking) VALUES('$cod_utilizador','$cod_cliente','$datamomento','0','0')") or die(mysqli_error());
    header('Location: criaron2.php');
?>