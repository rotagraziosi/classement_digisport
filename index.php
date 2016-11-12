<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/parameters.php" media="screen" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen"/>
<link rel="stylesheet" href="fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<script src="js/jquery.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox.pack.js"></script>
<script src="js/fonctions.js"></script>
<meta charset="utf-8" />
<title>Classement</title>
</head>
<body>

	<div class="content">
		<?php
		session_start();
		if (!defined("BASE_PATH")) define('BASE_PATH', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : substr($_SERVER['PATH_TRANSLATED'],0, -1*strlen($_SERVER['SCRIPT_NAME'])));
		define('ROOT_DIR',BASE_PATH.'/classement');
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
		foreach (glob(ROOT_DIR."/css/*.php") as $filename)
		{
//			include $filename;
		}

		$dal = new DAL($db_host,$db_name,$db_user,$user_pw);


		if(isset($_GET["action"])){
			$action = $_GET["action"];
		}
		else{

			$action="";
		}



		//si pas d'evenent séléctionné, on force l'utilisateur a un selectionner/créer un
		if(!isset($_SESSION["IdEvenement"])){
			switch ($action)
			{

				case "form_create_evenement":
					$e = new EvenementHandler();
					echo $e->RenderAddForm();
					break;
				case "create_evenement":
					$e = new EvenementHandler();
					echo $e->AddEvenement($dal);
					break;
				case "select_evenement":
					$e = new EvenementHandler();
					debug($_POST);
					$e->SelectEvenement($dal);
					break;
				case "form_select_evenement":
					$e = new EvenementHandler();
					echo $e->RenderSelectEvenement($dal);
					break;    
				default:
					if(!isset($_SESSION["IdEvenement"]))
						echo '
						<ul>
						<li><a href="index.php?action=form_select_evenement">Selectionner un
						évenement</a>
						</li>
						<li><a href="index.php?action=form_create_evenement">Créer un
						évenement</a>
						</li>
						</ul>

						<br />

						';
					break ;
			}

		}

		//Sinon, on peut faire ce que l'on veut
		else{
			echo '<h1 id="EventTitle">'.$_SESSION["NomEvenement"].'</h1>';
			switch ($action)
			{
				case "list_player":
					$c = new Classement();
					echo $c->Render($dal,$_SESSION["IdEvenement"]);
					
					
					break;
				case "form_create_player":
					$v = new AddPlayer();
					echo $v->RenderForm();


					break;
				case "update_player":
					echo "ajout de joueur";
					break;
				case "create_player":
					if(isset($_POST)){
						$joueur = new Joueur();

						foreach($_POST as $key => $value)
							$joueur->$key = $value;

							
						$joueur->AddJoueur($dal);
						$c = new Classement();
						echo $c->Render($dal,$_SESSION["IdEvenement"]);
						$j = new Joueur();
						echo $j->RenderAddJoueurForm();						
					}
					break;
				case "form_create_evenement":
					$e = new EvenementHandler();
					echo $e->RenderAddForm();
					break;
				case "create_evenement":
					$e = new EvenementHandler();
					echo $e->AddEvenement($dal);
					break;
				case "settings":
					echo "Parametre";
					break;

				case "add_player":

					break;
				case "select_evenement":
					$e = new EvenementHandler();
					$e->SelectEvenement($dal);
					break;
				case "form_select_evenement":
					$e = new EvenementHandler();
					echo $e->RenderSelectEvenement($dal);
					break;

				case "form_edit_player":
					$joueur = new Joueur();

					debug($_GET);

					break;

				case "edit_player":			
					if(isset($_POST)){
						$joueur = new Joueur();
					
						foreach($_POST as $key => $value)
							$joueur->$key = $value;

						
						$joueur->EditJoueur($dal);
					}
					
					
					header('Location: index.php?action=list_player');
					break;
					
					
				case "delete_player":
					
					$joueur = new Joueur();
					if(isset($_GET["idJoueur"]))						
					{
						$joueur->DeleteJoueur($dal,$_GET["idJoueur"]);
					}
					
					header('Location: index.php?action=list_player');
						
						break;
                                case "form_parameter_event":                                    
                                    $ph = new ParametersHandler();
                                    echo $ph->RenderUpdateForm($dal, $_SESSION["IdEvenement"]);
                                    break; 
                                case "update_parametres":
                                    $ph = new ParametersHandler();
                                    echo $ph->update_parameters($dal);                                    
                                    break;
                                case "delete_evenement":
                                    $e = new EvenementHandler();
                                    $e->delete_evenement($dal);
                                    break;
				default:
					if(isset($_SESSION["IdEvenement"]))
						echo '
							<p><a href="index.php?action=list_player">Aller au classement</a></p>
                                                        <p><a href="index.php?action=form_parameter_event">Paramètres</a></p>
							<br />
							';
					else
						echo '

							';
					break ;
			}
		}

		?>

	</div>
</body>
</html>

