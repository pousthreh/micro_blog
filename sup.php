<?php
include('includes/connexion.inc.php');

if (isset($_GET['id'])){

$req='DELETE FROM messages WHERE id=(:id);';

$del = $pdo -> prepare($req);
$del->bindValue(':id', $_GET['id']);

$del->execute();
	
}	

header('location: index.php');




?>	
