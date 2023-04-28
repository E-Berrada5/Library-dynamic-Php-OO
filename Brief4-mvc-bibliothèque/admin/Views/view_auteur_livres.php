<form class="formConnexAjout" method="post" action="?controller=livre&action=auteur_all_livres">

<div class="formDiv">
    <label class="labelForm" for="nom">Recherche de livres par auteur</label><br>
    <?php
    echo '<select class="form" required="required" placeholder="Titre" type="text" name="auteur">';
    foreach ($auteurs as $l):
        echo '<option value="' . $l->Nom_auteur . '">' . $l->Nom_auteur . '</option>';
    endforeach;
    echo '</select>';
    ?>

</div>

<div class="connexButtonDiv">
    <button type="submit" class="btnC">Chercher</button>
</div>

</form>
