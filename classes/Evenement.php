<?php
class EvenementHandler{
	
	
	public function RenderAddForm(){
		$html='
		
	<form method="POST" action="index.php?action=create_evenement" >
		Nom évenement
		<input type="text" name="Nom" required="required"><br>		
		<input type="submit" value="Ajouter un évenement">
		<input type="reset" value="Réinitialiser">
		<input type="button" value="Retour" onclick="history.back(-1)" />
				
	</form>
				';
		return $html;
	}
	
	public function AddEvenement(DAL $dal){
		if(isset($_POST)){
	
			$sql = "INSERT INTO Evenements(Nom)
    			VALUES (:Nom
    			)";

			$res= $dal->ExecuteInsert($sql,$_POST);
			 
                        

                        //Add default parametres
                        $sqlParam = "INSERT INTO Parametres(IdEvenement)
    			VALUES (:IdEvenement)";
                        $paramInput = array('IdEvenement'=>$res);

                        $res= $dal->ExecuteInsert($sqlParam,$paramInput);
                        
			//header('Location: index.php');
		}
		
	}
	
	public function RenderSelectEvenement(DAL $dal){
		$sql = "SELECT * FROM Evenements";
		
		$ListeEvenements = $dal->ExecuteGetAsClass($sql, "Evenement");
		$html='	
			<form method="post" action="index.php?action=select_evenement" >
		  <select name="IdEvenement">
		    ';		    
		foreach ($ListeEvenements as $Evenement){
			$html.='<option value="'.$Evenement->Id.'">'.$Evenement->Nom.'</option>';			
		}
				$html.='
		  </select>
		  <br><br>
		  <input type="submit" Value="Selectionner l\'évenement">
			<input type="button" value="Retour" onclick="history.back(-1)" />
		</form>
				
				';
		return $html;
	}
	
	public function SelectEvenement(DAL $dal){
		if(isset($_POST)){
			$_SESSION["IdEvenement"] = $_POST["IdEvenement"];

			$sql = "SELECT * FROM Evenements WHERE ID = ".$_SESSION["IdEvenement"];				
			$ListeEvenements = $dal->ExecuteGetAsClass($sql, "Evenement");
				
			$_SESSION["NomEvenement"] = $ListeEvenements[0]->Nom;
			header('Location: index.php');				
		}
	}
	
	
}