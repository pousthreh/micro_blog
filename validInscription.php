<?php

include('includes/connexion.inc.php');
include('includes/haut.inc.php');

	
if(isset($_POST['submit']) && !empty($_POST['submit'])){
		
	if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['email']) && !empty($_POST['email'])&& isset($_POST['password']) && !empty($_POST['password'])){
		$insertion="INSERT INTO utilisateurs (email,mdp,nom,pseudo) VALUES (:email,:password,:name,:pseudo)";
		$prep = $pdo -> prepare($insertion);
        $prep->bindValue(':email', $_POST['email']);
		$prep->bindValue(':password', $_POST['password']);		
		$prep->bindValue(':name', $_POST['name']);		
		$prep->bindValue(':pseudo', $_POST['pseudo']);
        $prep->execute();
		
		header("Location: connexion.php");
		
	}
}
	
?>