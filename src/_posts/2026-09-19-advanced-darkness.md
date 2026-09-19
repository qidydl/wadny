---
title: Advanced Darkness
description: Styling updates and dark mode support
---
I've made a ton of minor updates recently, the biggest one being dark mode support. Time for a round-up, in rough chronological order.

#### Blogroll

I've added a lot of new people to [my blogroll]({% link about/blogroll.md %}) recently, many of them new, but some being people who I discovered are still posting and used to read regularly. If you're looking for more to read (mostly technical in nature but sometimes beyond that), there's a lot of great writers on there.

#### News Feed

My [news feed](/news/everything.atom) should have an icon now in feed readers and look a bit nicer.

#### Page Templates

At some point, [Jekyll](https://jekyllrb.com/ "The software that generates this site"){:rel='external'} added `previous` and `next` properties to posts (or maybe it always had them and I wasn't paying attention), so I [made a change](https://github.com/qidydl/wadny/commit/d42bd591ec00c8000ec2fa7bab90eb51cd4238bc "Wadny.com source changing link generation"){:rel='external'} to use them when generating relative links in news posts. This doesn't affect the final product you see, but it's much less dumb than the old code I wrote.

#### Open Graph Data

I added [Open Graph](https://ogp.me/ "The Open Graph Protocol"){:rel='external'} metadata to my pages using [a Jekyll plugin](https://github.com/jekyll/jekyll-seo-tag/ "The jekyll-seo-tag plugin"){:rel='external'}, so if you or I link to a news post or page on here, social media sites will display a nice-looking preview. For example, see [my Bluesky post](https://bsky.app/profile/qid.wadny.com/post/3mviylpctgc2f "Bluesky post sharing my previous wadny.com news post"){:rel='external'} sharing [the previous news post]({% post_url 2026-09-13-local-tls %}).

#### Layout Changes

I [switched](https://github.com/qidydl/wadny/commit/dec4b8731b385b7b298dab619646889e0e66f253 "Wadny.com source changing to grid layout"){:rel='external'} to using [CSS Grid Layout](https://css-tricks.com/complete-guide-css-grid-layout/ "Guide to CSS grid layout"){:rel='external'} which allows for more precise control. I don't have any redesign plans or ideas, but if I ever feel like changing something, this will provide a much better base to start from.

#### Typography

Inspired by [Utopia's fluid responsive design](https://utopia.fyi/ "Fluid Responsive Design by Utopia"){:rel='external'}, I used their [type scale calculator](https://utopia.fyi/type/calculator/ "Fluid type scale calculator"){:rel='external'} to make font sizes more flexible. As screen size increases, you can use a greater range of font sizes to keep the same visual impact; or, thinking the other way around, as screen size shrinks, you can't use as large a range of font sizes without them becoming unreadable or obnoxious. If you open the site on a PC and drag the window wider or narrower, you'll see the dynamic scaling in action, but the end result is that whether you're on a small screen or giant monitor, text should be a readable size and headings should feel like a good scale.

I also use [modern font stacks](https://modernfontstacks.com/ "Modern Font Stacks"){:rel='external'} (hat tip to OG [Jeffrey Zeldman](https://bsky.app/profile/zeldman.bsky.social/post/3mvv2hwapok27 "Jeffrey Zeldman's Bluesky post sharing modern font stacks"){:rel='external'}) to set fonts now, which should also be nicer and more readable without requiring custom fonts.

#### JavaScript Reduction

I won't go as far as [some people](https://マリウス.com/updates-2025-q3/#site-updates "mrusme's post about JavaScript trickery"){:rel='external'} and tell you to [disable JavaScript entirely](https://disable-javascript.org/ "Advocating for disabling JavaScript and explaining how"){:rel='external'}, but I do try to keep it minimal on here, so I changed [some](https://github.com/qidydl/wadny/commit/ae2874f16da55fcba3001fb152fa36acd04a14f9 "Wadny.com source changing heading anchor links"){:rel='external'} [functionality](https://github.com/qidydl/wadny/commit/2dd08e657fe69a3308774d74b75fd6248511d548 "Wadny.com source changing external link generation"){:rel='external'} to run during the Jekyll build instead of as JavaScript in the browser. I also changed the menu to use an [HTML popover](https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/popover "MDN documentation on the popover HTML global attribute"){:rel='external'} so it doesn't need any JavaScript either, and it still switches behavior conditionally on screen width: small screens (e.g. mobile) have a button to toggle the menu, large screens show it in the right column.

#### Dark Mode

I finally got styling in place to support dark mode. I think pretty much everything works and looks how I want, across all the different pages and sections. I used the [light-dark() CSS function](https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/Values/color_value/light-dark "MDN documentation on the light-dark() CSS function"){:rel='external'} to handle defining which colors to use in which mode, and some use of [oklch()](https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/Values/color_value/oklch "MDN documentation on the oklch() CSS color function"){:rel='external'} for computing colors more dynamically in case I ever want or need to tweak them. I also replaced the static background image with a [linear gradient](https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/Values/gradient/linear-gradient "MDN documentation on the linear-gradient() CSS function"){:rel='external'} so it can also use `light-dark()` and respond to dark mode.

Overall, the site should be easier to read, on pretty much every screen size, device, operating system, and color scheme preference, than it was before, and I'm happy with the results.
