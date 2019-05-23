<?php
  include("../common.php");
  edgeheader("401 error: invalid login");
  edgetableopen("401 bad login");
  echo "You do not have authorization to access '" . $_SERVER["REQUEST_URI"] . "'.  Please make sure you have a valid login.  Thank you, drive through.\n";
  edgefooter();
?>