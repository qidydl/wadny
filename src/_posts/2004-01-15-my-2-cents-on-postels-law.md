---
title: My 2¢ on Postel’s Law
---
For those who aren’t deep into the blogging community (or “blogosphere,” as it is sometimes referred to), you may not have seen or heard of the Great Postel’s Law Debate now ensuing. Here’s the gist of it: back in 1981 when the TCP standard was finalized, Jon Postel put a comment in [RFC 793](http://www.ibiblio.org/pub/docs/rfc/rfc793.txt){:rel='external'} that says: <q cite="http://www.ibiblio.org/pub/docs/rfc/rfc793.txt">TCP implementations will follow a general principle of robustness: be conservative in what you do, be liberal in what you accept from others.</q> Sounds like a simple, good idea, right?

## The issue at hand
We now return to the present day. A new syndication format, [Atom](http://www.mnot.net/drafts/draft-nottingham-atom-format-02.html "Atom Syndication Format 0.3"){:rel='external'}, is starting to gain momentum and usage in the blogging community. Feed readers are starting to add support for this format, and the question of whether to accept invalid feeds (in XML parlance, they are “not well-formed”) arose. This is where the issue arises. Some authors of feed readers don’t want to handle invalid feeds because it’s more work for them, and some other people—some of them feed authors themselves—have started arguing that not accepting invalid input violates Postel’s Law, which they consider to be absolutely unacceptable. A rough outline of the conversation follows:

## The debate

- [Dave Winer: Postel’s Law has two parts](http://essaysfromexodus.scripting.com/postelsLaw){:rel='external'}
- [Mark Pilgrim: There are no exceptions to Postel’s Law](http://diveintomark.org/archives/2004/01/08/postels-law){:rel='external'}
- [Norman Walsh: On Atom and Postel’s Law](http://norman.walsh.name/2004/01/12/postel){:rel='external'}
- [Danny Ayers: Bugger Bob](http://dannyayers.com/archives/002169.html){:rel='external'}
- [Brent Simmons: Postel’s Law, Atom, and NetNewsWire](http://inessential.com/?comments=1&amp;postid=2770){:rel='external'}
- [Nick Bradbury: FeedDemon and well-formed Atom feeds](http://nick.typepad.com/blog/2004/01/feeddemon_and_w.html){:rel='external'}
- [Joe Gregorio: There are no exceptions to Postel’s Law](http://bitworking.org/news/There_are_no_exceptions_to_Postel_s_Law_){:rel='external'}
- [Tim Bray: On Postel, Again](http://www.tbray.org/ongoing/When/200x/2004/01/11/PostelPilgrim){:rel='external'}
- [Mark Pilgrim: Thought Experiment](http://diveintomark.org/archives/2004/01/14/thought_experiment){:rel='external'}
- [Aaron Swartz: Postel’s Law Has No Exceptions](http://www.aaronsw.com/weblog/001025){:rel='external'}
- [Tim Bray: Dracon and Postel](http://www.tbray.org/ongoing/When/200x/2003/08/19/Draconianism){:rel='external'}

## The sides
Clearly, some people consider this to be an issue of vital importance, and many people are engaged in extended discussion over it. As far as I can tell, there are two sides: those who say you must always do everything you can to accept invalid input (pro-Postel), and those who say otherwise (anti-Postel). Each side makes several valid points.

### Pro-Postel

- Users don’t want to know how XML works, they just want to use it.
- If you just throw up an error message when you get invalid XML, users will move to a different feed reader that parses invalid XML.
- There will always be lots of invalid feeds, so if you don’t handle invalid input you cut off a lot of people.
- If other things (like web browsers) violated Postel’s Law, it could result in very painful situations.

### Anti-Postel

- Parsing invalid XML requires more work from the developers.
- If none of the feed parsers handle invalid feeds, authors will be forced into writing valid XML.
- If feeds validators *do* handle invalid feeds, authors are not encouraged to fix bugs and developers are then forced to incorporate workarounds.
- Writing well-formed XML is not particularly difficult.

Of course, these are aggregations, so specific members of either side may disagree with some points on their side, and the discussion is deliberately simplified, but this is merely a brief summary.

## My opinion
So where do I fit in? I am siding with the anti-Postels in this case, for many reasons. First, this entire discussion seems to revolve around what a handful of developers want to do with their applications. __THEIR__ applications. Not ours, not Postel’s, not Mark Pilgrim’s, *theirs*. If they want to reject invalid XML, they can. If they want the program to only accept well-formed, perfectly valid Atom feeds, they can. If they want their program to turn a random shade of blue on the second Tuesday of every month except during leap years, they have every right to go ahead and do that. If the users don’t want to use a program that works like that, they can switch to something else. You’re welcome to argue this point, but until you can prove that Brent Simmons and Nick Bradbury have to do what you say just because you say it, you’ll be wrong.

Feed readers *can* go ahead and reject invalid feeds if they want to; however, there are two remaining questions: *should* they reject invalid feeds, and is Postel’s Law really valid?

When it comes to whether feed readers *should* accept or reject invalid feeds, the answer is clear: they should do both. The ideal piece of software would be configurable so that the *user* decides what to do with invalid feeds: reject them entirely, present a warning that the feed—being invalid—may get bungled in an attempt to read it, display an icon or other passive indication that a feed is invalid, or do nothing at all. Require them to choose a setting when the program is first run, so there’s no issue about defaults being incorrect. Perhaps an option could be given to report invalid feeds to some central database—call it, say, the “Syndication Hall of Shame”—to encourage authors to fix their feeds (nobody wants to be in a Hall of Shame, after all). Furthermore, I’m a little surprised that the concept of giving this choice to the user hasn’t come up more often, especially considering that the pro-Postel argument is based largely on helping the user.

Thus, what feed readers *should* do is give the choice to the users, but not to Postel and his supporters, or to his detractors.

This brings us to the final question: is Postel’s Law really valid? This question is the most difficult to answer, but fortunately it does not need to be answered. The debate over its validity is probably more useful than the law itself, as debate and deliberation encourages careful study and creation of alternatives. Indeed, American self-government is based on deliberation; without it, government is reduced to the whims of the majority. So should we encourage rational debate over the merits of Postel’s Law. I believe that Postel’s Law is worth considering, and important in many circumstances, but it does not apply to everything. There are many situations where data integrity is critical, and attempting to guess at what broken data means can result in serious problems. The example of financial transactions has been brought up several times; $2,000.00 and $6,000.00 are very different amounts of money, but they only differ by a single bit. If bank software received the number 6000 with a parity error, should it happily accept the number and try to fix it? Hopefully, everyone will answer “no.” Should CAD/CAM software being used to design a bridge accept a malformed file and try to correct for it? What if this file is an XML format? Don’t forget that actual people will be driving across this bridge, and depend on it to not fall apart because a file parser decided that a closing tag went in one place instead of somewhere else and a critical reinforcing beam disappeared. I’d much rather have the software bring up a big error box that lets the engineer know very clearly that there is a problem that must be solved—sounds like an exception to Postel’s Law to me.

## Summary
Although I sided with the anti-Postels in this particular debate over feed readers, I believe that Postel’s Law is still a good general guideline for programmers; the concept of handling invalid input has been around for a long time. However, we must be careful not to limit ourselves to a handful of laws that we think will always work. A far better approach is to adapt to the specific circumstances surrounding a project—i.e., the project domain—and take all of the requirements into account. Different domains can require vastly different methods and processes, from ad-hoc all the way to highly structured waterfall model development. Software’s behavior should depend on the domain it functions in and the user’s requirements, not the developer’s personal convictions.

Lastly, I would remind everyone that this article is merely my opinion. I have tried to be objective and logical, and welcome any comments or constructive criticism that people have to offer.

*[CAD]: Computer Aided Design
*[CAM]: Computer Aided Manufacturing
*[RFC]: Request for Comments
*[TCP]: Transmission Control Protocol
*[XML]: eXtensible Markup Language