<!DOCTYPE html>
<?php include './common/ressources/template_empty.php' ?>

	<html lang="en">
		<?php 
		session_start();
		include('./common/databases/db_connect.php');
		?>
	  <main id="main" >
			<head>
				  <meta charset="utf-8">
				  <meta content="width=device-width, initial-scale=1.0" name="viewport">
					
				
				<?php 
				if(isset($_SESSION['login_id']))
				header("location:S111home.php");

				?>
				<h1 class="logo_gea">gea</h1>

			</head>
			<div class="login">
				<span class="text-center">connexion</span>
				<form id="connexion">
					<div class="input-login">
						<input type="text" id="email" required name="email">
						<label for="email">Identifiant</label>
					</div>
					<div class="input-login">
						<input type="password" id="password" required name="password">
						<label for="password">Mot de passe</label>
					</div>
					<a class="lien" onclick="" title="Merci de contacter l'administrateur sur admin@gmail.com">
						Mot de passe oublié ?
					</a><br/>
					<a class="lien" onclick="location.href='signup.php'">Vous n'avez pas de compte ? inscrivez-vous !</a>
					<center><button class="btn-login" onclick="sub_form('login','connexion','login','Identifiant ou mot de passe incorrect','S111home.php')">Se connecter</button></center>
				</form>
			</div>
	  </main>
	</html>