<?php
    header("Content-type: text/css; charset=UTF-8");    

    session_start();


    
?>

<?php

    if (!defined("BASE_PATH")) define('BASE_PATH', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : substr($_SERVER['PATH_TRANSLATED'],0, -1*strlen($_SERVER['SCRIPT_NAME'])));
    if (!defined("ROOT_DIR")) define('ROOT_DIR',BASE_PATH.'/classement');
    if (!defined("CONFIG")) define('CONFIG', ROOT_DIR.'/settings/config.php');
    require CONFIG;
    foreach (glob(ROOT_DIR."/settings/*.php") as $filename)
    {
            include $filename;
    }

    foreach (glob(ROOT_DIR."/classes/*.php") as $filename)
    {
            include $filename;
    }
    foreach (glob(ROOT_DIR."/model/*.php") as $filename)
    {
            include $filename;
    }
   
    $TitleColor = "black";
    $ClassementBackgroundColor = "black";
    $ClassementBackgroundFont = "white";
    $NomBackgroundColor = "white";
    $NomBackgroundFont = "black";
    $ScoreBackgroundColor = "orange";
    $ScoreBackgroundFont = "black";
    $UrlBackground = "";
    
    
    
    if(isset($_SESSION["IdEvenement"])){
        $dal = new DAL($db_host,$db_name,$db_user,$user_pw);     
                
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
        
    }
   
?> 

body{    
    background: url('../img/<?php echo $UrlBackground; ?>');    
}

#EventTitle,#addPlayerLink{
    color: <?php echo $TitleColor; ?>;
}
#addPlayerLink{
	border: 5px solid <?php echo $TitleColor; ?>;

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
