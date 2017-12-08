<?php

class Joueur{
	var $Id;
	var $Nom;
	var $Prenom;
	var $Score;
	var $Email;
	var $Telephone;
	var $Detail;
	var $IdEvenement;
    var $Info1;    
    var $Info2;
    var $Info3;
    var $Info4;
    var $Info5;


	public function __construct(){
		
		
	}
	
    
    public function AddJoueur(DAL $dal){
    	
    	if(isset($_SESSION["IdEvenement"]))
    	{
    		$param = $_POST;
    		$param["IdEvenement"] = $_SESSION["IdEvenement"];
	    	$sql = "INSERT INTO Joueurs(Nom,Prenom,Score,Email,Telephone,Detail,IdEvenement,Info1,Info2,Info3,Info4,Info5) 
	    			VALUES (:Nom,:Prenom,:Score,:Email,:Telephone,:Detail,:IdEvenement,:Info1,:Info2,:Info3,:Info4,:Info5
	    			)";   	
	      	$res= $dal->ExecuteInsert($sql,$param);
    	}
    	else{
    		die("Impossible d'ajouter le joueur, aucun évenement définit.");
    	}
    }

    
    
    
    public function EditRenderForm(){
    	
    	$html = '<form action="index.php?action=edit_player" method="POST">
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
				
	</form>';
    }
    
    public function EditJoueur(DAL $dal){
    	
    	$sql="UPDATE `Joueurs` 
    			SET Score=".$this->Score.",`Nom`='".$this->Nom."',`Prenom`='".$this->Prenom."',
    			`Email`='".$this->Email."',`Telephone`='".$this->Telephone."',`Detail`='".$this->Detail."',
                Info1='".  $this->Info1."', Info2='".  $this->Info2."', Info3='".  $this->Info3."', Info4='".  $this->Info4."', Info5='".  $this->Info5."'
    			WHERE Id = ".$this->Id."";
   	
    	
    	$res= $dal->ExecuteInsert($sql,$_POST);
    }
	    
    
    public function DeleteJoueur(DAL $dal,$IdJoueur){
    	 
    	$sql="DELETE FROM `Joueurs` WHERE Id = ".$IdJoueur."";
    	$res= $dal->ExecuteInsert($sql,null);
    }
     
    
    
    

    function RenderAddJoueurForm(){
    	$html='
				<div style="display:none">
				<form id="addPlayerForm" class="PlayerForm" action="index.php?action=create_player" method="POST">
    			<p>
    			<label for="score">    				
    			Score
    			</label>
    			<input id="score" type="number" name="Score" required="required">
    			</p>
    			
    			<p>
    			<label for="prenom">    				
				Prénom
    			</label>
				<input id="prenom" type="text" name="Prenom" required="required"><br>
    			</p>
    			
    			<p>
    			<label for="nom">    				
    			Nom
    			</label>
				<input id="nom" type="text" name="Nom"><br>
       			</p>
    			
    			<p>
    			<label for="email">    				
    			Email
    			</label>
				<input id="email" type="email" name="Email">
    			</p>
    			
    			<p>
    			<label for="telephone">    				
    			Téléphone
    			</label>
				<input id="telephone" type="text" name="Telephone">
    			</p>
    			
    			
    			<p>
    			<label for="detail">    				
    			Détail additionnel
    			</label>
    			<input id="detail" type="text" name="Detail">
    			</p>
                
                <p>
    			<label for="info1">    				
    			Information 1
    			</label>
    			<input id="info1" type="text" name="Info1">
    			</p>
                                
                <p>
    			<label for="info2">    				
    			Information 2
    			</label>
    			<input id="info2" type="text" name="Info2">
    			</p>
                                
                <p>
    			<label for="info3">    				
    			Information 3
    			</label>
    			<input id="info3" type="text" name="Info3">
    			</p>
                                
                <p>
    			<label for="info4">    				
    			Information 4
    			</label>
    			<input id="info4" type="text" name="Info4">
    			</p>
                                
                <p>
    			<label for="info5">    				
    			Information 5
    			</label>
    			<input id="info5" type="text" name="Info5">
    			</p>
    							
				<p>
    			<input type="submit" value="Valider">
				<input type="reset" value="Réinitialiser">
    			</p>
					</form>
    			</div>
				';
    	return $html;
    }
        
    function RenderEditJoueurForm(DAL $dal,$idJoueur){
    	$res= $dal->ExecuteGet("SELECT * FROM Joueurs WHERE id = $idJoueur");
    
    	 
    	
    	$html='
				<div style="display:none">
				<form id="editPlayerForm'.$idJoueur.'" class="PlayerForm" action="index.php?action=edit_player" method="POST">
				<input type="hidden" name="Id" value="'.$res[0]->Id.'">
    			<p>
    			<label for="score">
    			Score
    			</label>
    			<input id="score" type="number" name="Score" required="required" value="'.$res[0]->Score.'">
    			</p>
    
    			<p>
    			<label for="prenom">
				Prénom
    			</label>
				<input id="prenom" type="text" name="Prenom" required="required" value="'.$res[0]->Prenom.'">
    			</p>
    
    			<p>
    			<label for="nom">
    			Nom
    			</label>
				<input id="nom" type="text" name="Nom" value="'.$res[0]->Nom.'">
       			</p>
    
    			<p>
    			<label for="email">
    			Email
    			</label>
				<input id="email" type="email" name="Email" value="'.$res[0]->Email.'">
    			</p>
    
    			<p>
    			<label for="telephone">
    			Téléphone
    			</label>
				<input id="telephone" type="text" name="Telephone" value="'.$res[0]->Telephone.'">
    			</p>
    
    
    			<p>
    			<label for="detail">
    			Détail additionnel
    			</label>
    			<input id="detail" type="text" name="Detail" value="'.$res[0]->Detail.'">
    			</p>
    		
                <p>
    			<label for="info1">    				
    			Information 1
    			</label>
    			<input id="info1" type="text" name="Info1" value="'.$res[0]->Info1.'">
    			</p>
                                
                <p>
    			<label for="info2">    				
    			Information 2
    			</label>
    			<input id="info2" type="text" name="Info2" value="'.$res[0]->Info2.'">
    			</p>
                                
                <p>
    			<label for="info3">    				
    			Information 3
    			</label>
    			<input id="info3" type="text" name="Info3" value="'.$res[0]->Info3.'">
    			</p>
                                
                <p>
    			<label for="info4">    				
    			Information 4
    			</label>
    			<input id="info4" type="text" name="Info4" value="'.$res[0]->Info4.'">
    			</p>
                                
                <p>
    			<label for="info5">    				
    			Information 5
    			</label>
    			<input id="info5" type="text" name="Info5" value="'.$res[0]->Info5.'">
    			</p>
                
				<p>
    			<input type="submit" value="Valider">
				<input type="reset" value="Réinitialiser">
    			</p>
					</form>
    			</div>
				';
    	return $html;
    }
    
    
    
    /*
     * GETTER AND SETTER
     */
	/**
	* @param string $Nom
	* @return Joueur
	*/
	public function setNom($Nom)
	{
	    $this->nom = $Nom;
	    return $this;
	}
	 
	/**
	* @return string
	*/
	public function getNom()
	{
	    return $this->nom;
	}


	/**
	* @param string $Prenom
	* @return Joueur
	*/
	public function setPrenom($Prenom)
	{
	    $this->prenom = $Prenom;
	    return $this;
	}
	 
	/**
	* @return string
	*/
	public function getPrenom()
	{
	    return $this->prenom;
	}
	
	
	/**
	* @param string $Email
	* @return Joueur
	*/
	public function setEmail($Email)
	{
	    $this->email = $Email;
	    return $this;
	}
	 
	/**
	* @return string
	*/
	public function getEmail()
	{
	    return $this->email;
	}
	
	
	
	/**
	* @param int $Score
	* @return Joueur
	*/
	public function setScore($Score)
	{
	    $this->score = $Score;
	    return $this;
	}
	 
	/**
	* @return int
	*/
	public function getScore()
	{
	    return $this->score;
	}
	
	/**
	* @param string $Telephone
	* @return Joueur
	*/
	public function setTelephone($Telephone)
	{
	    $this->telephone = $Telephone;
	    return $this;
	}
	 
	/**
	* @return string
	*/
	public function getTelephone()
	{
	    return $this->telephone;
	}
	
	
	/**
	* @param string $Detail
	* @return Joueur
	*/
	public function setDetail($Detail)
	{
	    $this->detail = $Detail;
	    return $this;
	}
	 
	/**
	* @return string
	*/
	public function getDetail()
	{
	    return $this->detail;
	}
}

?>