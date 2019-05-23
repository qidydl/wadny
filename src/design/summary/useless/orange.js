<!--
var letters	= 6;
var letary	= letters - 1;
var xcoord	= new Array(168,218,268,318,363,413);
var ymax	= 5;
var ns		= (document.layers) ? 1:0;
var ie		= (document.all) ? 1:0;
var ns6		= ((document.getElementById) && (!document.all)) ? 1:0;
var y		= -60;
var selectedObj;
var moveLayers	= "mtext";

// Set up the array of layer names
var names = new Array(letters);
for (i = 0; i <= letary; i++) { names[i] = "word" + i; }

// Set up the array of y coordinates
var ycoord = new Array(letters);
for (i = 0; i <= letary; i++) { ycoord[i] = -80; }

// Function to return the full name from the layer name
function getName(lname) {
  if (ie) { return eval("document.all." + lname + ".style"); }
  else if (ns6) { return eval("document.getElementById(" + lname + ").style"); }
  else { return eval("document." + lname); }
}

// Function to move a layer
function moveLayer(name,x,y) {
  if (ns) { name.moveTo(x,y); }
  else if (ns6) {
    name.style.left = x;
    name.style.top = y;
  }
  else {
    name.pixelLeft = x;
    name.pixelTop = y;
  }
}

// Function to set movement timers
function setTimers() {
  var layer = getName("adven");
  for (i = 0; i <= letary; i++) { setTimeout("move(" + i + ")",i*250); }
  init();
}

// Function to move layers to their ending positions
function move(num) {
  var layer = getName(names[num]);
  if (ycoord[num] < ymax) {
    ycoord[num] += 5;
    if (ycoord[num] > ymax) { ycoord[num] = ymax; }
    moveLayer(layer,xcoord[num],ycoord[num]);
    setTimeout("move(" + num + ")",10);
  }
  else if (num == letary) { setTimeout("text()",350); }
}

// Function to move the little text logo into place
function text() {
  var layer = getName("adven");
  if (y < 80) {
    y += 10;
    if (y > 80) { y = 80; }
    moveLayer(layer,239,y);
    setTimeout("text()",5);
  }
  else {
    layer = getName("mtext");
    layer.visibility = "visible";
  }
}

// Figures out which object we just clicked on and sets selectedOBJ to it
function setSelectedElem(evt) {
  if (client == "ns") {
    var clickX = evt.pageX;
    var clickY = evt.pageY;
    var testObj;
    for (var i = document.layers.length - 1; i >= 0; i--) {
      testObj = document.layers[i];
      if ((clickX > testObj.left) && 
          (clickX < testObj.left + testObj.clip.width) && 
          (clickY > testObj.top) && 
          (clickY < testObj.top + testObj.clip.height)) {
        if (moveLayers.indexOf(testObj.id) != -1) { selectedObj = testObj; }
        if (selectedObj) {
          if (selectedObj.zindex <= 100) { selectedObj.zIndex = 100; }
          return;
        }
      }
    }
  } 
  else {
    var testObj = window.event.srcElement;
    selectedObj = testObj.parentElement.parentElement.style;
    if (selectedObj) {
      if (selectedObj.zindex <= 100) { selectedObj.zIndex = 100; }
      return;
    }
  }
  selectedObj = null;
  return;
}

// Sets up event captures
function init() {
  if (navigator.appName == "Microsoft Internet Explorer") { client = "ie"; }
  else { client = "ns"; }
  redrawInit();
  if (client == "ns") { document.captureEvents(Event.MOUSEDOWN | Event.MOUSEMOVE | Event.MOUSEUP); }
  document.onmousedown = engage;
  document.onmousemove = dragIt;
  document.onmouseup = release;
}

// Redraws the screen if it's resized
function redraw() { if ((storedwidth != window.innerWidth) || (storedheight != window.innerHeight)) { location.reload(); } }

// Sets an event to redraw the screen if it's resized
function redrawInit() {
  if (client == "ns") {
    storedwidth = window.innerWidth;
    storedheight = window.innerHeight;
    window.onresize = redraw();
  }
}

// Moves the selected object with the mouse coords
function dragIt(evt) {
  if (selectedObj) {
    if (client == "ns") { moveLayer(selectedObj, (evt.pageX - offsetX), (evt.pageY - offsetY)); } 
    else {
      moveLayer(selectedObj, (window.event.clientX - offsetX), (window.event.clientY - offsetY));
      return false;
    }
  }
}

// Selects the object
function engage(evt) {
  setSelectedElem(evt);
  if (selectedObj) {
    if (client == "ns") {
      offsetX = evt.pageX - selectedObj.left;
      offsetY = evt.pageY - selectedObj.top;
    } 
    else {
      offsetX = window.event.offsetX;
      offsetY = window.event.offsetY;
    }
  }
}

// Deselects the object
function release(evt) {
  if (selectedObj) {
    if (selectedObj.zindex <= 100) { selectedObj.zIndex = 0; }
    selectedObj = null;
  }
}

// Puts something back where it started
function realign(name) {
  var layer = getName(name);
  var xcoord, ycoord;
  switch(name) {
    case "mtext": xcoord = 100;
                  ycoord = 100;
                  break;
  }
  moveLayer(layer,xcoord,ycoord);
}
// -->