---
title: An Issue Needing Resolution
---
I was pointed to [Say No to 72 DPI](http://www.scantips.com/no72dpi.html){:rel='external'} via [Cameron Moll](http://www.cameronmoll.com/ "Authentic Boredom"){:rel='external'}’s sidebar. It’s an interesting article, albeit with a [poor font choice](http://www.bancomicsans.com/home.html "Ban Comic Sans"){:rel='external'}, but it has a misconception in a data table that I need to address. This has become so widespread that I’m going to use inline styles to highlight its importance:

<b class="big">Do not use 1280x1024 resolution.</b>

The only time you should use 1280x1024 is if it is the *native* resolution of an LCD monitor. If you are using a CRT monitor, __do not use 1280x1024__. Why? I’ll do my best to explain it.

Monitors have something called an <dfn>aspect ratio</dfn>. This is the ratio between the horizontal and vertical dimensions of the monitor, and determines whether the monitor is more square-shaped or more rectangular. Virtually all CRT monitors and many LCD monitors have a 4:3 aspect ratio, which means if you divide the horizontal size by the vertical size, you will get (roughly) 4/3, or 1.333333333… repeating.

Screen resolutions also have their own aspect ratio, which is *independent* of the aspect ratio of the monitor. Fortunately, most popular resolutions (800x600, 1024x768, 1152x864, 1600x1200, etc.) are also a 4:3 aspect ratio, so when you display them on a 4:3 monitor, everything looks normal. Here is the problem: __1280x1024 is not a 4:3 resolution__. It is, in fact, __5:4__. Thus, if you use 1280x1024 on a normal 4:3 ratio monitor (most CRTs are 4:3), everything will be squished vertically because the aspect ratios are different. There is no way around this; if your monitor is 4:3, the resolution you want is 1280x960, __not__ 1280x1024.

Of course, it’s more complicated than this. Many new LCD monitors have a native resolution of 1280x1024. This means that the monitor itself is now a 5:4 ratio, so *regular resolutions will be wrong*. 800x600, 1024x768, 1152x864, 1600x1200, none of these will display properly. Confusing things even more, there are now widescreen monitors, which are completely different from both 4:3 and 5:4.

I used to run 1280x1024 on a 19″ CRT monitor, and didn’t realize it was wrong, but when I switched to 1280x960 it was immediately obvious how everything had been squished. You may not want to give up that extra vertical screen space, but trust me: using the correct aspect ratio is worth a little real estate.

So, how do you figure out what the aspect ratio of your monitor is? First, try checking the manufacturer’s website or your manual. Do *not* trust on-screen displays—my 19″ monitor lists 1280x1024 as a “preferred” resolution, even though it is dead wrong. If you have a ruler handy, just taking measurements may be the quickest way, and it is probably the most reliable. Divide the horizontal length by the vertical length, and hopefully you’ll get a number close to either 4/3 or 5/4. If it is 4/3, use 4:3 resolutions like 1024x768, 1280x960, or 1600x1200. If it is 5/4, use 5:4 resolutions like 1280x1024 or 1600x1280. If it is something completely different, you probably have a widescreen monitor, and God help you because they don’t seem to be standardized; you’ll have to do some research to see what works for widescreens.

Hopefully this will save a few people from using the wrong aspect ratio, and leave you less confused than you were before you started reading.

*[CRT]: Cathode Ray Tube
*[DPI]: Dots Per Inch
*[LCD]: Liquid Crystal Display