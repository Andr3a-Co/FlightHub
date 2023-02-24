/**
* Author: Andrea Espitia s103165504
* Target: enquire.html / payment.html
* Purpose: Assignment 2  JavaScript
* Created: 17/04/2021
* Last updated: 17/04/2021
* Credits: Data transfer, validation and submission to server
*/

"use strict";

function openMenu1() {

  document.getElementById("destinations_list").classList.toggle("displayopt");
}

function openMenu2() {

  document.getElementById("deals_list").classList.toggle("displaylist");
}

function openMenu3() {

  document.getElementById("contact_list").classList.toggle("displaycontact");
}

function openMenu4() {

  document.getElementById("flights_list").classList.toggle("displayflight");
}

/**Close the sublist**/

function closeMenu1() {
  var dropdowns = document.getElementsByClassName("menulist");
  var openDropdown;
  if (!event.target.matches(".menubtn")) {
    for (var i = 0; i < dropdowns.length; i++) {
      openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("displayopt")) {
        openDropdown.classList.remove("displayopt");
      }
    }
  }
}

function closeMenu2() {

  var dealsdropdowns = document.getElementsByClassName("dealslist")
  var openDropdeals;


  if (!event.target.matches(".menubtn2")) {
    for (var i = 0; i < dealsdropdowns.length; i++) {
      openDropdeals = dealsdropdowns[i];
      if (openDropdeals.classList.contains("displaylist")) {
        openDropdeals.classList.remove("displaylist");
      }
    }
  }
}


function closeMenu3() {
  var dropcontacts = document.getElementsByClassName("contactlist");
  var openContactlist;
  if (!event.target.matches(".menubtn3")) {
    for (var i = 0; i < dropcontacts.length; i++) {
      openContactlist = dropcontacts[i];
      if (openContactlist.classList.contains("displaycontact")) {
        openContactlist.classList.remove("displaycontact");
      }
    }
  }
}

function closeMenu4() {
  var dropflights = document.getElementsByClassName("flightlist");
  var openflightList;
  if (!event.target.matches(".menubtn4")) {
    for (var i = 0; i < dropflights.length; i++) {
      openflightList = dropflights[i];
      if (openflightList.classList.contains("displayflight")) {
        openflightList.classList.remove("displayflight");
      }
    }
  }
}



function initien() {
var droplist = document.getElementById("droplist");
	droplist.onclick = openMenu1;
  window.onclick = closeMenu1;
var droplist2 = document.getElementById("droplist2");
  droplist2.onclick = openMenu2;
  window.onclick = closeMenu2;
var droplist3 = document.getElementById("droplist3");
  droplist3.onclick = openMenu3;
  window.onclick = closeMenu3;
  var droplist4 = document.getElementById("droplist4");
    droplist4.onclick = openMenu4;
    window.onclick = closeMenu4;
}

window.onload = initien;
