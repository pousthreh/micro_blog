<?php
	setcookie('pseudo','456',time()-1,null,null,false,true);
	header('location: index.php');

?>