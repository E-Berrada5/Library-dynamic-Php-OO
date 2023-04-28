<?php

class Controller_login extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }
    public function action_home()
    {
        if (isset($_POST['submit'])) {
            $m = Model::get_model();
            $user = $m->get_login_user();

            if ($user !== null) {
                $nom = $user->NOM;
                $prenom = $user->PRENOM;
                $roles = $user->Roles;

                $_SESSION['name'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['roles'] = $roles;

                if ($_SESSION['roles'] === "Admin") {
                    header('Location: admin/?controller=home&action=home');
                } else {
                    header('Location: user/?controller=home&action=home');
                }
            } else {
                //! Les identifiants de connexion sont incorrects
                header('Location: ?controller=home&action=home');
            }
            die("Aucun utilisateur trouvé");
        }

    }
}


