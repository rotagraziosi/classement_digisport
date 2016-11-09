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
    
    
        $html='<h1>Paramétrage de l\'évenement</h1>'
                . '<div class="sample-rank">'
                . '<table class="classement-tableau">'
                . '<tr>'
                . '<td id="parametre-preview-rank" class="rank-cell">5</td>'
                . '<td id="parametre-preview-name">Alice</td>'
                . '<td id="parametre-preview-score"> <label class="label_score">42 points</label></td>'
                . '</tr>'
                . '</table>'
                . '</div>';
//        $html.='<form action="index.php?action=update_parametres" method="POST" enctype= "multipart/form-data">
//            <table>
//            <tr>
//                <td>
//                <label for="TitleColor">Couleur du titre : </label><input id="TitleColor" type="color" name="TitleColor" value="'.$TitleColor.'">
//                </td><td>
//                <label for="UrlBackground">Choisissez l\'image de fond : </label> <input id="UrlBackground" type="file" name="UrlBackground[]" value="'.$UrlBackground.'" accept="image/*">
//                </td>
//            </tr>
//            <tr>
//                <td>
//                <label for="ClassementBackgroundColor">Couleur du fond de la première case : </label><input id="ClassementBackgroundColor" type="color" name="ClassementBackgroundColor" value="'.$ClassementBackgroundColor.'">
//                </td><td>
//                <label for="ClassementBackgroundFont">Couleur de la police de la première case : </label><input id="ClassementFontColor" type="color" name="ClassementBackgroundFont" value="'.$ClassementBackgroundFont.'">
//                </td>
//            </tr>
//            <tr>
//                <td>
//                <label for="NomBackgroundColor">Couleur du fond de la deuxième case : </label><input id="NomBackgroundColor" type="color" name="NomBackgroundColor" value="'.$NomBackgroundColor.'">
//                </td>
//                <td>
//                <label for="NomBackgroundFont">Couleur de la police de la deuxième case : </label><input id="NomFontColor" type="color" name="NomBackgroundFont" value="'.$NomBackgroundFont.'">
//                </td>
//            </tr>
//            <tr>
//                <td>
//                <label for="ScoreBackgroundColor">Couleur du fond de la troisième case : </label><input id="ScoreBackgroundColor" type="color" name="ScoreBackgroundColor" value="'.$ScoreBackgroundColor.'">
//                </td>
//                <td>                
//                <label for="ScoreBackgroundFont">Couleur de la police de la troisième case : </label><input id="ScoreFontColor" type="color" name="ScoreBackgroundFont" value="'.$ScoreBackgroundFont.'">
//                </td>
//            </tr>
//            <tr>
//                <input type="submit" value="Valider">
//                <input type="reset" value="Réinitialiser">
//                <INPUT Type="button" VALUE="Retour" onClick="history.go(-1);return true;">
//            </tr>
//        </form>';
//        
        
        
        
        
        
        
        
        
        
        
        
        
                $html.='<form action="index.php?action=update_parametres" method="POST" enctype= "multipart/form-data">
            <p>
                <label for="TitleColor">Couleur du titre : </label><input id="TitleColor" type="color" name="TitleColor" value="'.$TitleColor.'">
                <label for="UrlBackground">Choisissez l\'image de fond : </label> <input id="UrlBackground" type="file" name="UrlBackground[]" value="'.$UrlBackground.'" accept="image/*">
            </p>
            <p>
                <label for="ClassementBackgroundColor">Couleur du fond de la première case : </label><input id="ClassementBackgroundColor" type="color" name="ClassementBackgroundColor" value="'.$ClassementBackgroundColor.'">
                <label for="ClassementBackgroundFont">Couleur de la police de la première case : </label><input id="ClassementFontColor" type="color" name="ClassementBackgroundFont" value="'.$ClassementBackgroundFont.'">
            </p>
                <p>
                <label for="NomBackgroundColor">Couleur du fond de la deuxième case : </label><input id="NomBackgroundColor" type="color" name="NomBackgroundColor" value="'.$NomBackgroundColor.'">
                <label for="NomBackgroundFont">Couleur de la police de la deuxième case : </label><input id="NomFontColor" type="color" name="NomBackgroundFont" value="'.$NomBackgroundFont.'">
            </p>
                <p>
                <label for="ScoreBackgroundColor">Couleur du fond de la troisième case : </label><input id="ScoreBackgroundColor" type="color" name="ScoreBackgroundColor" value="'.$ScoreBackgroundColor.'">
                <label for="ScoreBackgroundFont">Couleur de la police de la troisième case : </label><input id="ScoreFontColor" type="color" name="ScoreBackgroundFont" value="'.$ScoreBackgroundFont.'">
            </p>
            <p>
                <input type="submit" value="Valider">
                <input type="reset" value="Réinitialiser">
                <INPUT Type="button" VALUE="Retour" onClick="history.go(-1);return true;">
            </p>
        </form>';
        
        
        
        
        
        $html.='<script>
            
    document.getElementById("TitleColor").addEventListener("input", changeBackground, false);
    document.getElementById("ClassementBackgroundColor").addEventListener("input", changeBackground, false);
    document.getElementById("NomBackgroundColor").addEventListener("input", changeBackground, false);
    document.getElementById("ScoreBackgroundColor").addEventListener("input", changeBackground, false);
    document.getElementById("ClassementFontColor").addEventListener("input", changeBackground, false);
    document.getElementById("NomFontColor").addEventListener("input", changeBackground, false);
    document.getElementById("ScoreFontColor").addEventListener("input", changeBackground, false);</script>';
       
        return $html;             
       
    }
    
    public function update_parameters(DAL $dal){
        define('TARGET', 'img/');    // Repertoire cible
        define('MAX_SIZE', 1000000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 1920);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 1080);    // Hauteur max de l'image en pixels
        

        // Tableaux de donnees
        $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
        $infosImg = array();
        
        
        // Variables
        $extension = '';
        $message = '';
        $nomImage = '';
         
         
        
        $param = $_POST;

        $sqlUpdate = "UPDATE Parametres
                        SET TitleColor=:TitleColor,
                        ClassementBackgroundColor=:ClassementBackgroundColor,
                        ClassementBackgroundFont=:ClassementBackgroundFont,
                        NomBackgroundColor=:NomBackgroundColor,
                        NomBackgroundFont=:NomBackgroundFont,
                        ScoreBackgroundColor=:ScoreBackgroundColor,
                        ScoreBackgroundFont=:ScoreBackgroundFont
                        WHERE IdEvenement=:IdEvenement";   	

        
        
        
        // On verifie si le champ est rempli
        if( !empty($_FILES["UrlBackground"]['name']) ){
                       
          // Recuperation de l'extension du fichier
        $extension  = pathinfo($_FILES["UrlBackground"]['name'][0], PATHINFO_EXTENSION);
          // On verifie l'extension du fichier
          if(in_array(strtolower($extension),$tabExt)){
            // On recupere les dimensions du fichier
            $infosImg = getimagesize($_FILES["UrlBackground"]['tmp_name'][0]);
            // On verifie le type de l'image
            if($infosImg[2] >= 1 && $infosImg[2] <= 14)
            {
              // On verifie les dimensions et taille de l'image
              if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES["UrlBackground"]['tmp_name'][0]) <= MAX_SIZE))
              {
                // Parcours du tableau d'erreurs
                if(isset($_FILES["UrlBackground"]['error']) 
                  && UPLOAD_ERR_OK === $_FILES["UrlBackground"]['error'][0])
                {
                  // On renomme le fichier

                  // Si c'est OK, on teste l'upload
                  if(move_uploaded_file($_FILES["UrlBackground"]['tmp_name'][0], TARGET.$_FILES["UrlBackground"]['name'][0]))
                  {
                    $message = 'Upload réussi !';
                                        
                    //Update brol
                    $param['UrlBackground']=$_FILES["UrlBackground"]['name'][0];
                    $sqlUpdate = "UPDATE Parametres
                        SET TitleColor=:TitleColor,
                        ClassementBackgroundColor=:ClassementBackgroundColor,
                        ClassementBackgroundFont=:ClassementBackgroundFont,
                        NomBackgroundColor=:NomBackgroundColor,
                        NomBackgroundFont=:NomBackgroundFont,
                        ScoreBackgroundColor=:ScoreBackgroundColor,
                        ScoreBackgroundFont=:ScoreBackgroundFont,
                        UrlBackground=:UrlBackground
                        WHERE IdEvenement=:IdEvenement";   	

                  }
                  else
                  {
                    // Sinon on affiche une erreur systeme
                    $message = 'Problème lors de l\'upload !';
                  }
                }
                else
                {
                  $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                }
              }
              else
              {
                // Sinon erreur sur les dimensions et taille de l'image
                $message = 'Erreur dans les dimensions de l\'image !';
              }
            }
            else
            {
              // Sinon erreur sur le type de l'image
              $message = 'Le fichier à uploader n\'est pas une image !';
            }
          }
          else
          {
            // Sinon on affiche une erreur pour l'extension
            $message = 'L\'extension du fichier est incorrecte !';
          }
        }
        else
        {
          // Sinon on affiche une erreur pour le champ vide
          $message = 'Veuillez remplir le formulaire svp !';
        }
        
        $param["IdEvenement"] = $_SESSION["IdEvenement"];
        debug($param);
        
        
        $param = array_combine(
        array_map(function($k){ return ':'.$k; }, array_keys($param)),
        $param
        );
        

        $res= $dal->ExecuteInsert($sqlUpdate,$param);

        
        header('Location: index.php');
       
        
    }
    
    
}
     
        
?>
