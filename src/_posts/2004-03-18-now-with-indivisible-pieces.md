---
title: Now with indivisible pieces
---
So I went and changed the syndication system again. This time it should actually be an improvement, however. I pulled out the ugly double RSS feed system and replaced it with a single [Atom 0.3](http://www.mnot.net/drafts/draft-nottingham-atom-format-02.html "The Atom Syndication Format 0.3 Specification"){:rel='external'} feed system.

Atom requires keeping track of the time when posts are modified, which is probably a good idea anyways, so now that process is automated and a notice should be displayed when a post is updated. If you’re interested, the symbol next to the update notice (∆) is delta, which scientists often use to mean "change in" (for example, ∆x means "change in x").

So why did I bother? Well, once I looked at the two formats it was obvious that Atom was designed for syndicating weblogs, whereas RSS was designed so Dave Winer could see his name all over the place, or something similarly egotistical. If you haven’t noticed, [Dave is kind of](http://archive.scripting.com/2004/03/09#rssIsRaging "Dave pretends that the real world cares about RSS"){:rel='external'} an [arrogant jerk](http://blogs.law.harvard.edu/crimson1/2004/03/08#a1243 "Dave pretends that RSS doesn’t suck as much as it does"){:rel='external'}. Oh, and [RSS has problems](http://www.virtuelvis.com/archives/175.html "11 ways to valid RSS"){:rel='external'}. Atom is already better than RSS, and it’s still under highly active development. I’ll try to keep my feed up-to-date; let me know if there are any problems.

*[RSS]: RDF Site Summary