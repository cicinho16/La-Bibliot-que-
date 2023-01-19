<?php 

$conn= new mysqli('localhost','root','','rec_bib')or die("Impossible de se connecter à la base de données:".mysqli_error($con));
$conn->set_charset("utf8");