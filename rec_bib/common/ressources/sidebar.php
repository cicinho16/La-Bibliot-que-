	
	<?php
		session_start();
	?>
	<?php include('./common/databases/db_connect_monitoring.php') ?>
	<div class="sidenav">
		<a class="sidebar-brand justify-content-center" href="index.php">
			<div class="in-bloc mr_10"><i class="fa fa-user" aria-hidden="true"></i></div>
			<div class="in-bloc"><?php $np=$_SESSION['login_np'];echo $np;?></div>
		</a>
		
		<!-- Divider -->
		 <hr class="sidebar-divider">
		 <?php
			$qry = $conn_m->query("SELECT * FROM z_onglets WHERE idapp='". $_SESSION['id_app']."' ORDER BY rang");
			$nb_onglet = $qry->num_rows;
			while($row= $qry->fetch_assoc()):
		?>
		  <button class="dropdown-btn" id="<?php echo $row['id_onglet_s'] ?>_button"><?php echo $row['libelle'] ?>
			<i class="fa fa-caret-down"></i>
		  </button>
		  <div class="dropdown-container" id="<?php echo $row['id_onglet_s'] ?>">
			<?php
				$qry2 = $conn_m->query("SELECT e.*, o.id_onglet_s AS id_onglet_s_p FROM z_ss_onglets e JOIN z_onglets o ON e.idonglet = o.id WHERE e.idonglet='". $row['id']."' ORDER BY e.rang");
				while($row2= $qry2->fetch_assoc()):
			?>
				<form name="<?php echo $row2['id_onglet_s'] ?>" method="POST" action="<?php echo $row2['id_onglet_s'] ?>.php">
					<input type="hidden" name="icon" value="<?php echo $row2['icon'] ?>">
					<input type="hidden" name="id_onglet_s" value="<?php echo $row2['id_onglet_s'] ?>">
					<input type="hidden" name="title" value="<?php echo $row2['libelle'] ?>">
					<input type="hidden" name="id_onglet_s_p" value="<?php echo $row2['id_onglet_s_p'] ?>">

					<a href="javascript:document.<?php echo $row2['id_onglet_s'] ?>.submit()" id="<?php echo $row2['id_onglet_s'] ?>">
						<div class="in-bloc mr_5"><i class="fa fa-<?php echo $row2['icon'] ?>" aria-hidden="true"></i></div>
						<div class="in-bloc"><?php echo $row2['libelle'] ?></div>
					</a>
				</form>
			<?php endwhile; ?>
		  </div>
		  
				<?php if ($nb_onglet != $row['rang']){?><hr class="in-divider"><?php }; ?>
		<?php endwhile; ?>
		
		  <?php include './common/ressources/footer.php' ?>
	</div>
	<script>
		
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
		  dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
			  dropdownContent.style.display = "none";
			} else {
			  dropdownContent.style.display = "block";
			}
		  });
		}
	</script>
	<script>
		if ('<?php echo $_POST['active_page']?>' == 'S111home'){
			
		}else{
			var onglet = document.getElementById('<?php echo $_POST['active_page']?>');
			var active_group_id = '<?php echo $_POST['id_onglet_s_p']?>';
			var active_group = document.getElementById(''+active_group_id+'');
			var active_button = document.getElementById(''+active_group_id+'_button'+'');
			
			onglet.classList.toggle("active");
			if (active_group.style.display === "block") {
				  active_group.style.display = "none";
				} else {
				  active_group.style.display = "block";
			}
			active_button.classList.toggle("active");
		}
	</script>