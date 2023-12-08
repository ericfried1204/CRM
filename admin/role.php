<?php
	session_start();
	
	if(isset($_SESSION['role'])){
		if ($_SESSION['role'] == 'Admin') {
			header("Location: ./admin_dashboard.php");			 	
		}
		elseif ($_SESSION['role'] == 'Diretor') {
			header("Location: '../diretor/index.php");		 		    	
			
		}
		elseif ($_SESSION['role'] == 'Comercial') {
			header("Location: '../comercial/index.php");	
			
		}
		elseif ($_SESSION['role'] == 'Cliente') {
			header("Location: '../cliente/index.php");
			
		}
		elseif ($_SESSION['role'] == 'Stock') {
			header("Location: '../stock/index.php");
			
		}
		elseif ($_SESSION['role'] == 'Diretor Comercial') {
			header("Location: '../dcomercial/index.php");
			
		}
	}	
	else {
		header("Location: '../index.php");
	}		  
?>