---
title: Finished adding titles, RSS changes
---
I just finished adding titles to the rest of the news posts, just so they all look somewhat nicer. I also added a couple of acronym tags here and there, and marked up some changes with `<ins>` tags just to be semantic. I also changed the RSS feed to include full XHTML enclosed in `<![CDATA[ ]]>` tags so it still validates. Apparently [I’m not supposed to do that](https://norman.walsh.name/2003/09/16/escmarkup "Norman Walsh considers escaped markup harmful"){:rel='external'}, but I hear that many feed readers don’t support namespaces (a system for including different types of XML in one document), and if I don’t escape the data then the feed is invalid, so this looks like the only choice for now. Let me know if there are any problems. I also made a handful of small news system changes; nothing obvious or important, really.

*[RSS]: Really Simple Syndication
*[XHTML]: eXtensible HyperText Markup Language
*[XML]: eXtensible Markup Language