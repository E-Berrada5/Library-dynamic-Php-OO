<fieldset><legend>Ajouter une commande</legend>
  <FORM METHOD="POST" ACTION="?controller=commande&action=traitement_ajout_commande"> 
  <label class="labelForm" for="nom">Titre</label><br>
    <?php
    echo '<select class="form" required="required" placeholder="Titre" type="text" name="titre">';
    foreach ($titres as $l):
        echo '<option value="' . $l->ID  . '">' . $l->Titre . '</option>';
    endforeach;
    echo '</select>';
    ?>
    <label class="labelForm" for="nom">Raison_Sociale</label><br>
    <?php
    echo '<select class="form" required="required" placeholder="Raison_Sociale" type="text" name="Raison_Sociale">';
    foreach ($Raison_Sociale as $l):
        echo '<option value="' . $l->Id_fournisseur . '">' . $l->raison_sociale . '</option>';
    endforeach;
    echo '</select>';
    ?>
                <label for="Date_achat">Date_achat</label>
                <input type="date" name="Date_achat" id="Date_achat" required >

                <label for="Prix_achat">Prix_achat</label>
                <input type="number" name="Prix_achat" id="Prix_achat" required >

                <label for="Nbr_exemplaires">Nombre d'exemplaires</label>
                <input type="number" name="Nbr_exemplaires" id="Nbr_exemplaires" required >


                <label for="Ajouter"></label>
                <input type="submit" value="Ajouter"  id="Ajouter"  name="submit">
  
  </form>
  </fieldset>