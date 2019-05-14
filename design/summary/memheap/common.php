<?php
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

  $titles = array("dynamic memory, aww yeah",
		  "purple monkey dishwasher",
		  "it 0wns shinji",
		  "oh no, I spilled HTML!",
		  "beware pickpockets and loose icons",
                  "would it help to confuse it if we run away more?",
                  "boringalicious!",
                  "\"Potatoe\" - Dan Quayle",
                  "have some CHEESE!",
                  "\"MONKAH\" - Saig",
                  "tiny psychotic french elves!",
		  "can you say \"super-l33t\"?");
?>