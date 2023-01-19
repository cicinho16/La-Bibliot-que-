<!DOCTYPE html>
<?php include './common/ressources/template_empty.php' ?>
	<html lang="fr">
		<?php session_start(); ?>
		<?php 
			if(!isset($_SESSION['login_id'])){
				header('location:login.php');
			}else{
				header('location:S111home.php');
			}
		?>
	</html>