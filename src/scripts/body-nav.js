// Set body style to match the time of year
const month = new Date().getMonth();
const body = document.getElementsByTagName("body")[0];

if (month === 2 || month === 3) {
    // March (2), April (3) = early spring (no modifier required)
} else if (month === 4) {
    // May (4) = spring
    body.classList.add("spring");
} else if (month === 5 || month === 6 || month === 7) {
    // June (5), July (6), August (7) = summer
    body.classList.add("summer");
} else if (month === 8 || month === 9 || month === 10) {
    // September (8), October (9), November (10) = fall
    body.classList.add("fall");
} else if (month === 11 || month === 0 || month === 1) {
    // December (11), January (0), February (1) = winter
    body.classList.add("winter");
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