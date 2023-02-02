$(document).ready(function () {
  // animation for sliding nav bar
  $("#navBarOpener").click(() => {
    $("#navDropDown").slideToggle(200);
  });
  // fixing the weird bug of hamburger menu not defaulting when screen size changes
  $(window).resize(function () {
    if ($(window).width() >= 768) {
      if (!$("#navDropDown").css("display", "block")) {
        $("#navDropDown").css("display", "block");
      }
    } else {
      if (!$("#bar1").hasClass("openned")) {
        if (!($("#navDropDown").css("display").toLowerCase() == "none")) {
          $("#navDropDown").css("display", "none");
        }
      }
      //else{
      // if(!$('#navDropDown').css('display', 'block')){
      //     console.log("openneds")
      //     $('#navDropDown').css('display', 'block')
      // }
      //}
    }
  });

  // Navigation bar elections clickable dropdown
  $("#electionsNav").click(() => {
    if ($(window).width() <= 768) {
      $("#dropDownElectionsNav").slideToggle(50);
    }
  });
  //PROFILE NAVIGATION toggle
  $("#dropDownButtonProfile").click(function () {
    $("#dropDownProfile").slideToggle(200);
  });
});

// change navbar when scrolled
window.onscroll = function () {
  scrollFunction();
};

// number of pixels trigger when to change form of navbar
limit = 38;

// navCon = $("#navigationContainer")
// navTitle = $("#navigationTitle")
// navBar = $("#navigationBar")
// navTitleCon = $("#navigationTitleContainer")

// //function called when window is scrolled
// function scrollFunction(){

//     if(document.body.scrollTop > limit || document.documentElement.scrollTop > limit){
//         if(!(navCon.css("position").toLowerCase() == 'fixed')){
//             navCon.css("padding", "0rem 0rem")
//             navCon.css("background-color", "#034919")
//             navCon.css("position", "fixed")
//             navTitle.css("font-size", "0px")
//             navTitleCon.css("height", "0px")
//             navBar.css("border-color", "rgb(255 255 255 / 0)")
//         }
//     }
//     else{
//         if((navCon.css("position").toLowerCase() == 'fixed')){
//             navCon.css("padding","1.25rem 0rem")
//             navCon.css("background-color", "transparent")
//             navCon.css("position", "absolute")
//             navTitle.css("font-size", "1.25rem")
//             navTitleCon.css("height", "auto")
//             navBar.css("border-color", "rgb(255 255 255 / 0.6)")
//         }
//     }

// }

// I SWITCHED IT TO VANILLA JS BECAUSE IT'S FASTER
navCon = document.getElementById("navigationContainer");
navTitle = document.getElementById("navigationTitle");
navBar = document.getElementById("navigationBar");
navTitleCon = document.getElementById("navigationTitleContainer");
envoteIcon = document.getElementById("envoteIcon");

//function called when window is scrolled
function scrollFunction() {
  if (
    document.body.scrollTop > limit ||
    document.documentElement.scrollTop > limit
  ) {
    if (!(navCon.style.position.toLowerCase() == "fixed")) {
      envoteIcon.style.height = "0px";
      navCon.style.padding = "0rem 0rem";
      navCon.style.backgroundColor = "#034919";
      navCon.style.position = "fixed";
      navTitle.style.fontSize = "0px";
      navTitleCon.style.height = "0px";
      navBar.style.borderColor = "rgb(255 255 255 / 0)";
    }
  } else {
    if (navCon.style.position.toLowerCase() == "fixed") {
      navCon.style.padding = "1.25rem 0rem";
      envoteIcon.style.height = "28px";
      navCon.style.backgroundColor = "transparent";
      navCon.style.position = "absolute";
      navTitle.style.fontSize = "1.25rem";
      navTitleCon.style.height = "auto";
      navBar.style.borderColor = "rgb(255 255 255 / 0.6)";
    }
  }
}

// PROFILE PAGE

// pang auto submit pag nag change ng picture
const formUploadPicture = document.querySelector("#form-to-upload-picture");
function uploadImage() {
  formUploadPicture.submit();
}

// THIS COULD BE TEMPORARY, PRINTING THE FILE FOR CERTIFICATE
function printThis(fileName) {
  w = open(fileName);
  w.print();
}

function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /*loop through a collection of all HTML elements:*/
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain attribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
          if (this.status == 200) {
            elmnt.innerHTML = this.responseText;
          }
          if (this.status == 404) {
            elmnt.innerHTML = "Page not found.";
          }
          /*remove the attribute, and call this function once more:*/
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      };
      xhttp.open("GET", file, true);
      xhttp.send();
      /*exit the function:*/
      return;
    }
  }
}
includeHTML();

// insturctions modal for ongoingelections.html

function showInstructions() {
  document.getElementById("showInstructionsButton").click();
}
