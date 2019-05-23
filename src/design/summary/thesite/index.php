<?php
  include("thesite_common.php");
  include("common.php");

  $thispage = "index.php";

  if (isset($_GET["show"]))
    $path = $_GET["show"];
  else
    $path = ".";

  $path = fix_filepath($path);

  if (($path == "") || ($path == "/"))
    $path = ".";

  $scriptpath = get_doc_root($_SERVER["DOCUMENT_ROOT"], $_SERVER["PHP_SELF"]);
  $fullpath = $scriptpath;
  if (($path[0] != "/") && ($fullpath[strlen($fullpath) - 1] != "/"))
    $fullpath .= "/";
  if (($path[0] == "/") && ($fullpath[strlen($fullpath) - 1] == "/"))
    $fullpath = substr($fullpath,0,-1);
  if ($path != ".")
    $fullpath .= $path;
  if (($path[strlen($path) - 1] != "/") && ($path != "."))
    $fullpath .= "/";
  $datafile = $fullpath . "thesite.data";

  if (!file_exists($datafile))
    die("Cannot browse to this directory");
  $datafilehandle = fopen($datafile,"r");
  while (!feof($datafilehandle)) {
    $newline = fgets($datafilehandle,1024);
    $newline = explode("=",$newline);
    $newline[1] = str_replace("\r\n","",$newline[1]);
    if ($newline[0] == "mainmenu")
      $menulist = explode("|",$newline[1]);
    else if (substr($newline[0],-5,5) == "title")
    {
      $templen = strlen($newline[0]) - 5;
      $titles[substr($newline[0],0,$templen)] = $newline[1];
    }
    else
    {
      $urllist[$newline[0]] = "";
      for ($num = 1; $num < count($newline); $num++)
        $urllist[$newline[0]] .= "=" . str_replace("%path%",$path,$newline[$num]);
    }
  }
  fclose($datafilehandle);

  if (isset($_GET["content"]))
    $content = $_GET["content"];
  else
    $content = "index";
  $contentfile = $fullpath . $content . ".html";
  if (!file_exists($contentfile))
  {
    if ($content == "index")
      die("Cannot find content file");
    else
    {
      $content = "index";
      $contentfile = $fullpath . $content . ".html";
      if (!file_exists($contentfile))
        die("Cannot find content file");
    }
  }

  commonHeader($titles,$content);
  assemble_menu($scriptpath,$path);
  echo $tablesep;
  include($contentfile);
  commonFooter();
?>