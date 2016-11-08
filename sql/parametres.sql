/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  root
 * Created: 7 nov. 2016
 */

CREATE TABLE `Parametres` (
  `TitleColor` varchar(20) NOT NULL DEFAULT 'black',
  `ClassementBackgroundColor` varchar(20) NOT NULL DEFAULT 'black',
  `ClassementBackgroundFont` varchar(20) NOT NULL DEFAULT 'white',
  `NomBackgroundColor` varchar(20) NOT NULL DEFAULT 'white',
  `NomBackgroundFont` varchar(20) NOT NULL DEFAULT 'black',
  `ScoreBackgroundColor` varchar(20) NOT NULL DEFAULT 'orange',
  `ScoreBackgroundFont` varchar(20) NOT NULL DEFAULT 'black',
  `UrlBackground` varchar(50) NOT NULL,
  `IdEvenement` int(11) NOT NULL
)