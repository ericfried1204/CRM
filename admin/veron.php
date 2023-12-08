<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<body>
	<!-- <div class="pre-loader">
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
	</div> -->

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<!-- <div class="mobile-menu-overlay"></div> -->

	<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="invoice-wrap">
						<div class="pd-20 card-box mb-30">
								<?php 
						if(!isset($_SESSION['data']) && empty($_SESSION['data'])){
							header('Location: criaron.php');
						}
						else {
						$data= $_SESSION['data'];
						$sql = "SELECT * FROM tblon INNER JOIN tblclientes ON tblclientes.cod_cliente = tblon.cod_cliente WHERE tblon.data='$data'";
						$query = $dbh -> prepare($sql);
						// $query->bindParam(':data', $data, PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
				
						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{   
								$_SESSION['codon'] = $result->cod_on;      
						?>  
							<div class="invoice-header">
								<div class="logo text-center">
									<img src="vendors/images/deskapp-logo.png" alt="" />
								</div>
							</div>
							<h4 class="text-center mb-30 weight-600">OPORTUNIDADE DE NEGÓCIO Nº <?php echo htmlentities($result->cod_on);?></h4>
							<p></p>
							<div class="row pb-30">
								
								<div class="col-md-6">
									<h5 class="mb-15">----</h5>
										<p class="font-14 mb-5">
										CONTRIBUINTE N.º: <strong class="weight-600">----</strong>
										</p>
										<p class="font-14 mb-5">
											<strong class="weight-600">----</strong>
										</p>
										<p class="font-14 mb-5">
										<strong class="weight-600">----</strong>
									</p>
								</div>
								<div class="col-md-6">
									<div class="text-right">
										<p class="font-14 mb-5">CÓD CLIENTE: <strong class="weight-600"><?php echo htmlentities($result->cod_cliente);?></strong></p>
										<p class="font-14 mb-5">NOME: <strong class="weight-600"><?php echo htmlentities($result->nomecliente);?></strong></p>						
										<p class="font-14 mb-5">NIF: <strong class="weight-600"><?php echo htmlentities($result->nif);?></strong></p>		
									</div>
								</div>
										<?php $cnt++;} } }?>
							</div>
									<table class="table table-striped">
									<thead>
											<tr>
												<th scope="col">REFERÊNCIA</th>
												<th scope="col">DESCRIÇÃO</th>
												<th scope="col">UNIDADE</th>
												<th scope="col">QUANTIDADE</th>
												<th scope="col">PR. UNITARIO</th>
												<th scope="col">IVA</th>
												<th scope="col">DESCONTO</th>
												<th scope="col">VALOR</th>
											</tr>
									</thead>
									<tbody>
														<?php 
											$codon=$_SESSION['codon'];
											$sql = "SELECT * from tblonlinhas WHERE cod_on= '$codon'";
											$query = mysqli_query($conn, $sql) or die(mysqli_error());
											while ($row = mysqli_fetch_array($query)) {
										 ?> 
										<tr>
											<th scope="row"><?php echo $row['referencia']; ?></th>
											<td><?php echo $row['nomeartigo']; ?></td>
											<td><?php echo $row['unidade']; ?></td>
											<td><?php echo $row['quantidade']; ?></td>
											<td><?php echo $row['precounitario']; ?></td>
											<td><?php echo $row['iva']; ?></td>
											<td><?php echo $row['descontol']; ?></td>
											<td><?php echo $row['precol']; ?></td>
										</tr>
									</tbody>
							
											<?php }?>
							
										</table>
						
								<div class="row pb-30">
								
								<div class="col-md-6">
									<h5 class="mb-15">DATE OF DOCUMENT</h5>
										<p class="font-14 mb-5"><strong class="weight-600">VALIDADE DE 72H</strong>
										</p>
								</div>
								<div class="col-md-6">
									<div class="text-right">
										<p class="font-14 mb-5">Mercadoria: <strong class="weight-600"><?php 
											$cod_on=$_SESSION['codon'];
											$sql = "SELECT totalmerc, totaldescontos, valoriva, totallinha FROM tblonlinhas where cod_on='$cod_on'";
											$query = $dbh->prepare($sql);
											// $query->bindParam(':lid',$lid,PDO::PARAM_STR);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$Mercadoria=0;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {
													$Mercadoria+=$result->totalmerc;
												}
											}
											echo $Mercadoria;
										?></strong></p>	
										<p class="font-14 mb-5">Descontos: <strong class="weight-600"><?php
											$Descontos=0;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {
													$Descontos+=$result->totaldescontos;
												}
											}
											echo $Descontos;
										?></strong></p>						
										<p class="font-14 mb-5">IVA: <strong class="weight-600"><?php
											$IVA=0;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {
													$IVA+=$result->valoriva;
												}
											}
											echo $IVA;
										?></strong></p>	
										<p class="font-14 mb-5">Total AKZ: <strong class="weight-800"><?php 
											$AKZ=0;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {
													$AKZ+=$result->totallinha;
												}
											}
											echo $AKZ;
										?></strong></p>	
									</div>
								</div>
						
								</div>						
								</div>
							</div>
							<div class="pd-20 card-box mb-30">
								<div class="row">
									<div class="col-md-12">
										<div class="clearfix">
											<label style="font-size:16px;"><b></b></label>
												<div class="pull-right">
																					<a
									href="#"
									class="btn-block"
									data-toggle="modal"
									data-target="#confirmation-modal"
									type="button"
								>
								
								    <form  method="post"><input type="hidden" name="user" value="<?php echo $_SESSION['codon'] ?>"><button class="btn btn-primary">Finalizar</button></form></a>
									<div
									class="modal fade"
									id="confirmation-modal"
									tabindex="-1"
									role="dialog"
									aria-hidden="true"
								>
									<div
										class="modal-dialog modal-dialog-centered"
										role="document"
									>
										<div class="modal-content">
											<div class="modal-body text-center font-18">
												<h4 class="padding-top-30 mb-30 weight-500">
													Tem a certeza que pretende finalizar a ON?
												</h4>
												<div
													class="padding-bottom-30 row"
													style="max-width: 170px; margin: 0 auto"
												>
													<div class="col-6">
														<button
															type="button"
															class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
															data-dismiss="modal"
														>
															<i class="fa fa-times"></i>
														</button>
														NÃO
													</div>
													<div class="col-6">
														<form action="editPDF.php" method="post">
														<button														    
															type="submit"
															class="btn btn-primary border-radius-100 btn-block confirmation-btn"															
														>
															<i class="fa fa-check"></i>
														</button>
														SIM
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
												</div>
										</div>
									</div>
								</div>
							</div>
				
						</div>
					</div>
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