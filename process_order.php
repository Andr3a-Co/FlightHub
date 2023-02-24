
<?php

/*
* Author: Andrea Espitia s103165504
* Target: payment.php
* Purpose: Assignment 3  PHP MySQL
* Created: 17/05/2021
* Last updated: 17/05/2021
* Credits: Data transfer, validation and submission to MySQL
*/
session_start();

  // Sanitize data sent from payment.php
  function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  // Data stored from payment.php


  $errors = array();
  $add_new_row = false; # Used to check if new record is added in database
  // Personal information
  if (isset ($_POST["first_name"])) {
      $firstname = $_POST["first_name"];
      $firstname = sanitize_input($firstname);
  }

  if (isset ($_POST["last_name"])) {
    $lastname = $_POST["last_name"];
    $lastname = sanitize_input($lastname);
  }

  if (isset ($_POST["dob_date"])) {
    $dob = $_POST["dob_date"];
    $dob = sanitize_input($dob);
    }

  if (isset ($_POST["contact_email"])) {
    $email = $_POST["contact_email"];
    $email = sanitize_input($email);
    }

  if (isset ($_POST["s_address"])) {
    $address = $_POST["s_address"];
    $address = sanitize_input($address);
    }

  if (isset ($_POST["suburb/town"])) {
    $suburb = $_POST["suburb/town"];
    $suburb = sanitize_input($suburb);
  }

  if (isset ($_POST["phone_num"])) {
    $phone = $_POST["phone_num"];
    $phone = sanitize_input($phone);
   }

  if (isset ($_POST["pref_contact"])) {
    $p_contact = $_POST["pref_contact"];
    $p_contact = sanitize_input($p_contact);
   }

  if (isset ($_POST["state"])) {
  $state = $_POST["state"];
  $state = sanitize_input($state);
  }

  if (isset ($_POST["postcode"])) {
  $postcode = $_POST["postcode"];
  $postcode = sanitize_input($postcode);
  }

  //Flight selection

  if (isset ($_POST["flight_dpt"])) {
    $dpt_flight = $_POST["flight_dpt"];
    // $dpt_flight = sanitize_input($dpt_flight);
  } else if (empty($dpt_flight)) {
    $errors['flight_dptErr'] = "<p>Please select a departing flight</p>";
  }

  if (isset ($_POST["flight_rtn"])) {
    $rtn_flight = $_POST["flight_rtn"];
    // $rtn_flight = sanitize_input($rtn_flight);
  } else if (empty($rtn_flight)) {
    $errors['flight_rtnErr'] = "<p>Please select a returning flight</p>";
  }

  //Baggage selection

  if (isset ($_POST["bag_dpt_qty"])) {
    $dpt_baggage = $_POST["bag_dpt_qty"];
    $dpt_baggage = sanitize_input($dpt_baggage);
  }

  if (isset ($_POST["bag_rtn_qty"])) {
    $rtn_baggage = $_POST["bag_rtn_qty"];
    $rtn_baggage = sanitize_input($rtn_baggage);
  }

  if (isset ($_POST["weight_bags_dpt"])) {
    $bag_weight_dpt = $_POST["weight_bags_dpt"];
    $bag_weight_dpt = sanitize_input($bag_weight_dpt);
  }


  if (isset ($_POST["weight_bags_rtn"])) {
    $bag_weight_rtn = $_POST["weight_bags_rtn"];
    $bag_weight_rtn = sanitize_input($bag_weight_rtn);
  }


  //Meals selection

  if (isset ($_POST["meals_dpt"])) {
    $dpt_meal_added = $_POST["meals_dpt"];
    $dpt_meal_added = sanitize_input($dpt_meal_added);
  } else {
    $dpt_meal_added = "no included";
  }


  if (isset ($_POST["meals_rtn"])) {
    $rtn_meal_added = $_POST["meals_rtn"];
    $rtn_meal_added = sanitize_input($rtn_meal_added);
  } else {
    $rtn_meal_added = "no included";
  }

  if (isset ($_POST["meals_noadd"])) {
    $no_meal_added = $_POST["meals_noadd"];
    $no_meal_added = sanitize_input($no_meal_added);
  } else {
    $no_meal_added = "no included";
  }


  if (isset ($_POST["meal_dpt_opt"])) {
    $dpt_meal = $_POST["meal_dpt_opt"];
    $dpt_meal = sanitize_input($dpt_meal);
  } else {
    $dpt_meal = "no included";
  }

  if (isset ($_POST["meal_rtn_opt"])) {
    $rtn_meal = $_POST["meal_rtn_opt"];
    $rtn_meal = sanitize_input($rtn_meal);
  } else {
    $rtn_meal = "no included";
  }


  if (isset ($_POST["meal_qty_dpt"])) {
  $qty_meal1 = $_POST["meal_qty_dpt"];
  $qty_meal1 = sanitize_input($qty_meal1);
  }

  if (isset ($_POST["meal_qty_rtn"])) {
  $qty_meal2 = $_POST["meal_qty_rtn"];
  $qty_meal2 = sanitize_input($qty_meal2);
  }

  if (isset ($_POST["special_add"])) {
    $special = $_POST["special_add"];
    $special = sanitize_input($special);
    }

  //** Payment information

  if (isset ($_POST["card_name"])) {
      $card_name = $_POST["card_name"];
      $card_name = sanitize_input($card_name);
      }

  if (isset ($_POST["card"])) {
      $card_type = $_POST["card"];
      $card_type = sanitize_input($card_type);
      }

  if (isset ($_POST["card_num"])) {
      $card_num = $_POST["card_num"];
      $card_num = sanitize_input($card_num);
      }

  if (isset ($_POST["expiry_date"])) {
      $card_exp = $_POST["expiry_date"];
      $card_exp = sanitize_input($card_exp);
      }

  if (isset ($_POST["card_cvv"])) {
      $card_cvv = $_POST["card_cvv"];
      $card_cvv = sanitize_input($card_cvv);
  }

  /*Total cost*/

  if (isset ($_POST["conf_flight_cost"])) {
      $flight_cost = $_POST["conf_flight_cost"];
      $flight_cost = sanitize_input($flight_cost);
    }

  if (isset ($_POST["total_extras"])) {
      $extras_cost = $_POST["total_extras"];
      $extras_cost = sanitize_input($extras_cost);
    }

  if (isset ($_POST["total_meals"])) {
      $meals_cost = $_POST["total_meals"];
      $meals_cost = sanitize_input($meals_cost);
    }

  if (isset ($_POST["total_cost"])) {
      $total_cost = $_POST["total_cost"];
      $total_cost = sanitize_input($total_cost);
    }

 /*Personal Details Validation*/

  if ($firstname == "") {
    $errors['firstname'] = "<p>*Please enter your first name.</p>";
  } else if (!preg_match('/^[a-zA-Z ]{2,25}$/', $firstname)) {
    $errors['firstname'] = "<p>*Only alpha letters allowed in your first name. </p>";
  }

  if ($lastname == "") {
    $errors['lastname'] = "<p>*Please  enter your last name.</p>";
  } else if (!preg_match('/^[a-zA-Z .-]{2,25}$/', $lastname)) {
    $errors['lastname'] = "<p>*Only alpha letters allowed in your last name. </p>";
  }

  if ($dob == "") {
    $errors['dob'] = "<p>*Please enter your date of birth.</p>";
  } else if (!preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/", $dob)) {
    $errors['dob'] =  "<p>*Incorrect Date of Birth Format . </p>";
  }

   if ($email == "") {
     $errors['email'] = "<p>*You must enter your email address.</p>";
   } else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
     $errors['email'] = "<p>*Incorrect Email Format . </p>";
   }

  if ($address == "") {
     $errors['address'] = "<p>*You must enter your street address.</p>";
  } else if (!preg_match('/^[a-zA-Z0-9-\\/.\ ]{2,40}$/', $address)) {
     $errors['address'] = "<p>*Incorrect Address Format . </p>";
  }

  if ($suburb == "") {
     $errors['suburb'] = "<p>*You must enter your suburb.</p>";
  } else if (!preg_match('/^[a-zA-Z ]{2,20}$/', $suburb)) {
     $errors['suburb'] = "<p>*Incorrect Suburb Format . </p>";
  }

  if ($phone == "") {
     $errors['phone'] = "<p>*You must enter your phone number.</p>";
   } else if (!preg_match('/^[0-9]{10}$/', $phone)) {
     $errors['phone'] = "<p>*Incorrect Phone Format . </p>";
  }

  if ($p_contact == "") {
    $errors['p_contact'] = "<p>*Please select you preferred contact.</p>";
  }

  if ($state == "none") {
    $errors['stateErr'] = "<p>*You must select your state.</p>";
  }

  if ($postcode == "") {
    $errors['postcodeerr'] = "<p>*You must enter postcode</p>";
  }

  $regex = "";
  switch ($state) {
    case "VIC":
      $regex = ('/^[3|8][0-9]{3}$/');
      break;
    case "NSW":
      $regex = ('/^[1|2][0-9]{3}$/');
      break;
    case "QLD":
      $regex = ('/^[4|9][0-9]{3}$/');
      break;
    case "NT":
      $regex = ('/^[0][0-9]{3}$/');
      break;
    case "WA":
      $regex = ('/^[6][0-9]{3}$/');
      break;
    case "SA":
      $regex = ('/^[5][0-9]{3}$/');
      break;
    case "TAS":
      $regex = ('/^[7][0-9]{3}$/');
      break;
    case "ACT":
      $regex = ('/^[0][0-9]{3}$/');
      break;
  }

  if(!preg_match($regex, $postcode)) {
    $errors['postcodeerr'] = "<p>*Please insert a valid postcode.</p>";
  }


    /*Flight Validation*/

  if ($dpt_baggage == "none" OR $rtn_baggage == "none") {
    $errors['baggage_selection'] = "<p>- *You must select checked baggage preference for departure and return flight.</p>";
  }


  /*Baggage validation*/
  if ($bag_weight_dpt == "") {
    $errors['bag_weight_dpt'] = "<p>*Please select baggage weight for departing flight</p>";
  }


  if ($bag_weight_rtn == "") {
    $errors['bag_weight_rtn'] = "<p>*Please select baggage weight for departing flight</p>";
  }


  /*Meals validation*/

  if (!($dpt_meal_added || $rtn_meal_added || $no_meal_added)) {
    $errors['meals_selection'] = "<p>*Please select meal preference</p>";
  }


  if (($dpt_meal_added == "Departure meal Included" AND  $dpt_meal == "")) {
    $errors['dpt_meal_options'] =  "<p>*Please select meal option</p>";
  }

  if (($rtn_meal_added == "Returning meal Included" AND $rtn_meal == "")) {
    $errors['rtn_meal_options'] = "<p>*Please select meal option</p>";
  }

  if (!$no_meal_added) {

    if ($dpt_meal !="" && $qty_meal1 == "") {
      $errors['dpt_meal_quantity'] =  "<p> *Please enter quantity meal</p>";
    } else if (!preg_match('/^[0-9]$/', $qty_meal1)) {
      $errors['dpt_meal_quantity'] = "<p>*Please enter a valid quantity meal</p>";
    } else if ($qty_meal1 < 0 || $qty_meal1 > 3) {
      $errors['dpt_meal_quantity'] = "<p>*Please enter 1 to 3 meals quantity</p>";
    }

    if ($rtn_meal !="" && $qty_meal2 == "") {
      $errors['rtn_meal_quantity'] =  "<p> *Please enter quantity meal</p>";
    } else if (!preg_match('/^[0-9]$/', $qty_meal2)) {
      $errors['rtn_meal_quantity'] = "<p>*Please enter a valid quantity meal</p>";
    } else if ($qty_meal2 < 0 || $qty_meal2 > 3) {
      $errors['rtn_meal_quantity'] = "<p>*Please enter 1 to 3 meals quantity</p>";
    }
  }

  /*Payment details  Validation*/

  if ($card_name == "") {
    $errors['card_name'] = "<p>You must enter your first name.</p>";
  } else if (!preg_match('/^[a-zA-Z ]{2,25}$/', $card_name)) {
    $errors['card_name'] = "<p>*Name on credit card must only contain alpha characters </p>";
  }

  if ($card_type == "") {
    $errors['card_type'] = "<p>*Please select card type</p>";
    }

  if ($card_num == "") {
      $errors['card_num'] = "<p>*You must enter your card number.</p>";
    }

  if ($card_exp == "") {
      $errors['card_exp'] = "<p>*You must enter card expiration date.</p>";
    }

  if ($card_cvv == "") {
      $errors['card_cvv'] = "<p>*You must enter cvv number.</p>";
    }

  $regex = "";
  switch ($card_type) {
    case "visa":
      $regex = ('/^(?:4[0-9]{12}(?:[0-9]{3})?)$/');
      break;
    case "mastercard":
      $regex = ('/^(?:5[1-5][0-9]{14})$/');
      break;
    case "amex":
      $regex = ('/^(?:3[47][0-9]{13})$/');
      break;
  }

  if (!preg_match($regex, $card_num)) {
    $errors['card_num'] = "<p>*Please insert a valid card number!</p>";
  }


  if (isset ($_POST["total_cost"])) {
      $totalcost = $_POST["total_cost"];
      $totalcost = sanitize_input($totalcost);
  }


  if (!empty($errors)) {
    if (!isset($_SESSION["errors"])) {
      $_SESSION["errors"] = $errors;
    }
    header ("location:fix_order.php");
  }
  else {
    header ("location:receipt.php");
    $add_new_row = true;
  }



  if (!isset($_SESSION["flightDpt"])) {
    $_SESSION["flightDpt"] = $dpt_flight;
  }


  if (!isset($_SESSION["flightRtn"])) {
    $_SESSION["flightRtn"] = $rtn_flight;
  }

  if (!isset($_SESSION["bagDpt"])) {
    $_SESSION["bagDpt"] = $dpt_baggage;
  }

  if (!isset($_SESSION["bagRtn"])) {
    $_SESSION["bagRtn"] = $rtn_baggage;
  }

  if (!isset($_SESSION["bagDptQty"])) {
    $_SESSION["bagDptQty"] = $bag_weight_dpt;
  }

  if (!isset($_SESSION["bagRtnQty"])) {
    $_SESSION["bagRtnQty"] = $bag_weight_rtn;
  }

  if (!isset($_SESSION["mealDpt"])) {
    $_SESSION["mealDpt"] = $dpt_meal;
  }

  if (!isset($_SESSION["mealRtn"])) {
    $_SESSION["mealRtn"] = $rtn_meal;
  }

  if (!isset($_SESSION["mealDptQty"])) {
    $_SESSION["mealDptQty"] = $qty_meal1;
  }

  if (!isset($_SESSION["mealRtnQty"])) {
    $_SESSION["mealRtnQty"] = $qty_meal2;
  }

  $departure_bag = $dpt_baggage . ' ' . $bag_weight_dpt;

  if (!isset($_SESSION["dptbag"])) {
    $_SESSION["dptbag"] = $departure_bag;
  }

  $returning_bag = $rtn_baggage . ' ' . $bag_weight_rtn;

  if (!isset($_SESSION["rtnbag"])) {
    $_SESSION["rtnbag"] = $returning_bag;
  }

  $departure_meal = $qty_meal1 . ' ' . $dpt_meal;

  if (!isset($_SESSION["dptmeal"])) {
    $_SESSION["dptmeal"] = $departure_meal;
  }

  $returning_meal = $qty_meal2 . ' ' . $rtn_meal;

  if (!isset($_SESSION["rtnmeal"])) {
    $_SESSION["rtnmeal"] = $returning_meal;
  }

  if (!isset($_SESSION["nomeal"])) {
        $_SESSION["nomeal"] = $no_meal_added;
      }

  if (!isset($_SESSION["special"])) {
    $_SESSION["special"] = $special;
  }

  if (!isset($_SESSION["first_name"])) {
    $_SESSION["first_name"] = $firstname;
  }


  if (!isset($_SESSION["lname"])) {
    $_SESSION["lname"] = $lastname;
  }

  if (!isset($_SESSION["dob"])) {
    $_SESSION["dob"] = $dob;
  }

  $address_conf = $address . ' ' . $suburb . ' ' . $state . ' ' . $postcode;

  if (!isset($_SESSION["address_conf"])) {
    $_SESSION["address_conf"] = $address_conf;
  }

  if (!isset($_SESSION["address"])) {
    $_SESSION["address"] = $address;
  }

  if (!isset($_SESSION["suburb"])) {
    $_SESSION["suburb"] = $suburb;
  }

  if (!isset($_SESSION["state"])) {
    $_SESSION["state"] = $state;
  }

  if (!isset($_SESSION["postcode"])) {
    $_SESSION["postcode"] = $postcode;
  }

  if (!isset($_SESSION["phone"])) {
    $_SESSION["phone"] = $phone;
  }

  if (!isset($_SESSION["email"])) {
    $_SESSION["email"] = $email;
  }

  if (!isset($_SESSION["pContact"])) {
    $_SESSION["pContact"] = $p_contact;
  }

  if (!isset($_SESSION["card"])) {
    $_SESSION["card"] = $card_type;
  }

  if (!isset($_SESSION["flightCost"])) {
    $_SESSION["flightCost"] = $flight_cost;
  }

  if (!isset($_SESSION["extrasCost"])) {
    $_SESSION["extrasCost"] = $extras_cost;
  }

  if (!isset($_SESSION["mealsCost"])) {
    $_SESSION["mealsCost"] = $meals_cost;
  }

  if (!isset($_SESSION["totalCost"])) {
    $_SESSION["totalCost"] = $total_cost;
  }

  /*Submit data to orders table*/

  if ($add_new_row) {
    require_once ("settings.php");

  	$conn = mysqli_connect($host,
      $user,
      $pwd,
      $sql_db
    	);

    if ($conn) {
      $status = 'PENDING';
      $departure_bag = ($dpt_baggage) . ' ' . $bag_weight_dpt;
      $returning_bag = $rtn_baggage . ' ' . $bag_weight_rtn;
      $departure_meal = $qty_meal1 . ' ' . $dpt_meal;
      $returning_meal = $qty_meal2 . ' ' . $rtn_meal;
      $time = date('H:i:s');
      $date = date("Y-m-d");
      $string_date = str_replace("/", "-", $dob);
      $formated_date  = date("Y-m-d H:i:s", strtotime($string_date));
      $same = 'same';


      $tableName = "booking_orders";

      $sqlQuery = "show tables like '$tableName'";
      $result = @mysqli_query($conn, $sqlQuery);

      if(@mysqli_num_rows($result) === 0) {

        $tableDefinition = "CREATE TABLE {$tableName} (
          order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          order_date DATE,
          order_status VARCHAR(30) NOT NULL,
          flight_dpt VARCHAR(200) NOT NULL,
          flight_rtn VARCHAR(200) NOT NULL,
          bag_departure VARCHAR(30) NOT NULL,
          bag_return VARCHAR(30) NOT NULL,
          meal_dpt_opt VARCHAR(100) NOT NULL,
          meal_rtn_opt VARCHAR(100) NOT NULL,
          special_add VARCHAR(100) NOT NULL,
          first_name VARCHAR(25) NOT NULL,
          last_name VARCHAR(25) NOT NULL,
          dob_date DATE NOT NULL,
          address VARCHAR(25) NOT NULL,
          suburb_town VARCHAR(25) NOT NULL,
          state VARCHAR(3) NOT NULL,
          postcode INT NOT NULL,
          phone_num BIGINT NOT NULL,
          contact_email VARCHAR(40) NOT NULL,
          bill_info VARCHAR(40) NOT NULL,
          pref_contact VARCHAR(25) NOT NULL,
          card_name VARCHAR(25) NOT NULL,
          card_type VARCHAR(25) NOT NULL,
          card_num BIGINT NOT NULL,
          expiry_date VARCHAR(25) NOT NULL,
          card_cvv INT NOT NULL,
          order_cost BIGINT NOT NULL,
          order_time TIME
          )";



        echo "<p>Table does not exist - create table $tableName</p>";
        $result2 = @mysqli_query($conn, $tableDefinition);

        if($result2 === false) {
        echo "<p>Unable to create Table $tableName. </p>";
        } else {
        echo "<p>Table $tableName created</p>";
        }
      } else {
        echo "<p>Table  $tableName already exists</p>";
      }


      $query = "INSERT INTO $tableName (order_date, order_status, flight_dpt, flight_rtn, bag_departure, bag_return,meal_dpt_opt, meal_rtn_opt,
                special_add, first_name, last_name, dob_date, address, suburb_town, state, postcode, phone_num,
                contact_email, bill_info, pref_contact, card_name, card_type, card_num, expiry_date, card_cvv, order_cost, order_time)
                VALUES (curdate(), '$status', '$dpt_flight', '$rtn_flight', '$departure_bag', '$returning_bag', '$departure_meal',
                '$returning_meal', '$special', '$firstname', '$lastname', '$formated_date', '$address', '$suburb', '$state', '$postcode',
                '$phone', '$email', '$same', '$p_contact','$card_name', '$card_type', '$card_num', '$card_exp', '$card_cvv', '$total_cost', '$time')";

      $result = mysqli_query($conn, $query);


      if (!$result) {
        echo"<p> Something is wrong with ", $query,  "</p>";
      } else {
        echo"<p> Successfully added New  Record</p>";
      }

      mysqli_close($conn);

    } else {
      echo"<p>Database connection failure</p>";
    }
  }

  // include ('enhancements.php');
?>
