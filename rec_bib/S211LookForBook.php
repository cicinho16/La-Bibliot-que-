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
	<form id="look_book">
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
				<div class="grille mt_10">
					<div class="col_10">
					</div>
					<div class="col">
						<section class="tuile_fiche">
							<header class="titre">
								<h2>Liste des livres</h2>
							</header>
							<div class="corps">
								<div class="grille">
									<div class="ligne">
										<div class="col_50">
											<section class="tuile_resultat">
												
													<div>
														<h2 class="droite">Rechercher un livre:</h2>
														<label for="E111rechLivre">
															<input name="rechLivre" type="text" id="S211rechLivre" class="w_50" value="<?php  echo $_POST['rechLivre'];?>"
																placeholder="Entrer des mot-clés"/>
															<button id="rechercher_btn" onclick="rech_book('look_book','get_liste','resalivre');">
																<i class="fa fa-search" aria-hidden="true"></i>
															</button>
															
														</label>
													</div>
												
											</section>
											
										</div>
										<div class="col">
															
										</div>
									</div>
								</div>
								<div class="grille mt_20" id="contenu_look_book">

								</div>
							</div>
						</section>
					</div>
					<div class="col_10">
					</div>
				</div>
				<!-- La modale -->
				<div id="myModal" class="modal">
					<!-- Contenu de la modale -->
					<div class="modal-content">
						<span class="close">&times;</span>
						<h1 id="modtitre">Réservation du livre:</h1>
						<div class="grille">
							<div class="col_20">
							</div>
							<div class="col">
								<p>Date de début</p>
								<input type="date" name="date_deb" min="<?php echo date('Y-m-d');?>" id="date_deb" onchange="edit_constaint_date();"/>
							</div>
							<div class="col">
								<p>Date de fin</p>
								<input type="date" name="date_fin" min="<?php $Date=date('Y-m-d'); echo date('Y-m-d', strtotime($Date. ' + 1 days'));?>" max="<?php echo date('Y-m-d', strtotime('+1 months', strtotime(date('Y-m-d')))); ?>" id="date_fin"/>
							</div>
						</div><br/>
						<input type="text" hidden value="" name="monaction" id="monaction"/>
						<center><button class="btn" onclick="purch_book('look_book','purch_book',$('#monaction').val());">Réserver</button></center>
					</div>
				</div>
			</div>
			<script>			
				$(document).ready(function(){
					document.getElementById("rechercher_btn").click();
				});
				
				var modal = document.getElementById("myModal");				
				var span = document.getElementsByClassName("close")[0];
				span.onclick = function() {
					modal.style.display = "none";
				}		
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
				function edit_constaint_date(){
					var date_fin = document.getElementById("date_fin");
					var date_deb = document.getElementById("date_deb");
					var mon_deb = new Date(date_deb.value);
					var day_deb = new Date(date_deb.value);
					mon_deb.setMonth(mon_deb.getMonth() + 1);
					day_deb.setDate(day_deb.getDate() + 1);

					mon_deb=mon_deb.toISOString().split('T')[0];
					day_deb=day_deb.toISOString().split('T')[0];
					
					date_fin.setAttribute("min",day_deb);
					date_fin.setAttribute("max",mon_deb);
				}
			</script>	
	</form>		
	</html>