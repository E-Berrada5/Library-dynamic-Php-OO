<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="Content/css/style.css">
	<script src='Content/js/app.js' defer></script>
	<title>Index</title>
</head>
<body>
	<h2 class="nomprenom">Bienvenue à la bibliothèque </h2>
	<h3 class="nomprenom">
	<?php
	   session_start();
	   echo  $_SESSION['prenom'] ." ".$_SESSION['name']. " ".$_SESSION['roles'];
	   echo "</h3>";
	require_once 'Controllers/Controller.php';
	require_once 'Models/Model.php';
	require_once 'Utils/header.php';

	$controllers = ["home", "livre", "fournisseur", "commande",];
	$controller_default = "home";

	if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
		$nom_controller = $_GET['controller'];
	} else {
		$nom_controller = $controller_default;
	}
	$nom_classe = "Controller_" . $nom_controller;
	$nom_fichier = "Controllers/" . $nom_classe . ".php";

	// echo $nom_fichier;

	if (file_exists($nom_fichier)) {
		require_once($nom_fichier);
		$controller = new $nom_classe();
	} else {
		exit("Error 404 : not found");
	}
	require_once 'Utils/footer.php';

	?>
</body>

</html>