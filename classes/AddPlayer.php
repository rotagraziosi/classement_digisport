<?php
class AddPlayer{
	

	function RenderForm(){
		$html='
				
	<form action="index.php?action=create_player" method="POST">
		Score
		<input type="number" name="Score" required="required"><br> 
		Prénom 
		<input type="text" name="Prenom"><br> 
		Nom:
		<input type="text" name="Nom"><br> 
		Email:
		<input type="email" name="Email"><br> 
		Téléphone :
		<input type="text" name="Telephone"><br> 
		Détail additionnel:
		<input type="text" name="Detail"><br> 
		Information 1:
		<input type="text" name="Info1"><br> 
		Information 2:
		<input type="text" name="Info2"><br> 
		Information 3:
		<input type="text" name="Info3"><br> 
		Information 4:
		<input type="text" name="Info4"><br> 
		Information 5:
		<input type="text" name="Info5"><br> 
        <input type="submit" value="Valider">
		<input type="reset" value="Réinitialiser">
				
	</form>
				';
		
		
		return $html;
	}
}