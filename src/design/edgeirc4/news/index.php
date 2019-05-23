<?php
	$title = "News";
	include("../head.php");
	define("POSTS_PER_PAGE", 10);

	$dblink = mysql_connect("localhost", "drag_edgeirc", "edgE0r") or die("Unable to connect to SQL database.");
	$temp = explode("?", $_SERVER["REQUEST_URI"]);
	$thisurl = $temp[0];
	unset($temp);


	/********** CREATE MAPPING OF USER IDS TO NAMES **********/
	$sql_users = mysql_db_query("drag_edgeirc", "SELECT * FROM users", $dblink) or die("Unable to get list of users.");
	$userlist = array(array());
	while ($user = mysql_fetch_array($sql_users)) {
		$userid = $user["uid"];
		$userlist[$userid] = $user;
	}
	mysql_free_result($sql_users);
	unset($sql_users, $username, $userid);
	/********************/
	
	
	/***** PARSE PARAMETERS *****/
	if ( (isset($_POST["operation"])) && (isset($_POST["pass"])) && (isset($_POST["user"])) ) {
	    $uid = $_POST["user"];
		if (md5($_POST["pass"]) == $userlist[$uid]["password"]) {
			$p_operation = $_POST["operation"];
			include("editing.php");
			return;
		}
	}
	if ( (isset($_GET["viewall"])) && ($_GET["viewall"] == 1) ) {
		$p_view_all_posts = true;
	}
	else {
		$p_view_all_posts = false;
		if ( (isset($_GET["viewpage"])) && (is_numeric($_GET["viewpage"]))  ) {
			$p_start_at = ($_GET["viewpage"] - 1) * POSTS_PER_PAGE;
		}
		else { $p_start_at = 0; }
	}

	if ( (isset($_GET["editing"])) && ($_GET["editing"] == 1) ) {
		$p_editing = true;
	}
	else { $p_editing = false; }
	/**********/


	/***** COUNT NUMBER OF POSTS *****/
	$sql_result = mysql_db_query("drag_edgeirc", "SELECT * FROM news", $dblink) or die("Unable to select news table to count posts.");
	$sql_postcount_total = mysql_num_rows($sql_result);
	if ( ($p_start_at >= $sql_postcount_total) || ($p_start_at < 0) ) { $p_start_at = 0; }
	/**********/


	/***** SET UP SQL QUERY *****/
	if ($p_view_all_posts) { $query = "SELECT * FROM news ORDER BY time DESC"; }
	else { $query = "SELECT * FROM news ORDER BY time DESC LIMIT $p_start_at," . POSTS_PER_PAGE; }
	$sql_result = mysql_db_query("drag_edgeirc", $query, $dblink) or die("Unable to select news table.");
	$sql_postcount_selected = mysql_num_rows($sql_result);
	unset($query);
	/**********/


	if ($p_editing) { echo "<form action=\"$thisurl\" method=\"post\">\n"; }
	if ($sql_postcount_selected > 0) {
		while ($post = mysql_fetch_array($sql_result)) {
			$user = $post["user"];
			$time = $post["time"];
			$text = $post["text"];

			echo "<h3>" . $userlist[$user]["name"] . " - " . date("F j, Y G:i", $time);
			if ($p_editing) { echo " <input type=\"checkbox\" name=\"selpost[$time]\" />"; }
			echo "</h3>\n";
			echo "<p>" . stripslashes($text) . "</p>\n";
		}
	}
	else { echo "<p>No posts to display.</p>"; }

	mysql_free_result($sql_result);
	

	/***** PRINT OUT EDITING CONTROLS *****/
	if ($p_editing) {
		echo "<p><label for=\"user\">User:</label> <select id=\"user\" name=\"user\">\n";
		foreach ($userlist as $user) {
			if ($user["name"] != "") {
				echo "		<option value=\"" . $user["uid"] . "\">" . $user["name"] . "</option>\n";
			}
		}
		echo "   </select>\n";
		echo "   <br /><label for=\"pass\">Password:</label> <input type=\"password\" id=\"pass\" name=\"pass\" size=\"15\" maxlength=\"15\" />\n";
		echo "   <br /><input type=\"submit\" name=\"operation\" value=\"add\" />\n";
		echo "         <input type=\"submit\" name=\"operation\" value=\"edit\" />\n";
		echo "         <input type=\"submit\" name=\"operation\" value=\"delete\" />\n";
		echo "         <input type=\"submit\" name=\"operation\" value=\"backup\" /></p>\n";
		echo "</form>\n";
	}
	/**********/
	

	/***** CREATE NAV BAR *****/
	echo "<div id=\"newscontrols\">\n";
	if ($p_editing) { $tmp_showedit = "&amp;editing=1"; }
	else { $tmp_showedit = ""; }

	if ( (!$p_view_all_posts) && ($p_start_at > 0) ) {
		if ($p_start_at > POSTS_PER_PAGE) { $tmp_begin = (int)($p_start_at / POSTS_PER_PAGE); }
		else { $tmp_begin = 1; }
		echo "  <div style=\"float: left\"><a href=\"$thisurl?viewpage=$tmp_begin" . $tmp_showedit . "\">&#0171; previous page</a></div>\n";
		unset($tmp_begin);
	}
	if (($p_start_at + POSTS_PER_PAGE) < $sql_postcount_total) {
		$tmp_end = (int)( ($p_start_at / POSTS_PER_PAGE) + 2);
		echo "  <div style=\"float: right\"><a href=\"$thisurl?viewpage=$tmp_end" . $tmp_showedit . "\">next page &#0187;</a></div>\n";
		unset($tmp_end);
	}

	if ($p_view_all_posts) { $selection = "viewall=1"; }
	elseif ($p_start_at > 0) {
		$selection = "viewpage=" . (int)( ($p_start_at / POSTS_PER_PAGE) + 1);
	}
	else { $selection = ""; }


	if ($p_editing) { echo "  <a href=\"$thisurl?$selection\">hide controls</a>"; }
	elseif ($selection != "") { echo "  <a href=\"$thisurl?editing=1&amp;$selection\">show controls</a>"; }
	else { echo "  <a href=\"$thisurl?editing=1\">show controls</a>"; }
	echo " | <a href=\"$thisurl?viewall=1" . $tmp_showedit . "\">view all posts</a>\n";
	unset($selection, $tmp_showedit);

	echo "</div>\n";
	/**********/
	
	include( "../foot.php" );
?>
