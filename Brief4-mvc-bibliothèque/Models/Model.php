<?php
class Model
{ // Début de la Classe
    private $bd;
    private static $instance = null;
    //  Constructeur créant l'objet PDO et l'affectant à $bd
    private function __construct()
    { // Fonction qui sert à faire le lien avec la BDD
        $dsn = "mysql:host=localhost;dbname=bdp5"; // Coordonnées de la BDD
        $login = "root"; // Identifiant d'accès à la BDD
        $mdp = ""; // Mot de passe d'accès à la BDD
        /*on utilise $this pour faire référence à la propriétés bd qui prend pour paramètres les trois variables du
         dessus : $dsn, $login, $mdp 
        */
        $this->bd = new PDO($dsn, $login, $mdp);
        /* on rappel la propriétés bd et on lui attribut query avec pour paramètres ("SET NAMES 'utf8'")
query prépare et éxécute une requête sql 
        */
        $this->bd->query("SET NAMES 'utf8'");
        /* on utilise la fonction setAttribute avec pour paramètre (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
       Cette fonction retourne true en cas de succès ou false si une erreur survient.
        */
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    // get_model()

    /* Fonction qui sert à créer une instance de Model pour l'appeler dans chaque Controller
         (équivalent de $connex)  */
    public static function get_model()
    { 
        // nous utilisons  la fonction is_null dans l'expression du if pour vérifier ce que renvoie le model
        if (is_null(self::$instance)) {
            /*Au sein d une méthode on accède à  l'objet grâce à la pseudo variable this tandis qu'on
             accède  à la classe grâce au mot clé self
*/
            self::$instance = new Model();
        }
        return self::$instance;
    }

    public function get_login_user()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $r = $this->bd->prepare("SELECT * FROM users WHERE EMAIL=:email");
        $r->bindParam(':email', $email);
        $r->execute();
        if ($r->rowCount() > 0) {
            //* L'utilisateur existe, on vérifie le mot de passe
            $user = $r->fetch(PDO::FETCH_OBJ);
            $hashed_password = $user->MDP;
            if (password_verify($password, $hashed_password)) {
                //* Le mot de passe correspond au mot de passe hashé de la DB, on return l'objet user
                return $user;
            } else {
                //! Le mot de passe ne correspond pas au mot de passe hashé de la DB, on return NULL
                return null;
            }
        } else {
            //! Utilisateur non existant, on return NULL
            return null;
        }
    }










    public function get_sign_up_user($nom, $prenom, $email, $hashed_password)
    {
        
        $r = $this->bd->prepare("INSERT INTO users(NOM, PRENOM, EMAIL, MDP) 
        VALUES (:nom,:prenom,:email,:pass)");
        $r->bindParam(':nom', $nom);
        $r->bindParam(':prenom', $prenom);
        $r->bindParam(':email', $email);
        $r->bindParam(':pass', $hashed_password);
        $r->execute();
    }

}