<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

?>
<?php if (isset($_GET['id'])){

$id=$_GET['id'];
$req = $pdo->prepare("SELECT contenu FROM messages WHERE id=:id");
$req->bindValue(':id', $_GET['id']);
$req ->execute();

$data = $req->fetch(PDO::FETCH_OBJ);
	
}
?>

<div class="row">              
    <form method="post" action="message.php">
        <div class="col-sm-10">  
            <div class="form-group">
                <textarea id="message" name="message" class="form-control" 
				placeholder="Message"><?php if (isset ($req) ){echo $data->contenu;} ?></textarea>
            </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
        </div>                        
    </form>
</div>

<?php
$query = 'SELECT * FROM messages';
$stmt = $pdo->query($query);

while ($data = $stmt->fetch()) {
	?>
	<blockquote>
		<?= $data['contenu'] ?>
		<div class="row">
		<a href ="sup.php?id=<?= $data['id'] ?>">
		<button id='del' name='del' class="btn btn-xs btn-danger" 
		onclick="return confirm('Supprimer <?= $data['id'] ?>')">Del</button></a>
		<a href ="?id=<?= $data['id'] ?>">Edit</a>
		</div>
	</blockquote>
	<?php
}
?>

<?php include('includes/bas.inc.php'); ?>