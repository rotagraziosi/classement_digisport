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
		<input type="submit" value="Valider">
		<input type="reset" value="Réinitialiser">
				
	</form>
				';
		
		
		return $html;
	}
}