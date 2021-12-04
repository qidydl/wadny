---
title: Comment sanitation
---
So, [Dave wants us to share](http://www.mezzoblue.com/archives/2004/06/17/validation_m/ "mezzoblue - Validation, Moderation, Constipation"){:rel='external'} our solutions for fixing bad markup. I probably should have done this sooner.

My site has two different systems for fixing markup: a simple function that does basic sanitization on plaintext, and a far more complicated code block that, theoretically, can force even hideously mangled line noise into valid XHTML. Let’s look at the function first:

```php
function sanitizeText($text) {
  $retval = "";
  for ($i = 0; $i < strlen($text); $i++) {
    $ch = substr($text, $i, 1);
    switch(ord($ch)) {
      case 60:        // <
        $retval .= "&lt;";
        break;
      case 62:        // >
        $retval .= "&gt;";
        break;
      case 38:        // &
        $retval .= "&amp;";
        break;
      default:
        if (ord($ch) <= 127) {
          $retval .= $ch;
        }
        else {
          $retval .= "&#" . ord($ch) . ";";
        }
        break;
    }
  }
  return addslashes($retval);
}
```

Basically, this function does a simple character-by-character check to fix entities. PHP has a function that  theoretically does this for you, but it can produce inconsistent results. My function escapes `<` to `&lt;`, `>` to `&gt;`, `&` to `&amp;`, and any character outside the basic 127 that are the same in virtually every character set to an ordinal HTML entity. For example, ’ (that’s a proper apostrophe) becomes `&#8217;`. This function may or may not be useful, if you can get the built-in PHP functions to work, and it can’t handle text with tags in it.

So how do you sanitize comment text while preserving some basic HTML tags? That’s what this big monster is for:

```php
// Start out parsing the comment text
$posttext = stripslashes($_POST["comment"]);
$posttext = strip_tags($posttext, "<a><abbr><acronym><big><code><em><small><strong><sub><sup>");
$posttext = preg_replace("/\n\r?\s+\n\r?/","</p>\n<p>", $posttext);  // Fix up paragraphs
$posttext = preg_replace("/\n\r?([^<])/","\n<br />\\1", $posttext);  // Fix up line breaks

// This fixes any non-ASCII characters but leaves tags intact.
$reptext = "";
for ($i = 0; $i < strlen($posttext); $i++) {
  $ch = substr($posttext, $i, 1);
  if (ord($ch) <= 127) {
    $reptext .= $ch;
  }
  else {
    $reptext .= "&#" . ord($ch) . ";";
  }
}
$posttext = $reptext;

// Now we send the comment through Tidy to make sure it's valid XHTML
$STARTID = "PUTSOMESTUFFHERE";
$ENDID = "PUTSOMEOTHERSTUFFHERE";
$newtext = "";
$descriptors = array(0 => array("pipe", "r"),                // stdin
                     1 => array("pipe", "w"),                // stdout
                     2 => array("file", "/dev/null", "a"));  // stderr
$process = proc_open("./tidy -asxml -ascii -q --wrap 0", $descriptors, $pipes);
if (is_resource($process)) {
  fwrite($pipes[0], "<p>$STARTID\n");
  fwrite($pipes[0], $posttext);
  fwrite($pipes[0], "\n$ENDID</p>");
  fclose($pipes[0]);

  while (!feof($pipes[1])) {
    $newtext .= fgets($pipes[1], 1024);
  }
  fclose($pipes[1]);

  $return_value = proc_close($process);
}
else {
  disp_error("Error processing your comment - please report this to the site administrator.");
}

$start = strpos($newtext, $STARTID) + strlen($STARTID);
$end = strlen($newtext) - strpos($newtext, $ENDID);
$posttext = substr($newtext, $start, -$end);
$posttext = addslashes($posttext);
```

Looks painful, doesn’t it? I’ll go through it piece by piece.

The first block takes in the text from the form and stores it in a temporary variable for easy access. I use PHP’s built-in `strip_tags` function to strip out any undesired HTML tags, and then apply regular expressions to convert newlines to `<br />`s and text blocks with a blank line in between them to paragraphs.

The next block is a simpler version of the first function I showed you. This version does not convert ampersands and angle brackets, since some tags are allowed. If the comment includes a link, for example, this version of the function will not remove the link.

The second-to-last block is where the comment text is sanitized into valid XHTML—and yes, I cheated here. :-D The text gets run through [HTML Tidy](http://tidy.sourceforge.net/){:rel='external'}, a standalone program. It’s much faster and simpler than trying to do it in PHP, although it does introduce an external dependency.

In order to use Tidy, I first put unique strings at the beginning and end of the text. If someone happens to enter these strings in a comment, the comment will get cut off and may become invalid, but sufficiently unusual strings should reduce this possibility (note that the strings in the sample code are *not* the ones I actually use). Then the comment text gets run through Tidy, which unfortunately wraps it in a full XHTML page, DOCTYPE and all. That’s what the strings are for—when you get the result back from Tidy, cut off everything before the start string and after the end string (the first three lines of the last block), and you get just the plain comment text. The very last line adds slashes before quotes so the text can be stored in my MySQL database.

So there you have it. I won’t claim that this system is perfect, but I’ve thrown plenty of stuff at it, including Sam Ruby’s famous I&ntilde;t&euml;rn&acirc;ti&ocirc;n&agrave;liz&aelig;ti&oslash;n, and it handles it. Let me know what you think.

P.S. Of course, I don’t have this system for my news posts, because I think I know XHTML. Note to self: code samples are part of the XHTML too.

*[HTML]: HyperText Markup Language
*[XHTML]: eXtensible HyperText Markup Language