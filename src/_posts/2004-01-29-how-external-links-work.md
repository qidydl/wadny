---
title: How external links work
---
Since the redesign, I’ve been focusing a bit more on my content in an attempt to join the “inner circles” of blogging. I don’t expect to be the next [Mark Pilgrim](http://diveintomark.org){:rel='external'} or [Jason Kottke](http://kottke.org){:rel='external'}, but I’d like to move up in the world a bit. Many of the top bloggers are technical people who often post tips and how-tos, and I figured it’s high time I added one of my own. Thus, I decided to write an article on a unique feature of wadny.com: my external links system.

For those of you with a standards-compliant browser (read: not IE), you’ve probably noticed that many of the links on this site have a little red arrow next to them that animates when you hover over the link. These are external links—links to a page not on wadny.com. I came up with the idea for them quite a while ago, and the feature has persisted through several redesigns and re-implementations. They’re actually pretty simple to implement—there’s only three steps: indicating which links are external, styling them with the arrow, and making them open in new windows.

The first problem is indicating which links are external. Fortunately, HTML already has the solution built in: the `rel` attribute. As the HTML specification says, the `rel` attribute <q cite="http://www.w3.org/TR/html401/struct/links.html#adef-rel">…describes the relationship from the current document to the anchor specified by the `href` attribute.</q> The `rel` attribute contains a space-separated list of values. Thus, a link with the word “external” in its `rel` attribute indicates that the link points to another website. If you view the source on this page, you’ll notice that the only thing identifying external links is `rel="external"`.

The second problem is styling the external links with the arrow. Selecting the external links is fairly easy; CSS provides various [attribute selectors](http://www.w3.org/TR/CSS21/selector.html#attribute-selectors){:rel='external'}, including one for matching a space-separated list of words. That’s exactly what `rel` is, so the CSS selector is simply `a[rel~="external"]`. The image is then inserted as a background on the link using `background-image: url(graphics/extern.gif);`, positioned to the left horizontally and centered vertically using `background-position: left center;`, and set to not repeat using `background-repeat: no-repeat;`. Then we add some padding to the left of the link to push the text past the image, and voila! Making the arrow animate on hover isn’t very difficult either. We add `:hover` to the CSS selector to get `a[rel~="external"]:hover`, and put in one `background-image:` rule to set the image to an animating GIF.

The last piece of the puzzle is making external links open in new windows. The traditional way to do this is to add `target="_blank"` to the link tag; however, XHTML1.1 doesn’t recognize the `target` attribute. Thus, we have to use another method: JavaScript. Thanks to the Document Object Model, we can do this with a small piece of code that works in every current browser. Here it is:

```js
1   function setExternalLinks() {
2      if (!document.getElementsByTagName) {
3         return null;
       }
 
4      var anchors = document.getElementsByTagName("a");
5      for (var i = 0; i < anchors.length; i++) {
6         var anchor = anchors[i];
7         if (anchor.getAttribute("href") &&
8             anchor.getAttribute("rel") == "external") {
9            anchor.setAttribute("target", "_blank");
          }
       }
    }

10  window.onload = setExternalLinks;
```

So, how does this work? First, we create a function (line 1) to do the work. Then we check (line 2) to make sure that the script is being run in a DOM-capable browser. If it’s not, then just abort (line 3). Otherwise, we continue on to line 4 and get an array of every link in the page. We loop through every link (line 5). For each link (line 6), we check to make sure it’s actually a link and not an anchor (line 7), and also that it’s an external link (line 8). If it is, then we set the `target` attribute to “_blank” (line 9). Finally, on line 10, we set it up so that this function gets called after the page has finished loading. Please note that if you have any other scripts that need to be run after the page has finished loading, you’ll need to replace line 8 with code to make all of the scripts run.

If you don’t know much about CSS or JavaScript, this may be a little over your head. However, with a little work, it’s not too difficult to figure out. Feel free to experiment and play with the system; my JavaScript is distributed under the same [Creative Commons license](http://creativecommons.org/licenses/by-nc-sa/1.0/){:rel='external'} that I use for my website. If you have any questions, feel free to leave a comment.

*[CSS]: Cascading Style Sheets
*[DOM]: Document Object Model
*[HTML]: HyperText Markup Language
*[IE]: Internet Explorer
*[XHTML1.1]: eXtensible HyperText Markup Language version 1.1