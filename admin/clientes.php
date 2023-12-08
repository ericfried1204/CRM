<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>
<style>
	th, td {
		width: 100px; /* Set the desired width value */
		font-size: 10px !important;
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
	<?php include('includes/navbar.php') ?>
	<?php include('includes/right_sidebar.php') ?>
	<?php include('includes/left_sidebar.php') ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>LISTA DE CLIENTES</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Clientes</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row pb-10">
					<div class="col-xl-3 col-lg-3 col-sm-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$sql = "SELECT cliente_id from tblclientes";
							$query = $dbh->prepare($sql);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$empcount = $query->rowCount();
							?>
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?php echo ($empcount); ?></div>
									<div class="font-14 text-secondary weight-500">Total Clientes</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-lg-3 col-sm-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">

							<?php
							$sql = "SELECT * from tbldataupdate WHERE tipo = 'CLIENTES'";
							$query = mysqli_query($conn, $sql) or die(mysqli_error());
							while ($row = mysqli_fetch_array($query)) {

							?>


								<div class="d-flex flex-wrap">
									<div class="widget-data">
										<div class="weight-700 font-24 text-dark"><?php echo ($row['data']); ?></div>
										<div class="font-14 text-secondary weight-500">Data Actualização</div>
									</div>
									<div class="widget-icon">
										<div class="icon" data-color="#ffffff"><i class="micon dw dw-calendar1"></i></div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="card-box mb-30">
					<div class="clearfix">
						<div class="pd-20">
							<h4 class="text-blue h4">Listagem de Clientes</h4>
						</div>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th scope="col">NOME</th>
									<th scope="col">CÓD</th>
									<th scope="col">NIF</th>
									<th scope="col">LIMITE CRÉDITO</th>
									<th scope="col">LIMITE CRÉDITO IDADE</th>
									<th scope="col">TOTAL DÉBITO</th>
									<th scope="col">DATA REGISTO</th>
									<th class="datatable-nosort">AÇÃO</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$teacher_query = mysqli_query($conn, "select * from tblclientes WHERE estado = 0") or die(mysqli_error());
								while ($row = mysqli_fetch_array($teacher_query)) {
									$id = $row['cliente_id']; ?>
									<tr>
										<td cope='row'><?php echo $contents = utf8_encode($row['nomecliente']); ?></td>
										<td><?php echo $row['cod_cliente']; ?></td>
										<td><?php echo $row['nif']; ?></td>
										<td><?php echo $row['limitecredito']; ?></td>
										<td><?php echo $row['limiteidadesaldo']; ?></td>
										<td><?php echo $row['totaldebito']; ?></td>
										<td><?php echo $row['dataregisto']; ?></td>
										<td>
											<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<a class="dropdown-item" href="vistacliente.php?cod_cliente=<?php echo $row['cod_cliente']; ?>"><i class="dw dw-user1"></i> Ver Detalhes</a>
													<a class="dropdown-item" href="vistafaturacao.php?cod_cliente=<?php echo $row['cod_cliente']; ?>"><i class="dw dw-invoice-1"></i> Ver Faturacao</a>
												</div>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>


	<!-- js -->

	<?php include('includes/scripts.php') ?>
</body>

</html>