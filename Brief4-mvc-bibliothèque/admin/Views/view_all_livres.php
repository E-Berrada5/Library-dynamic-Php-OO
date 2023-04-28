Résultat de votre recherche :
<br/>


<table >
	<thead>
		<tr class="key">
			<th>ISBN</th>
			<th>Titre</th>
			<th>Thème</th>
			<th>Nombre de page</th>
			<th>Format</th>
			<th>Auteur</th>
			<th>Editeur</th>
			<th>Année d'édition</th>
			<th>Prix</th>
			<th>Langue</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($livres as $l):?>
			<tr class="value">
				<td> <?=$l->ISBN?> </td>
				<td> <?=$l->Titre?> </td>
				<td> <?=$l->Theme?> </td>
				<td> <?=$l->Nbpages?> </td>
				<td> <?=$l->Format?> </td>
				<td> <?=$l->Nom_auteur?> <?=$l->Prenom_auteur?></td>
				<td> <?=$l->Editeur?> </td>
				<td> <?=$l->anneeedition?> </td>
				<td> <?=$l->Prix?> </td>
				<td> <?=$l->Langue?> </td>
				<td><?= "<a href='?controller=livre&action=edit_livre&id=" . $l->ID . "'>🖋️</a>" ?>
				<?= "<a href='?controller=livre&action=delete_livre&id=" . $l->ID . "'>❌</a>" ?>
														</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>