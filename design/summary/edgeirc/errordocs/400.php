<?php include("../common.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<title>Edge IRC Network - 400 error</title>
<meta name="description" content="EdgeIRC is a new Internet Relay Chat network. We're partial to gaming and computing, but you're welcome to come and talk about anything.">
<meta name="keywords" content="irc, chat, ircop, channels, conversation, talk, gaming, computers">
<link rel="stylesheet" href="global.css">
</head>
<body bgcolor="#9B9B9B" text="#FFFFFF" link="#B0B0B0" alink="#FFFFFF" vlink="#FFFFFF"><?php
  include("../imap.shtml");
  echo "\n";
?><center>
<img src="images/menu.gif" border="0" alt="menu - click a square" usemap="#menu">
<table border="0" cellspacing="1" cellpadding="2" bgcolor="#606060" width="370"><?php
  edgetableopen("400 not understood");
  echo "The page you requested, '" . $REQUEST_URI . "', was not recognized as a valid request.  Thank you, drive though.\n";
  edgetableclose();
  edgefooter();
?>