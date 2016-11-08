<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParametersHandler
 *
 * @author root
 */
class ParametersHandler {
    
    
    public function RenderUpdateForm(DAL $dal,$idEvenement){

        $TitleColor = "black";
        $ClassementBackgroundColor = "black";
        $ClassementBackgroundFont = "white";
        $NomBackgroundColor = "white";
        $NomBackgroundFont = "black";
        $ScoreBackgroundColor = "orange";
        $ScoreBackgroundFont = "black";
        $UrlBackground = "";


        //If IdEvenemnt is defined
        if(isset($_SESSION["IdEvenement"])){
            $res= $dal->ExecuteGetAsClass('SELECT * FROM Parametres WHERE IdEvenement = '.$_SESSION["IdEvenement"],'Parametre');

            //Get param from DB
            $TitleColor =$res[0]->TitleColor;
            $ClassementBackgroundColor = $res[0]->ClassementBackgroundColor;
            $ClassementBackgroundFont = $res[0]->ClassementBackgroundFont;
            $NomBackgroundColor = $res[0]->NomBackgroundColor;
            $NomBackgroundFont = $res[0]->NomBackgroundFont;
            $ScoreBackgroundColor = $res[0]->ScoreBackgroundColor;
            $ScoreBackgroundFont = $res[0]->ScoreBackgroundFont;
            $UrlBackground = $res[0]->UrlBackground;
            
            //If no param, create default one
            if(count($res)==0){
                $res= $dal->ExecuteGetAsClass('SELECT * FROM Parametres WHERE IdEvenement = '.$_SESSION["IdEvenement"],'Parametre');
                $sqlParam = "INSERT INTO Parametres(IdEvenement) VALUES (:IdEvenement)";
                $paramInput = array('IdEvenement'=>$_SESSION["IdEvenement"]);
                $res= $dal->ExecuteInsert($sqlParam,$paramInput);    
            }
        }            
    
    
        $html='<div class="sample-rank">'
                . '<table class="classement-tableau">'
                . '<tr>'
                . '<td class="rank-cell">5</td>'
                . '<td>Alice</td>'
                . '<td> <label class="label_score">42 points</label></td>'
                . '</tr>'
                . '</table>'
                . '</div>';
        $html.='<form action="index.php?action=update_parametres" method="POST">
            <p>
                <label for="TitleColor">Couleur du titre</label><input id="TitreColor" type="color" name="TitreColor" value="'.$TitleColor.'">
                <label for="UrlBackground">Choisissez l\'image de fond</label> <input id="UrlBackground" type="file" name="UrlBackground" value="'.$UrlBackground.'" accept="image/*">
            </p>
            <p>
                <label for="ClassementBackgroundColor">Couleur du fond de la première case</label><input id="ClassementBackgroundColor" type="color" name="ClassementBackgroundColor" value="'.$ClassementBackgroundColor.'">
                <label for="ClassementBackgroundFont">Couleur de la police de la première case</label><input id="ClassementBackgroundFont" type="color" name="ClassementBackgroundFont" value="'.$ClassementBackgroundFont.'">
            </p>
                <p>
                <label for="NomBackgroundColor">Couleur du fond de la deuxièeme case</label><input id="NomBackgroundColor" type="color" name="NomBackgroundColor" value="'.$NomBackgroundColor.'">
                <label for="NomBackgroundFont">Couleur de la police de la deuxième case</label><input id="NomBackgroundFont" type="color" name="NomBackgroundFont" value="'.$NomBackgroundFont.'">
            </p>
                <p>
                <label for="ScoreBackgroundColor">Couleur du fond de la troisième case</label><input id="ScoreBackgroundColor" type="color" name="ScoreBackgroundColor" value="'.$ScoreBackgroundColor.'">
                <label for="ScoreBackgroundFont">Couleur de la police de la troisième case</label><input id="UrlBackground" type="color" name="ScoreBackgroundFont" value="'.$ScoreBackgroundFont.'">
            </p>
            <p>
                <input type="submit" value="Valider">
                <input type="reset" value="Réinitialiser">
                <INPUT Type="button" VALUE="Retour" onClick="history.go(-1);return true;">
            </p>
        </form>';
        
        
        return $html;             
       
    }
    
    public function update_parameters(){
        
        $target_dir = "img/";
        debug(basename($_FILES));
        
        $target_file = $target_dir . basename($_FILES["UrlBackground"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["UrlBackground"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

    }
    
    
}
     
        
?>
