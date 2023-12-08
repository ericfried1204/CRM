<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>		
		</div>
		<div class="header-right">			
			<div class="user-info-dropdown">
				<div class="dropdown">

					<?php $query= mysqli_query($conn,"select * from tblutilizadores where cod_utilizador = '1'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>

					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?php echo (!empty($row['location'])) ? '../uploads/'.$row['location'] : '../uploads/NO-IMAGE-AVAILABLE.jpg'; ?>" alt="">
						</span>
						<span class="user-name"><?php echo $row['FirstName']. " " .$row['LastName']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="perfil.php"><i class="dw dw-user1"></i> Perfil</a>
						<a class="dropdown-item" href="../logout.php"><i class="dw dw-logout"></i> Terminar Sessão</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>