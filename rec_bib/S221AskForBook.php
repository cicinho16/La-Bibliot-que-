<!DOCTYPE html>
<?php include('./common/databases/db_connect_monitoring.php') ?>
<?php $_POST['active_page']= substr(strrev(substr(strrchr(strrev(basename(__FILE__)),'.'),1)),0);
	  $active_page = $_POST['active_page'];
	  if(!isset($_POST['id_onglet_s_p'])){
		$qry = $conn_m->query("SELECT e.*, o.id_onglet_s AS id_onglet_s_p FROM z_ss_onglets e JOIN z_onglets o ON e.idonglet = o.id WHERE e.id_onglet_s='". $active_page."' ORDER BY e.rang LIMIT 1;");
	 	if($row=$qry->fetch_assoc()){
			$_POST['id_onglet_s_p'] = $row['id_onglet_s_p'];
			$_POST['title'] = $row['libelle'];
			$_POST['icon'] = $row['icon'];
			$_POST['id_onglet_s'] = $row['id_onglet_s'];
		}
	  }
	  $conn_m->close();
?>
<?php include './common/ressources/template.php' ?>
			<?php session_start(); ?>
			<?php 
				if(!isset($_SESSION['login_id']))
					header('location:login.php');
				include 'header.php' 
			?>
	<html lang="fr">
			<div class="GEA">
				<div class="ml_20 mt_20">
					<div  class="in-bloc">
						<button name="S111home" id="S111home" class="no_bg sans_bordure" title="Accueil" onclick="location.href='S111home.php'"><span class="fs_16"><i class="bleu fa fa-home" aria-hidden="true"></i></span></button>
					</div>
					<div  class="in-bloc">
						<span class="bleu fs_15">></span>
					</div>
					<div  class="in-bloc">
						<button name="<?php echo $_POST['id_onglet_s']?>" id="<?php echo $_POST['id_onglet_s']?>" class="no_bg sans_bordure" title="<?php echo $_POST['title']?>" onclick="location.href='<?php echo basename(__FILE__)?>'"><span class="fs_14"><i class="bleu fa fa-<?php echo $_POST['icon']?>" aria-hidden="true"></i></span></button>
					</div>
				</div>
				<form id="ask_book">
				<div class="grille mt_10">
					<div class="col_10">
					</div>
					<div class="col">
						<section class="tuile_fiche">
							<header class="titre">
								<h2>Demande d'un livre</h2>
							</header>
							<div class="corps">
								<div class="grille">
									<div class="ligne">
										<div class="col">
											<p>Titre:</p>
											<input required name="titre" type="text" style="width:30%;" placeholder="Entrer le titre du livre"/>
										</div>
									</div>
									<div class="ligne">
										<div class="col">
											<p>Quantité:</p>
											<input required name="qte" type="number" style="width:50px;" placeholder=""/>
										</div>
									</div>
									<div class="ligne">
										<div class="col">
											<p>Description:</p>
											<textarea required id="description" name="description" rows="6" cols="50">Dites nous en plus...</textarea>
										</div>
									</div>
									<div class="ligne">
										<div class="col">
										<center><button class="btn" onclick="ask_book();">Envoyer la demande</button></center>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col_10">
					</div>
				</div>
				</form>
			</div>
		
	</html>