<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Parametre{

    var $TitleColor ;
    var $ClassementBackgroundColor;
    var $ClassementBackgroundFont;
    var $NomBackgroundColor;
    var $NomBackgroundFont ;
    var $ScoreBackgroundColor;
    var $ScoreBackgroundFont;
    var $UrlBackground ;
    
    public function __construct(){
        $TitleColor = "black";
        $ClassementBackgroundColor = "black";
        $ClassementBackgroundFont = "white";
        $NomBackgroundColor = "white";
        $NomBackgroundFont = "black";
        $ScoreBackgroundColor = "orange";
        $ScoreBackgroundFont = "black";
        $UrlBackground = "";		
    }

    
    
    public function CreateParametre($tc,$cbc,$cbf,$nbc,$nbf,$sbc,$sbf,$u){
        $TitleColor = $tc ;
        $ClassementBackgroundColor=$cbc;
        $ClassementBackgroundFont=$cbf;
        $NomBackgroundColor=$nbc;
        $NomBackgroundFont = $nbf ;
        $ScoreBackgroundColor=$sbc;
        $ScoreBackgroundFont=$sbf;
        $UrlBackground =$u;
    }

    
}