Résultat de votre recherche :
<br />
<table >
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
		<?php foreach ($commande as $c): ?>
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