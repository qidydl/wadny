<?php
  include("../common.php");
  edgeheader("404 error: page not found");
  edgetableopen("404 not found");
  echo "The page you requested, '" . $_SERVER["REQUEST_URI"] . "', does not exist on this server.  Thank you, drive through.\n";
  edgefooter();
?>