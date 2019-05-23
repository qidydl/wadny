<?php
	 $title = "404 Not Found";
	 include( "../head.php" );
?>
<h3>404 - page not found</h3>
<p>The page you requested, <?=$_SERVER["REQUEST_URI"]?>, does not exist on this server.  Thank you, drive through.</p>
<?php include( "../foot.php" ); ?>
