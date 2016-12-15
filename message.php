<?php
include('includes/connexion.inc.php');

if (isset($_POST['message']) && !empty($_POST['message'])) {

    if (isset($_POST['id']) && !empty($_POST['id'])){
        $query = 'UPDATE messages SET contenu=(:contenu) WHERE id=(:id)';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':id', $_POST['id']);
        $prep->bindValue(':contenu', $_POST['message']);
        $prep->execute();
    } else {
        $query = 'INSERT INTO messages (contenu) VALUES (:contenu)';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':contenu', $_POST['message']);
        $prep->execute();
    }
}

header("Location: index.php");
?>
