<?php

include('includes/connexion.inc.php');
include('includes/haut.inc.php');

	
if(isset($_POST['submit'])){
		=
	if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])){
		$select="SELECT * FROM utilisateurs WHERE pseudo : pseudo AND mdp :mdp ";
		$query=$pdo->prepare($select);
		$query->bindValue(':pseudo', $_POST['pseudo']);
        $query->bindValue(':mdp', $_POST['mdp']);
        $query->execute();
		$resul=$query->fetch();
		$nb=$query->rowcount();
		
			
			
			$login = $_POST['pseudo'];
			$password = $_POST['password'];
		
			if($login&&$password){
			
				$select = $pdo->query("SELECT id FROM utilisateurs WHERE email='$login' AND mdp='$password'");
				//Test du résultat de la requête
				if($select->fetchColumn()){
					$select = $pdo->query("SELECT * FROM utilisateurs WHERE pseudo='$login' AND mdp='$password'");
					$result = $select->fetch(PDO::FETCH_OBJ);
					
					
					/*
					$_SESSION['admin_id'] = $result->id;
					$_SESSION['admin_login'] = $result->pseudo;
					$_SESSION['admin_password'] = $result->mdp;*/

	     		//Accès à l'application
				header('location: index.php');
		 
		}else {
	     //refus authentification non valide
	     	echo '<script>alert("login ou Mot de Passe incorrect")</script>';
		}
	
		
		}else{
			
			echo '<script>alert("veuillez remplir tous les champs")</script>';
			
			header('location: connexion.php');
		}

		}

?>