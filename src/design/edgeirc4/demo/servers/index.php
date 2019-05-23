<?php
    $title = "Servers";
    include( "../head.php" );
?>
<h3>edgeirc servers</h3>
<p>EdgeIRC currently has a bunch of different servers.  If you want to link to us, you must have at least a DSL or cable connection, preferably low
   latency/packet loss and with good transfer rates.  We&#8217;re using a customized version of
   <a href="http://www.slashnet.org/">slashnet&#8217;s</a> cyclone server for our ircd (irc daemon).  It is only available for UNIX-based systems
   (Linux, BSD, etc.).</p>

<h3>link graph</h3>
<pre>&lt;hubs: cutting and acm&gt;
|--edge
|--midi
|--moe
`--package</pre>

<h3>The round-robin</h3>
<p>The round-robin for EdgeIRC is <a href="irc://irc.edgeirc.net">irc.edgeirc.net</a>.  This is a &#8220;virtual&#8221; server that will connect
   you to a randomly chosen server in the network, and is the recommended way to connect&#8212;it helps balance out the server load.  The current
   round-robin servers are acm, cutting, and package.</p>

<!-- Server is currently unavailable but may appear again in the future.
<h3>acetylene.edgeirc.net</h3>
<table>
	<caption>Information for acetylene</caption>
	<tr><th>Connection:</th><td>OC-3 via 10/100 LAN</td></tr>
	<tr><th>Location:</th><td>Rochester, New York (USA)</td></tr>
	<tr><th>Admin:</th><td>qid</td></tr>
</table>
<p>Acetylene is a relatively new server set up in qid&#8217;s dorm room at school.  It is stable and has a good connection, but it will not be
   active during the summer and will eventually go away when he graduates.</p>
-->

<h3>acm.edgeirc.net</h3>
<table>
	<caption>Information for acm</caption>
	<tr><th>Connection:</th><td>Multiple T1 lines</td></tr>
	<tr><th>Location:</th><td>Hammond, Louisiana (USA)</td></tr>
	<tr><th>Admin:</th><td>DerTeufel</td></tr>
</table>
<p>ACM is being run from Southeastern Louisiana University.  It has a fast connection and is well-administered, so it currently serves as one of
   the two hubs.</p>

<h3>cutting.edgeirc.net</h3>
<table>
	<caption>Information for cutting</caption>
	<tr><th>Connection:</th><td>Cable</td></tr>
	<tr><th>Location:</th><td>Syracuse, New York (USA)</td></tr>
	<tr><th>Admin:</th><td>bspit</td></tr>
</table>
<p>A hub server, cutting is managed by 3 network admins and protected by the most paranoid firewall around.  As long as it&#8217;s not being
   attacked by icicles, it&#8217;s very stable, and it is currently hosting services and our socks checker.</p>

<h3>edge.edgeirc.net</h3>
<table>
	<caption>Information for edge</caption>
	<tr><th>Connection:</th><td>Cable</td></tr>
	<tr><th>Location:</th><td>Aylmer, Quebec (Canada)</td></tr>
	<tr><th>Admin:</th><td>Cyber_Ass</td></tr>
</table>
<p>This was one of the first EdgeIRC servers, along with qid (now called moe) and khea.  It&#8217;s been around for a long time and runs very well,
   although it&#8217;s been eclipsed by some of the newer servers on high-end connections.</p>

<h3>midi.edgeirc.net</h3>
<table>
	<caption>Information for midi</caption>
	<tr><th>Connection:</th><td>DSL</td></tr>
	<tr><th>Location:</th><td>Kokkola, Finland</td></tr>
	<tr><th>Admin:</th><td>Midian</td></tr>
</table>
<p>One of the newest servers, midi has resurrected EdgeIRC&#8217;s European presence, a welcome change for our many users across the pond.</p>

<h3>moe.edgeirc.net</h3>
<table>
	<caption>Information for moe</caption>
	<tr><th>Connection:</th><td>Cable</td></tr>
	<tr><th>Location:</th><td>Buffalo, New York (USA)</td></tr>
	<tr><th>Admin:</th><td>qid</td></tr>
</table>
<p>Another one of the original servers, moe has returned in cable-connection form as yet another east-coast server.  It should work well, as long 
   as it doesn&#8217;t get buried under snow.</p>

<h3>package.edgeirc.net</h3>
<table>
	<caption>Information for package</caption>
	<tr><th>Connection:</th><td>Cable</td></tr>
	<tr><th>Location:</th><td>Undisclosed, Oregon (USA)</td></tr>
	<tr><th>Admin:</th><td>Woo</td></tr>
</table>
<p>A relatively new server, package has proven to be stable enough to go in the round-robin and should continue to provide good service.</p>
<?php include( "../foot.php" ); ?>