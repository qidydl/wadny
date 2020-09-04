var arImageSrc = new Array (
    "menuQIDnews-on.gif",
    "menuQIDarchives-on.gif",
    "menuQIDlinks-on.gif",
    "menuQIDmail-on.gif",
    "menuQIDhumor-on.gif",
    "menuQIDirc-on.gif",
    "menuQIDindividual-on.gif"
)

var arImageList = new Array ();

for (counter in arImageSrc) {
    arImageList[counter] = new Image();
    arImageList[counter].src = arImageSrc[counter];
}