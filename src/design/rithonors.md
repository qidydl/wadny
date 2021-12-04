---
title: RIT Honors Program
---
<figure>
    <a href="/design/rithonors/demo/" title="RIT Honors Program (demo)">
        <img src="{% link design/th_rithonors.png %}" width="370" height="278" alt="RIT Honors Program">
    </a>
</figure>

## Introduction
The Rochester Institute of Technology Honors Program owned and operates a server for student use. This server provided many things, including a website with information for students. I was a student in the Honors Program, an administrator on the server, and chair of the Honors IT Committee, which was officially responsible for the server. We decided that the existing website needed considerable improvement, so I created this new design.

*[IT]: Information Technology

## Standards
Like all of my later designs, the Honors Program website was built with standards-based, semantic XHTML for markup and CSS for layout and design. This resulted in easier development, faster redesigns in the future, smaller page sizes, more control over page design, and better accessibility for all users. This was particularly important for an educational site, because it had to be accessible to all students, including those with disabilities. Standards-based design gives you this with little additional effort.

*[XHTML]: eXtensible HyperText Markup Language
*[CSS]: Cascading Style Sheets

## Visual design
There was no previous website to base this design on. There was an [official, faculty-run website](http://www.rit.edu/~aep/honors/){:rel='external'}, but it was not particularly attractive, so a new design was created from scratch. I went with a fairly minimalist approach, since it felt appropriate for an educational site—simple and focused, without distractions. I did carry over some of the color scheme from the faculty site into the student site, to give them some connection, but there was little else on the faculty page that fit in.

Also, the Honors Program website used a fixed-width design, so that the content width never grows beyond a maximum width. This helps keep line widths within a readable range, so that users with high resolutions can still read the page easily.

## Technology
Like most of my sites, the RIT Honors Program site was built on a PHP backend. This is primarily for maintenance and integration, since it allows Committee sites to tie into the main design with little effort. Pages are set up as directories, so the underlying technology is not exposed to the user and can be changed at will without impacting links.