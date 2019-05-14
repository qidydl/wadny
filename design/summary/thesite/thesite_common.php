<?php
  $tablesep = "</td>\n<td width=\"100%\" valign=\"top\">\n<img src=\"images/corner.gif\" width=\"10\" height=\"10\">\n";

  function commonHeader($titles,$content) {
    if (isset($titles[$content]))
      $pagetitle = $titles[$content];
    elseif (isset($titles["index"]))
      $pagetitle = $titles["index"];
    else
      $pagetitle = "funky stuff";
?>
<html>
<head>
<title>thesite - <?php echo $pagetitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="thesite.css">
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div id="logoText" class="fontclass" style="position: absolute; left: 10px; top: 0px; z-index: 1; font-size: 48px">thesite.???</div>
<div id="logoDescription" class="fontclass" style="position: absolute; left: 30px; top: 55px; z-index: 1; font-size: 28px">the site for stuff</div>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td colspan="2"><img src="images/logo.gif" width="600" height="100" alt="logo here"></td>
<td bgcolor="#3D7891">&nbsp;</td></tr>
<tr><td width="10%" bgcolor="#3D7891" valign="top">
<?php
  }

  function commonFooter() {
    global $thispage;
?>
</td>
<td bgcolor="#3D7891">&nbsp;</td></tr>
<tr><td background="images/menubottom.gif">thesite</td>
  <td background="images/menubottom.gif" colspan="2"><img src="images/menubottom.gif"></td></tr>
</table>
</body>
</html>
<?php
  }

  function assemble_menu($newroot,$newpath) {
    $docroot = $newroot;
    $menupath = $newpath;
    if ($menupath[0] != "/")
      $menupath = "/" . $menupath;
    $menuitems = explode("/",$menupath);
    $menufilepath = $docroot;
    echo "<br> " . PrintChars("&nbsp;",3) . "<a href=\"index.php?show=.&content=index\">index</a>\n";
    create_menu($menufilepath,$menuitems,0,$docroot);
  }

  function create_menu($menufilepath,$menuitems,$num,$scriptroot) {
    if (isset($menuitems[$num + 1]))
        $nextmenu = $menuitems[$num + 1];
      else
        $nextmenu = "";
    if ($menufilepath[strlen($menufilepath) - 1] != "/")
      $menufilepath .= "/";

    if ($menufilepath != $scriptroot)
    {
      $path = substr($menufilepath,strlen($scriptroot));
      if ($path[0] != "/")
        $path = "/" . $path;
      if ($path[strlen($path) - 1] == "/")
        $path = substr($path,0,-1);
    }
    else
      $path = "";
      
    $menuhandle = fopen($menufilepath . "thesite.data","r");
    while (!feof($menuhandle)) {
      $newline = fgets($menuhandle,1024);
      $newline = explode("=",$newline);
      $newline[1] = str_replace("\r","",$newline[1]);
      $newline[1] = str_replace("\n","",$newline[1]);
      if ($newline[0] == "mainmenu")
        $menulist = explode("�",$newline[1]);
      else
      {
        $urllist[$newline[0]] = "";
        for ($unum = 1; $unum < count($newline); $unum++)
        {
          $newline[$unum] = str_replace("\r","",$newline[$unum]);
          $newline[$unum] = str_replace("\n","",$newline[$unum]);
          $urllist[$newline[0]] .= "=" . str_replace("%path%",$path,$newline[$unum]);
        }
      }
    }
    fclose($menuhandle);

    for ($mnum = 0; $mnum < count($menulist); $mnum++)
    {
      $thisurl = $urllist[$menulist[$mnum]];
      echo "<br> " . PrintChars("&nbsp;",3) . PrintChars("- ",$num) . "<a href=\"index.php?show" . $thisurl . "\">" . $menulist[$mnum] . "</a>&nbsp;\n";
      if ($menulist[$mnum] == $nextmenu)
        create_menu($menufilepath . $nextmenu,$menuitems,$num + 1,$scriptroot);
    }
  }

  function PrintChars($char,$num) {
    $string = "";
    for ($lcv = 0; $lcv <= $num; $lcv++)
      $string .= $char;
    return $string;
  }
?>