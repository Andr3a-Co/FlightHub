/**
* Author: Andrea Espitia s103165504
* Target: enquire.html / payment.html
* Purpose: Assignment 2  JavaScript
* Created: 17/04/2021
* Last updated: 17/04/2021
* Credits: Data transfer, validation and submission to server
*/

"use strict";

function validate() {

	var errMsg = "";
	var result = true;
	var cardName  = document.getElementById("card_name").value;
	var cardType = document.querySelector('input[name="card"]:checked').value;
	var cardNumber = document.getElementById("card_num").value;
	var isValidCard = validateCreditCard(cardNumber, cardType);
	var submit_booking = submitBooking();
	//var novalidate = disableValidation ();
	const disableValidations = true
	// Validate Card name

	if (!disableValidations) {
		if (!cardName.match(/^[a-zA-Z ]+$/)) {
			errMsg = errMsg + "Cardholder's Name: Name on credit card must only contain alpha characters\n";
			result = false;
		}
	
		if (!isValidCard) {
			errMsg = errMsg + "Card number: Please insert a valid " + cardType +  " card number!\n";
			result = false;
		}
	}

	


	if (errMsg !== "" && !disableValidations) {
		console.log(errMsg)
		swal({
			title: 'Error!',
			text: errMsg,
			icon: 'error',
			confirmButtonText: 'Cool'
		  })
	} else {
		swal({
			title: 'Confirmation',
			text: "Processing payment",
			icon: 'success',
			confirmButtonText: 'Cool'
		})
	  }
		return result
		}

function submitBooking() {

 /**Submission to hidden inputs**/
		var firstName = document.getElementById('first_name')
		var lastName = document.getElementById('last_name')
		var dob = document.getElementById('dob_date')
		var state = document.getElementById("state_conf")
		var postcode = document.getElementById("postcode_conf")
		var phone = document.getElementById("phone_num_conf")
		var email = document.getElementById("contact_email_conf")
		var contact_pref = document.getElementById("pref_contact")



	/**/

		if (sessionStorage.firstname) {
			firstName.value = sessionStorage.firstname;
		}
		if (sessionStorage.lastname) {
			lastName.value = sessionStorage.lastname;
		}
		if (sessionStorage.dob) {
			dob.value = sessionStorage.dob;
		}

		if (sessionStorage.statesValue) {
			state.value = sessionStorage.statesValue;
		}
		if (sessionStorage.post_code) {
			postcode.value = sessionStorage.post_code;
		}
		if (sessionStorage.phone) {
			phone.value = sessionStorage.phone;
		}
		if (sessionStorage.contact_email) {
			email.value = sessionStorage.contact_email;
		}
		if (sessionStorage.pref_contact) {
			contact_pref.value = sessionStorage.pref_contact;
		}


		



		/*Flight selection*/

		var flight_dpt = document.getElementById("flight_dpt")
	  	var flight_rtn = document.getElementById("flight_rtn")
		var bags_qty1  = document.getElementById("bags_qty1")
		var bags_qty2  = document.getElementById("bags_qty2")
		var weight_bag1 = document.getElementById("weight_bags_dpt")
		var weight_bag2 = document.getElementById("weight_bags_rtn")


		if (sessionStorage.dpt_flight_option) {
			flight_dpt.value = sessionStorage.dpt_flight_option
		}
		if (sessionStorage.rtn_flight_option) {
			flight_rtn.value = sessionStorage.rtn_flight_option;
		} if (sessionStorage.qtybag1) {
			 bags_qty1.value = sessionStorage.qtybag1;
		} if (sessionStorage.qtybag2) {
			 bags_qty2.value = sessionStorage.qtybag2;
		} if (sessionStorage.wgth_bag_dpt ) {
			weight_bag1.value = sessionStorage.wgth_bag_dpt ;
		} if (sessionStorage.wgth_bag_rtn) {
			weight_bag2.value = sessionStorage.wgth_bag_rtn;
		}

		/*Flight selection*/

		var meal_dpt = document.getElementById("meals_dpt_conf")
	  var meal_rtn = document.getElementById("meals_rtn_conf")
		var no_Meals = document.getElementById("meals_noadd_conf")
	  var dpt_meal_opt = document.getElementById("meal_dpt_opt")
	  var rtn_meal_opt = document.getElementById("meal_rtn_opt")
	  var qty_meal1 = document.getElementById("meal_qty1")
	  var qty_meal2 = document.getElementById("meal_qty2")
	  var special_add = document.getElementById("special_add")

		if (sessionStorage.dptmeal) {
			meal_dpt.value = sessionStorage.dptmeal;
		}
		if (sessionStorage.rtnmeal) {
			meal_rtn.value = sessionStorage.rtnmeal;
		}
		if (sessionStorage.noaddedmeal) {
			no_Meals.value = sessionStorage.noaddedmeal;
		}
		if (sessionStorage.meal_opt_dpt) {
			dpt_meal_opt.value = sessionStorage.meal_opt_dpt;
		}
		if (sessionStorage.meal_opt_rtn) {
			rtn_meal_opt.value = sessionStorage.meal_opt_rtn;
		}
		if (sessionStorage.qtymeal1) {
			qty_meal1.value = sessionStorage.qtymeal1;
		}
		if (sessionStorage.qtymeal2) {
			qty_meal2.value = sessionStorage.qtymeal2;
		}
		if (sessionStorage.specialadd) {
			special_add.value = sessionStorage.specialadd;
		}

		/*Total cost*/
		var flight_cost = document.getElementById("conf_flight_cost")
		var dptextras_cost = document.getElementById("extras_cost_dpt")
		var rtnextras_cost = document.getElementById("extras_cost_rtn")
		var extras_cost = document.getElementById("total_extras")
		var dptmeals_cost = document.getElementById("meals_cost_dpt")
		var rtnmeals_cost = document.getElementById("meals_cost_rtn")
		var meals_cost = document.getElementById("total_meals")
		var total_cost = document.getElementById("total_cost")

		var flightfare = calcCostFlight(sessionStorage.dpt_flight_option, sessionStorage.rtn_flight_option);
		var costextrasd = calcCostBagD(sessionStorage.wgth_bag_dpt, sessionStorage.bagdptValue);
		var costextrasr = calcCostBagR(sessionStorage.wgth_bag_rtn, sessionStorage.bagrtnValue);
		var totalcostextras = costextrasd + costextrasr;
		var costmealsd = calcCostMealsD(sessionStorage.meal_opt_dpt, sessionStorage.qtymeal1);
		var costmealsr = calcCostMealsR(sessionStorage.meal_opt_rtn, sessionStorage.qtymeal2);
		var totalcostmeals = (costmealsd + costmealsr);
		var totalcost = (flightfare + totalcostextras + totalcostmeals);
		
		if (flightfare) {
			flight_cost.value = flightfare;
		}

		if (costextrasd) {
			dptextras_cost.value = costextrasd;
		}

		if (costextrasr) {
			rtnextras_cost.value = costextrasr;
		}

		if (totalcostextras) {
			extras_cost.value = totalcostextras;
		}

		if (costmealsd) {
			dptmeals_cost.value = costmealsd;
		}

		if (costmealsr) {
			rtnmeals_cost.value = costmealsr;
		}

		if (totalcostmeals) {
			meals_cost.value = totalcostmeals;
		}
		
		if (totalcost) {
			total_cost.value = totalcost;
		}

	}


/**Funcion matchCardNumberType() **/

function validateCreditCard(cardNumber, cardType) {
  var errMsg = "";
  var regex;


  switch (cardType) {
    case "visa":
      regex = new RegExp (/^(?:4[0-9]{12}(?:[0-9]{3})?)$/);
      break;
    case "mastercard":
      regex = new RegExp(/^(?:5[1-5][0-9]{14})$/);
      break;
    case "amex":
      regex = new RegExp (/^(?:3[47][0-9]{13})$/);
    break;
    }

	return !cardNumber.match(regex) ? false : true
  }


/**Calculate the final cost of the flight selected**/

function calcCostFlight(dpt_flight_option, rtn_flight_option) {
	var cost_dpt = 0;
	var cost_rtn = 0;
	var cost_wgth1 = 0;
	var cost_wgth2 = 0;

	if (dpt_flight_option.search("JetStar 7656 MEL Melbourne 07:00 -  BNE Brisbane 08:25") != -1) cost_dpt = 99;
	if (dpt_flight_option.search("Virgin Australia 467 MEL Melbourne 10:30 - BNE Brisbane 13:25") != -1) cost_dpt = 120;
	if (dpt_flight_option.search("Qantas Airways 54 MEL Melbourne 14:25 - BNE Brisbane  16:30") != -1) cost_dpt = 89;

	if (rtn_flight_option.search("JetStar 8909 BNE Brisbane 19:30 - MEL Melbourne 22:45") != -1) cost_rtn = 130;
	if (rtn_flight_option.search("Virgin Australia 346 BNE Brisbane 15:10 - MEL Melbourne 17:20 ") != -1) cost_rtn = 100;
	if (rtn_flight_option.search("Qantas Airways 6 BNE Brisbane  09:45 -  MEL Melbourne 11:35 ") != -1) cost_rtn = 70;

	var result = (cost_dpt + cost_rtn)
	return result

}

/**Calculate the final cost of the bags departure**/

function calcCostBagD(wgth_bag_dpt, bagdptValue) {

	var cost_wgth1 = 0;

	if (wgth_bag_dpt.search("15Kg checked bag") != -1) cost_wgth1 = 25;
	if (wgth_bag_dpt.search("20Kg checked bag") != -1) cost_wgth1 = 35;
	if (wgth_bag_dpt.search("30Kg checked bag") != -1) cost_wgth1 = 49;
	if (wgth_bag_dpt.search("No include checked baggage") != -1) cost_wgth1 = 0;

 	var result = (cost_wgth1 * bagdptValue)

	return result

}

/**Calculate the final cost of the bags return**/

function calcCostBagR(wgth_bag_rtn, bagrtnValue) {

	var cost_wgth2 = 0;

	if (wgth_bag_rtn.search("15Kg checked bag") != -1) cost_wgth2 = 25;
	if (wgth_bag_rtn.search("20Kg checked bag") != -1) cost_wgth2 = 35;
	if (wgth_bag_rtn.search("30Kg checked bag") != -1) cost_wgth2 = 49;
	if (wgth_bag_rtn.search("No include checked baggage") != -1) cost_wgth2 = 0;

 	var result = (cost_wgth2 * bagrtnValue)

	return result

}

/**Calculate the final cost of the meals departure**/

function calcCostMealsD(meal_opt_dpt, qtymeal1) {

	var cost_meals1 = 0;

	if (meal_opt_dpt.search("Banana Bread Slice with Hot drink") != -1) cost_meals1 += 7;
	if (meal_opt_dpt.search("Beef pie with Hot drink") != -1) cost_meals1 += 10;
	if (meal_opt_dpt.search("Gourmet sandwich with Cold drink") != -1) cost_meals1 += 13;

 	var result = cost_meals1 * qtymeal1

	return result

}

/**Calculate the final cost of the meals departure**/

function calcCostMealsR(meal_opt_rtn, qtymeal2 ) {

	var cost_meals2 = 0;

	if (meal_opt_rtn.search("Banana Bread Slice with Hot drink") != -1) cost_meals2 += 7;
	if (meal_opt_rtn.search("Beef pie with Hot drink") != -1) cost_meals2 += 10;
	if (meal_opt_rtn.search("Gourmet sandwich with Cold drink") != -1) cost_meals2 += 13;

 	var result = cost_meals2 * qtymeal2

	return result

}



/**Retrieve data submmitted on enquire.html from sessionStorage**/

function getBooking() {
var costflight = 0;
var costextrasd = 0;
var costextrasr = 0;
var totalcostextras = 0;
var costmealsd = 0;
var costmealsr = 0;
var totalcostmeals = 0;
var totalcost = 0;

	if(sessionStorage.firstname != undefined) {    //if sessionStorage for username is not empty
		//confirmation text
    document.getElementById("confirm_dpt_flight").textContent = sessionStorage.dpt_flight_option;
    document.getElementById("confirm_rtn_flight").textContent = sessionStorage.rtn_flight_option;
    document.getElementById("confirm_name").textContent = sessionStorage.firstname + " " + sessionStorage.lastname;
		document.getElementById("confirm_dob").textContent = sessionStorage.dob;
		costflight = calcCostFlight(sessionStorage.dpt_flight_option, sessionStorage.rtn_flight_option);
		costextrasd = calcCostBagD(sessionStorage.wgth_bag_dpt, sessionStorage.bagdptValue);
		costextrasr = calcCostBagR(sessionStorage.wgth_bag_rtn, sessionStorage.bagrtnValue);
		totalcostextras = costextrasd + costextrasr;
		costmealsd = calcCostMealsD(sessionStorage.meal_opt_dpt, sessionStorage.qtymeal1);
		costmealsr = calcCostMealsR(sessionStorage.meal_opt_rtn, sessionStorage.qtymeal2);
		totalcostmeals = costmealsd + costmealsr;
		totalcost = costflight + totalcostextras + totalcostmeals;
		document.getElementById("confirm_total_cost").textContent = totalcost;
		document.getElementById("confirm_cost").textContent = costflight;
		document.getElementById("bag_cost_dpt").textContent = costextrasd;
		document.getElementById("bag_cost_rtn").textContent = costextrasr;
		document.getElementById("confirm_cost_bags").textContent = totalcostextras;
		document.getElementById("meal_cost_dpt").textContent = costmealsd;
		document.getElementById("meal_cost_rtn").textContent = costmealsr;
		document.getElementById("confirm_cost_meals").textContent = totalcostmeals;
		document.getElementById("confirm_total_cost").textContent = totalcost;
    document.getElementById("confirm_bag_dpt").textContent = sessionStorage.wgth_bag_dpt;
    document.getElementById("confirm_bag_rtn").textContent = sessionStorage.wgth_bag_rtn;
    document.getElementById("qty_bag_dpt").textContent = sessionStorage.bagdptValue;
    document.getElementById("qty_bag_rtn").textContent = sessionStorage.bagrtnValue;
    document.getElementById("confirm_meals").textContent = sessionStorage.dptmeal;
    document.getElementById("confirm_meal_opt1").textContent = sessionStorage.meal_opt_dpt;
    document.getElementById("confirm_meals2").textContent = sessionStorage.rtnmeal;
    document.getElementById("confirm_meal_opt2").textContent = sessionStorage.meal_opt_rtn;
    document.getElementById("confirm_meal_noadd").textContent = sessionStorage.noaddedmeal;
		document.getElementById("confirm_meal_noadd2").textContent = sessionStorage.noaddedmeal;
    document.getElementById("confirm_meal1_qty").textContent = sessionStorage.qtymeal1;
    document.getElementById("confirm_meal2_qty").textContent = sessionStorage.qtymeal2;


  }
}

/**Put data from sessionStorage in billing form**/

function updateBillingInfo() {

	var infoCheck = document.getElementById("bill_info");
	var address = document.getElementById("address")
	var suburb = document.getElementById("suburb/town")
	var state = document.getElementById("state")
	var postcode = document.getElementById("postcode")
	var phone = document.getElementById("phone_num")
	var email = document.getElementById("contact_email")
	var pref_contact = document.getElementById("contact_email")

	if (infoCheck.checked) {
		if (sessionStorage.address) {
			address.value = sessionStorage.address;
		} else {
		address.value = ""
		}

		if (sessionStorage.suburb) {
			suburb.value = sessionStorage.suburb;
		} else {
		suburb.value = ""
		}
		if (sessionStorage.statesValue) {
			state.value = sessionStorage.statesValue;
		} else {
		state.value = "VIC"
		}
		if (sessionStorage.post_code) {
			postcode.value = sessionStorage.post_code;
		} else {
		postcode.value = ""
		}
		if (sessionStorage.phone) {
			phone.value = sessionStorage.phone;
		} else {
		phone.value = ""
		}
		if (sessionStorage.contact_email) {
			email.value = sessionStorage.contact_email;
		}else {
		email.value = ""
		}
 	}
}

function cancelBooking() {
	window.location = "index.html"

	swal({
		title: 'Warning',
		text: "Are you sure?",
		icon: 'error',
		confirmButtonText: 'Cool'
	});
}


function init () {
  getBooking()
  var pssgrinfo = document.getElementById("bookreview");// link the variable to the HTML element
	pssgrinfo.onsubmit = validate;
	var payform = document.getElementById("payform");// link the variable to the HTML element
	payform.onsubmit = validate;

	var billInfo = document.getElementById("bill_info");// link the variable to the HTML element
	billInfo.onchange = updateBillingInfo;

	var cancelBookBtn = document.getElementById("cancel_order");
	cancelBookBtn.onclick = cancelBooking;


	initien();


 }

window.onload = init;
