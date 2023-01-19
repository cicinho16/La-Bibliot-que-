<?php 

$conn_m= new mysqli('localhost','root','','monitoring')or die("Impossible de se connecter à la base de données:".mysqli_error($conn_m));
$conn_m->set_charset("utf8");
