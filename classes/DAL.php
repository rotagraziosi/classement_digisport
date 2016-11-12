<?php

/*
 * Data access layer
 * 
 * Make access to Database
 */
class DAL{
	var $con;
	
	
	public function  __construct($host,$dbname,$dbuser,$userpassword){
	try {
			$this->con = new PDO('mysql:host='.$host.'; dbname='.$dbname, $dbuser, $userpassword);
			$this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->con->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8		
		}
		catch (PDOException $err) {
			print_r("Echec de connexion à la base de données. Vérifiez les infos de connexion");
			$err->getMessage() . "<br/>";
			file_put_contents('PDOErrors.txt',$err, FILE_APPEND);  // write some details to an error-log outside public_html
			die();  //  terminate connection
		}
	}

	
	public function  ExecuteGet($query){
		
		return $this->ExecuteGetAsClass($query,"Joueur");
	}
	
	public function  ExecuteGetAsClass($query,$RenderClass){
		$stmt = $this->con->query($query);
		$result = $stmt->fetchAll(PDO::FETCH_CLASS,$RenderClass);
		return $result;
	}
	
        public function  ExecuteSelectSimple($query){
		$stmt = $this->con->query($query);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function ExecuteInsert($sql,$array){
		$req = $this->con->prepare($sql);
		$req->execute($array);
                return $this->con->lastInsertId();
	}
	
	public function Execute($sql){
            $req = $this->con->prepare($sql);
            $req->execute();            
        }
	
	
}