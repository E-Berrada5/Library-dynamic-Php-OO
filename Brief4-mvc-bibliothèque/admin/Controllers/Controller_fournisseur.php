<?php

class Controller_fournisseur extends Controller{
   public function action_default(){
        $this->action_fournisseur();
    }
    public function action_fournisseur(){
        $this->render("fournisseur");
    }
public function action_all_fournisseur (){
$m=Model::get_model();
$data=["fournisseur"=>$m->get_all_fournisseur()];
$this->render("all_fournisseur",$data);
}

public function action_rsociale_fournisseur(){
$m = Model::get_model();
$data = ["rsociales"=>$m->get_rsociale_fournisseur(),"position" => 1];
$this->render("rsociale_fournisseur",$data);
}
public function action_rsociale_all_fournisseur(){
    $m = Model::get_model();
    $rsociale =$_POST['rsociale'];
    $data=["fournisseurrsociale" =>$m->get_rsociale_all_fournisseur($rsociale),"rsociales"=>$m->get_rsociale_fournisseur(),"position"=>2];
    $this->render("rsociale_fournisseur",$data);
}
public function action_localite_fournisseur(){
    $m = Model::get_model();
    $data = ["localites" => $m ->get_localite_fournisseur(),"position"=> 1];
    $this->render("localite_fournisseur",$data);
}
public function action_localite_all_fournisseur(){
    $m=Model::get_model();
    $localite = $_POST['localite'];
    $data=["fournisseurlocalite" =>$m->get_localite_all_fournisseur($localite),"localites"=>$m->get_localite_fournisseur(),"position"=>2];
$this->render("localite_fournisseur",$data);
}
 public function action_pays_fournisseur(){
    $m=Model::get_model();
    $data = ["payss" => $m -> get_pays_fournisseur(),"position"=>1];
    $this->render("pays_fournisseur", $data);
 }
public function action_pays_all_fournisseur(){
    $m=Model::get_model();
    $pays = $_POST['pays'];
    $data=["fournisseurpays" => $m->get_pays_all_fournisseur($pays),"pays"=>$m->get_pays_fournisseur(),"position"=>2];
$this->render("pays_fournisseur", $data);
    
}
public function action_ajouter_un_fournisseur(){
    $this->render("ajouter_un_fournisseur");
}

public function action_traitement_ajout_fournisseur(){
     // on check si le form a bien été soumis
     if(isset($_POST["submit"])) {
        $fournisseur= $_POST['fournisseur'];
        $rs = $_POST['rs'];
        $rs1 = $_POST['rs1'];
        $cp = $_POST['cp'];
        $localite = $_POST['localite'];
        $pays = $_POST['pays'];
        $tel = $_POST['tel'];
        $url1 = $_POST['url1'];
        $mail = $_POST['mail'];
        $fax = $_POST['fax'];
        if (empty($fournisseur) || empty($rs) || empty($rs1) || empty($cp)|| empty($localite)
        || empty($pays)|| empty($tel)|| empty($url1)|| empty($mail)|| empty($fax)
         ) {
            echo '<h1>Certains champs sont vides!</h1>';
            $this->render("ajouter_un_fournisseur");
            exit;
        }

        // on appelle le model
        // on récupère le résultat de la requête
        $model = Model::get_model();
        $model->get_add_fournisseur( $fournisseur,$rs,$rs1, $cp, $localite, $pays , $tel , $url1 , $mail , $fax );
        $fournisseur = ["fournisseurs" => $model->get_all_fournisseur()];

        // on passe la liste à la vue qui affiche tous les fournisseur
        $this->render("all_fournisseur", $fournisseur);
    }

}




}
