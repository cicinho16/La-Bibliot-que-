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
		function get_info(){
			$return_arr = array();
			$iduser=$_SESSION['login_id'];
			extract($_POST);
			$query_text="SELECT COUNT(title) nb FROM z_asked_books WHERE iduser=$iduser
					UNION ALL
						SELECT COUNT(idbook) nb FROM z_resa_books WHERE iduser=$iduser AND date_fin > SYSDATE()
					UNION ALL
						SELECT COUNT(id) nb FROM z_books
			";
			$qry = $this->db->query($query_text);
				while($row= $qry->fetch_assoc()){
					$nb = $row['nb'];
					$return_arr[] = array("nb" => $nb);
				}
			return $return_arr;
		}		 
	}
	
	$action = $_GET['action'];
	$crud = new Action();
	if($action == 'get_info'){
		$get_info = $crud->get_info();
		if($get_info)
			echo json_encode($get_info,true,2);
	}
?>