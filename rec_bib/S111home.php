<!DOCTYPE html>
<?php $_POST['active_page']= substr(strrev(substr(strrchr(strrev(basename(__FILE__)),'.'),1)),0);
	  $active_page = $_POST['active_page'];
?>
<?php include './common/ressources/template.php' ?>
	<html lang="fr">
			<meta charset="utf-8">
			<meta content="width=device-width, initial-scale=1.0" name="viewport">

		<?php session_start(); ?>
		<?php 
			if(!isset($_SESSION['login_id']))
				header('location:login.php');
			include 'header.php' 
		?>
		<script>
			$(document).ready(function(){
				$.ajax({
					url: 'home_ajax.php?action=get_info',
					type: 'get',
					dataType: 'JSON',
					error:function (xhr, ajaxOptions, thrownError){
						alert(xhr.status);
       					 alert(thrownError);
						 console.log(xhr.responseText);
					},
					success: function(response){
							var nbasked = response[0].nb;
							var nbpurchased = response[1].nb;
							var nbtotal = response[2].nb;
							console.log(nbasked);
							$("#pruchased_books p").append('<a href="S311MyBooks.php">'+nbpurchased+'</a>');
							$("#asked_books p").append('<a href="S321MyBooksAsked.php">'+nbasked+'</a>');
							$("#total_books p").append('<a href="S211LookForBook.php">'+nbtotal+'</a>');
					}
				})
			})
		</script>
		<div class="GEA">
			<div class="ml_20 mt_20">
				<div  class="in-bloc">
					<button name="search" id="search" class="no_bg sans_bordure" title="Accueil" onclick="location.href='S111home.php'"><span class="fs_16"><i class="bleu fa fa-home" aria-hidden="true"></i></span></button>
				</div>
			</div>
			<div class="grille mt_10">
				<div class="col_10">
				</div>
				<div class="col">
					<section class="tuile_fiche">
						<header class="titre">
							<h2>Tableau de bord</h2>
						</header>
						<div class="corps">
							<div class="grille">
								<div class="col">
									<div class="card-dash" onclick="location.href'311MyBooks.php'">
										<div class="centred">
										<img src="./common/img/book_purchased.png" alt="Purchased books" style="width:50%">
										</div>
										<div class="container" id="pruchased_books">
											<h4><b>Total des livres réservés</b></h4> 
											<p></p> 
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card-dash">
										<div class="centred">
										<img src="./common/img/book_asked.png" alt="Purchased books" style="width:50%">
										</div>
										<div class="container" id="asked_books">
											<h4><b>Total des livres demandés</b></h4> 
											<p></p> 
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card-dash">
										<div class="centred">
										<img src="./common/img/book_total.png" alt="Purchased books" style="width:50%">
										</div>
										<div class="container" id="total_books">
											<h4><b>Total des livres en ligne</b></h4> 
											<p></p> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="col_10">
				</div>
			</div>
		</div>
	</html>