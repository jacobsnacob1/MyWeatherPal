//Error message scripts
function invalidZip() {
	alert("This zip code is invalid, please try again");
}

function duplicateZip() {
	alert("You already have the location corresponding to this zip code saved");
}

function fullZip() {
	alert("You have no remaining slots to save locations. Please delete an existing saved location to add a new one");
}
//Alt to detect user's account status to prompt them to upgrade for more slots if theyre standard
function fullZipFree() {
	alert("You may only have one saved location at this time. If you would like to save up to five locations, please upgrade your account.");
}

//reloads page
function reload() {
	window.location.replace("https://myweatherpal.com/homepage.php"); //replace with the url of the site
}




//Tab scripts below
function openCity(evt, cityName) {
  var i, tabContent, tablinks;
  tabContent = document.getElementsByClassName("tabContent");
  for (i = 0; i < tabContent.length; i++) {
    tabContent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function openCity1(evt, cityName) {
  var i, tabContent1, tablinks1;
  tabContent1 = document.getElementsByClassName("tabContent1");
  for (i = 0; i < tabContent1.length; i++) {
    tabContent1[i].style.display = "none";
  }
  tablinks1 = document.getElementsByClassName("tablinks1");
  for (i = 0; i < tablinks1.length; i++) {
    tablinks1[i].className = tablinks1[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openCity2(evt, cityName) {
  var i, tabContent2, tablinks2;
  tabContent2 = document.getElementsByClassName("tabContent2");
  for (i = 0; i < tabContent2.length; i++) {
    tabContent2[i].style.display = "none";
  }
  tablinks2 = document.getElementsByClassName("tablinks2");
  for (i = 0; i < tablinks2.length; i++) {
    tablinks2[i].className = tablinks2[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openCity3(evt, cityName) {
  var i, tabContent3, tablinks3;
  tabContent3 = document.getElementsByClassName("tabContent3");
  for (i = 0; i < tabContent3.length; i++) {
    tabContent3[i].style.display = "none";
  }
  tablinks3 = document.getElementsByClassName("tablinks3");
  for (i = 0; i < tablinks3.length; i++) {
    tablinks3[i].className = tablinks3[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openCity4(evt, cityName) {
  var i, tabContent4, tablinks4;
  tabContent4 = document.getElementsByClassName("tabContent4");
  for (i = 0; i < tabContent4.length; i++) {
    tabContent4[i].style.display = "none";
  }
  tablinks4 = document.getElementsByClassName("tablinks4");
  for (i = 0; i < tablinks4.length; i++) {
    tablinks4[i].className = tablinks4[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openCity5(evt, cityName) {
  var i, tabContent5, tablinks5;
  tabContent5 = document.getElementsByClassName("tabContent5");
  for (i = 0; i < tabContent5.length; i++) {
    tabContent5[i].style.display = "none";
  }
  tablinks5 = document.getElementsByClassName("tablinks5");
  for (i = 0; i < tablinks5.length; i++) {
    tablinks5[i].className = tablinks5[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

