<?php
  include("common.php");

  if (!isset($page)) { $page = "news"; }
  elseif (!preg_match('/^[a-zA-Z]+$/',$page)) { edgedie("Invalid page specified - try the menu, haxur."); }
  elseif (!stristr($pages," $page ")) { edgedie("Invalid page specified - try the menu, haxur."); }
  elseif (!file_exists($page . ".html")) { edgedie("Oopsie, page does not exist - email qid@edgeirc.net and tell me what happened."); }
  
  $filehandle = fopen($page . ".html","r") or edgedie("Unable to open $page - email qid@edgeirc.net and tell me what happened.");
  $tableopen = 0;
  edgeheader($page);
  
  while (!feof($filehandle)) {
    $line = fgets($filehandle,4096);
    if (substr($line,0,4) == "<et ") {
      if ($tableopen) {
      	$tableopen = 0;
      	echo "  </div>\n</div>\n";
      }
      $title = trim($line);
      edgetableopen(substr($title,4,-1));
      $tableopen = 1;
    }
    else { echo $line; }
  }
  fclose($filehandle);
  
  edgefooter();
?>