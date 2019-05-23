<?php
    $title = "Socks";
    include( "../head.php" );
?>
<h3>I just connected and got banned from the network because of an "Insecure SOCKS or HTTP proxy". What does this mean?</h3>
<p>Firstly, a quick explanation of what a proxy is. Essentially, a proxy is a piece of software which allows users to redirect their connections to
   various things through it. For example, your ISP may run a HTTP proxy which all your web site requests go to, and then your ISP forwards them to the
   real server.  However, during this process, the server at the other end of the connection (which the proxy connects to) does not know where the
   original request came from - since the proxy has fetched it on your behalf.</p>
<p>Generally, this isn't a problem as only authorized users can access a proxy server. However, open or insecure proxies allow ANYONE to use them. When
   you use an insecure proxy to get onto EdgeIRC, you will banned - because there is no way for the network to tell who you really are. Unfortunately,
   there are many open/insecure proxies available on the internet and with the right tools, someone could flood the network with hundreds of
   connections from insecure proxies all over the world.</p>

<h3>So how do I fix it?</h3>
<p>The chances are, you are running some kind of internet connection sharing software such as AnalogX Proxy, Wingate, WinRoute, etc. If not set up
   properly, these pieces of software BY DEFAULT will allow ANYONE to connect and use them as a proxy. Unfortunately, detailing how to set up every
   piece of proxy server software securely is beyond the scope of this page - consult the readme and help files of your connection sharing software to
   only allow connections from your Local Network.</p>

<h3>OK, I've fixed it. Now what?</h3>
<p>When the Advanced Edge IRC Proxy Detector finds an insecure proxy, it will only be banned from the network for 30 minutes, so just try connecting
   again - if you've set it up properly, you should get on fine.</p>
<?php include( "../foot.php" ); ?>
