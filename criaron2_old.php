<?php include('includes/header.php') ?>
<?php include('../includes/session.php') ?>

<!-- <style>
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

	</style> -->

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

	<?php include('includes/navbar.php') ?>

	<?php include('includes/right_sidebar.php') ?>

	<?php include('includes/left_sidebar.php') ?>

	<div class="mobile-menu-overlay"></div>
	<div class="mobile-menu-overlay"></div>
	<div class="main-container xs-pd-20-10">
		<div class="pd-ltr-20">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>ON - OPORTUNIDADE DE NEGÓCIO</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Criar ON - Seleção de Artigos</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Identificação da ON</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<form method="post" action="">

						<?php
						if (!isset($_SESSION['data']) && empty($_SESSION['data'])) {
							header('Location: criaron.php');
						} else {
							$data = $_SESSION['data'];
							// var_dump($data);
							$sql = "SELECT * FROM tblon where data='$data'";
							$query = $dbh->prepare($sql);
							// $query->bindParam(':lid',$lid,PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$cnt = 1;

							if ($query->rowCount() > 0) {
								foreach ($results as $result) {
									$_SESSION['codon'] = $result->cod_on;
						?>

									<div class="row">
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label style="font-size:16px;"><b>ON Nº</b></label>
												<input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->cod_on); ?>">
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label style="font-size:16px;"><b>DATA</b></label>
												<input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->data); ?>">
											</div>
										</div>


									</div>


						<?php $cnt++;
								}
							}
						} ?>
					</form>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Identificação do Cliente</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<form method="post" action="">

						<?php
						if (!isset($_SESSION['data']) && empty($_SESSION['data'])) {
							header('Location: criaron.php');
						} else {
							$codcliente = $_SESSION['codigocliente'];
							$sql = "SELECT * FROM tblclientes where cod_cliente='$codcliente'";
							$query = $dbh->prepare($sql);
							// $query->bindParam(':lid',$lid,PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$cnt = 1;
							if ($query->rowCount() > 0) {
								foreach ($results as $result) {
						?>

									<div class="row">
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label style="font-size:16px;"><b>Código Interno</b></label>
												<input type="text" class="selectpicker form-control" data-style="btn-outline-primary" readonly value="<?php echo htmlentities($result->cod_cliente); ?>">
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label style="font-size:16px;"><b>Nome Completo</b></label>
												<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->nomecliente); ?>">
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label style="font-size:16px;"><b>Desconto Comercial</b></label>
												<input type="text" class="selectpicker form-control" data-style="btn-outline-info" readonly value="<?php echo htmlentities($result->descontoc); ?>">
											</div>
										</div>
									</div>


						<?php $cnt++;
								}
							}
						} ?>
					</form>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">

						<div class="pull-left">
							<h4 class="text-blue h4">Identificação de Artigos</h4>
							<p class="mb-20"></p>
						</div>
						<div class="pull-right">
							<a class="btn btn-primary btn-sm scroll-click" rel="content-y" id="action_take" data-toggle="modal" role="button" data-target="#modal-view-event-add"><i class=""></i>Adicionar Artigo</a>
						</div>
					</div>

					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">

							<thead>
								<tr>
									<th scope="col">Cód</th>
									<th scope="col">Referência</th>
									<th scope="col">Descrição</th>
									<th scope="col">Quantidade</th>
									<th scope="col">Unidade</th>
									<th scope="col">Pr. Unitário</th>
									<th scope="col">Desc</th>
									<th scope="col">Iva</th>
									<th scope="col">Valor</th>
									<th class="datatable-nosort">Ação</th>

								</tr>
							</thead>
							<tbody>

								
								<tr>
									<?php
									$codon = $_SESSION['codon'];
									$sql = "SELECT * from tblonlinhas WHERE cod_on= '$codon'";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
									?>
										
										<td cope="row"><?php echo $row['cod_onlinha']; ?></td>
										<td><?php echo $row['referencia']; ?></td>
										<td><?php echo $row['nomeartigo']; ?></td>
										<td><?php echo $row['quantidade']; ?></td>
										<td><?php echo $row['unidade']; ?></td>
										<td><?php echo $row['precounitario']; ?></td>
										<td><?php echo $row['descontol']; ?></td>
										<td><?php echo $row['iva']; ?></td>
										<td><?php echo $row['precol']; ?></td>
										<td>
											<div class="table-actions">

												<a href="edit_department.php?edit=<?php echo $row['cod_onlinha']; ?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
												<!-- <a href="delete_department.php?delete=<?php echo $row['cod_onlinha']; ?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a> -->
												<form action="delete_department.php" method="post"> <input type="hidden" name="cod_onlinha" value="<?php echo $row['cod_onlinha']; ?>"><button type="submit" style="border: none !important;" data-color="#e95959"><i class="icon-copy dw dw-delete-3" style="font-size: 18px;"></i></button></form>
											</div>
										</td>													
								</tr>
							<?php } ?>
							<?php 
								if($query->num_rows == 0){
									echo "<tr style='background-color:rgb(236, 240, 243)'><td colspan='10'>No content</td></tr>";
								}
							?>
							</tbody>
						</table>

					</div>
				</div>
				<div class="pd-20 card-box mb-30">
					<div class="row">
						<div class="col-md-12">
							<div class="clearfix">
								<label style="font-size:16px;"><b></b></label>
								<div class="pull-right">
									<form action="veron.php" method="post"><input type="hidden" name="user" value="<?php echo $_SESSION['codon'] ?>"><button class="btn btn-primary">Seguinte</button></form>
								</div>
							</div>
						</div>
					</div>
					<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<form id="add-event">
									<div class="modal-body">
										<h4 class="text-blue h4 mb-10">Identificação Artigo/Linha</h4>
										<div class="form-group">
											<label>Nome:</label>

											<!--                         change                                          -->
											<div id="prodcut_list"></div>
											<!--                         change                                          -->
										</div>
										<div class="form-group">
											<label>Unidade</label>
											<input class="form-control" name="Unidade" id="Unidade" value="KG" type="text" readonly/>
										</div>
										<div class="form-group">
											<label>Quantidade</label>
											<input class="form-control" name="quantidadelinha" id="quantidadelinha" value="1" type="number" />
										</div>
										<div class="form-group">
											<label>Desconto (%)</label>
											<input class="form-control" name="desconto" id="desconto" value="0" type="number" />
										</div>
										<div class="form-group">
											<label>IVA</label>
											<input class="form-control" name="iva" id="iva" value="0" type="number" readonly/>
										</div>
										<div class="form-group">
											<label>PVP</label>
											<input class="form-control" name="preco" id="product_price" value="139.866,00" ; type="text" readonly/>
										</div>


										<div class="modal-footer">
											<button type="submit" class="btn btn-primary" onclick="handlesubmit()">
												Confirmar
											</button>
											<button type="button" class="btn btn-primary" data-dismiss="modal">
												Fechar
											</button>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>


			<?php include('includes/footer.php'); ?>
		</div>
	</div>


	<!-- js -->


</body>

<script>
	products = [];
	var product_name = ""
	var request = new XMLHttpRequest();
	request.open("GET", "./production.php", false);

	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var response = request.responseText;
			// console.log(response);
			
			products = JSON.parse(response);
			var content = "<div class='clearfix'><select class='custom-select2 form-control' name='codartigo' id='codartigo' style='width: 100%; height: 38px' onchange='handleChange(event)'>";
			for (var i = 0; i < products.length; i++) {
				var tmp = "";
				tmp = "<option value=" + "'" + products[i].value + "'>" + products[i].name + "</option>"
				content += tmp;
			}
			content += "</select></div>"
			document.getElementById("prodcut_list").innerHTML = content;
			product_name = products[0].name;
			document.getElementById("product_price").value = products[0].price;
			document.getElementById("Unidade").value = products[0].unit;
			document.getElementById("iva").value = products[0].iva;
			
		}
	};

	request.send();

	function handleChange(event) {
		var selectElement = event.target;
		var selectedValue = selectElement.value;
		for (var i = 0; i < products.length; i++) {
			if (products[i].value == selectedValue) {
				product_name = products[i].name;
				document.getElementById("product_price").value = products[i].price;
				document.getElementById("Unidade").value = products[i].unit;
				document.getElementById("iva").value = products[i].iva;
				break;
			}
		}
		// console.log(selectedValue);
		// Do something with the selected value
	}

	function handlesubmit() {

		var codartigo = document.getElementById("codartigo").value;
		var Unidade = document.getElementById("Unidade").value;
		var quantidadelinha = document.getElementById("quantidadelinha").value;
		var desconto = document.getElementById("desconto").value;
		var iva = document.getElementById("iva").value;
		var product_price = document.getElementById("product_price").value;
		$.post("InsertData.php", {
				
				codartigo: codartigo,
				product_name: product_name,
				Unidade: Unidade,
				quantidadelinha: quantidadelinha,
				desconto: desconto,
				iva: iva,
				product_price: product_price
			},
			function(data, status) {

			});
	}
</script>
<?php include('includes/scripts.php')?>
</html>