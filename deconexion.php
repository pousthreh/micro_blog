<?php
	setcookie('psudo','$sid',time()-1,null,null,false,true);
	header('location: index.php');

?>