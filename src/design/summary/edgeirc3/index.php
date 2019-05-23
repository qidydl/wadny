<?php
  include("common.php");
  
  edgeheader("servers");
?>
<div class="block">
  <h1>edgeirc servers</h1>
  <p>EdgeIRC currently has a bunch of different servers.  If you want to link to us, you must have at least a DSL or cable connection, preferably low
     latency/packet loss and with good transfer rates.  We're using a customized version of <a href="http://www.slashnet.org/">slashnet's</a> cyclone
     server for our ircd (irc daemon).  It is only available for UNIX-based systems (Linux, BSD, etc.).</p>
</div>

<div class="block">
  <h1>link graph</h1>
  <p>
<pre>netluxe.edgeirc.net
|--adder.edgeirc.net
|--cutting.edgeirc.net
|--risotto.edgeirc.net
`--ghetto.edgeirc.net
   |--cccp.edgeirc.net
   |--qid.edgeirc.net
   `--edge.edgeirc.net
      `--khea.edgeirc.net</pre>
  </p>
</div>

<div class="block">
  <h1>The round-robin</h1>
  <p>The round-robin for EdgeIRC is <a href="irc://irc.edgeirc.net">irc.edgeirc.net</a>.  This is a "virtual" server that will connect you to a randomly
     chosen server in the network, and is the recommended way to connect - it helps balance out the server load.  The current round-robin servers are
     netluxe, ghetto, and adder.</p>
</div>

<div class="block">
  <h1>netluxe.edgeirc.net</h1>
  <table>
    <caption>Information for netluxe</caption>
    <tr><th>Connection:</th><td>OC-3's and OC-12's</td></tr>
    <tr><th>Location:</th><td>New York City, New York (USA)</td></tr>
    <tr><th>Admin:</th><td>R1CH</td></tr>
  </table>
  <p>The current "main" hub server, netluxe is located at an ISP so it has a very fast connection and is carefully watched over.  It has had slight
     stability problems in the past but should provide good service.</p>
</div>

<div class="block">
  <h1>adder.edgeirc.net</h1>
  <table>
    <caption>Information for adder</caption>
    <tr><th>Connection:</th><td>T1</td></tr>
    <tr><th>Location:</th><td>Hayden Lake, Idaho (USA)</td></tr>
    <tr><th>Admin:</th><td>BaCkBuRn</td></tr>
  </table>
  <p>Adder is run by BaCkBuRn, who has 6 years of experience running IRC servers.  This should make it a well-maintained and stable server, and it is also
     blessed with a very fast connection.</p>
</div>

<div class="block">
  <h1>cutting.edgeirc.net</h1>
  <table>
    <caption>Information for cutting</caption>
    <tr><th>Connection:</th><td>Cable</td></tr>
    <tr><th>Location:</th><td>Undisclosed, New York (USA)</td></tr>
    <tr><th>Admin:</th><td>bspit</td></tr>
  </table>
  <p>A former (and possibly future) hub server, cutting is managed by 3 network admins and protected by the most paranoid firewall around.  As long as
     it's not being attacked by icicles, it's very stable.</p>
</div>

<div class="block">
  <h1>risotto.edgeirc.net</h1>
  <table>
    <caption>Information for risotto</caption>
    <tr><th>Connection:</th><td>Dual OC3</td></tr>
    <tr><th>Location:</th><td>Rochester, New York (USA)</td></tr>
    <tr><th>Admin:</th><td>qid</td></tr>
  </table>
  <p>Risotto is a powerful Dell server sitting on RIT's fast university connection, but it has had some problems with stability (mostly due to RIT's
     bumbling CS department) and may disappear sporadically.</p>
</div>

<div class="block">
  <h1>ghetto.edgeirc.net</h1>
  <table>
    <caption>Information for ghetto</caption>
    <tr><th>Connection:</th><td>3 T1 lines</td></tr>
    <tr><th>Location:</th><td>New Orleans, Louisiana (USA)</td></tr>
    <tr><th>Admin:</th><td>DerTeufel</td></tr>
  </table>
  <p>Ghetto is a returning server from our resident devil in the south, DerTeufel.  It has a fast corporate connection and good capacity.</p>
</div>

<div class="block">
  <h1>cccp.edgeirc.net</h1>
  <table>
    <caption>Information for cccp</caption>
    <tr><th>Connection:</th><td>Multiple T1's</td></tr>
    <tr><th>Location:</th><td>Hammond, Louisiana (USA)</td></tr>
    <tr><th>Admin:</th><td>DerTeufel</td></tr>
  </table>
  <p>In Soviet Russia, nobody can connect.</p>
</div>

<div class="block">
  <h1>qid.edgeirc.net</h1>
  <table>
    <caption>Information for qid</caption>
    <tr><th>Connection:</th><td>Cable</td></tr>
    <tr><th>Location:</th><td>Buffalo, New York (USA)</td></tr>
    <tr><th>Admin:</th><td>qid</td></tr>
  </table>
  <p>Another one of the original servers, it's returned in cable-connection form as yet another east-coast server.  It should work well, as long as it
     doesn't get buried under snow.</p>
</div>

<div class="block">
  <h1>edge.edgeirc.net</h1>
  <table>
    <caption>Information for edge</caption>
    <tr><th>Connection:</th><td>Cable</td></tr>
    <tr><th>Location:</th><td>Alymer, Quebec (Canada)</td></tr>
    <tr><th>Admin:</th><td>Cyber_Ass</td></tr>
  </table>
  <p>This was one of the first EdgeIRC servers, along with qid and khea.  It's been around for a long time and runs very well, although it's been
     eclipsed by some of the newer servers on fast connections.</p>
</div>

<div class="block"
  <h1>khea.edgeirc.net</h1>
  <table>
    <caption>Information for khea</caption>
    <tr><th>Connection:</th><td>Cable</td></tr>
    <tr><th>Location:</th><td>Alymer, Quebec (Canada)</td></tr>
    <tr><th>Admin:</th><td>Cyber_Ass</td></tr>
  </table>
  <p>One of the early servers on EdgeIRC, khea has returned (at least temporarily) and currently hosts #gloom's famed bitchbot (see the 
     <a href="http://www.r1ch.net/projects/bitchbot/">bitchbot homepage</a>).</p>
</div>
<?php edgefooter(); ?>
