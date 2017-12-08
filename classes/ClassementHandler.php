<?php

class Classement{
	public function Render(DAL $dal,$IdEvenement){
		$j = new Joueur();                	
		$TaillesTableau=array(3,3,6,6,6,6);
		
		$res= $dal->ExecuteGet("SELECT * FROM Joueurs WHERE IdEvenement = $IdEvenement ORDER BY Score DESC LIMIT 0,30");
		
		$i=0;
		$TotalRow=0;
		$indice_tableau=0;
		$html="";
		
		foreach ($TaillesTableau as $TabSize ){
						
			if($indice_tableau==0 || $indice_tableau == 1|| $indice_tableau==2)
				$html.='<div class="block-tab">';
			
			$html.='<table class="classement-tableau tableau-num'.$indice_tableau.'">';
			$TotalRow += $TabSize;
			for(;$i<$TotalRow;$i++){				
				if(isset($res[$i])){
				$html.='<tr>';
				
				$html.='<td class="rank-cell">';
						
				switch($i){
					case 0:
						$html.='<img src="img/gold-icon.png" />';
						break;
					case 1:
						$html.='<img src="img/silver-icon.png" />';
						break;
					case 2:
						$html.='<img src="img/bronze-icon.png" />';
						break;
						
						default:
							$html.=''.($i+1).'';
							break;
				}
				//$html.=''.($i+1).'';

				$html.='</td>
			    <td>';
				if(isset($res[$i]->Prenom))
					$html.=$res[$i]->Prenom;
				if(isset($res[$i]->Prenom)&&isset($res[$i]->Nom))
					$html.=" ";
				if(isset($res[$i]->Nom))
					$html.=$res[$i]->Nom;											
			    $html.="</td>";
			    $html.='<td>';
				$html.='<label class="label_score">
			    			'.$res[$i]->Score.' points
			    		</label>
			    		<label class="label_action_classement">
				    		<a class="editPlayerLink" href="#editPlayerForm'.$res[$i]->Id.'">Modifier</a>';
			    $html.= $j->RenderEditJoueurForm($dal,$res[$i]->Id);			
			    $html.='
	    					<a href="index.php?action=delete_player&idJoueur='.$res[$i]->Id.'" onclick="return confirm(\'Voulez vous supprimer le joueur '.$res[$i]->Prenom.'\')">Supprimer</a>
			    		</label>			    		
			    		</td>';			     
			    
			     
			    	//<a href="index.php?action=edit_player_form&idPlayer='.$res[$i]->Id.'">Modifier</a>
			  $html.="</tr>";
				}	
				else{
					$html.='
							<tr>
				<td class="rank-cell">'.($i+1).'</td>
			    <td />
						<td />
						</tr>
							';
				}
				
			}			
			$html.="
			</table>
				";
			if($indice_tableau==0 || $indice_tableau == 1||$indice_tableau==5)
				$html.='</div>';
			$indice_tableau++;
		}
		
		$html.= $j->RenderAddJoueurForm();
		
		$html.='<a id="addPlayerLink" href="#addPlayerForm">+</a>';
				
		
		return $html;
	}
	
        
        public function Export_Excel(DAL $dal){
            		
		$data= $dal->ExecuteGet("SELECT * FROM Joueurs WHERE IdEvenement = ".$_SESSION['IdEvenement'] ." ORDER BY Score DESC");	
                $filename = "liste_joueurs_" . $_SESSION['NomEvenement'] . "_" . date('Ymd') . ".xls";


                $flag = false;
                foreach($data as $row) {
                  if(!$flag) {
                    // display field/column names as first row
                    echo implode("\t", array_keys(get_object_vars($row))) . "\r\n";
                    $flag = true;
                  }
                  array_walk($row, function(&$str)
        {
          $str = preg_replace("/\t/", "\\t", $str);
          $str = preg_replace("/\r?\n/", "\\n", $str);
          if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        });
                  echo implode("\t", array_values(get_object_vars($row))) . "\r\n";
                }
                exit;
            
        }
        
        function cleanData(&$str)
        {
          $str = preg_replace("/\t/", "\\t", $str);
          $str = preg_replace("/\r?\n/", "\\n", $str);
          if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        }
}