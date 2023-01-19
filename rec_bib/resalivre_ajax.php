<?php
session_start();
ini_set('display_errors', 1);


	Class Action {
		private $db;

		public function __construct() {
			ob_start();
		include './common/databases/db_connect.php';
		
		$this->db = $conn;
		}
		function __destruct() {
			$this->db->close();
			ob_end_flush();
		}
		function get_liste(){
			$return_arr = array();
			$iduser=$_SESSION['login_id'];
			extract($_POST);
			$query_text="SELECT e.*,
								CASE 
									WHEN r.iduser = $iduser THEN 1
									ELSE 0
								END AS dejaresa
						FROM z_books e
							LEFT JOIN z_resa_books r
								ON e.id = r.idbook
								AND r.date_fin > SYSDATE()
						WHERE (e.titre LIKE '%$rechLivre%' OR e.description LIKE '%$rechLivre%')
			";
			if($qry = $this->db->query($query_text)){
				while($row= $qry->fetch_assoc()){
					$title = $row['titre'];
					$photo = $row['cmt'];
					$prix = $row['prix'];
					$idbook = $row['id'];
					$date_ = $row['date_crea'];
					$dejaresa = $row['dejaresa'];

					$return_arr[] = array("title" => $title,
					"photo" => $photo,
					"idbook" => $idbook,
					"prix" => $prix,
					"action" => "tout_livre",
					"date_" => $date_,
					"dejaresa" => $dejaresa);
				}
			}
			if(empty($return_arr)){
				$return_arr[] = array("title" => "0");
			}
			return $return_arr;
		}
		function purch_book(){
			$return_arr = array();
			$iduser=$_SESSION['login_id'];
			extract($_POST);
			$query_text = "SELECT COUNT(idbook) nb 
							FROM z_resa_books 
							WHERE iduser=$iduser AND date_fin > SYSDATE()";
			$qry = $this->db->query($query_text);
			while($row = $qry->fetch_assoc()){
				$nblivre = $row['nb'];
			}
			if ($nblivre <= 3){
				$query_text="INSERT INTO z_resa_books
						VALUES('$idbook','$iduser','1',SYSDATE(),'$date_deb','$date_fin','Réservation')
				";
				if($etat = $this->db->query($query_text)){
					$return_arr[] = array("etat" => "1");
				}else{
					$return_arr[] = array("etat" => "0");
				}
			}else{
				$return_arr[] = array("etat" => "2");
			}
			
			return $return_arr;
		}
		function ask_book(){
			$return_arr = array();
			$iduser=$_SESSION['login_id'];
			extract($_POST);
			$titre = mysqli_real_escape_string($this->db,$titre);
			$description = mysqli_real_escape_string($this->db,$description);
			$query_text="INSERT INTO z_asked_books
						VALUES('$titre',$iduser,$qte,SYSDATE(),'$description','2')
			";
			if($etat = $this->db->query($query_text)){
				$return_arr[] = array("etat" => "1");
			}else{
				$return_arr[] = array("etat" => "0");
			}
			return $return_arr;
		}
		function annul_resa(){
			$return_arr = array();
			$iduser=$_SESSION['login_id'];
			extract($_POST);
			$query_text="DELETE FROM z_resa_books
						WHERE iduser = $iduser AND idbook = $idbook
			";
			if($etat = $this->db->query($query_text)){
				$return_arr[] = array("etat" => "1");
			}else{
				$return_arr[] = array("etat" => "0");
			}
			return $return_arr;
		}					 
	}
	
	$action = $_GET['action'];
	$crud = new Action();
	if($action == 'get_liste'){
		$get_liste = $crud->get_liste();
		if($get_liste)
			echo json_encode($get_liste,JSON_UNESCAPED_UNICODE);
	}
	if($action == 'purch_book'){
		$purch_book = $crud->purch_book();
		if($purch_book)
			echo json_encode($purch_book,JSON_UNESCAPED_UNICODE);
	}
	if($action == 'ask_book'){
		$ask_book = $crud->ask_book();
		if($ask_book)
			echo json_encode($ask_book,JSON_UNESCAPED_UNICODE);
	}
	if($action == 'annul_resa'){
		$annul_resa = $crud->annul_resa();
		if($annul_resa)
			echo json_encode($annul_resa,JSON_UNESCAPED_UNICODE);
	}
?>