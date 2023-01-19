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
		function login(){
			
			extract($_POST);

				$qry = $this->db->query("SELECT *,concat(nom,', ',prenom) as nom,concat(nom,' ',SUBSTRING(prenom,1,1),'.') as np FROM z_users where email = '".$email."' and password = '".md5($password)."' ");
			if( $qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'password' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
					return 1;
			}else{
				return 3;
			}
		}
		function logout(){
			session_destroy();
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			return 1;
		}
		function inscription(){
			extract($_POST);

			$query_text="INSERT INTO z_users
						SELECT MAX(id)+1 AS id,'$nom' AS nom, '$prenom' AS prenom, '+337000000' AS contact, '$adresse' AS adresse, '$email' AS email, md5('$password') AS password, '1' AS type, SYSDATE() AS date_created
						FROM z_users
			";
			if($password == $confirmpass){
				if($etat = $this->db->query($query_text)){
					return 1;
				}else{
					return 3;
				}
			}else{
				return 2;
			}
		}
	}
	
	$action = $_GET['action'];
	$crud = new Action();
	if($action == 'login'){
		$login = $crud->login();
		if($login)
			echo $login;
	}
	if($action == 'logout'){
		$logout = $crud->logout();
		if($logout)
			echo $logout;
	}
	if($action == 'inscription'){
		$inscription = $crud->inscription();
		if($inscription)
			echo $inscription;
	}
?>