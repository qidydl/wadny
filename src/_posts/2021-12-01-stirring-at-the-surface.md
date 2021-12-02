---
title: Stirring at the surface
---

It may not be the splashiest website resurrection ever (it may even be thoroughly mediocre), but at least things are
back on the air now. I even had a great idea for a real actual post! Then I forgot it. Maybe it will come back to me.

In the meantime, I ditched the over-engineered AWS scheme I had planned and switched to
[Cloudflare Pages](https://pages.cloudflare.com/){:rel='external'}, which may not be quite as infrastructure-as-code-y,
but was considerably simpler to set up. I’m not quite sure I like that Cloudflare is running the build now instead of a
GitHub Action, but at least it works.

I’m also playing around with some of the source and converting some pages from HTML to Markdown to make them easier to
edit in the future, and using [Jekyll’s link tag](https://jekyllrb.com/docs/liquid/tags/#link){:rel='external'} to help
maintain at least internal referential integrity. I don’t think I have the stamina to go back and fix every broken link
(I don’t even know how many there are), but at least a few of them are fixed now. Hat tip to
[Jeffrey Zeldman](https://www.zeldman.com/){:rel='external'} for having blog posts from 2004 that still have the same
URL. I also changed the front page to show the full post contents instead of just excerpts; I realized it was not at all
obvious that there was more content to look at for longer posts, and even a page full of long posts is not overwhelming
enough to bother truncating them anyway.

There’s still some cleanup to do and improvements to make, and it remains to be seen how much I have to write about in
the first place, but it’s finally in production.