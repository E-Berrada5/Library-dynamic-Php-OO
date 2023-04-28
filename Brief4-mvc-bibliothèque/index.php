<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="Content/style.css">
    <script src='Content/app.js' defer></script>
    <title>Index</title>
</head>

<body>
    <?php
    echo "<b>" . "Controller : " . $_GET['controller'] . "<br>" . "<b>";
    echo "<b>" . "action : " . $_GET['action'] . "<br>" ;
    /* Nous créons un fichier de session pour afficher sur toutes les pages les informations personnelles de
    l'user*/
    session_start();
    
    /* L'expression require_once est identique à require mis à part que PHP vérifie si le fichier a déjà été inclus,
     et si c'est le cas, ne l'inclut pas une deuxième fois.*/
    require_once 'Controllers/Controller.php';
    require_once 'Models/Model.php';
 
//on défini nos controleurs
    $controllers = ["home", "login", "sign_up"];
    $controller_default = "home";
//nous vérifions si le nom du controleur est bien envoyer dans l'url
    if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
        $nom_controller = $_GET['controller'];
    } else {
        //sinon le controller par défaut sera controller_default qui nous ramène vers la page d'accueil
        $nom_controller = $controller_default;
    }
//COMMENTEZ ICI !!!!!!!!!
    $nom_classe = "Controller_" . $nom_controller;
    $nom_fichier = "Controllers/" . $nom_classe . ".php";


    if (file_exists($nom_fichier)) {
        require_once($nom_fichier);
        $controller = new $nom_classe();
    } else {
        exit("Error 404 : not found");
    }
    ?>
</body>
</html>