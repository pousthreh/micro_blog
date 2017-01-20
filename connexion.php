<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

?>
<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Connexion au site</h3>
			 	</div>
			  	<div class="panel-body">
				<div id="notif"></div>
			    	<form accept-charset="UTF-8" action="maconnexion.php" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" id="name" placeholder="Votre pseudo" name="pseudo" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" id="password" name="password" type="password" >
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" id="envoyer" name="submit" type="submit" value="se connecter">
			    	</fieldset>
			      	</form>
                      <hr/>
                    <center><h4>OR</h4></center>
                    <input class="btn btn-lg btn-facebook btn-block" type="submit" value="Login via facebook">
			    </div>
			</div>
		</div>
	</div>
</div>

<?php include('includes/bas.inc.php'); ?>