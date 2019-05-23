<?php
  include("../common.php");
  edgeheader("403 error: access denied");
  edgetableopen("403 access denied");
  echo "You do not have authorization to access '" . $_SERVER["REQUEST_URI"] . "'.  The server has been configured to deny access.  Thank you, drive through.\n";
  edgefooter();
?>