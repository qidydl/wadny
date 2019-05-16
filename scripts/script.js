function setExternalLinks() {
    if (!document.getElementsByTagName) {
        return null;
    }

    var anchors = document.getElementsByTagName("a");
    for (var i = 0; i < anchors.length; i++) {
        var anchor = anchors[i];
        if (anchor.getAttribute("href") && anchor.getAttribute("rel") == "external") {
            anchor.setAttribute("target", "_blank");
        }
    }
}

window.onload = setExternalLinks;