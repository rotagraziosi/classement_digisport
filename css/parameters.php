<?php
   header('content-type: text/css');
   ob_start('ob_gzhandler');
   header('Cache-Control: max-age=31536000, must-revalidate');
   // etc. 
?>




<?php
    $TitleColor = "black";
    $ClassementBackgroundColor = "black";
    $ClassementBackgroundFont = "white";
    $NomBackgroundColor = "white";
    $NomBackgroundFont = "black";
    $ScoreBackgroundColor = "orange";
    $ScoreBackgroundFont = "black";
    $UrlBackground = "";
    
    
    
    
    
    if(!isset($_SESSION["IdEvenement"])){


    }
    else{
        
    
    }
   
?> 
body {
   color:<?php echo $couleur_texte; ?>;
}  
#page {
   color:<?php echo $couleur_texte; ?>;
}
.content h1{
    color: <?php echo $TitleColor; ?>;
}

.classement-tableau td:nth-child(1){
    background-color: <?php echo $ClassementBackgroundColor; ?>;
    color: <?php echo $ClassementBackgroundFont; ?>;        
}

.classement-tableau td:nth-child(2){
    background-color: <?php echo $NomBackgroundColor; ?>;
    color: <?php echo $NomBackgroundFont; ?>;        
}

.classement-tableau td:nth-child(3){
    background-color: <?php echo $ScoreBackgroundColor; ?>;
    color: <?php echo $ClassementBackgroundFont; ?>;        
}
