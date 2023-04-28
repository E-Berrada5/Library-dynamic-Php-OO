<form class="formConnexAjout" method="post" action="?controller=fournisseur&action=localite_all_fournisseur">

<div class="formDiv">
    <label class="labelForm" for="nom">Recherche de livres par auteur</label><br>
    <?php
    echo '<select class="form" required="required" placeholder="Titre" type="text" name="localite">';
    foreach ($localites as $l):
        echo '<option value="' . $l->Localite . '">' . $l->Localite . '</option>';
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
<br/>


<table >
	<thead>
		<tr class="key">
			<th>Code_fournisseur</th>
			<th>Localite</th>
			<th>Rue_fournisseur</th>
			<th>Code_postal</th>
			<th>Localite</th>
			<th>Pays</th>
			<th>Tel_fournisseur</th>
			<th>Url_fournisseur</th>
			<th>Email_fournisseur</th>
			<th>Fax_fournisseur</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($fournisseurlocalite as $l):?>
			<tr class="value">
				<td> <?=$l->Code_fournisseur?> </td>
				<td> <?=$l->Localite?> </td>
				<td> <?=$l->Rue_fournisseur?> </td>
				<td> <?=$l->Code_postal?> </td>
				<td> <?=$l->Localite?> </td>
				<td> <?=$l->Pays?> </td>
				<td> <?=$l->Tel_fournisseur?> </td>
				<td> <?=$l->Url_fournisseur?> </td>
				<td> <?=$l->Email_fournisseur?> </td>
				<td> <?=$l->Fax_fournisseur?> </td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php
endif;
?>