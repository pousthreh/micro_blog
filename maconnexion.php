<?php

include('includes/connexion.inc.php');
include('includes/haut.inc.php');

	
if(isset($_POST['submit']) && !empty($_POST['submit'])){
		
	if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['password'])){
		$select='SELECT * FROM utilisateurs WHERE pseudo = :pseudo AND mdp = :mdp ';
		$query=$pdo->prepare($select);
		$query->bindValue(':pseudo', $_POST['pseudo']);
        $query->bindValue(':mdp', $_POST['password']);
        $query->execute();
		$resul=$query->fetch();
		$nb=$query->rowcount();
		
		if ($nb > 0){
			echo "vous etes";
			$sid = md5($_POST['pseudo'].time());
			echo $sid;
			
			$miseajour ="UPDATE utilisateurs SET sid = :sid where pseudo = :pseudo AND mdp = :mdp";
			$query=$pdo->prepare($miseajour);
			$query->bindValue(':pseudo', $_POST['pseudo']);
			$query->bindValue(':mdp', $_POST['password']);
			$query->bindValue(':sid', $sid);
			$query->execute();
			
			setcookie('psudo',$sid,time()+365*24*3600,null,null,false,true);
			header('location: index.php');
			
		}else{
			
			echo "PAS D'UTILISATEUR";
			header('location: connexion.php');
			
		}
}}
	
	
?>