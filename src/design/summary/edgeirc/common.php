<?php
  $pages=" news other ";

  function edgeheader($title="news",$menu="blank_menu") {
    if ($menu == "blank_menu") { $menuimg = "menu"; }
    else { $menuimg = "menu-" . $menu; }
    if (!file_exists("images/" . $menuimg . ".gif")) { $menuimg = "menu"; }
    ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<title>Edge IRC Network - <?php echo $title; ?></title>
<meta name="description" content="EdgeIRC is a new Internet Relay Chat network. We're partial to gaming and computing, but you're welcome to come and talk about anything.">
<meta name="keywords" content="irc, chat, ircop, channels, conversation, talk, gaming, computers">
<link rel="stylesheet" href="global.css">
</head>
<body bgcolor="#9B9B9B" text="#FFFFFF" link="#B0B0B0" alink="#FFFFFF" vlink="#FFFFFF"><?php
  include("imap.shtml");
  echo "\n";
?><center>
<img src="images/<?php echo $menuimg; ?>.gif" border="0" alt="menu - click a square" usemap="#menu">
<table border="0" cellspacing="1" cellpadding="2" bgcolor="#606060" width="370">
<?php
  }
  
  function edgetableopen($title="blank") {
    ?>
<tr><th><?php echo $title; ?></th></tr>
<tr><td><?php
  }
  
  function edgetableclose() { echo "</td></tr>\n"; }
  
  function edgefooter() {
    ?></table>
</center>
</body>
</html>
<?php
  }
  
  function edgedie($error="Unknown error") {
    edgeheader("error");
    edgetableopen("page error");
    echo "$error\n";
    edgetableclose();
    edgefooter();
    exit();
  }
?>