<form class="formConnexAjout" method="post" action="?controller=commande&action=date_all_commande">

<div class="formDiv">
    <label class="labelForm" for="nom">Recherche de commande par éditeur : </label><br>
    <?php
    echo '<select class="form" required="required" placeholder="Titre" type="text" name="dateachat">';
    foreach ($commandes as $c):
        echo '<option value="' . $c->Date_achat . '">' . $c->Date_achat . '</option>';
    endforeach;
    echo '</select>';
    ?>

</div>

<div class="connexButtonDiv">
    <button type="submit" class="btnC">Chercher</button>
</div>

</form>
<?php
if ($position !== 1):

?>
Résultat de votre recherche :
<br />
<table>
	<thead>
		<tr class="key">
			<th>ISBN</th>
			<th>Nom et Prénom de l'auteur</th>
			<th>Titre</th>
			<th>Raison Sociale</th>
			<th>prix_achat</th>
			<th>Date achat</th>
			<th>Nombre d'exemplaire</th>
		</tr>

	      
	</thead>
	<tbody>
		<?php foreach ($date  as $c): ?>
			<tr class="value">
				<td><?= $c->ISBN?></td>
				<td><?= $c->Nom_auteur  ?>
						<?= $c->Prenom_auteur  ?></td>
				<td><?= $c->Titre  ?></td>
				<td><?= $c->Raison_Sociale ?></td>
				<td><?= $c->Prix_achat ?></td>
				<td><?= $c->Date_achat ?></td>
				<td><?= $c->Nbr_exemplaires ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php
endif

?>