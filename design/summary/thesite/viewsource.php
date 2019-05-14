<?php
  include("common.php");
  include("thesite_common.php");

  $thispage = "viewsource.php";

  $scriptroot = get_doc_root($_SERVER["DOCUMENT_ROOT"], $_SERVER["PHP_SELF"]);
  $docroot = $scriptroot;

  if ((!isset($GLOBALS["script"])) || ($GLOBALS["script"] == "")) { die("No page specified to view"); }
  else { $script = $GLOBALS["script"]; }

  $scriptfile = $scriptroot . fix_filepath($script);

  if (!file_exists($scriptfile)) { die("Page does not exist"); }

  commonHeader(array("script" => "source for " . $script),"script");
  assemble_menu($scriptroot,".");
  echo $tablesep;
  echo "<br><font style=\"font-size: 15pt\">Viewing script: " . $script . "</font>\n";
  echo "<hr noshade width=\"98%\">\n";

  $filehandle = fopen($scriptfile,"r");
  while(!feof($filehandle)) {
    $line = fgets($filehandle,1024);
    $line = str_replace("<","&lt;",$line);
    $line = str_replace(">","&gt;",$line);
    $line = str_replace(" ","&nbsp;",$line);
    $aline = explode("\"",$line);
    if ((isset($aline[2])) && (stristr($aline[0],"include(")))
      $line = $aline[0] . "\"<a href=\"viewsource.php?script=" . $aline[1] . "\">" . $aline[1] . "</a>\"" . $aline[2];
    echo "<br>" . $line;
  }
  fclose($filehandle);

  commonFooter();
?>