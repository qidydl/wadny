<?php
  // COMMON FUNCTIONS
  function error($string) {
    echo "<html>\n";
    echo "<head><title>Error</title></head>\n";
    echo "<body>Error: $string</body>\n";
    echo "</html>\n";
    exit;
  }
  function fix_time($hours,$minutes) {
    if (strlen($minutes) == 1)
      $minutes = "0" . "$minutes";
    if ($hours > 12)
    {
      $temp = $hours - 12;
      return "$temp:$minutes" . "pm";
    }
    elseif ($hours == 12)
      return "$hours:$minutes" . "pm";
    else
      return "$hours:$minutes" . "am";
  }
  function ordinal_ext($num) {
    $len = strlen($num) - 1;
    if (($num[0] == 1) && ($len == 1))
      return "th";
    if ($num[$len] == 1)
      return "st";
    elseif ($num[$len] == 2)
      return "nd";
    elseif ($num[$len] == 3)
      return "rd";
    else
      return "th";
  }
  function increment_counter($file) {
    $counterval = 0;
    $fp = fopen( $file,"r");
    $counterval = fread($fp, 26 );
    fclose( $fp );
    $counterval = (integer)$counterval + 1;
    $fp = fopen( $file,"w+");
    fwrite( $fp, $counterval, 26);
    fclose( $fp );
    echo "You are the " . $counterval . ordinal_ext("$counterval") . " person to this page.";
  }
  function fix_filepath($path) {
    while (stristr($path,"/ "))
      $path = str_replace("/ ","/",$path);
    while (stristr($path," /"))
      $path = str_replace(" /","/",$path);
    while (stristr($path,"/./"))
      $path = str_replace("/./","",$path);
    while (stristr($path,"/."))
      $path = str_replace("/.","/",$path);
    while (stristr($path,"./"))
      $path = str_replace("./","/",$path);
    while (stristr($path,".."))
      $path = str_replace("..","",$path);
    while (stristr($path,"//"))
      $path = str_replace("//","/",$path);
    return $path;
  }
  function get_doc_root($docroot,$inroot) {
    $aroot = explode("/",$inroot);
    $newroot = $docroot;
    for ($num = 0; $num < count($aroot) - 1; $num++)
      $newroot .= $aroot[$num] . "/";    
    return $newroot;
  }
?>