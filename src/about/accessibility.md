---
title: Accessibility
---
Wadny.com includes many accessibility features, most of which I learned from Mark Pilgrim on [DiveIntoAccessibility](http://diveintoaccessibility.org/){:rel='external'}. If you have any questions or comments, you can send me an e-mail—information is on [the author page]({% link about/author.md %}).

## Standards compliance
- All pages on wadny.com should validate as HTML5. The CSS of wadny.com is also validated. Validator links are provided in the sidebar to check this—if you find non-validating pages, please tell me.
- Wadny.com is [WAVE](https://wave.webaim.org/ "WAVE validator for accessibility"){:rel='external'} validated for web accessibility. I have done my best to ensure my site is WCAG-compliant, although this is not always something that can be validated automatically.
- I have attempted to use structured semantic markup and CSS-based aesthetics whenever possible. This means all headings should be marked up with `<h#>` tags, tabular data (and ONLY tabular data) is marked up with summarized, captioned tables, and so forth.

*[HTML5]: HyperText Markup Language version 5
*[CSS]: Cascading Style Sheets
*[WCAG]: Web Content Accessibility Guidelines

## Navigation aids
All pages have `<link>` tags pointing to the wadny.com home page and the Atom version of my news page. These links should already be usable in text-only browsers and screen readers, and they may be exposed in other browsers as well.

## Links
Many links include title attributes to provide further information about the link or to indicate if the link opens in a new window. This helps links make sense out of context. Also, there are no `javascript:` pseudo-links, even though some links will open in new windows in browsers that support them. In addition, links that open in new windows are indicated by a small red arrow to the left of the link.

## Images
Wadny.com uses a minimum of images to cut down on download time and improve accessibility. All images used on this site have descriptive alt attributes so users of text-only browsers are not prevented from using them. For users that are displaying images, there is usually also a title for the image to display as a tooltip.

## Visual design
This site uses CSS for visual layout. When the page is read in a screen reader, it should work properly due to the simple and standards-compliant markup; however, this is untested. If you are aware of any issues with my site when it is handled by a screen reader, please let me know.

## Wrap-up
This site and its accessibility features are a work in progress. If you would like to suggest changes to make to the site or this page, or have comments of any kind, feel free to contact me; information is on [the author page]({% link about/author.md %}).