<?php
include('includes/connexion.inc.php');

if (isset($_POST['message']) && !empty($_POST['message'])) {
	$query = 'INSERT INTO messages (contenu) VALUES (:contenu)';
	$prep = $pdo->prepare($query);
	$prep->bindValue(':contenu', $_POST['message']);
	$prep->execute();
}

header('location: index.php');
?>