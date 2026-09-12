---
title: local tls
description: Real TLS certifications for local-only services
---
I have a server at home running a few services that have web-based interfaces. They're only available within my LAN, but I still want them to use HTTPS/TLS, because 1. software increasingly wants to use HTTPS all the time, and 2. it's good [defense in depth](https://en.wikipedia.org/wiki/Defense_in_depth_(computing) "Wikipedia topic on defense in depth in computing"){:rel='external'}. For a while, I used [self-signed certificates](https://en.wikipedia.org/wiki/Self-signed_certificate "Wikipedia article on self-signed certificates"){:rel='external'}, but with the increasing prevalence of devices like phones and smart TVs that don't provide convenient ways to install custom certificates, I wanted a different approach, and I recently implemented a solution that closes that gap.

#### Prerequisites

The prerequisite needed to implement this is a real domain somewhere with DNS that you can control via an API. Fortunately I have this, as wadny.com uses [Cloudflare DNS](https://www.cloudflare.com/products/dns/ "Cloudflare's DNS product page"){:rel='external'}, which has [an API](https://developers.cloudflare.com/api/resources/dns/#_top "Cloudflare's DNS API documentation"){:rel='external'}.

Additionally, you'll want stable LAN IP address(es) for your server. I'll show a typical example for IPv4 and a [unique local address](https://en.wikipedia.org/wiki/Unique_local_address "Wikipedia article on IPv6 unique local addresses"){:rel='external'} for IPv6. If you don't have stable addresses for some reason (maybe you're in a college dorm and everything is dynamically assigned), there are [dynamic DNS](https://en.wikipedia.org/wiki/Dynamic_DNS "Wikipedia article on dynamic DNS"){:rel='external'} clients that can identify your address(es) automatically and set them in DNS, which again requires some sort of API support. If you go this route, make sure the client is appropriately configured to find your LAN address(es) if you don't want things available on the public internet.

#### Step One: Add DNS Records

The first step involves DNS, but not necessarily via an API yet. Create a sub-domain and [wildcard record](https://developers.cloudflare.com/dns/manage-dns-records/reference/wildcard-dns-records/ "Cloudflare documentation on wildcard DNS records"){:rel='external'} underneath it for your local services, with `A` records for your IPv4 LAN address and, if you have IPv6, `AAAA` records for that address. For example:

| Record name           | Record type | Value                    |
|-----------------------|-------------|--------------------------|
| `local.example.com`   | `A`         | `10.0.0.1`               |
| `*.local.example.com` | `A`         | `10.0.0.1`               |
| `local.example.com`   | `AAAA`      | `fd12:3456:7890:1234::1` |
| `*.local.example.com` | `AAAA`      | `fd12:3456:7890:1234::1` |

At this point, you should be able to reach your server via `http://local.example.com` or `http://anything-you-want.local.example.com`.

These domains will be visible on the public internet, but the LAN IP addresses they point to will be conveniently meaningless to anyone else, so services will remain inaccessible to anyone outside your LAN. If you do want things accessible on the public internet, you need to use your public IP address and you need to be reachable from the internet. This may already be the case with IPv6, but in some cases with IPv4 you might have a bigger problem to solve.

#### Step Two: Install Web Server

The second step is to install a web server, such as [nginx](https://nginx.org/en/ "The nginx web server"){:rel='external'}. To start with, it can listen on regular HTTP port 80 with some static placeholder content. Verify you can reach it in a browser using the new domain names from step one. In my case, I just installed the package provided by Debian using `sudo apt install nginx` and the default configuration came with a placeholder page.

#### Step Three: Get TLS Certificate

The third step is to get a TLS certificate from a real certificate authority, such as [Let's Encrypt](https://letsencrypt.org/getting-started/ "Getting started with Let's Encrypt"){:rel='external'}. There are tools that can automate this process, such as [Certbot](https://certbot.eff.org/ "Certbot client from EFF"){:rel='external'}. These clients have different ways of proving to the authority that you own and control the domain you're requesting a certificate for, and different ways of setting up the certificate with your web server. Debian comes with a package for Certbot, which I would prefer to use if possible, although I ended up installing it manually due to some confusion trying to get it working.

Since, in this case, the web server is not available on the public internet, you need to use a DNS-based challenge to prove to the authority that you control the domain, which is why your DNS needs an API. If you use Certbot, it has a number of [DNS plugins](https://eff-certbot.readthedocs.io/en/latest/using.html#dns-plugins "Certbot DNS provider plugins"){:rel='external'} for interacting with different DNS services; choose the appropriate one, and make sure to install it.

Certbot is not designed to just set up a configuration file and let it run as a service, which is a bit confusing. You need to use a complicated `certbot run` command with a lot of arguments to set things up, but once the certificate has been obtained the first time, Certbot saves records of it and the options needed to refresh it so you don't need to run the full command again. Instead, a cron or timer job can run `certbot renew` and it will automatically renew any certificates that are about to expire.

To install the certificate, do *not* use the `--nginx` argument! This is a plugin for *validating the domain*, not *installing the certificate*, and since the server is not publically accessible, it will result in validation failing! Instead, you want `-i nginx` to specify installation to nginx.

#### Step Four: Use TLS Certificate

Certbot will install some configuration for using the certificate it obtained, but you'll want some additional settings to secure the web server. You will end up with multiple `server` configuration blocks: one for each service being proxied, a default for anything else, and a non-TLS one just in case someone or something uses `http:` instead of `https:`. To start with, we just need the default and non-TLS ones.

The default server should listen on port 443 using SSL/TLS, and use the fallback server name so that everything directs to it unless there's a more precise match:

```
server {
    listen [fd12:3456:7890:1234::1]:443 ssl;
    listen 10.0.0.1:443 ssl;

    server_name _;

    # Other settings here, e.g. root and locations
}
```

The non-TLS server will redirect everything to `https:` for convenience:

```
server {
    listen [fd12:3456:7890:1234::1] default_server;
    listen 10.0.0.1 default_server;

    server_name _;

    # Rewrite all requests to HTTPS
    rewrite ^ https://$host$request_uri? permanent;
}
```

At this point you should now be able to reach `https://local.example.com` or `https://anything-you-want.local.example.com` from any sort of device on your LAN without having to install or deal with certificates. Awesome!

#### Step Five: Proxy Other Services

Now you can add more `server` blocks to nginx that will reverse proxy to other services.

introduction

prereq: DNS hosted somewhere with API access (CloudFlare in my case)

1. add subdomain and wildcard pointed to LAN addresses
2. install nginx on server with basic HTTP config, proves subdomain and wildcard works
3. create wildcard certificate for subdomain from https://letsencrypt.org/getting-started/ using certbot
4. switch nginx to HTTPS using certificate, prove the certificate works
5. configure nginx to proxy to other services based on subdomain
6. change other services to only be accessible via localhost
7. verify other services are accessible via HTTPS
8. point everything to new URLs, clean up old self-signed certificates and trust

*[LAN]: Local Area Network
*[HTTPS]: Hypertext Transfer Protocol Secure
*[TLS]: Transport Layer Security
*[DNS]: Domain Name System
*[API]: Application Programming Interface
*[HTTP]: Hypertext Transfer Protocol
