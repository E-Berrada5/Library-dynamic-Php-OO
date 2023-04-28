<div class="form">
    <form id="signupForm" action="?controller=sign_up&action=insert_user" method="post" 
    >
        <h3>Inscription</h3>
        <p>Entrez vos informations pour vous inscrire</p>
                <label for="nom">Nom : </label>
                <input type="text" id="inom" name="nom" required />
            
                <label for="prenom">Prénom : </label>
                <input type="text" id="iprenom" name="prenom" required />
            
                <label for="email">Adresse e-mail : </label>
                <input type="email" id="imail" name="email" required />
            
                <label for="password">Mot de Passe : </label>
                <input type="password" id="ipassword" name="password" required />
            
                <input type="submit" id="submit" name="submit" value="S'inscrire" />
                <a href="?controller=sign_up&action=home">Se connecter</a>
            
            <span id="error"></span>
    </form>
</div>