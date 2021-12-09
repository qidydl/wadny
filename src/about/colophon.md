---
title: Colophon
navIsSectionDefault: true
navSectionTitle: About
---
This page contains basic information about wadny.com itself: the markup and standards followed, the typography used, software and programming languages used, and rights and various administrivia.

More information, including the history of the site, is available on the [wadny.com design portfolio page]({% link design/wadny.md %}).

## Code and standards
Wadny.com is entirely hand-written HTML5, CSS, and JavaScript, all rendered ahead of time using [Jekyll](https://jekyllrb.com/){:rel='external'}. Jekyll is a [static site generator](https://davidwalsh.name/introduction-static-site-generators "Basic explanation of static site generators"){:rel='external'}, which is a tool that renders content using templates and layouts to produce simple HTML files that require no special processing to serve. This is much simpler and cheaper to host than a site that runs as a program and renders dynamically. The content and styles for all pages should be valid, and the buttons in the sidebar can be used to validate any page.

I try to make extensive use of semantic elements, including proper headings, acronyms, code markup, and the like. Tables are only used to mark up tabular data. Layout is done entirely with CSS. A standards-compliant browser such as [Mozilla Firefox](https://www.mozilla.org/){:rel='external'} is highly encouraged.

Some info on understanding this site: unvisited links are blue, visited links are red. Any modern CSS-compliant browser will show some links with a little red arrow next to them ([example](#code-and-standards "Sample external link"){:rel='external'})—these links point to a url outside of this site, and usually open in a new browser window. There are a few cases of non-external links that open in new windows, and there might be unmarked external links if I forget, but the arrows should help.

*[HTML5]: HyperText Markup Language version 5
*[CSS]: Cascading Style Sheets

## Typography
Typography on the web is difficult—there’s no guarantee your readers will have even one of the fonts you want to use, and if they’re using [lynx](https://lynx.invisible-island.net/ "The lynx web browser"){:rel='external'} you might as well not even bother. As such, I have kept wadny.com’s typography fairly simple.

The body text should be a simple sans-serif font (probably Verdana on Windows, and Lucida Grande on Macintosh OS X). The headings are hopefully Palatino Linotype, which I think is absolutely gorgeous; if you’re unlucky enough not to have it, the fallback is Times New Roman (*shudder*) or plain Times (which I believe is a font on some Unixes). The images in the sidebar may be hand-rendered text; I didn’t make them, so I don’t know.

I have also tried to ensure that all punctuation is correct, by using alternate Unicode characters for quotes, dashes, ellipses, and other special characters. The effect is subtle, but I believe it is a worthwhile enhancement.

## Production
Virtually everything on this site is hand-made by me (the icons and sidebar link images being notable exceptions). I currently use [Visual Studio Code](https://code.visualstudio.com/){:rel='external'} for editing text and [GIMP](https://www.gimp.org/ "GNU Image Manipulation Program"){:rel='external'} for editing images. Many of the icons in the header are from [Jason Kottke’s weblog](https://www.kottke.org/){:rel='external'}, although he himself probably no longer uses them.

The site content is managed in [GitHub](https://github.com/){:rel='external'}. Files are stored in [a git repository](https://github.com/qidydl/wadny/ "The wadny.com Git repository"){:rel='external'}, processed through Jekyll, and deployed to [Cloudflare Pages](https://pages.cloudflare.com/){:rel='external'} automatically. I’ll have to write a blog post explaining this system in more detail. It’s pretty technical to understand and set up, but the end result is I can make changes on my desktop (or easily set up an environment on any computer with a couple standard tools), and deploy those changes with literally two or three clicks.

<figure class="clean">
    <figcaption>Build status:</figcaption>
    <a href="https://github.com/qidydl/wadny/actions" rel="external" class="noex">
        <img src="https://github.com/qidydl/wadny/workflows/build/badge.svg" alt="Current build status">
    </a>
</figure>

## Rights and Administrivia
This site is <abbr title="Copyright">©</abbr><time datetime="2000">2000</time>-<time datetime="{{ "now" | date: "%Y" }}">{{ "now" | date: "%Y" }}</time> by myself. Some rights are reserved—see [my chosen Creative Commons license](https://creativecommons.org/licenses/by-nc-sa/4.0/){:rel='external'} for more information. You are free to link to my site however you wish. In fact, you have that right on every website, despite what some foolish companies may claim. However, please do not link directly to large (more than 100KB) files on my site; bandwidth hijacking isn’t nice. A button is provided below if you want to use it; please save your own copy.

<figure><img src="{% link graphics/button.png %}" width="88" height="31" alt="The wadny.com link button"></figure>