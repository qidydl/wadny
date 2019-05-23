<?php
    if (!isset($dblink)) { mysql_connect("localhost", "drag_edgeirc", "edgE0r") or die("Unable to connect to SQL database."); }

    switch($p_operation) {
    case "add":
        // Form to write and add a new post
        echo "<h3>Add a new post</h3>\n";
        echo "<p><form action=\"$thisurl\" method=\"post\">\n";
        echo "<textarea name=\"confirm[0]\" rows=\"10\" cols=\"100\">POST TEXT</textarea>\n";
        echo "<br />User: <select id=\"user\" name=\"user\">\n";
        foreach ($userlist as $user) {
			if ($user["name"] != "") {
				echo "		<option value=\"" . $user["uid"] . "\">" . $user["name"] . "</option>\n";
			}
		}
		echo "      </select>\n";
		echo "      Password: <input type=\"password\" name=\"pass\" size=\"15\" maxlength=\"15\" />\n";
        echo "<input type=\"submit\" name=\"operation\" value=\"confirm\" />\n";
        echo "</form></p>\n";
        break;
    case "confirm":
        // Actually add new or edited posts, and print out some information
        echo "<h3>Changing the post database</h3>\n";
        foreach ( $_POST["confirm"] as $p_time => $p_text ) {
            if ($p_time == 0) {
                $insertstring = "INSERT INTO news VALUES (" . time() . "," . $_POST["user"] . ",'" . addslashes($p_text) . "')";
                mysql_db_query("drag_edgeirc", $insertstring, $dblink) or die("Unable to add news item.");
                $p_time = time();
                echo "New post at $p_time:\n";
                //echo "<br /><blockquote>$insertstring</blockquote>\n";
                echo "<br /><blockquote>$p_text</blockquote>\n";
            }
            else {
                $insertstring = "UPDATE news SET text='" . addslashes($p_text) . "' WHERE time=$p_time";
                mysql_db_query("drag_edgeirc", $insertstring, $dblink) or die("Unable to update post from " . $p_time . ".");
                echo "Edited post from " . $p_time . ":\n";
                //echo "<br /><blockquote>$insertstring</blockquote>\n";
                echo "<br /><blockquote>" . stripslashes( $p_text ) . "</blockquote>\n";
            }
        }
        break;
    case "edit":
        // Form to edit and resubmit existing posts
        echo "<h3>Editing existing posts</h3>\n";
        echo "<form action=\"$thisurl\" method=\"post\">\n";
        foreach ($_POST["selpost"] as $p_time => $p_junk) {
            $query = mysql_db_query("drag_edgeirc", "SELECT * FROM news WHERE time=$p_time", $dblink) or die( "Unable to edit post from " . $p_time . "." );
            $post = mysql_fetch_array( $query );
            echo "<p>Post from " . date( "F jS g:i:sa", $post["time"] ) . ".\n";
            echo "<br /><textarea name=\"confirm[" . $p_time . "]\" rows=\"10\" cols=\"100\">";
            echo stripslashes( htmlentities( $post["text"] ) ) . "</textarea>\n</p>\n";
        }
        echo "<br />User: <select id=\"user\" name=\"user\">\n";
        foreach ($userlist as $user) {
			if ($user["name"] != "") {
				echo "		<option value=\"" . $user["uid"] . "\">" . $user["name"] . "</option>\n";
			}
		}
		echo "      </select>\n";
		echo "      Password: <input type=\"password\" name=\"pass\" size=\"15\" maxlength=\"15\" />\n";
        echo "<input type=\"submit\" name=\"operation\" value=\"confirm\" />\n";
        echo "</form>\n";
        break;
    case "delete":
        // Actually delete selected posts and print out some information
        echo "<h3>Deleting existing posts</h3>\n";
        foreach ($_POST["selpost"] as $p_time => $p_post) {
        }
        break;
    case "backup":
        // Back up the current post database
        $result = mysql_db_query("drag_edgeirc", "SELECT * FROM news ORDER BY time DESC", $dblink) or die("Unable to select news table.");
        if (mysql_num_rows($result) > 0) {
            $backup = fopen("newsbackup.dat", "w") or die("Unable to open backup file for write.");
            while ($post = mysql_fetch_row($result)) {
                $string = serialize($post);
                $string = addcslashes($string, "\0..\37!@\177..\377");
                fwrite($backup, $string . "\n");
            }
        }
        mysql_free_result($result);
        break;
    }

    include( "../foot.php" );
?>
