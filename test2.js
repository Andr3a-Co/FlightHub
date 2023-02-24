/**
* Author: Andrea Espitia s103165504
* Target: enquire.html / payment.html
* Purpose: Assignment 2  JavaScript
* Created: 17/04/2021
* Last updated: 17/04/2021
* Credits: Data transfer, validation and submission to server
*/

"use strict";

/**Check data information before submmission**/

function validate() {
  var errMsg = "";
  var result = true;

  const disableValidations = true

  /**Flight selection**/
  var dpt_flight1 = document.getElementById("dpt_flight1").checked;
  var dpt_flight2 = document.getElementById("dpt_flight2").checked;
  var dpt_flight3 = document.getElementById("dpt_flight3").checked;
  var rtn_flight1 = document.getElementById("rtn_flight1").checked;
  var rtn_flight2 = document.getElementById("rtn_flight2").checked;
  var rtn_flight3 = document.getElementById("rtn_flight3").checked;

    /**Baggage selection**/
  var bagDeparture = document.getElementById("checked_bag1").value;
  var bagReturn = document.getElementById("checked_bag2").value;
  var bagdptValue = getqtyBagsDpt();
  var bagrtnValue = getqtyBagsRtn();
  var dptBagNone = document.getElementById("d_baggage0").checked;
  var rtnBagNone = document.getElementById("r_baggage0").checked;
  var dptBag15kg = document.getElementById("d_baggage1").checked;
  var dptBag20kg = document.getElementById("d_baggage2").checked;
  var dptBag30kg = document.getElementById("d_baggage3").checked;
  var rtnBag15kg = document.getElementById("r_baggage1").checked;
  var rtnBag20kg = document.getElementById("r_baggage2").checked;
  var rtnBag30kg = document.getElementById("r_baggage3").checked;

  /**Meals selection**/
  var mealDpt = document.getElementById("meals_dpt").checked;
  var mealRtn = document.getElementById("meals_rtn").checked;
  var dptmeal1 = document.getElementById("dpt_meal1").checked;
  var dptmeal2 = document.getElementById("dpt_meal2").checked;
  var dptmeal3 = document.getElementById("dpt_meal3").checked;
  var rtnmeal1 = document.getElementById("rtn_meal1").checked;
  var rtnmeal2 = document.getElementById("rtn_meal2").checked;
  var rtnmeal3 = document.getElementById("rtn_meal3").checked;
  var noMeals = document.getElementById("no_add_meals").checked;
  var qtymeal1 = document.getElementById("dpt_qty_meal").value;
  var qtymeal2 = document.getElementById("rtn_qty_meal").value;
  var specialadd = document.getElementById("special_add").value;

  /**Passenger information**/
  var firstname = document.getElementById("first_name").value;
  var lastname = document.getElementById("last_name").value;
  var dob = document.getElementById("dob_date").value;
  var address = document.getElementById("s_address").value;
  var suburb = document.getElementById("suburb/town").value;
  var post_code = document.getElementById("postcode").value;
  var phone = document.getElementById("phone_num").value;
  var contact_email = document.getElementById("contact_email").value;
  var statesName = document.getElementById("state");
  var statesValue = statesName.options[statesName.selectedIndex].text;
  var email = document.getElementById("contact_by_email").checked
  var post = document.getElementById("contact_by_post").checked
  var phonec = document.getElementById("contact_by_phone").checked
  var isPostCodeValid = checkStateCode()
  var flightmeals = mealSelection();
  var [isQtyValid, errqty_meals] = quantityCheck();

  if (!disableValidations) {
    if (!isPostCodeValid) {
      errMsg += "- Postcode: please insert a valid postcode. \n\n";
      result = false
    }
  
    if (bagDeparture && bagReturn == "none") {
      errMsg += "- CheckedBag: You must select checked baggage preference for departure and return flight. \n\n";
      result = false;
    }
  
    if (!( dptBagNone || dptBag15kg || dptBag20kg || dptBag30kg) || (!(rtnBagNone || rtnBag15kg || rtnBag20kg || rtnBag30kg)))  {
      errMsg += "- BagWeight: Please select baggage weight\n\n"
      result = false;
    }
  
  
    if (!(mealDpt || mealRtn || noMeals)) {
      errMsg += "- SnacksPreference: Please select meal preference \n\n"
      result = false;
    }
  
    if (!isQtyValid) {
      errMsg = errMsg + errqty_meals;
      result = false
    }
  
  
    if (flightmeals != "") {
      errMsg = errMsg + flightmeals;
      result = false;
    }
  }
  



  if (result) {
  storeBooking(dpt_flight1, dpt_flight2, dpt_flight3, rtn_flight1, rtn_flight2, rtn_flight3);
  }

  /**Store form values to be retrieved on payment.html**/

  if (result) {
  storeExtras(firstname, lastname, dob, bagdptValue, dptBagNone, dptBag15kg,
    dptBag20kg, dptBag30kg, bagrtnValue, rtnBagNone, rtnBag15kg, rtnBag20kg,
    rtnBag30kg, mealDpt, mealRtn, noMeals, dptmeal1, dptmeal2, dptmeal3, rtnmeal1,
    rtnmeal2, rtnmeal3, qtymeal1, qtymeal2, specialadd);
  }

  if (result) {
  storePassengerinfo(address, suburb, statesValue, statesName, post_code, phone, contact_email, email, post, phonec)
  }


if (errMsg !== "" && !disableValidations) {

  swal({
    title: 'Error!',
    text: errMsg,
    icon: 'error',
    confirmButtonText: 'Cool'
  })
  //alert(errMsg);
}
return result;
}
/**Calculate  bags quantity  departure**/
function getqtyBagsDpt() {

  var bagsDeparture = document.getElementById("checked_bag1");
  var qtybag1 = bagsDeparture.options[bagsDeparture.selectedIndex].text;
  return qtybag1;
  }

/**Calculate  bags quantity  return**/
  function getqtyBagsRtn() {

    var bagsReturn = document.getElementById("checked_bag2");
    var qtybag2 = bagsReturn.options[bagsReturn.selectedIndex].text;
    return (qtybag2);
    }

/**Calculate  quantity check meals departure**/
function quantityCheck() {
  var errMsg = "";
  var result = true;
  var meal1 = document.getElementById("dpt_qty_meal").value;
  var meal2 = document.getElementById("rtn_qty_meal").value;
  var dptmeal1 = document.getElementById("dpt_meal1").checked;
  var dptmeal2 = document.getElementById("dpt_meal2").checked;
  var dptmeal3 = document.getElementById("dpt_meal3").checked;
  var rtnmeal1 = document.getElementById("rtn_meal1").checked;
  var rtnmeal2 = document.getElementById("rtn_meal2").checked;
  var rtnmeal3 = document.getElementById("rtn_meal3").checked;

  if ((dptmeal1 || dptmeal2 || dptmeal3) && (meal1 == "") || (rtnmeal1 || rtnmeal2 || rtnmeal3) && (meal2 == "")) {
    errMsg += "- Meals: Please enter quantity meal  \n\n"
    result = false;
  }


  if (isNaN(meal1) || isNaN(meal2) ) {
    errMsg += "- Meals: Please enter a valid quantity meal  \n "
    result = false;
  } else if ((meal1 < 0 || meal1 > 3) || (meal2 < 0 || meal2 > 3)) {
    errMsg += "- Meals: Only up to 3 meals offered per flight. Please enter a valid quantity  \n "
    result = false;
  }
  return [result, errMsg];
}

function mealSelection() {
  var errMsg = "";
  var result = true;
  var mealDpt = document.getElementById("meals_dpt").checked;
  var mealRtn = document.getElementById("meals_rtn").checked;
  var noMeals = document.getElementById("no_add_meals").checked;
  var dptmeal1 = document.getElementById("dpt_meal1").checked;
  var dptmeal2 = document.getElementById("dpt_meal2").checked;
  var dptmeal3 = document.getElementById("dpt_meal3").checked;
  var rtnmeal1 = document.getElementById("rtn_meal1").checked;
  var rtnmeal2 = document.getElementById("rtn_meal2").checked;
  var rtnmeal3 = document.getElementById("rtn_meal3").checked;


  if (mealDpt && (!(dptmeal1 || dptmeal2 || dptmeal3))) {
    errMsg += "- Meals: Please select meal option for Departing flight  \n "
    result = false;
  }

  if (mealRtn &&  (!(rtnmeal1 || rtnmeal2 || rtnmeal3))) {
    errMsg += "- Meals: Please select meal option for Returning flight \n "
    result = false;
  } else if (noMeals) {
    result = false;
  }
 return errMsg
}

/**Post code Check **/

function getStatesName() {

var statesName = document.getElementById("state");
var statesValue = statesName.options[statesName.selectedIndex].text;
return statesValue;
}

function checkStateCode() {
  var errMsg = "";
  var result = true;
  var regex;

  var post_code = document.getElementById("postcode").value;
  var statecode = getStatesName();

  switch (statecode) {
  case "VIC":
    regex = new RegExp(/^[3|8][0-9]{3}$/);
    break;
  case "NSW":
    regex = new RegExp(/^[1|2][0-9]{3}$/);
    break;
  case "QLD":
    regex = new RegExp(/^[4|9][0-9]{3}$/);
    break;
  case "NT":
    regex = new RegExp(/^[0][0-9]{3}$/);
    break;
  case "WA":
    regex = new RegExp(/^[6][0-9]{3}$/);
    break;
  case "SA":
    regex = new RegExp(/^[5][0-9]{3}$/);
    break;
  case "TAS":
    regex = new RegExp(/^[7][0-9]{3}$/);
    break;
  case "ACT":
    regex = new RegExp(/^[0][0-9]{3}$/);
    break;
}
if(!post_code.match(regex)){
  errMsg += "- Postcode: please insert a valid postcode. \n\n";
  result = false;
}

return result;
}


/**Store data with sessionStorage**/

function storeBooking(dpt_flight1, dpt_flight2, dpt_flight3, rtn_flight1, rtn_flight2, rtn_flight3) {
    var dpt_flight_option = "";
  if (dpt_flight1) dpt_flight_option = "JetStar 7656 MEL Melbourne 07:00 -  BNE Brisbane 08:25"
  if (dpt_flight2) dpt_flight_option = "Virgin Australia 467 MEL Melbourne 10:30 - BNE Brisbane 13:25"
  if (dpt_flight3) dpt_flight_option = "Qantas Airways 54 MEL Melbourne 14:25 - BNE Brisbane  16:30"
  sessionStorage.dpt_flight_option = dpt_flight_option;

  var rtn_flight_option = "";

  if (rtn_flight1) rtn_flight_option = "JetStar 8909 BNE Brisbane 19:30 - MEL Melbourne 22:45"
  if (rtn_flight2) rtn_flight_option = "Virgin Australia 346 BNE Brisbane 15:10 - MEL Melbourne 17:20 "
  if (rtn_flight3) rtn_flight_option = "Qantas Airways 6 BNE Brisbane  09:45 -  MEL Melbourne 11:35 "
  sessionStorage.rtn_flight_option = rtn_flight_option;
}

function storeExtras(firstname, lastname, dob, bagdptValue, dptBagNone, dptBag15kg,
  dptBag20kg, dptBag30kg, bagrtnValue, rtnBagNone, rtnBag15kg, rtnBag20kg,
  rtnBag30kg, mealDpt, mealRtn, noMeals, dptmeal1, dptmeal2, dptmeal3, rtnmeal1,
  rtnmeal2, rtnmeal3, qtymeal1, qtymeal2, specialadd) {

    var bagsDeparture = document.getElementById("checked_bag1");
    var qtybag1 = bagsDeparture.options[bagsDeparture.selectedIndex].text;
    sessionStorage.qtybag1 = qtybag1;

    var bagsReturn = document.getElementById("checked_bag2");
    var qtybag2 = bagsReturn.options[bagsReturn.selectedIndex].text;
    sessionStorage.qtybag2 = qtybag2;


  var wgth_bag_dpt = "";

  if (dptBag15kg) wgth_bag_dpt = "15Kg checked bag"
  if (dptBag20kg) wgth_bag_dpt = "20Kg checked bag"
  if (dptBag30kg) wgth_bag_dpt = "30Kg checked bag"
  if (dptBagNone) wgth_bag_dpt =  "No include checked baggage"
  sessionStorage.wgth_bag_dpt = wgth_bag_dpt;

  var wgth_bag_rtn = "";

  if (rtnBag15kg) wgth_bag_rtn = "15Kg checked bag"
  if (rtnBag20kg) wgth_bag_rtn = "20Kg checked bag"
  if (rtnBag30kg) wgth_bag_rtn = "30Kg checked bag"
  if (rtnBagNone) wgth_bag_rtn =  "No include checked baggage"
  sessionStorage.wgth_bag_rtn = wgth_bag_rtn;

  var dptmeal  = "";
  var rtnmeal  = "";
  var noaddedmeal = "";

  if (mealDpt) dptmeal = "Departure meal Included"
  if (mealRtn) rtnmeal = "Returning meal Included"
  if (noMeals) noaddedmeal = "No include meals"

  sessionStorage.dptmeal = dptmeal;
  sessionStorage.rtnmeal = rtnmeal;
  sessionStorage.noaddedmeal = noaddedmeal;


  var meal_opt_dpt = "";

  if (dptmeal1) meal_opt_dpt = "Banana Bread Slice with Hot drink"
  if (dptmeal2) meal_opt_dpt = "Beef pie with Hot drink"
  if (dptmeal3) meal_opt_dpt = "Gourmet sandwich with Cold drink"
  sessionStorage.meal_opt_dpt = meal_opt_dpt;

  var meal_opt_rtn = "";

  if (rtnmeal1) meal_opt_rtn = "Banana Bread Slice with Hot drink"
  if (rtnmeal2) meal_opt_rtn = "Beef pie with Hot drink"
  if (rtnmeal3) meal_opt_rtn = "Gourmet sandwich with Cold drink"
  sessionStorage.meal_opt_rtn = meal_opt_rtn;

  sessionStorage.firstname = firstname;
  sessionStorage.lastname = lastname;
  sessionStorage.dob = dob;
  sessionStorage.bagdptValue = bagdptValue;
  sessionStorage.bagrtnValue = bagrtnValue;
  sessionStorage.qtymeal1 = qtymeal1;
  sessionStorage.qtymeal2 = qtymeal2;
  sessionStorage.specialadd = specialadd;
}

function storePassengerinfo(address, suburb, statesValue, statesName, post_code, phone, contact_email, email, post, phonec) {

  var pref_contact = "";

  if (email) pref_contact = "Email"
  if (post) pref_contact = "Post"
  if (phonec) pref_contact = "Phone"
  sessionStorage.pref_contact = pref_contact;

  var statesName = document.getElementById("state");
  var statesValue = statesName.options[statesName.selectedIndex].text;
  sessionStorage.statesValue = statesValue;
  sessionStorage.address = address;
  sessionStorage.suburb = suburb;
  sessionStorage.post_code = post_code;
  sessionStorage.phone = phone
  sessionStorage.contact_email = contact_email;


}

function init() {
  var bookForm = document.getElementById("bookform");
  bookForm.onsubmit = validate;

  initien();

  }

  window.onload = init;
