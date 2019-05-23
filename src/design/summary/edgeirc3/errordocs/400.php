<?php
  include("../common.php");
  edgeheader("400 error: invalid request");
  edgetableopen("400 invalid request");
  echo "The page you requested, '" . $_SERVER["REQUEST_URI"] . "', was not recognized as a valid request.  Thank you, drive through.\n";
  edgefooter();
?>