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
				<span class="text-center">Inscription</span>
				<form id="inscription">
                    <div class="grille">
                        <div class="col">
                            <div class="input-login">
                                <input type="text" id="nom" required name="nom">
                                <label for="nom">Nom</label>
                            </div>
                        </div>
                        <div class="col_10">
                        
                        </div>
                        <div class="col">
                            <div class="input-login">
                                <input type="text" id="prenom" required name="prenom">
                                <label for="prenom">Prénom</label>
                            </div>
                        </div>
                    </div>
                    <div class="grille">
                        <div class="col">
                            <div class="input-login">
                                <input type="text" id="email" required name="email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col_10">
                        
                        </div>
                        <div class="col">
                            <div class="input-login">
                                <input type="text" id="adresse" required name="adresse">
                                <label for="adresse">Adresse</label>
                            </div>
                        </div>
                    </div>
                    <div class="grille">
                        <div class="col">
                            <div class="input-login">
                                <input type="password" id="password" required name="password">
                                <label for="password">Mot de passe</label>
                            </div>
                        </div>
                        <div class="col_10">
                        
                        </div>
                        <div class="col">
                            <div class="input-login">
                                <input type="password" id="confirmpass" required name="confirmpass">
                                <label for="confirmpass">Confirmer le mot de passe</label>
                            </div>
                        </div>
                    </div>
					<a class="lien" onclick="location.href='login.php'">Vous avez déjà un compte ? identifiez-vous !</a>
					<center><button class="btn-login" onclick="sub_form('login','inscription','inscription','Merci de remplir tous les champs correctement !','login.php')">Créer un compte</button></center>
				</form>
			</div>
	  </main>
	</html>