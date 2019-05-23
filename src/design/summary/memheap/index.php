<?php
  include("common.php");
  srand((double)microtime() * 1000000);
  $max = count($titles) - 1;
  
  if (!isset($page)) { $page = "news"; }
  $page = fix_filepath($page);
  $page = $page . ".html";
  if (!file_exists($page)) { $errormsg = "Could not find \"" . $page . "\" - try using the menu."; }
  elseif (!isset($errormsg)) {
    $pagehandle = fopen($page,"r");
    if ($pagehandle) { $title = chop(fgets($pagehandle,4096)); }
    else { $errormsg = "Unable to open \"" . $page . "\" - email me and let me know this happened."; }
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<title>the memory heap<?php if (isset($title)) { echo " -> " . $title; } ?></title>
<link rel="stylesheet" href="global.css">
<script language="JavaScript" type="text/javascript">
<!--
imgSrc = new Array("menu/news-on.gif",
                   "menu/allocate-on.gif");
imgList = new Array();
for (counter in imgSrc) {
  imgList[counter] = new Image();
  imgList[counter].src = imgSrc[counter];
}
// -->
</script>
</head>
<body bgcolor="#000000" text="#000000">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td><img src="images/logo.gif" width="541" height="83" alt="the memory heap"></td>
    <td bgcolor="#FFFFFF" width="99%">&nbsp;</td>
    <td><img src="images/topright.gif" width="28" height="83" alt=""></td>
</tr></table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td bgcolor="#FFFFFF" valign="top"><font face="serif" size="1">
        <a href="index.php" target="_top" onMouseOver="news.src='menu/news-on.gif'" onMouseOut="news.src='menu/news-off.gif'">
          <img name="news" src="menu/news-off.gif" width="150" height="31" border="0" alt="news"></a><br>
        <a href="index.php?page=allocate" target="_top" onMouseOver="allocate.src='menu/allocate-on.gif'" onMouseOut="allocate.src='menu/allocate-off.gif'">
          <img name="allocate" src="menu/allocate-off.gif" width="150" height="34" border="0" alt="create a new node"></a></td>
    <td width="100%" bgcolor="#FFFFFF" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#B2B2B2">
      <tr><td><img src="images/ul.gif" width="25" height="25" alt=""></td>
          <td width="99%" align="center"><?php
            if ($title) { echo "[" . $title . "] :: "; }
            echo $titles[rand(0,$max)];
          ?></td>
          <td><img src="images/ur.gif" width="25" height="25" alt=""></td>
          <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr><td width="10">&nbsp;</td>
          <td width="99%" height="100%"colspan="2">
          <?php
            if (isset($errormsg)) { echo $errormsg; }
            elseif ($pagehandle) {
              while (!feof($pagehandle)) { echo fgets($pagehandle,4096); }
              echo "\n";
            }
          ?>
          </td>
          <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr><td><img src="images/ll.gif" width="25" height="25" alt=""></td>
          <td width="99%" align="center">©2001 YDL Development and David O. <a href="mailto:qid(at)edgeirc.net">@</a></td>
          <td><img src="images/lr.gif" width="25" height="25" alt=""></td>
          <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr height="10"><td colspan="4" bgcolor="#FFFFFF">&nbsp;</td></tr></table>
    </td>
</tr>
<tr bgcolor="#FFFFFF"><td><img src="images/bottomleft.gif" width="26" height="26" alt=""></td>
    <td align="right"><img src="images/bottomright.gif" width="26" height="26" alt=""></td>
</tr></table>
</body>
</html>