// Set target for external links
const anchors = document.querySelectorAll('a[rel~="external"]');

for (const anchor of anchors) {
    // Probably overkill check, but just in case
    if (anchor.getAttribute("href")) {
        anchor.setAttribute("target", "_blank");

        const currentRel = anchor.getAttribute("rel");
        anchor.setAttribute("rel", currentRel + " noopener");

        const currentTitle = anchor.getAttribute("title");
        let newTitle = "Opens in a new window";
        if (currentTitle) {
            newTitle = newTitle + " - " + currentTitle;
        }
        anchor.setAttribute("title", newTitle);
    }
}

// Add indicator for linkable headings
// This must be done in JS; CSS can add text using ::after with content, but only plain text, not a link
const headings = document.querySelectorAll("main h1[id], main h2[id], main h3[id], main h4[id], main h5[id], main h6[id]");

for (const heading of headings) {
    heading.insertAdjacentHTML(
        "beforeend",
        `<a class="heading-anchor" href="#${heading.id}" aria-labelledby="${heading.id}">🔗</a>`);
}

// Support main menu toggle on mobile
function toggleNav() {
    const nav = document.querySelector("nav");

    if (nav.classList.contains("open")) {
        nav.classList.remove("open");
    } else {
        nav.classList.add("open");
    }
}