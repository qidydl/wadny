<?php
  $rows = 30;
  $cols = 30;
?>
<html>
<head>
<title>funky squares</title>
</head>
<script language="Javascript" type="text/javascript">
<!--
images = new Array("square_blue.gif","square_yellow.gif","square_black.gif","square_red.gif","square_green.gif");
function randnum(lower, upper) { return (Math.floor(Math.random() * (upper - lower)) + lower); }
function swap() {
  num = randnum(15,45);
  for (i = 1; i <= num; i++) {
    image = eval("document.img" + randnum(1,<?php echo $rows; ?>) + randnum(1,<?php echo $cols; ?>));
    newnum = randnum(0,5);
    image.src = images[newnum];
  }
}
// -->
</script>
<body bgcolor="#202020">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<?php
  $images = array("square_blue.gif","square_yellow.gif","square_black.gif","square_red.gif","square_green.gif");
  srand((double)microtime() * 1000000);
  for ($row = 1; $row <= $rows; $row++) {
    echo "<tr><td align=\"left\">";
    for ($col = 1; $col <= $cols; $col++) {
      $rand = rand(0,4);
      echo "<a href=\"#\" onMouseOver=\"swap()\"><img border=\"0\" name=\"img" . $row . $col . "\" src=\"" . $images[$rand] . "\"></a>";
    }
    echo "</td></tr>\n";
  }
?>
</table>
</body>
</html>