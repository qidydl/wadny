---
title: local tls
description: how my local tls works
---
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
