---
title: Weekend Update
---
It may not be obvious, but I've actually done a lot of work and made a lot of progress on the site over the weekend.

First, there's actually some new content. Original Wadny band member Dick Hull provided [the story behind the name]({% link band/name.md %})―which used to be hosted on his website, but went offline when he switched ISP a while ago―as well as a few additional pictures. I also brought my [blogroll]({% link about/blogroll.md %}) and the [colophon]({% link about/colophon.md %}) up to date, although I should do a deeper dive on how the site is built and deployed.

Second, I made a few more tweaks to the layout and design. This was mostly detail work to a few pictures, but the most visible change was making the seasonal header/navigation theme change happen automatically in JavaScript. It will need a little more work in the future because I don't have pictures and colors picked out for summer and fall, but we're a while away from that at the moment.

Finally, I went back over basically all of the content pages on the site, including all the old news posts, and converted most of the source material from HTML to [Markdown](https://daringfireball.net/projects/markdown/){:rel='external'} (technically [Kramdown](https://kramdown.gettalong.org/){:rel='external'}, which is the Markdown variant used by [Jekyll](https://jekyllrb.com/){:rel='external'}, which is the tool that powers this site). That may have been a little overkill, but it made it easier to read and maintain the code behind the site, gave me a chance to proofread and correct some typos and bugs, and provided a few improvements. For an example, the old [post on comment sanitization]({% post_url 2004-06-18-comment-sanitation %}) now has syntax highlighting in the code samples. More importantly, all the links to different parts of this site now use [link tags](https://jekyllrb.com/docs/liquid/tags/#link){:rel='external'} in Jekyll which get validated when the site builds, so I can ensure I don't break links going forward.

Some of this was pretty tedious, but hopefully most of the tinkering is done now, and I can feel comfortable using the site as an outlet for ideas again when they strike me instead of feeling like I have to fix the site first.

*[HTML]: HyperText Markup Language
*[ISP]: Internet Service Provider