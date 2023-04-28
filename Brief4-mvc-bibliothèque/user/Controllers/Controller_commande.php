<?php

class Controller_commande extends Controller
{
    public function action_default()
    {
        $this->action_commande();
    }

    public function action_commande()
    {
        $this->render("home");
    }




    
public function action_all_commandes(){
    $m=Model::get_model();
    $data=["commande"=>$m->get_all_commandes()];
    $this->render("all_commandes",$data);
}





//fonction qui va s'occuper de l'affichage du formulaire d'ajout de commande 
// 1 ère étape l'on redirige vers le dossier  Views   et la vue view_ insert_commande.php
public function action_insert_commande(){
    //2 ème étape on instancie le model
    $m = Model::get_model();
    /* 3 ème étape on déclare une variable $data qui va afficher dynamiquement la valeur titres et Raison_Sociale
    pour cela on crée une fonction get_ajout_commandes_titres qui dans le modèle va faire une requête
    vers la bd et l'afficher par ordre aphabétique dans le select insert_commande qui est indiquer à la fin de 
    notre fonction action_insert_commande dans le render même chose pour  
    get_ajout_commandes_raison_sociale */
    $data = ["titres" => $m->get_ajout_commandes_titres(),
    "Raison_Sociale" => $m->get_ajout_commandes_raison_sociale()
    ];
    $this->render("insert_commande", $data);
}
/*on crée la fonction action_traitement_ajout_commande qui va venir récupérer les données de notre formulaire
*/
public function action_traitement_ajout_commande(){
 // on check si le form a bien été soumis
 if(isset($_POST["submit"])) {
    // on appelle le model
    $m = Model::get_model();
    // on récupère le résultat de la requête
    $titre = $_POST['titre'];
    $rs = $_POST['Raison_Sociale'];
    $da = $_POST['Date_achat'];
    $pa = $_POST['Prix_achat'];
    $nbe = $_POST['Nbr_exemplaires'];
     $data = ["ajoutcommande" =>$m->get_add_commande(),
                    "commande" =>$m->get_all_commandes()];
     $this->render("all_commandes", $data);
}
}





 public function action_editeur_commande (){
    $m=Model::get_model();
    $data=["commandes"=>$m->get_editeur_commande(),"position" =>1];
    $this->render("commande_editeur",$data);

}
public function action_editeur_all_commande(){
    $m = Model::get_model();
    $editeur = $_POST['editeur'];
    $data=["commandeediteur" => $m->get_editeur_all_commande($editeur),"position"=>2];
$this->render("commande_editeur",$data);
}






//on crée l'action mentionné dans le select du fichier header.php qui est dans le fichier utils 
public function action_fournisseur_commande (){
    // on instancie le model 
    $m=Model::get_model();
    // on redirige verss le model pour effectuer la requête sql afin de récupérer la liste des fournisseur
    //par raison sociale 
    //on met l'affichage de l'éxecution de cette fonction en position 1 
   $data=["commandes"=>$m->get_fournisseur_commande(),"position"=>1];
   //on renvoie le tout vers la vue grâce à la fonction render en lui passant en paramètre le lien de la vue
   // et la variable $data qui va afficher le rendu de la requête sql effectuer dans le model
   $this->render("commande_fournisseur",$data);
}
// on crée l'action mentionné dans la vue et le header pour y intégrer le contenu à aller chercher
public function action_fournisseur_all_commande(){
    //on instancie le model 
    $m =Model::get_model();
//on récupère le choix du select afin de l'envoyer à la fonction qui va effectuer la requête vers la bd
    $fournisseur = $_POST['fournisseur'];
    //on met l'affichage de l'éxecution de cette fonction en position 2  "rs" qui sera la clé de la boucle
    // foreach , get_fournisseur_all_commande va faire une requête vers la bd pour récupérer toutes
    //les commandes par le id du fournisseur choisi 
    $data = ["rs" =>$m-> get_fournisseur_all_commande($fournisseur),"position"=>2];
// on renvoie le tout à la vue avec la fonction render qui prend pour paramètre le lien de la vue et $data
//qui et la requete sql 
    $this->render("commande_fournisseur",$data);
}





public function action_date_commande(){
    //on instancie le model 
    $m =Model::get_model();
     /* on redirige vers le model pour effectuer la requête sql afin de récupérer la liste des dates d'achats
      et de l'afficher sous forme de select dans la vue 
     on met l'affichage de l'éxecution de cette fonction en position 1   
     */
    $data=["commandes"=>$m->get_date_commande(),"position"=>1];
   //on renvoie le tout vers la vue grâce à la fonction render en lui passant en paramètre le lien de la vue
   // et la variable $data qui va afficher le rendu de la requête sql effectuer dans le model
   $this->render("commande_date",$data);
}
public function action_date_all_commande(){
    $m = Model::get_model();
    $date = $_POST['dateachat'];
    $data=["date" => $m->get_date_all_commande($date),"position"=>2];
$this->render("commande_date",$data);
}


}
?>