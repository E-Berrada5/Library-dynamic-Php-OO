<div class="form">
    <form id="loginForm" action="?controller=login&action=login" method="post" >
        <h4>Bienvenue à la bibliothèque connectez vous pour consultez nos livres</h4>

                <label for="email">Adresse e-mail : </label>
                <input type="email" id="email" name="email" value="<?= $_SESSION["error"]["lastEmail"] ?? "" ?>"/>
            
                <label for="password">Mot de Passe : </label>
                <input type="password" id="password" name="password" />
            
                <label for="submit"></label>
                <input type="submit" id="submit" name="submit" value="Se connecter" />
                
                <a id="sign_up" href="?controller=home&action=sign_up">Inscrivez-vous</a>
            
        
    </form>
</div>