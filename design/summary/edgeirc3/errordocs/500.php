<?php
  include("../common.php");
  edgeheader("500 error: error in CGI script");
  edgetableopen("500 CGI error");
  echo "There is an error in the CGI script at '" . $_SERVER["REQUEST_URI"] . "'.  Please contact qid@edgeirc.net and inform me of this error.  Thank you, drive through.\n";
  edgefooter();
?>