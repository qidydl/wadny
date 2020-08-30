arImageSrc = new Array(
  "/design/summary/ydl-new/news-sel.gif",
  "/design/summary/ydl-new/people-sel.gif",
  "/design/summary/ydl-new/about-sel.gif",
  "/design/summary/ydl-new/mirc-sel.gif",
  "/design/summary/ydl-new/idtscript-sel.gif",
  "/design/summary/ydl-new/qidbot-sel.gif",
  "/design/summary/ydl-new/email-sel.gif",
  "/design/summary/ydl-new/blink-sel.gif",
  "/design/summary/ydl-new/webdesign-sel.gif",
  "/design/summary/ydl-new/addons-sel.gif",
  "/design/summary/ydl-new/programming-sel.gif"
)

arImageList = new Array();

for (counter in arImageSrc) {
  arImageList[counter] = new Image();
  arImageList[counter].src = arImageSrc[counter];
}

if (document.layers)
  client = "ns";
else
  client = "ie";

menuCurrent = "normal";
menuMirc = "none";

function MoveLayer(layer, top, left) {
  if (client == "ns") {
    document.layers[layer].top = top;
    document.layers[layer].left = left;
  }
  else {
    document.all[layer].style.pixelTop = top;
    document.all[layer].style.pixelLeft = left;
  }
}
function ShowLayer(layer) {
  if (client == "ns") { document.layers[layer].visibility = "visible"; }
  else { document.all[layer].style.visibility = "visible"; }
}
function HideLayer(layer) {
  if (client == "ns") { document.layers[layer].visibility = "hidden"; }
  else { document.all[layer].style.visibility = "hidden"; }
}


function ToggleMenu(newmenu) {
  if (newmenu == "mirc") {
    if (menuCurrent == "mirc") { HideMenu("mirc"); menuCurrent = "normal"; }
    else { HideMenu("programming"); HideMenu("webdesign"); ShowMenu("mirc"); menuCurrent = "mirc"; }
  }
  if (newmenu == "webdesign") {
    if (menuCurrent == "webdesign") { HideMenu("webdesign"); menuCurrent = "normal"; }
    else { HideMenu("programming"); HideMenu("mirc"); ShowMenu("webdesign"); menuCurrent = "webdesign"; }
  }
  if (newmenu == "programming") {
    if (menuCurrent == "programming") { HideMenu("programming"); menuCurrent = "normal"; }
    else { HideMenu("mirc"); HideMenu("webdesign"); ShowMenu("programming"); menuCurrent = "programming"; }
  }
}
function ToggleMircMenu(newmenu) {
  if (newmenu == "idtscript") {
    if (menuMirc == "idtscript") { HideMircMenu("idtscript"); menuMirc = "none"; }
    else { ShowMircMenu("idtscript"); menuMirc = "idtscript"; }
  }
  if (newmenu == "qidbot") {
    if (menuMirc == "qidbot") { HideMircMenu("qidbot"); menuMirc = "none"; }
    else { ShowMircMenu("qidbot"); menuMirc = "qidbot"; }
  }
  if (newmenu == "blink") {
    if (menuMirc == "blink") { HideMircMenu("blink"); menuMirc = "none"; }
    else { ShowMircMenu("blink"); menuMirc = "blink"; }
  }
}
function ShowMenu(menu) {
  if (menu == "mirc") {
    ShowLayer("idtImage");
    ShowLayer("qidbotImage");
    ShowLayer("blinkImage");
    ShowLayer("addonImage");
    MoveLayer("emailImage", 305, 145);
    MoveLayer("webImage", 335, 155);
    MoveLayer("programImage", 365, 160);
    ShowMircMenu(menuMirc);
  }
  if (menu == "webdesign") {
    ShowLayer("webMenu");
    MoveLayer("programImage", 255, 130);
  }
  if (menu == "programming") { ShowLayer("programMenu"); }
}
function ShowMircMenu(menu) {
  if (menu == "idtscript") {
    HideMircMenu("qidbot");
    HideMircMenu("blink");
    ShowLayer("idtMenu");
    MoveLayer("qidbotImage", 260, 130);
    MoveLayer("blinkImage", 290, 140);
    MoveLayer("addonImage", 320, 150);
    MoveLayer("emailImage", 350, 155);
    MoveLayer("webImage", 380, 160);
    MoveLayer("programImage", 410, 160);
  }
  if (menu == "qidbot") {
    HideMircMenu("idtscript");
    HideMircMenu("blink");
    ShowLayer("qidbotMenu");
    MoveLayer("blinkImage", 280, 140);
    MoveLayer("addonImage", 310, 150);
    MoveLayer("emailImage", 340, 155);
    MoveLayer("webImage", 370, 160);
    MoveLayer("programImage", 400, 160);
  }
  if (menu == "blink") {
    HideMircMenu("idtscript");
    HideMircMenu("qidbot");
    ShowLayer("blinkMenu");
    MoveLayer("addonImage", 310, 150);
    MoveLayer("emailImage", 340, 155);
    MoveLayer("webImage", 370, 160);
    MoveLayer("programImage", 400, 160);
  }
}
function HideMenu(menu) {
  if (menu == "mirc") {
    HideMircMenu("idtscript");
    HideMircMenu("qidbot");
    HideMircMenu("blink");
    HideLayer("idtImage");
    HideLayer("qidbotImage");
    HideLayer("blinkImage");
    HideLayer("addonImage");
    MoveLayer("emailImage", 185, 125);
    MoveLayer("webImage", 215, 125);
    MoveLayer("programImage", 245, 125);
  }
  if (menu == "webdesign") {
    HideLayer("webMenu");
    MoveLayer("programImage", 245, 125);
  }
  if (menu == "programming") { HideLayer("programMenu"); }
}
function HideMircMenu(menu) {
  if (menu == "idtscript") {
    HideLayer("idtMenu");
    MoveLayer("qidbotImage", 215, 125);
    MoveLayer("blinkImage", 245, 130);
    MoveLayer("addonImage", 275, 135);
    MoveLayer("emailImage", 305, 145);
    MoveLayer("webImage", 335, 155);
    MoveLayer("programImage", 365, 160);
  }
  if (menu == "qidbot") {
    HideLayer("qidbotMenu");
    MoveLayer("blinkImage", 245, 130);
    MoveLayer("addonImage", 275, 135);
    MoveLayer("emailImage", 305, 145);
    MoveLayer("webImage", 335, 155);
    MoveLayer("programImage", 365, 160);
  }
  if (menu == "blink") {
    HideLayer("blinkMenu");
    MoveLayer("addonImage", 275, 135);
    MoveLayer("emailImage", 305, 145);
    MoveLayer("webImage", 335, 155);
    MoveLayer("programImage", 365, 160);
  }
}
function ShowIDT() {
  ToggleMenu("mirc");
  ToggleMircMenu("idtscript");
}
function ShowQID() {
  ToggleMenu("mirc");
  ToggleMircMenu("qidbot");
}
function ShowBlink() {
  ToggleMenu("mirc");
  ToggleMircMenu("blink");
}