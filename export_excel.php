<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
if (!defined("BASE_PATH")) define('BASE_PATH', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : substr($_SERVER['PATH_TRANSLATED'],0, -1*strlen($_SERVER['SCRIPT_NAME'])));
define('ROOT_DIR',BASE_PATH.'');
define('CONFIG', ROOT_DIR.'/settings/config.php');
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


$dal = new DAL($db_host,$db_name,$db_user,$user_pw);




$dal->Execute("SET @rank=0;");	
$data= $dal->ExecuteSelectSimple(" SELECT @rank:=@rank+1 AS Position, Score,Nom,Prenom, Email,Telephone,Detail,Info1,Info2,Info3,Info4,Info5 FROM Joueurs WHERE IdEvenement = ".$_SESSION['IdEvenement'] ." ORDER BY Score DESC");	
$filename = "liste_joueurs_" . $_SESSION['NomEvenement'] . "_" . date('Ymd') . ".xls";
//
//debug($data);
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");

$flag = false;
foreach($data as $row) {
  if(!$flag) {
    // display field/column names as first row
    echo implode("\t", array_keys($row)) . "\r\n";
    $flag = true;
  }
  array_walk($row, function(&$str)
{
$str = preg_replace("/\t/", "\\t", $str);
$str = preg_replace("/\r?\n/", "\\n", $str);
if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
});
//                  array_walk($row, 'cleanData');
  echo implode("\t", array_values($row)) . "\r\n";
}
exit;