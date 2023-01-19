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
                                r.date_crea AS date_,
								r.date_deb, r.date_fin
						FROM z_books e
                            JOIN z_resa_books r
                                ON e.id = r.idbook
						WHERE (titre LIKE '%$rechLivre%' OR description LIKE '%$rechLivre%')
                        AND r.iduser = $iduser
						AND r.date_fin > SYSDATE()
			";
			if($qry = $this->db->query($query_text)){
				while($row= $qry->fetch_assoc()){
					$title = $row['titre'];
					$photo = $row['cmt'];
					$prix = $row['prix'];
					$idbook = $row['id'];
					$date_ = $row['date_'];
					$date_deb = $row['date_deb'];
					$date_fin = $row['date_fin'];

					$return_arr[] = array("title" => $title,
					"photo" => $photo,
					"idbook" => $idbook,
					"prix" => $prix,
                    "action" => "achat",
					"date_" => $date_,
					"date_deb" => $date_deb,
					"date_fin" => $date_fin);
				}
			}
			if(empty($return_arr)){
				$return_arr[] = array("title" => "0");
			}
			return $return_arr;
		}
		function get_liste_demande(){
			$return_arr = array();
			$iduser=$_SESSION['login_id'];
			extract($_POST);
			$query_text="SELECT e.*,
								CASE 
									WHEN e.etat = 0 THEN 'Demande rejetée'
									WHEN e.etat = 1 THEN 'Demande acceptée'
									ELSE 'En cours de traitement'
								END AS etat,
								CASE 
									WHEN e.etat = 0 THEN 'neg'
									WHEN e.etat = 1 THEN 'pos'
									ELSE 'avg'
								END AS class_etat
						FROM z_asked_books e
						WHERE (title LIKE '%$rechLivre%')
                        AND e.iduser = $iduser
			";
			if($qry = $this->db->query($query_text)){
				while($row= $qry->fetch_assoc()){
					$title = $row['title'];
					$photo = "smallbook";
					$date_crea = $row['date_crea'];
					$qte = $row['qte'];
					$class_etat = $row['class_etat'];
					$etat = $row['etat'];
					$cmt = $row['cmt'];

					$return_arr[] = array("title" => $title,
					"photo" => $photo,
					"idbook" => "",
					"prix" => "",
                    "action" => "demande",
					"etat" => $etat,
					"qte" => $qte,
					"class_etat" => $class_etat,
					"date_" => $date_crea,
					"cmt" => $cmt);
				}
			}
			if(empty($return_arr)){
				$return_arr[] = array("title" => "0");
			}
			return $return_arr;
		}			 
	}
	
	$action = $_GET['action'];
	$crud = new Action();
	if($action == 'get_liste_achat'){
		$get_liste = $crud->get_liste();
		if($get_liste)
			echo json_encode($get_liste,JSON_UNESCAPED_UNICODE);
	}
	if($action == 'get_liste_demande'){
		$get_liste_demande = $crud->get_liste_demande();
		if($get_liste_demande)
			echo json_encode($get_liste_demande,JSON_UNESCAPED_UNICODE);
	}
?>