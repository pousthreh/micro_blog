<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

 if (isset($_POST['submit']) && !empty($_POST['submit']))
	{
        $query = 'SELECT * FROM messages WHERE messages LIKE%'.$_POST['search'].'%' ;
        $message = $pdo->query($query);
    var_dump($message);
	while ($var=$message->fetch()) {
		
?>		<blockquote>
		<?= $var['contenu'] ?>
		<br><i><h6><b>par <?= $var['pseudo'] ?></b></h6>
		</blockquote>
	<?php 
		}
	}	
	?>