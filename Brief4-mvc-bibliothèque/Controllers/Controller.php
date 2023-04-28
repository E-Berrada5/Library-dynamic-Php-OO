<?php


abstract class Controller
{
    abstract public function action_default();

    public function __construct()
    {
        // nous vérifions si l'action et la méthode sont envoyer vers l'url dans ce cas nous appelons  la méthode 
        if (isset($_GET['action']) and method_exists($this, "action_" . $_GET['action'])) {
            $action = "action_" . $_GET['action'];
            $this->$action();
        } else {
            $this->action_default();
        }
    }
//création de la fonction render en français cela signifie rendu qui prend en paramètre 2 variables et 1 tableau
// clé valeur 
    protected function render($vue, $data = [])
    {
       /* nous déclarons $file_name qui va stocker le chemin d'une vue en lui indiquant le dossier Views puis
       le nom du fichier qui commence par view ainsi que le premier paramètre $ vue qui le nom de fin du fichier
       plus .php
       */
        $file_name = /*  $basePath .  */"Views/view_" . $vue . ".php";
        /*
         utilise la fonction file_exists  dans l'expression de notre if  qui vérifie si le fichier existe : on lui passe en
          paramètres $file_name
          dans ce cas là on require (inclus la vue )
        */
        if (file_exists($file_name)) {
            require($file_name);
            /*sinon on  utilise $this pour utiliser la méthode action_error qui nous renvoie vers la vue
            error
            */
        } else {
            $this->action_error("pas de vue");
        }
    }
    /*function action_error qui prend en paramètre $ message pour dire que si $data contient une erreur
     on appel la fonction (méthodes car elle est dans la classse : abstract class Controller ) render qui va nous
     renvoyer à la vue 
     */
    protected function action_error($message)
    {
        $data = ['error' => $message];
        $this->render('error', $data);
        die();
    }





    
}

?>