<?php include("designfuncs.php"); ?>
<html>
<head>
<title>404 error</title>
<link rel="stylesheet" href="global.css">
</head>
<body bgcolor="#0975E3" text="#000000" marginwidth="0" marginheight="0" leftmargin="0" topmargin="0">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td background="images/bordtop.gif" width="99%" valign="top">
  <p>&nbsp;
  <?php NewBlueBox(10,15,"recent updates"); ?>
  <ul>
   <li>4/16/00 - nada
   <li>4/17/00 - zip
   <li>4/18/00 - zilch
  </ul>
  <?php CloseBlueBox(); ?>
</td><td valign="top"><img src="images/topcorner.gif"></td></tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td><img src="images/ul.gif"></td>
    <td background="images/mainupper.gif" width="99%"><img src="images/mainupper.gif"></td>
    <td><img src="images/ur.gif"></td>
    <td background="images/bordright.gif"><img src="images/bordright.gif"></td>
</tr>
<tr><td background="images/mainleft.gif"><img src="images/mainleft.gif"></td>
    <td>
      <h1>404 <hr width="100%" size="2"></h1>
      <b>Sorry, but <?php echo $REQUEST_URI; ?> doesn't exist.  Please try the <a href="design1.php">main page</a>.</b>
    </td>
    <td background="images/mainright.gif"><img src="images/mainright.gif"></td>
    <td background="images/bordright.gif"><img src="images/bordright.gif"></td>
</tr>
<tr><td><img src="images/bl.gif"></td>
    <td background="images/mainlower.gif" width="99%"><img src="images/mainlower.gif"></td>
    <td><img src="images/br.gif"></td>
    <td background="images/bordright.gif"><img src="images/bordright.gif"></td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td background="images/bordbottom.gif" width="99%"><img src="images/bordbottom.gif"></td><td><img src="images/bordcorner.gif"></td></tr>
</table>
</body>
</html>