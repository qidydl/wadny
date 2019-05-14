<?php
  $pages=" news other ";

  function edgeheader($title="news") {
    ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Edge IRC Network - <?php echo $title; ?></title>
<meta name="description" content="EdgeIRC is a new Internet Relay Chat network. We're partial to gaming and computing, but you're welcome to come and talk about anything.">
<meta name="keywords" content="irc, chat, ircop, channels, conversation, talk, gaming, computers">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="global.css">
</head>
<body bgcolor="#81E3FF" text="#000000" background="background.png">
<img src="title.png" width="271" height="26" alt="Edgeirc - IRC for the antisocial">
<br><a class="menu" href="index.php?page=news">NEWS</a> |
    <a class="menu" href="#">SERVERS</a> |
    <a class="menu" href="#">CHANNELS</a> |
    <a class="menu" href="#">IRCOPS</a> |
    <a class="menu" href="#">SOCKS</a> |
    <a class="menu" href="index.php?page=other">OTHER</a>
<br><br>
<?php
  }
  
  function edgetableopen($title="blank") {
    echo "<div class=\"boxor\">\n";
    echo "  <div class=\"headbar\">$title</div>\n";
    echo "  <div class=\"text\">\n";
  }
  
  function edgefooter() { echo "\n  </div>\n</div>\n</body>\n</html>\n"; }
  
  function edgedie($error="Unknown error") {
    edgeheader("error");
    edgetableopen("page error");
    echo "<p>$error</p>\n</div>\n";
    edgefooter();
    exit();
  }
?>