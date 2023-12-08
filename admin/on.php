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
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Lista de Oportunidade de Negócio</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">ON</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
						<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						<?php
						$sql = "SELECT cod_on from tblon WHERE estado = 1";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$empcount=$query->rowCount();
						?>

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo($empcount);?></div>
								<div class="font-14 text-secondary weight-500">Total ON's</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-user-2"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
											<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Listagem de ON's</h4>
						</div>
						<div class="pb-20">
							<table
								class="table hover multiple-select-row data-table-export nowrap">
								<thead>
									<tr>
								<th>Nº ON</th>
								<th class="table-plus">CÓD CLIENTE</th>
								<th>NOME</th>
								<th>VALOR</th>
								<th>DATA</th>
								<th class="datatable-nosort">AÇÃO</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								 <?php
		                         $teacher_query = mysqli_query($conn,"select * from tblon INNER JOIN tblclientes ON tblclientes.cod_cliente = tblon.cod_cliente WHERE tblon.estado = 1 ORDER BY cod_on DESC") or die(mysqli_error());
		                         while ($row = mysqli_fetch_array($teacher_query)) {
		                         $id = $row['cod_on'];?>
								<td><?php echo $row['cod_on']; ?></td>
								<td><?php echo $row['cod_cliente']; ?></td>
								<td class="table-plus"><?php echo $contents = utf8_encode($row['nomecliente']); ?></td>
								<td><?php echo $row['valortotal']; ?></td>
								<td><?php echo $row['data']; ?></td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item"  href="<?php echo $row['urla'];?>" target="_blank" class="dw dw-eye">Descarregar Proforma</a>
											<form action="DuplicateHandler.php" method="post"><input type="hidden" name="pre_codon" value="<?php echo $row['cod_on']; ?>"><button class="dropdown-item" id = "hello" type="submit">Duplicar ON</button></form>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>  
						</tbody>
					</table>
			   </div>
			</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
	<!-- <script>
		function handleDuplicate(btn){
			// console.log("test");
			console.log(btn.parentNode.parentNode.parentNode.parentNode.parentNode.children[0].innerHTML)
			// console.log(btn.parentNode.parentNode.parentNode.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML);
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "DuplicateHandler.php", true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			
			// var pre_codon = btn.parentNode.parentNode.parentNode.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML;
			xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE) {
					if (xhr.status === 200) {
						// Request was successful
						// var data = xhr.responseText;
						// Handle the response data here
						// console.log(data);
						window.location = "criaron2.php";
					} else {
						// Request failed
						// console.log("Request failed with status: " + xhr.status);
					}
				}
			};

			var formData = "pre_codon=" + pre_codon;

			xhr.send(formData);
			}
	</script> -->
</body>
</html>