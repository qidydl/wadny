<?php
  include("common.php");

  if (!isset($_GET["page"])) { $page = "news"; }
  else { $page = $_GET["page"]; }
  if (!ereg("^[a-zA-Z]+$",$page)) { edgedie("Invalid page specified - try the menu, haxur."); }
  elseif (!stristr($pages," $page ")) { edgedie("Invalid page specified - try the menu, haxur."); }
  elseif (!file_exists($page . ".html")) { edgedie("Oopsie, page does not exist - email qid@phoenixdsl.com and tell me what happened."); }
  
  $filehandle = fopen($page . ".html","r") or edgedie("Unable to open $page - email qid@phoenixdsl.com and tell me what happened.");
  $tableopen = 0;
  edgeheader($page,$page);
  
  while (!feof($filehandle)) {
    $line = fgets($filehandle,4096);
    if (substr($line,0,4) == "<et ") {
      if ($tableopen) {
        edgetableclose();
        $tableopen = 0;
      }
      $title = trim($line);
      edgetableopen(substr($title,4,-1));
      $tableopen = 1;
    }
    else { echo $line; }
  }
  fclose($filehandle);
  
  edgetableclose();
  edgefooter();
?>