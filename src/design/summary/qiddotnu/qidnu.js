var visibleVar="null";
var currentLayer="lyrNews";

if (navigator.appName == "Netscape") {
  layerStyleRef="layer.";
  layerRef="document.layers";
  styleSwitch="";
  visibleVar="show";
}
else {
  layerStyleRef="layer.style.";
  layerRef="document.all";
  styleSwitch=".style";
  visibleVar="visible";
}

function toggleLayer(layerName){
  if (eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility == visibleVar')) {
    hideLayer(layerName);
  }
  else {
    showLayer(layerName);
  }
}
function showLayer(layerName){
  eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="visible"');
}
function hideLayer(layerName){
  eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="hidden"');
}
function swapLayer(layerName) {
  hideLayer(currentLayer);
  showLayer(layerName);
  currentLayer=layerName;
}
function launchPage(pageUrl){
  showHideLayerSwitch('pulldownMenu');
  if (navigator.appName == "Netscape") {
    document.location.href=pageUrl;
  }
  else {
    document.location=pageUrl;
  }
}