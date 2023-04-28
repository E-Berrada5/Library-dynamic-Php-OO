<?php

class Model
{   // Début de la Classe
    private $bd;
    private static $instance = null;
    /*
         * Constructeur créant l'objet PDO et l'affectant à $bd
         */
    private function __construct()
    {  // Fonction qui sert à faire le lien avec la BDD

        $dsn = "mysql:host=localhost;dbname=bdp5";   // Coordonnées de la BDD
        $login = "root";   // Identifiant d'accès à la BDD
        $mdp = ""; // Mot de passe d'accès à la BDD
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->query("SET NAMES 'utf8'");
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    // get_model()

    public static function get_model()
    {    // Fonction qui sert à créer une instance de Model pour l'appeler dans chaque Controller (équivalent de $connex)
        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    public function get_all_livres()
    {

        $r = $this->bd->prepare("SELECT * FROM livres order by Titre");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

  public function get_titre_livres (){
$r = $this->bd->prepare("SELECT DISTINCT Titre FROM livres order by Titre");
$r->execute();
return $r->fetchAll(PDO::FETCH_OBJ);
  }
  public function get_titre_all_livres($titre){
$r = $this->bd->prepare ("SELECT * FROM livres WHERE Titre = '$titre' ");
$r->execute();
return $r->fetchAll(PDO::FETCH_OBJ);
  }
public function get_auteur_livres(){
$r = $this->bd->prepare("SELECT DISTINCT  Nom_auteur FROM livres order by Nom_auteur");
$r->execute();
return $r->fetchall(PDO::FETCH_OBJ);
}
public function get_auteur_all_livres($auteur){
  $r = $this->bd ->prepare ("SELECT * FROM livres WHERE Nom_auteur = '$auteur' ");
  $r->execute();
  return $r->fetchAll(PDO::FETCH_OBJ);
}
public function get_editeur_livres(){
  $r = $this->bd->prepare("SELECT DISTINCT Editeur FROM livres order by Editeur");
  $r->execute();
  return $r ->fetchAll(PDO::FETCH_OBJ);
}
public function get_editeur_all_livres($editeur){
  $r = $this->bd ->prepare("SELECT * FROM livres WHERE Editeur = '$editeur ' ");
$r->execute();
return $r ->fetchAll(PDO::FETCH_OBJ);
}
public function get_all_fournisseur()
    {

        $r = $this->bd->prepare("SELECT * FROM fournisseur order by Id_fournisseur ");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }
public function get_rsociale_fournisseur(){
  $r = $this->bd->prepare
  ("SELECT DISTINCT Raison_Sociale FROM fournisseur order by Raison_Sociale ");
  $r->execute();
  return $r ->fetchAll(PDO::FETCH_OBJ);
}
public function  get_rsociale_all_fournisseur($rsociale){
  $rsociale =$_POST['rsociale'];
  $r = $this->bd->prepare("SELECT * FROM fournisseur WHERE Raison_Sociale = '$rsociale' ");
 $r->execute();
 return $r->fetchAll(PDO::FETCH_OBJ);
}
public function get_localite_fournisseur(){
  $r = $this->bd->prepare("SELECT DISTINCT Localite FROM fournisseur order by Localite ");
  $r->execute();
  return $r ->fetchAll(PDO::FETCH_OBJ);
}
public function get_localite_all_fournisseur($localite){
  $localite = $_POST['localite'];
  $r = $this->bd->prepare("SELECT * FROM fournisseur WHERE Localite = '$localite' ");
 $r->execute();
 return $r->fetchAll(PDO::FETCH_OBJ);
}
public function get_pays_fournisseur(){
  $r = $this->bd->prepare("SELECT DISTINCT Pays FROM fournisseur order by Pays ");
  $r->execute();
  return $r ->fetchAll(PDO::FETCH_OBJ);
}
public function get_pays_all_fournisseur($pays){
  $pays = $_POST['pays'];
  $r = $this->bd->prepare("SELECT * FROM fournisseur WHERE  Pays = '$pays'  ");
  $r->execute();
  return $r->fetchAll(PDO::FETCH_OBJ);
}

// traitement pour un ajout de livre
  // créer une public function add_livre($livre)
        public function get_add_livre($ISBN,$Titre,$Theme,$NombrePages,$Format,$Nom,$Prenom,$Editeur,$Annee,$Prix,$Langue) {


          // requête préparée en INSERT
          $stmt = $this->bd->prepare("INSERT INTO livres(ISBN, Titre, Theme, Nbpages, Format, Nom_auteur, Prenom_auteur, Editeur, Anneeedition, Prix, Langue) 
          VALUES (:ISBN, :Titre, :Theme, :Nb_pages, :Format, :Nom_auteur, :Prenom_auteur, :Editeur, :Annee_edition, :Prix, :Langue)");

          $stmt->bindParam(':ISBN', $ISBN);
          $stmt->bindParam(':Titre', $Titre);
          $stmt->bindParam(':Theme', $Theme);
          $stmt->bindParam(':Nb_pages', $NombrePages);
          $stmt->bindParam(':Format', $Format);
          $stmt->bindParam(':Nom_auteur', $Nom);
          $stmt->bindParam(':Prenom_auteur', $Prenom);
          $stmt->bindParam(':Editeur', $Editeur);
          $stmt->bindParam(':Annee_edition', $Annee);
          $stmt->bindParam(':Prix', $Prix);
          $stmt->bindParam(':Langue', $Langue);
          $stmt->execute();
      }
      
      //traitement pour l'ajout d'un fournisseur 
      //créer une public class  function   get_ add_fournisseur 

    public function get_add_fournisseur($fournisseur,$rs,$rs1, $cp, $localite, $pays , $tel , $url1 , $mail , $fax ){

  $stmt = $this->bd->prepare('INSERT INTO fournisseur (Code_fournisseur, Raison_Sociale, Rue_fournisseur, Code_postal, Localite, Pays, Tel_fournisseur, Url_fournisseur, Email_fournisseur, Fax_fournisseur) 
                              VALUES (:fournisseur, :rs, :rs1, :cp, :localite, :pays, :tel, :url1, :mail, :fax)');
    $stmt->bindParam(':fournisseur', $fournisseur);
    $stmt->bindParam(':rs', $rs);
    $stmt->bindParam(':rs1', $rs1);
    $stmt->bindParam(':cp', $cp);
    $stmt->bindParam(':localite', $localite);
    $stmt->bindParam(':pays', $pays);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':url1', $url1);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':fax', $fax);
    $stmt->execute();
    }
    
     // Formulaire de modification d'livre
     public function get_edit_livre($id)
     {
         $id = $_GET['id'];
         $r = $this->bd->prepare("SELECT * FROM `livres` WHERE ID = :id");
         $r->bindParam(':id', $id);
         $r->execute();
 
         return $r->fetchAll(PDO::FETCH_OBJ);
     }

      //* Valider modification d'un livre
    public function get_traitement_edit_livre()
    {
        $id = $_GET['id'];
        $ISBN = $_POST['isbn'];
        $Titre = $_POST['titre'];
        $Theme = $_POST['theme'];
        $NombrePages = $_POST['nbpages'];
        $Format = $_POST['format'];
        $Nom = $_POST['nom'];
        $Prenom = $_POST['prenom'];
        $Editeur = $_POST['editeur'];
        $Annee = $_POST['annee'];
        $Prix = $_POST['prix'];
        $Langue = $_POST['langue'];
        $r = $this->bd->prepare("UPDATE `livres` SET `ISBN`=:isbn, `Titre`=:titre, `Theme`=:theme, `Nbpages`=:nbpages, `Format`=:format, `Nom_auteur`=:nom, `Prenom_auteur`=:prenom, `Editeur`=:editeur, `anneeedition`=:annee, `Prix`=:prix, `Langue`=:langue WHERE ID=:id");
        $r->bindParam(':isbn', $ISBN);
        $r->bindParam(':titre', $Titre);
        $r->bindParam(':theme', $Theme);
        $r->bindParam(':nbpages', $NombrePages);
        $r->bindParam(':format', $Format);
        $r->bindParam(':nom', $Nom);
        $r->bindParam(':prenom', $Prenom);
        $r->bindParam(':editeur', $Editeur);
        $r->bindParam(':annee', $Annee);
        $r->bindParam(':prix', $Prix);
        $r->bindParam(':langue', $Langue);
        $r->bindParam(':id', $id);
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

//* Supprimer un livre
public function get_delete_livre($id)
{
    $id = $_GET['id'];
    $r = $this->bd->prepare("DELETE FROM livres WHERE id = :id");
    $r->bindParam(':id', $id);
    $r->execute();

    return $r->fetchAll(PDO::FETCH_OBJ);

}
public function get_all_commandes()
{

    $r = $this->bd->prepare("SELECT * FROM commande c INNER JOIN livres l ON c.Id_livre=l.Id INNER JOIN fournisseur f ON c.id_fournisseur=f.Id_fournisseur;");
    $r->execute();

    return $r->fetchAll(PDO::FETCH_OBJ);

}
public function get_ajout_commandes_titres()
    {
        $r = $this->bd->prepare("SELECT ID,Titre from Livres ORDER BY Titre");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_ajout_commandes_raison_sociale()
    {
        $r = $this->bd->prepare("SELECT  Id_fournisseur,raison_sociale from fournisseur ORDER BY raison_sociale");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    //  traitement pour un ajout d'une commande
    // créer une public function add_commande($commande)
          public function get_add_commande() {
            $titre = $_POST['titre'];
             $rs = $_POST['Raison_Sociale'];
            $da = $_POST['Date_achat'];
            $pa = $_POST['Prix_achat'];
            $nbe = $_POST['Nbr_exemplaires'];
           
            // requête préparée en INSERT
            $stmt = $this->bd->prepare("INSERT INTO commande (Id_livre, Id_fournisseur, Date_achat,
             Prix_achat, Nbr_exemplaires) 
            VALUES (:titre, :rs, :da, :pa, :nbe)");
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':rs', $rs);
            $stmt->bindParam(':da', $da);
            $stmt->bindParam(':pa', $pa);
            $stmt->bindParam(':nbe', $nbe);
            $stmt->execute();
        }

     public function  get_editeur_commande(){
      $r = $this->bd->prepare("SELECT livres.Editeur, commande.Id_livre FROM commande 
      INNER JOIN livres ON commande.Id_livre = livres.ID ORDER BY Editeur;");
      $r->execute();
      return $r->fetchAll(PDO::FETCH_OBJ);
     } 
     public function get_editeur_all_commande($editeur){
              var_dump($editeur);
      $r = $this->bd->prepare("SELECT * FROM commande 
      INNER JOIN fournisseur ON commande.Id_fournisseur = fournisseur.Id_fournisseur 
      INNER JOIN livres ON commande.Id_livre = livres.ID 
      WHERE livres.Editeur = :editeur ");
      $r->bindValue(':editeur', $editeur);
      $r->execute();
      return $r->fetchAll(PDO::FETCH_OBJ);
     }
     public function get_fournisseur_commande(){
      $r=$this->bd->prepare("SELECT fournisseur.Raison_Sociale, commande.Id_fournisseur 
      FROM commande
       INNER JOIN fournisseur ON commande.Id_fournisseur = fournisseur.Id_fournisseur 
       ORDER BY Raison_Sociale");
        $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
     }
     public function get_fournisseur_all_commande ($fournisseur){
      var_dump($fournisseur);
      $r = $this->bd->prepare("SELECT * FROM commande
      INNER JOIN fournisseur ON commande.Id_fournisseur = fournisseur.Id_fournisseur
      INNER JOIN livres ON commande.Id_livre = livres.ID 
      WHERE fournisseur.Raison_Sociale = :fournisseur ");
      $r->bindValue(':fournisseur', $fournisseur);
      $r->execute();
      return $r->fetchAll(PDO::FETCH_OBJ);
     }
     public function get_date_commande(){
      $r=$this->bd->prepare("SELECT commande.Date_achat FROM commande order by Date_achat");
      $r->execute();
        return $r->fetchAll(PDO::FETCH_OBJ);
     }
     public function get_date_all_commande ($date){
      $r = $this->bd->prepare("SELECT * FROM commande
      INNER JOIN fournisseur ON  commande.Id_fournisseur = fournisseur.Id_fournisseur
      INNER JOIN livres ON commande.Id_livre = livres.ID 
      WHERE commande.Date_achat = :dates  ");

      $r->bindValue(':dates', $date);
      $r->execute();
      return $r->fetchAll(PDO::FETCH_OBJ);

     }














} // fin de la classe 
?>