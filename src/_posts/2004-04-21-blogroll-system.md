---
title: Blogroll system
---
So, I’ve gone and added more stuff to my news system. This time I created an automatic blogroll feed-generator. I got the idea from [Ben Sinclair](http://bensinclair.com/archives/000201.php "BenSinclair.com: Python Power!"){:rel='external'}, and built my own system using the core of his script with my own interface wrapped around it. Every hour, a cron job runs my version of Ben’s python script, which fetches all of the feeds for the sites in my blogroll, compiles all the entries together, crops the list down to the newest 50, compiles them together into a file, and runs `tidy` on that file to make it reasonably valid XHTML. It’s not perfect yet, but I’ll keep working on it.

*[XHTML]: Extensible HyperText Markup Language