<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>
<?php include('../includes/config.php') ?>
<?php
    // var_dump($_GET['edit']);
    // var_dump($_POST['cod_onlinha']);
    $cod_onlinha=$_POST['cod_onlinha'];
    // var_dump($cod_onlinha);
    $query = mysqli_query($conn, "DELETE  from tblonlinhas where cod_onlinha='$cod_onlinha'") or die(mysqli_error());
    header("Location: criaron2.php");
    die();
?>
