// Set target for external links
var anchors = document.querySelectorAll('a[rel~="external"]');

for (var i = 0; i < anchors.length; i++) {
    var anchor = anchors[i];

    // Probably overkill, but just in case
    if (anchor.getAttribute('href')) {
        anchor.setAttribute('target', '_blank');
    }
}

// Add indicator for linkable headings
// This must be JS; CSS can add text using ::after with content, but only plain text, not a link
var headings = document.querySelectorAll('main h1[id], main h2[id], main h3[id], main h4[id], main h5[id], main h6[id]');

for (var i = 0; i < headings.length; i++) {
    var heading = headings[i];

    heading.insertAdjacentHTML('beforeend', '<a class="heading-anchor" href="#' + heading.id + '" aria-labelledby="' + heading.id + '">🔗</a>');
}

// Preload external link images
over = new Image();
over.src = "/extern-over.gif";
norm = new Image();
norm.src = "/extern.gif";