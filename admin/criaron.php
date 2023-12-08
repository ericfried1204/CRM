<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<html>
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

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>ON - Oportunidades de Negócio</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Criar ON</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Identificação Cliente</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="Ready.php">
							<section>
								<div class="row">
										<div class="col-md-12">
									  		<div class="clearfix">
												<label>Nome Completo:</label>
													<select
															class="custom-select2 form-control"
															name="codcliente"
															style="width: 100%; height: 38px"
													>
													<?php
													$query = mysqli_query($conn,"select * from tblclientes");
													while($row = mysqli_fetch_array($query)){				
													?>
													<option name="codcliente" value="<?php echo $row['cod_cliente']; ?>"><?php echo $ncliente = utf8_encode($row['nomecliente']);  ?></option>
													<?php } ?>
													</select>
											</div>
										</div>
								</div>
							</section>
							<section>
								<div class="row">
										<div class="col-md-12">
									  		<div class="clearfix">
														<label style="font-size:16px;"><b></b></label>
															<div class="pull-right">
																<button class="btn btn-primary" type="submit" >Seguinte</button>
															</div>
												</div>								
										</div>
								</div>
							</section>
						</form>
					</div>
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>