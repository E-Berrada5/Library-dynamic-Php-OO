<fieldset><legend>Ajouter un fournisseur</legend>
<FORM METHOD="POST" ACTION="?controller=fournisseur&action=traitement_ajout_fournisseur">

<label for="fournisseur"></label>
  Code_fournisseur<input type="number" name="fournisseur" id="fournisseur" required />
  <label for="rs"></label>
  Raison_Sociale<input type="text" name="rs" id="rs"  required /> 
  <label for="rs1"></label>
  Rue_fournisseur<input type="text"  name="rs1" id="rs1" required/>
  <label for="cp"></label>
  Code_postal<input type="number" name="cp" id="cp" required /> 
  <label for="localite"></label>
  Localite<input type="text" name="localite" id="localite" required /> 
  <label for="pays"></label>
  Pays<input type="text" name="pays" id="pays"required /> 
  <label for="tel"></label>
  Tel_fournisseur<input type="number" name="tel" id="tel" required /> 
  <label for="url1"></label>
  Url_fournisseur<input type="text" name="url1" id="url1" required /> 
  <label for="mail"></label>
  Email_fournisseur<input type="mail" name="mail" id="mail" required /> 
  <label for="fax"></label>
  Fax_fournisseur<input type="number" name="fax" id="fax" required />
        <label for="Ajouter"></label> 
          <input type="submit" value="Ajouter" name="submit" /> 
</FORM>
</fieldset>