<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

?>
<div class="row">              
    <form method="post" action="message.php"><?php if (isset($_COOKIE['pseudo'])){ ?>
        <div class="col-sm-10">  
            <div class="form-group">
                <?php if (isset($_GET['id']) && !empty($_GET['id']))
                {
                    $query = 'SELECT * FROM messages WHERE id = ' . $_GET['id'];
                    $message = $pdo->query($query);
					$var=$message->fetch();
                    echo '<input type="hidden" value="'. $_GET['id'] .'" name="id">';
                }
                ?>

                <textarea id="message" name="message" class="form-control"
				placeholder="Message"><?php if (isset($message)) { echo $var['contenu']; } ?></textarea>
            </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
        </div>                        
    </form><?php } ?>
</div>

<?php
$messagesParPage=4; // afficher 4 messages par page.

$rtotal='SELECT COUNT(*) AS total FROM messages'; //Nous récupérons le nombre des pages dans $rtotal
$total1=$pdo->query($rtotal);
$total = $total1 -> fetch();
$total=$total['total']; 

$nombreDePages=ceil($total/$messagesParPage); // nombre de page

if(isset($_GET['page'])) // Si la variable $_GET['page'] existe
{
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else 
{
     $pageActuelle=1; // La 1er page est 1   
}

$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

$query = 'SELECT *,m.id as message_id FROM messages as m INNER JOIN utilisateurs as u ON m.user_id = u.id ORDER BY m.id DESC  LIMIT '.$premiereEntree.', '.$messagesParPage.'';
$stmt = $pdo->query($query);



while ($data = $stmt->fetch()) {
	?>
	<blockquote>
		<?= $data['contenu'] ?>
		<br><i><h6><b>par <?= $data['pseudo'] ?></b></h6>
		<?php if (isset($_COOKIE['psudo'])){ ?>
		<div class="row">
			<a href ="sup.php?id=<?= $data['id'] ?>">
			<button id='del' name='del' class="btn btn-xs btn-danger" 
			onclick="return confirm('Supprimer <?= $data['id'] ?>')">Del</button></a>
			<a href ="index.php?id=<?= $data['id'] ?> ?>">Edit</a>
		</div>
		<?php } ?>
	</blockquote>
	<?php
}
?>

<nav aria-label="Page navigation">
  <ul class="pagination">
  
  
	<?php
	echo "<li align='center'>Page :  ";
	for($i=1; $i<=$nombreDePages; $i++) // boucle
	{
     if($i==$pageActuelle) //Si il s'agit de la page actuelle
     {
         echo ' [ '.$i.' ] '; 
     }	
     else
     {
          echo ' <a href="index.php?page='.$i.'">'.$i.'</a> ';
     }
	}
		echo "</li>";
	?>

 
  </ul>
</nav>

<?php include('includes/bas.inc.php'); ?>