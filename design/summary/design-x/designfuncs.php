<?php

function NewBlueBox($left, $top, $title) {
  $layername = str_replace(" ","_",$title);
  echo "<div id=\"$layername\" style=\"position:absolute; top:$top; left:$left\">\n";
 ?>
  <table border="0" bgcolor="#24486C" background="" cellspacing="0" cellpadding="2">
  <tr><td background="bg.gif" colspan="3"><img src="bg.gif" width="2" height="2"</td></tr>
  <tr><td background="bg.gif"><img src="bg.gif" width="2" height="2"></td>
      <th><?php echo $title; ?>:</th>
      <td background="bg.gif"><img src="bg.gif" width="2" height="2"></td>
  </tr>
  <tr><td background="bg.gif" colspan="3"><img src="bg.gif" width="2" height="2"></td></tr>
  <tr><td background="bg.gif"><img src="bg.gif" width="2" height="2"></td>
      <td>
 <?php
}

function CloseBlueBox() {
 ?>
  </td>
      <td background="bg.gif"><img src="bg.gif" width="2" height="2"></td></tr>
  <tr><td background="bg.gif" colspan="3"><img src="bg.gif" width="2" height="2"></td></tr>
  </table>
  </div>
 <?php
}
?>