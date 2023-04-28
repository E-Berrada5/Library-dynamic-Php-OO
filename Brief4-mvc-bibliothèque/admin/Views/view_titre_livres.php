<form class="formConnexAjout" method="post" action="?controller=livre&action=titre_all_livres">

<div class="formDiv">
    <label class="labelForm" for="nom">Recherche de livres par titre</label><br>
    <?php
    echo '<select class="form" required="required" placeholder="Titre" type="text" name="titre">';
    foreach ($titres as $l):
        echo '<option value="' . $l->Titre . '">' . $l->Titre . '</option>';
    endforeach;
    echo '</select>';
    ?>

</div>

<div class="connexButtonDiv">
    <button type="submit" class="btnC">Chercher</button>
</div>

</form>
