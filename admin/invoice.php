<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
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
						$query->bindParam(':lid',$lid,PDO::PARAM_STR);
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
							<div class="row pb-30">
								
								<div class="col-md-6">
									<h5 class="mb-15">QUIMICOIL, LDA</h5>
										<p class="font-14 mb-5">
										CONTRIBUINTE N.º: <strong class="weight-600">5419018250</strong>
										</p>
										<p class="font-14 mb-5">
											<strong class="weight-600">ESTRADA DE CATETE - KM 19</strong>
										</p>
										<p class="font-14 mb-5">
										<strong class="weight-600">VIANA - LUANDA</strong>
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
						
								<div class="invoice-desc-footer">
									<div class="invoice-desc-head clearfix">
										<div class="invoice-sub">Bank Info</div>
										<div class="invoice-rate">Due By</div>
										<div class="invoice-subtotal">Total Due</div>
									</div>
									<div class="invoice-desc-body">
										<ul>
											<li class="clearfix">
												<div class="invoice-sub">
													<p class="font-14 mb-5">
														Account No:
														<strong class="weight-600">123 456 789</strong>
													</p>
													<p class="font-14 mb-5">
														Code: <strong class="weight-600">4556</strong>
													</p>
												</div>
												<div class="invoice-rate font-20 weight-600">
													10 Jan 2018
												</div>
												<div class="invoice-subtotal">
													<span class="weight-600 font-24 text-danger"
														>$8000</span
													>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<h4 class="text-center pb-20">Obrigado!!</h4>
				
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