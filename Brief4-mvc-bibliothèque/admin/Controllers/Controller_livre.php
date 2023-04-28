<?php

/**
 * Summary of Controller_livre
 */
class Controller_livre extends Controller
{
    public function action_default()
    {
        $this->action_livre();
    }

    public function action_livre()
    {
        $this->render("livre");
    }


public function action_all_livres ()

{
$m=Model::get_model();
$data=["livres"=>$m->get_all_livres()];
$this->render("all_livres",$data);
}

public function action_titre_livres()
 { 
    $m=Model::get_model();
     $data=["titres"=>$m->get_titre_livres()];
      $this->render("titre_livres",$data);
     }
public function action_titre_all_livres(){
    $m=Model::get_model();
    $titre = $_POST['titre'];
    $data=["livrestitre" =>$m->get_titre_all_livres($titre)];
    $this->render("titre_all_livres",$data);
}
public function action_auteur_livres(){
    $m =Model::get_model();
    $data=["auteurs"=>$m->get_auteur_livres()];
    $this->render("auteur_livres", $data);
}
public function action_auteur_all_livres(){
    $m=Model::get_model();
    $auteur= $_POST['auteur'];
    $data=["livresauteur" => $m-> get_auteur_all_livres($auteur)];
    $this->render("auteur_all_livres", $data);
}

public function action_editeur_livres (){
    $m=Model::get_model();
    $data= ["editeurs" => $m ->get_editeur_livres()];
    $this->render("editeur_livres", $data);
}
public function action_editeur_all_livres(){
$m =Model::get_model();
$editeur = $_POST['editeur'];
$data=["livresediteur" => $m-> get_editeur_all_livres($editeur)];
$this->render("editeur_all_livres", $data);
}

public function  action_ajouter_un_livre(){
    $this->render("ajouter_un_livre");
}
public function action_traitement_ajout_livre()
    {
        // on check si le form a bien été soumis
            if ('POST' === $_SERVER['REQUEST_METHOD']) {

                $ISBN = $_POST['ISBN'];
                $Titre = $_POST['Titre'];
                $Theme = $_POST['Theme'];
                $NombrePages = $_POST['Nombresdepages'];
                $Format = $_POST['Format'];
                $Nom = $_POST['Nomauteur'];
                $Prenom = $_POST['Prenomauteur'];
                $Editeur =$_POST['Editeur'];
                $Annee = $_POST['Ae'];
                $Prix = $_POST['Prix'];
                $Langue = $_POST['Langue'];
                if (empty($ISBN) || empty($Titre) || empty($Theme) || empty($NombrePages)|| empty($Format)
                || empty($Nom)|| empty($Prenom)|| empty($Editeur)|| empty($Annee)|| empty($Prix)|| empty($Langue)
                ) {
                    echo '<h1>Certains champs sont vides!</h1>';
                    $this->render("ajouter_un_livre");
                    exit;
                }
               


            // on appelle le model
            // on récupère le résultat de la requête
            $model = Model::get_model();
            $model->get_add_livre($ISBN,$Titre,$Theme,$NombrePages,$Format,$Nom,$Prenom,$Editeur,$Annee,$Prix,$Langue);

            $livres = ["livres" => $model->get_all_livres()];

            // on passe la liste à la vue qui affiche tous les livres
            $this->render("all_livres", $livres);

        }
}
// Formulaire de modification d'livre

public function action_edit_livre()
{
    $id = $_GET['id'];
    $m = Model::get_model();
    $data = ['livre' => $m->get_edit_livre($id)];
    $this->render("edit_livre_form", $data);
}
 // Valider modification d'un livre
 public function action_traitement_edit_livre()
 {

     if (isset($_POST['submit'])) {
         $m = Model::get_model();
         $m->get_traitement_edit_livre();
         $data = ["livres" => $m->get_all_livres()];
         $this->render("all_livres", $data);
     } else {
         $this->render("edit_livre");
     }
 }
  //* Supprimer un livre
  public function action_delete_livre()
  {
      $id = $_GET['id'];
      $m = Model::get_model();
      $m->get_delete_livre($id);
      $livres = $m->get_all_livres();
      $data = ['livres' => $livres];
      $this->render("all_livres", $data);
  }




}
?>
