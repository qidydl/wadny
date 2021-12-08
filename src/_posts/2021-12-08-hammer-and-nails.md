---
title: Good thing I have a hammer to deal with all these nails
---
What HTML actually is:

```html
<main>
  <section>
    <h2>Heading</h2>
    <p>Content</p>
    <figure>
      <blockquote cite="reference">
        <p>A quote from somewhere</p>
      </blockquote>
      <figcaption>- <cite>Somewhere</cite></figcaption>
    </figure>
  </section>
</main>
<nav>
  <ul>
    <li><a href="page1">A page</a></li>
    <li><a href="page2" rel="external">Another page</a></li>
  </ul>
</nav>
```

What React component developers think it is:

```html
<div class="main">
  <div class="section">
    <div class="heading level-2">Heading</div>
    <div class="paragraph">Content</div>
    <div class="figure">
      <div class="quotation">A quote from somewhere</div>
      <div class="caption">- Somewhere</div>
    </div>
  </div>
</div>
<div class="menu">
  <div class="menu-item"><a href="page1">A page</a></li>
  <div class="menu-item"><a href="page2" class="external">Another page</a></li>
</div>
```

*[HTML]: HyperText Markup Language