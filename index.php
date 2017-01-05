<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

?>
<div class="row">              
    <form method="post" action="message.php">
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
    </form>
</div>

<?php
$query = 'SELECT * FROM messages ORDER BY id DESC';
$stmt = $pdo->query($query);

while ($data = $stmt->fetch()) {
	?>
	<blockquote>
		<?= $data['contenu'] ?>
		<?php if (isset($_COOKIE['pseudo'])){ ?>
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

<?php include('includes/bas.inc.php'); ?>