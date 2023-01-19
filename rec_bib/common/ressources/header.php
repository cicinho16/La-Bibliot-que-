<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
 session_start();
  ob_start();
  $title = isset($_GET['page']) ? ucwords(str_replace("_", ' ', $_GET['page'])) : "Accueil";
  ?>
  <title>Bibliothèque Intelligente Numérique GEA</title>
  <?php ob_end_flush() ?>
  <?php include 'ressources.php' ?>
  <?php $_SESSION['id_app'] = 1 ;?>
</head>