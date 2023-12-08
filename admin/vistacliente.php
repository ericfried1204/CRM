<?php error_reporting(0);?>
<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<style>
	input[type="text"]
	{
	    font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
	}

	.btn-outline:hover {
	  color: #fff;
	  background-color: #092f56;
	  border-color: #092f56; 
	}

	textarea { 
		font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
	}

	textarea.text_area{
        height: 8em;
        font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
      }

	</style>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/deskapp-logo-svg.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DETALHES DE PAGAMENTO</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="pagamentospendentes.php">Pagamentos Pendentes</a></li>
									<li class="breadcrumb-item active" aria-current="page">Cartas - Pagamentos</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Informações de Pagamento</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<form method="post" action="">

						<?php 
						if(!isset($_GET['cod_cliente']) && empty($_GET['cod_cliente'])){
							header('Location: admin_dashboard.php');
						}
						else {
						
						$lid=$_GET['cod_cliente'];
						$sql = "SELECT * FROM tblclientes where cod_cliente=:lid";
						$query = $dbh -> prepare($sql);
						$query->bindParam(':lid',$lid,PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{         
						?>  

						<div class="row">
						<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Código Cliente</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->cod_cliente);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Nome</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->nomecliente);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Nif</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-success" readonly value="<?php echo htmlentities($result->nif);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Contacto</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->contacto);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Email</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->email);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Data Registo</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->dataregisto);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Limite Crédito</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->limitecredito);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Limite Idade Saldo</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->limiteidadesaldo);?>">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label style="font-size:16px;"><b>Total Débito</b></label>
									<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->totaldebito);?>">
								</div>
							</div>
					    		</div>
						<?php $cnt++;} } }?>
					</form>
				</div>

			</div>
			
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
</body>
</html>