---
title: EdgeIRC.net version 4
---
<figure>
    <a href="/design/edgeirc4/demo/about/" title="EdgeIRC version 4 (demo)">
        <img src="{% link design/th_edgeirc4.png %}" width="370" height="278" alt="EdgeIRC version 4">
    </a>
</figure>

## Introduction
EdgeIRC was an IRC network operated by me and several of my friends. It originally went online in May of 2000, and had a website shortly thereafter. This is the fourth design I made for the EdgeIRC website, and the third that was actually used.

*[IRC]: Internet Relay Chat

## Standards
Like all of my later designs, EdgeIRC version 4 was entirely standards-based, using semantic XHTML (it was still a thing at the time) for markup and CSS for layout and design. This resulted in easier development, faster redesigns in the future, smaller page sizes, more control over page design, and better accessibility for all users.

*[CSS]: Cascading Style Sheets
*[XHTML]: eXtensible HyperText Markup Language

## Visual design
Visually, version 4 represents a major evolution of the [previous design]({% link design/summary.html %}#edge3). A similar color scheme was chosen to ensure that the new site felt similar to the previous site, but the new design is much cleaner than the previous version and appears more open and calm, thanks to extensive use of whitespace, particularly in the heading and menu.

## Technology
EdgeIRC was written on a simple PHP backend primarily to aid maintenance. Sections could be added, removed, and refactored by editing one menu file instead of having to change each page. This backend also allowed the use of a MySQL server to store the news along with a form allowing admins to post news from their browser. Pages are set up as directories, so the underlying technology is not exposed to the user and can be changed at will without impacting links.