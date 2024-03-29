---
title: Performance improvements
---
I made a few small changes and rewrote the calendar rendering to cut page rendering time by about 0.05s. The old calendar system made an SQL `SELECT` for every day in the calendar; the new system makes just one at the start to get all the days that have news posts on them. Between all of the changes I made, page rendering has gone from an average of 0.085 seconds to an average of 0.035 seconds, while using a bit less memory. This should make my hosting provider happier. A system to rebuild a set of static HTML pages would reduce load even more, but that’s a bit too complicated for me to handle myself. I’ll probably try to trim the site down even more before I add the quicklinks system, since that will add another SQL `SELECT`. Aside from quicklinks, I also plan on adding a Help or About page for the news section, explaining everything it does, along with a couple more small features. However, the news section is now mostly finished.

*[HTML]: HyperText Markup Language
*[SQL]: Structured Query Language