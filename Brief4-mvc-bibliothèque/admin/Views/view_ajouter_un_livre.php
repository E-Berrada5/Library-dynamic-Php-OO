

<fieldset><legend>Ajouter un livre</legend>
  <FORM METHOD="POST" ACTION="?controller=livre&action=traitement_ajout_livre"> 
                <label for="ISBN"></label>
                ISBN<input type="number" name="ISBN" id="ISBN" required >
                <label for="Titre"></label>
                Titre<input type="text" name="Titre" id="Titre" required> 
                <label for="Theme"></label>
                Theme<input type="text"  name="Theme" id="Theme" required>
                <label for="Nombresdepages"></label>
                Nb pages<input type="number" name="Nombresdepages" id="Nombresdepages" required >
                <label for="Format"></label>
                Format<input type="text" name="Format" id="Format" required >
                <label for="Nomauteur"></label>
                Nom auteur<input type="text" name="Nomauteur" id="Nomauteur" required >
                <label for="Prenomauteur"></label>
                Prenom auteur<input type="text" name="Prenomauteur"  id="Prenomauteur" required >
                <label for="Editeur"></label>
                Editeur<input type="text" name="Editeur"  id="Editeur" required >
                <label for="Ae"></label>
                Année d'édition<input type="number" name="Ae"  id="Ae" required >
                <label for="Prix"></label>
                Prix<input type="text" name="Prix"  id="Prix" required >
                <label for="Langue"></label>
                Langue<input type="text" name="Langue"   id="Langue" required>
                <label for="Ajouter"></label>
                <input type="submit" value="Ajouter"  id="Ajouter"  name="submit">
  
  </form>
  </fieldset>