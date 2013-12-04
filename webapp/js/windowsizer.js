window.onload = function () {

    // get tab container
    var container = document.getElementById("tabContainer");
    var tabcon = document.getElementById("sizer");
    //alert(tabcon.childNodes.item(1));
    // set current tab
    var navitem = document.getElementById("tabHeader_1");

    //store which tab we are on
    var ident = navitem.id.split("_")[1];
    //alert(ident);
    container.setAttribute("data-current", ident);
    //set current tab with class of activetabheader
    navitem.setAttribute("class", "tabActiveHeader");

    //hide two tab contents we don't need
    var pages = tabcon.getElementsByClassName("tabpage");
    for (var i = 1; i < pages.length; i++) {
        pages.item(i).style.display = "none";
    };

    //this adds click event to tabs
    var tabs = container.getElementsByTagName("li");

    for (var i = 0; i < tabs.length; i++) {
        if (tabs[i].getAttribute("tab") > 0) {
            tabs[i].onclick = resize;
        }
    }

    //    var tabs = container.getElementsByTagName("li");
    //    for (var i = 0; i < tabs.length; i++) {
    //        $temp = tabs[i];
    //        $temp.
    //       // tabs[i].closest("li").onclick = displayPage;
    //    }
}

// on click of one of tabs
function resize() {
  //var current = this.parentNode.getAttribute("data-current");
  var current = document.getElementById("tabContainer").getAttribute("data-current");
  var content = document.getElementById("container");
  //remove class of activetabheader and hide old contents
  document.getElementById("tabHeader_" + current).removeAttribute("class");
  document.getElementById("tabpage_" + current).style.display="none";

  var ident = this.id.split("_")[1];
  //add class of activetabheader to new active tab and show contents
  this.setAttribute("class","tabActiveHeader");
  document.getElementById("tabpage_" + ident).style.display="block";
  document.getElementById("tabContainer").setAttribute("data-current",ident);
  var height =  $("#tabpage_" +ident).height() + 50;
  $('#content').height(height + 'px');
}