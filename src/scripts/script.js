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

// Set random quote and icon in the heading
const quotes = [
  "purple monkey dishwasher",
  "oh no, I spilled HTML!",
  "beware of pickpockets and loose icons",
  "it looks good in yellow-that-Kottke-used-to-use-but-it’s-mine-now",
  "would it help to confuse it if we run away more?",
  "pink and green kitties!",
  "have some CHEESE!",
  "tiny psychotic french elves",
  "you can’t have everything… where would you put it?",
  "it’s a small world, but I wouldn’t want to paint it",
  "this website has been replaced with an exact duplicate",
  "lobster sticks to magnet",
  "my spoon is too big",
  "tuesday is coming, did you bring your coat?",
  "I am feeling fat and sassy",
  "47% YOUR BASE ARE BELONG TO IRS",
  "oh boy, monkey pictures!",
  "is it weird in here, or is it just me?",
  "and the dragon comes in the NIIIIIGHHT!",
  "now with 30 percent more burnination",
  "wang pong—it’s like a covalent bond",
  "in addition, there will be pie",
  "pork chop sandwiches!",
  "hey kid, I’m a computer",
];

const icons = [
  "beapp.gif",
  "bebatch.gif",
  "bebox.gif",
  "bedown.gif",
  "behd.gif",
  "behouse.gif",
  "beram.gif",
  "berec.gif",
  "bereg.gif",
  "beset.gif",
  "box.gif",
  "concrete.gif",
  "dicion.gif",
  "people.gif",
  "sandwich.gif",
  "toaster.gif",
  "tupperware.gif",
];

const quoteIndex = Math.floor(Math.random() * quotes.length);
document.getElementById("quote").innerText = "— " + quotes[quoteIndex];

const iconIndex = Math.floor(Math.random() * icons.length);
document.getElementById("icon").src = "/icons/" + icons[iconIndex];
