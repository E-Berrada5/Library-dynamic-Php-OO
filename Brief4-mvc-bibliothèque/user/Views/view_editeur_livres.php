<form class="formConnexAjout" method="post" action="?controller=livre&action=editeur_all_livres">

<div class="formDiv">
    <label class="labelForm" for="nom">Recherche de livres par éditeur</label><br>
    <?php
    echo '<select class="form" required="required" placeholder="Titre" type="text" name="editeur">';
    foreach ($editeurs as $l):
        echo '<option value="' . $l->Editeur . '">' . $l->Editeur . '</option>';
    endforeach;
    echo '</select>';
    ?>

</div>

<div class="connexButtonDiv">
    <button type="submit" class="btnC">Chercher</button>
</div>

</form>
