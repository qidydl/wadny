<?php
  function edgeheader($title="news") {
    echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
    ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>EdgeIRC Network - <?=$title?></title>
  <meta name="description" content="EdgeIRC is an Internet Relay Chat network. We're partial to gaming and computing, but you're welcome to come and talk about anything." />
  <meta name="keywords" content="irc, chat, ircop, channels, conversation, talk, gaming, computers" />
  <link rel="stylesheet" type="text/css" media="all" href="global.css" />
</head>
<body>

<div id="menu">
  <img src="title.png" width="157" height="26" alt="Edgeirc" />
  <p>IRC FOR THE ANTISOCIAL | </p>
  <ul>
    <li><a href="#" title="The latest EdgeIRC news">NEWS</a></li>
    <li><a href="#" title="A list of currently active servers">SERVERS</a></li>
    <li><a href="#" title="Some of the popular channels">CHANNELS</a></li>
    <li><a href="#" title="The people who run EdgeIRC">IRCOPS</a></li>
    <li><a href="#" title="Information on our socks-blocker">SOCKS</a></li>
    <li><a href="#" title="Miscellaneous info">OTHER</a></li>
  </ul>
</div>

<div id="ahem">
  Hey, I notice you seem to be using a not-so-recent browser.  Specifically, you're using a browser that doesn't properly support CSS.  Now, you may be able
  to see most (or all) of this site, but I doubt it looks the way it's supposed to.  For more information on upgrading your browser, head to the Web
  Standards Project's <a href="http://webstandards.org/act/campaign/buc/" title="Information on upgrading your browser to a CSS-compliant version">browser
  upgrade initiative</a>.  You may not like having to sit through an extended software download, but if the saw the mess of ugly tables that this site was
  before I switched to proper CSS, you'd understand why I switched.  BTW, I recommend the latest Netscape 6 or Mozilla version - IE usually has a greater
  number of serious security holes to worry about.
</div>

<?php
  }
  
  function edgetableopen($title="blank") {
    echo "<div class=\"block\">\n";
    echo "  <h1>$title</h1>\n";
    echo "  <p>";
  }
  
  function edgefooter() {
    echo "\n<h2>This website is valid <a href=\"http://validator.w3.org/check/referer\" title=\"Link to W3C HTML validator\">XHTML 1.1</a> and\n";
    echo "    <a href=\"http://jigsaw.w3.org/css-validator/check/referer\" title=\"Link to W3C CSS validator\">CSS</a>.\n";
    echo "</h2>\n</body>\n</html>\n";
  }
  
  function edgedie($error="Unknown error") {
    edgeheader("error");
    edgetableopen("page error");
    echo $error;
    echo "  </div>\n</div>\n";
    edgefooter();
    exit();
  }
?>
