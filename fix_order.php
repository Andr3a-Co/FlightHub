<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Flight Booking Assignment 3" />
    <meta name="keywords"    content="PHP" />
    <meta name="author"      content="Andrea Espitia" />

    <script src="enhancements.js"></script>
    <script src="prefilled.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!--Viewport set to scale 1.0-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="styles/style.css" rel="stylesheet"/>
    <link href="styles/csst.css" rel="stylesheet"/>
    <link href="styles/enhancements.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <title>Flight Booking - FlightHub</title>
  </head>
  <body>
  <article>
    <?php include_once ("includes/header.inc"); ?>
    <?php include_once ("includes/menu.inc"); ?>


  <!--Flight information-->
    <section id="section2">
    <h3>Please review the pre-filled information and correct any inaccurate information prior to submitting the form.</h3>
    <span class="error">

    </span>

    <h2>Flight Options</h2><br/>
    <span class="error"><?php  if (isset($_SESSION["errors"]["flight_dptErr"])) echo $_SESSION["errors"]["flight_dptErr"];?></span>
    <h3>Departing Flight</h3>
    <form id= "bookform" method="post" action="process_order.php" novalidate>
      <table>
         <thead class="t_heads">
            <tr>
              <th scope="col">Airline</th>
              <th scope="col">Route</th>
              <th scope="col">Flight type</th>
              <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
         <tr>
           <th class="t_heads" scope="row"><label for="dpt_flight1"><input type="radio" class="optradio" id="dpt_flight1" name="flight_dpt" value="JetStar 7656 MEL Melbourne 07:00 -  BNE Brisbane 08:25"  <?php echo (isset($_SESSION["flightDpt"]) && $_SESSION["flightDpt"] === "JetStar 7656 MEL Melbourne 07:00 -  BNE Brisbane 08:25") ? "checked":"" ?>  required="required" /></label> JetStar 7656</th>
           <td><Strong>Departure:</strong><br/>MEL Melbourne 07:00 - BNE Brisbane 08:25</td>
           <td>Direct - 2hrs 30min </td>
           <td >$99</td>
         </tr>
         <tr>
           <th class="t_heads" scope="row"><label for="dpt_flight2"><input type="radio" class="optradio" id="dpt_flight2" name="flight_dpt" value="Virgin Australia 467 MEL Melbourne 10:30 - BNE Brisbane 13:25" <?php echo (isset($_SESSION["flightDpt"]) && $_SESSION["flightDpt"] === "Virgin Australia 467 MEL Melbourne 10:30 - BNE Brisbane 13:25") ? "checked":"" ?>  required="required"/>Virgin<br/></label> Australia 467</th>
           <td><Strong>Departure:</strong><br/>MEL Melbourne 10:30 - BNE Brisbane 13:25</td>
           <td>Direct - 2hrs 25min </td>
           <td >$120</td>
         </tr>
         <tr>
           <th class="t_heads" scope="row"><label for="dpt_flight3"><input type="radio" class="optradio" id="dpt_flight3" name="flight_dpt" value="Qantas Airways 54 MEL Melbourne 14:25 - BNE Brisbane  16:30" <?php echo (isset($_SESSION["flightDpt"]) && $_SESSION["flightDpt"] === "Qantas Airways 54 MEL Melbourne 14:25 - BNE Brisbane  16:30") ? "checked":"" ?> required="required"/></label>Qantas<br/> Airways 54</th>
           <td><Strong>Departure:</strong><br/>MEL Melbourne 14:25 - BNE Brisbane  16:30 </td>
           <td>Direct - 2hrs 25min </td>
           <td>$89</td>
         </tr>
       </tbody>
       <tfoot>
         <tr>
            <th colspan="4" scope="col">*Your fare includes two items of carry-on baggage, with a total weight of 7kg.</th>
         </tr>
       </tfoot>
     </table>

     <span class="error"><?php if(isset($_SESSION["errors"]["flight_rtnErr"])) echo $_SESSION["errors"]["flight_rtnErr"];?></span>
     <h3>Returning Flight</h3>
       <table>
          <thead class="t_heads">
             <tr>
               <th scope="col">Airline</th>
               <th scope="col">Route</th>
               <th scope="col">Flight type</th>
               <th scope="col">Price</th>
             </tr>
         </thead>
         <tbody>
           <tr>
             <th class="t_heads" scope="row"><label for="rtn_flight1"><input type="radio" class="optradio" id="rtn_flight1" name="flight_rtn" 
             value="JetStar 8909 BNE Brisbane 19:30 - MEL Melbourne 22:45" 
             <?php echo (isset($_SESSION["flightRtn"]) && $_SESSION["flightRtn"] === "JetStar 8909 BNE Brisbane 19:30 - MEL Melbourne 22:45") ? "checked":"" ?> required="required"/></label> JetStar 8909</th>
             <td><Strong>Returning:</strong><br/>BNE Brisbane 19:30 - MEL Melbourne 22:45</td>
             <td>Direct - 2hrs 30min </td>
             <td>$130</td>
           </tr>
           <tr>
             <th class="t_heads" scope="row" ><label for="rtn_flight2"><input type="radio" class="optradio" id="rtn_flight2" name="flight_rtn" 
             value="Virgin Australia 346 BNE Brisbane 15:10 - MEL Melbourne 17:20 " 
             <?php echo (isset($_SESSION["flightRtn"]) && $_SESSION["flightRtn"] === "Virgin Australia 346 BNE Brisbane 15:10 - MEL Melbourne 17:20 ") ? "checked":"" ?>
               required="required"/>
               </label> Virgin<br/> Australia 346</th>
             <td><Strong>Returning:</strong><br/>BNE Brisbane 15:10 - MEL Melbourne 17:20 </td>
             <td>Direct - 2hrs 30min </td>
             <td>$100</td>
           </tr>
           <tr>
             <th class="t_heads" scope="row"> <label for="rtn_flight3"><input type="radio" class="optradio" id="rtn_flight3" name="flight_rtn" 
             value="Qantas Airways 6 BNE Brisbane  09:45 -  MEL Melbourne 11:35 "
             <?php echo (isset($_SESSION["flightRtn"]) && $_SESSION["flightRtn"] === "Qantas Airways 6 BNE Brisbane  09:45 -  MEL Melbourne 11:35 ") ? "checked":"" ?>
             required="required"/></label> Qantas<br/> Airways 6</th>
             <td><Strong>Returning:</strong><br/>BNE Brisbane 09:45 - MEL Melbourne 11:35</td>
             <td>Direct - 2hrs 30min </td>
             <td>$79</td>
           </tr>
         </tbody>
         <tfoot>
           <tr>
              <th colspan="4" scope="col">*Your fare includes two items of carry-on baggage, with a total weight of 7kg.</th>
           </tr>
         </tfoot>
       </table>

       <aside id="member">
         <h3>MemberHub</h3>
         <p>Join MemberHub for exclusive member-only discounts!</p>
         <ul class="lists">
           <li>AUD$35.00 annually</li>
           <li>Discounts on selected flights</li>
           <li>E-mail updates with the latest deals</li>
           <li>30% off baggage and extra services selections</li>
         </ul>
         <p><img class="memberlogo" src="images/memberhub.jpg" alt="MemberHub" /></p>
         <input class="j_button" type="button" value="Join MemberHub"/>
       </aside>

       <!--Baggage & Extra services-->
      <h2 id="extra_opt">Baggage & Extra services</h2>
        <p>Select add-ons for your flight:</p>
      <fieldset id="extraservice1">
        <h3 class="add_head">Carry-on Baggage</h3>
        <img class="bagimg" src="images/baggage.png" alt="carry_baggage" />
        <p>You can bring a maximum of two items of carry-on baggage – one main item and one small item</p>

      </fieldset>
      <fieldset id="extraservice2">
        <h3 class="add_head">Checked Baggage</h3>
        <span class="error"><?php if(isset($_SESSION["errors"]["baggage_selection"])) echo $_SESSION["errors"]["baggage_selection"];?></span>
        <h4><label for="checked_bag1">Departure flight MEL - BNE</label></h4>
          <select class="qtextras" name="bag_dpt_qty" id="checked_bag1">
            <option value="none">-</option>
            <option <?php if (isset($_SESSION["bagDpt"]) && $_SESSION["bagDpt"] == "0" ) echo "selected=\"selected\"";?> value="0">0</option>
            <option <?php if (isset($_SESSION["bagDpt"]) && $_SESSION["bagDpt"] == "1" ) echo "selected=\"selected\"";?>value="1">1</option>
            <option <?php if (isset($_SESSION["bagDpt"]) && $_SESSION["bagDpt"] == "2" ) echo "selected=\"selected\"";?>value="2">2</option>
            <option <?php if (isset($_SESSION["bagDpt"]) && $_SESSION["bagDpt"] == "3" ) echo "selected=\"selected\"";?>value="3">3</option>
           </select>
          <p class="add_option"><label  for="d_baggage1"><input type="radio" id="d_baggage1" name="weight_bags_dpt" <?php echo (isset($_SESSION["bagDptQty"]) && strtolower($_SESSION["bagDptQty"]) == "15kg checked bag" ) ? "checked": "";?> value="15kg"/> 15 Kg - $25 each </label></p>
  			  <p class="add_option"><label  for="d_baggage2"><input type="radio" id="d_baggage2" name="weight_bags_dpt" <?php echo (isset($_SESSION["bagDptQty"]) && strtolower($_SESSION["bagDptQty"]) == "20kg checked bag" ) ? "checked": "";?> value="20kg"/> 20 Kg - $35 each </label></p>
  			  <p class="add_option"><label  for="d_baggage3"><input type="radio" id="d_baggage3" name="weight_bags_dpt" <?php echo (isset($_SESSION["bagDptQty"]) && strtolower($_SESSION["bagDptQty"]) == "30kg checked bag" ) ? "checked": "";?> value="30kg"/> 30 Kg - $49 each </label></p>
          <p class="add_option"><label  for="d_baggage0"><input type="radio" id="d_baggage0" name="weight_bags_dpt" <?php echo (isset($_SESSION["bagDptQty"]) && strtolower($_SESSION["bagDptQty"]) == "none" ) ? "checked": "";?> value="none"/> No include checked baggage </label></p>
          <span class="error"><?php if(isset($_SESSION["errors"]["bag_weight_dpt"])) echo $_SESSION["errors"]["bag_weight_dpt"];?></span>
          <h4><label for="checked_bag2">Returning flight BNE - MEL</label></h4>
          <select class="qtextras" name="bag_rtn_qty" id="checked_bag2">
            <option value="none" >-</option>
            <option <?php if (isset($_SESSION["bagRtn"]) && $_SESSION["bagRtn"] == "0" ) echo "selected=\"selected\"";?> value="0">0</option>
            <option <?php if (isset($_SESSION["bagRtn"]) && $_SESSION["bagRtn"] == "1" ) echo "selected=\"selected\"";?> value="1">1</option>
            <option <?php if (isset($_SESSION["bagRtn"]) && $_SESSION["bagRtn"] == "2" ) echo "selected=\"selected\"";?> value="2">2</option>
            <option <?php if (isset($_SESSION["bagRtn"]) && $_SESSION["bagRtn"] == "3" ) echo "selected=\"selected\"";?> value="3">3</option>
           </select>
          <p class="add_option"><label for="r_baggage1"><input type="radio" id="r_baggage1" name="weight_bags_rtn" <?php echo (isset($_SESSION["bagRtnQty"]) && strtolower($_SESSION["bagRtnQty"]) == "15kg checked bag" ) ? "checked": "";?> value="15kg"/> 15 Kg - $25 each </label></p>
  			  <p class="add_option"><label for="r_baggage2"><input type="radio" id="r_baggage2" name="weight_bags_rtn" <?php echo (isset($_SESSION["bagRtnQty"]) && strtolower($_SESSION["bagRtnQty"]) == "20kg checked bag" ) ? "checked": "";?> value="20kg"/> 20 Kg - $35 each </label></p>
  			  <p class="add_option"><label for="r_baggage3"><input type="radio" id="r_baggage3" name="weight_bags_rtn" <?php echo (isset($_SESSION["bagRtnQty"]) && strtolower($_SESSION["bagRtnQty"]) == "30kg checked bag" ) ? "checked": "";?> value="30kg"/> 30 Kg - $49 each </label></p>
          <p class="add_option"><label  for="r_baggage0"><input type="radio" id="r_baggage0" name="weight_bags_rtn" <?php echo (isset($_SESSION["bagRtnQty"]) && strtolower($_SESSION["bagRtnQty"]) == "none" ) ? "checked": "";?> value="none"/> No include checked baggage </label></p>
          <span class="error"><?php if(isset($_SESSION["errors"]["bag_weight_rtn"])) echo $_SESSION["errors"]["bag_weight_rtn"];?></span>
          <p><span>*Checked baggage must be checked in before you go to the gate</span></p>
      </fieldset>
     <fieldset id="extraservice3">
      <h3 class="add_head">Meals and Snacks</h3>
        <span class="error"><?php if(isset($_SESSION["errors"]["meals_selection"])) echo $_SESSION["errors"]["meals_selection"];?></span>
          <h4><label for="meals_dpt"><input type="checkbox" class="checkbox" id="meals_dpt" name="meals_dpt" value="dpt_meals_added"/>Departure flight MEL - BNE</label></h4>
          <span class="error"><?php if(isset($_SESSION["errors"]["dpt_meal_options"])) echo $_SESSION["errors"]["dpt_meal_options"];?></span>
          <p class="qtextras2"><strong>Quantity</strong></p>
          <p class="add_option"><label for="dpt_meal1"><input type="radio" id="dpt_meal1" name="meal_dpt_opt" <?php echo (isset($_SESSION["mealDpt"]) && $_SESSION["mealDpt"] == "Banana Bread Slice with Hot drink" ) ? "checked": "";?> value="Banana Bread Slice + Hot drink"/>Banana Bread Slice + Hot drink - $7</label></p>
          <p class="add_option"><label for="dpt_meal2"><input type="radio" id="dpt_meal2" name="meal_dpt_opt" <?php echo (isset($_SESSION["mealDpt"]) && $_SESSION["mealDpt"] == "Beef pie with Hot drink" ) ? "checked": "";?> value="Beef pie + Hot drink"/>Beef pie + Hot drink - $10</label></p>
      		<p class="add_option"><label for="dpt_meal3"><input type="radio" id="dpt_meal3" name="meal_dpt_opt" <?php echo (isset($_SESSION["mealDpt"]) && $_SESSION["mealDpt"] == "Gourmet sandwich with Cold drink" ) ? "checked": "";?> value="Gourmet sandwich + Cold drink"/>Gourmet sandwich + Cold drink - $13</label>
          <label for="dpt_qty_meal"><input type="text" id="dpt_qty_meal" class="qtextras" name="meal_qty_dpt" value="<?php if (isset($_SESSION["mealDptQty"])) echo $_SESSION["mealDptQty"];?>" maxlength="1" size="4" /></label></p>


          <h4><label for="meals_rtn"><input type="checkbox" id="meals_rtn" class="checkbox" name="meals_rtn" value="rtn_meals_added"/>Returning flight MEL - BNE</label></h4>
          <span class="error"><?php if(isset($_SESSION["errors"]["rtn_meal_options"])) echo $_SESSION["errors"]["rtn_meal_options"];?></span>
          <p class="add_option"><label for="rtn_meal1"><input type="radio" id="rtn_meal1" name="meal_rtn_opt" <?php echo (isset($_SESSION["mealRtn"]) && $_SESSION["mealRtn"] == "Gourmet sandwich with Cold drink" ) ? "checked": "";?> value="Banana Bread Slice + Hot drink"/>Banana Bread Slice + Hot drink - $7</label></p>
          <p class="add_option"><label for="rtn_meal2"><input type="radio" id="rtn_meal2" name="meal_rtn_opt" <?php echo (isset($_SESSION["mealRtn"]) && $_SESSION["mealRtn"] == "Beef pie with Hot drink" ) ? "checked": "";?> value="Beef pie + Hot drink"/>Beef pie + Hot drink - $10</label></p>
      		<p class="add_option"><label for="rtn_meal3"><input type="radio" id="rtn_meal3" name="meal_rtn_opt" <?php echo (isset($_SESSION["mealRtn"]) && $_SESSION["mealRtn"] == "Gourmet sandwich with Cold drink" ) ? "checked": "";?> value="Gourmet sandwich + Cold drink"/>Gourmet sandwich + Cold drink - $13</label>
            <label for="rtn_qty_meal"><input type="text" id="rtn_qty_meal" class="qtextras" name="meal_qty_rtn" value="<?php if (isset($_SESSION["mealRtnQty"])) echo $_SESSION["mealRtnQty"];?>"  maxlength="1" size="4" /></label></p>
          <h4><label for="no_add_meals"><input type="checkbox" id="no_add_meals" class="checkbox" name="meals_noadd" value="no_meals_added"/>No include meal preference </label></h4>
          <span class="error"><?php if(isset($_SESSION["errors"]["dpt_meal_quantity"])) echo $_SESSION["errors"]["dpt_meal_quantity"];?></span>
          <span class="error"><?php if(isset($_SESSION["errors"]["rtn_meal_quantity"])) echo $_SESSION["errors"]["rtn_meal_quantity"];?></span>
          <p><strong>*Maximun 3 meals quantity offered per flight</strong></p>
      </fieldset>
      <h2 id="specialadd">Special Requirements</h2>
        <p>
        <label>Include below any special requirement to consider in your flight</label><br/>
        <textarea id="special_add" class="comments" name="special_add" rows="4" cols="40" placeholder="Write a description of your requirement here"></textarea>
      </p>


      <!--Passenger details-->
      <h2>Passenger and contact details</h2>
      <fieldset class="passengerinfo">
        <legend>Passenger 1</legend>
        <p>
          <label for="first_name">First Name <input type="text" id="first_name" name="first_name" maxlength="25" size="25" value="<?php if (isset($_SESSION["first_name"])) echo $_SESSION["first_name"];?>" required="required" pattern="^[a-zA-Z ]+$"/></label>
          <span class="error"><?php if(isset($_SESSION["errors"]["firstname"]))  echo $_SESSION["errors"]["firstname"];?></span>
          <label for="last_name">Last Name <input type="text"  id="last_name" name="last_name" maxlength="25" size="25" value="<?php if (isset($_SESSION["lname"])) echo $_SESSION["lname"];?>"/></label>
          <span class="error"><?php if(isset($_SESSION["errors"]["lastname"]))  echo $_SESSION["errors"]["lastname"];?></span>
        </p>
        <p>
          <label for="dob_date">Date of Birth <input type="text" id="dob_date" name="dob_date" size="10" placeholder="dd/mm/yyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" value="<?php if (isset($_SESSION["dob"])) echo $_SESSION["dob"];?>"/></label>
          <span class="error"><?php if(isset($_SESSION["errors"]["dob"])) echo $_SESSION["errors"]["dob"];?></span>
        </p>
      </fieldset>
        <fieldset class="passengerinfo">
          <legend>Address Details</legend>
          <p><label for="s_address">Street Address <input type="text" id="s_address" name="s_address" maxlength="40" size="40" value="<?php if (isset($_SESSION["address"])) echo $_SESSION["address"];?>" required="required"/></label></p>
          <span class="error"><?php if(isset($_SESSION["errors"]["address"])) echo $_SESSION["errors"]["address"];?></span>
          <p><label for="suburb/town">Suburb/Town <input type="text" id="suburb/town" name="suburb/town" maxlength="20" size="30" required="required" value="<?php if (isset($_SESSION["suburb"])) echo $_SESSION["suburb"];?>"/></label></p>
          <span class="error"><?php if(isset($_SESSION["errors"]["suburb"])) echo $_SESSION["errors"]["suburb"];?></span>
          <p><label for="state">State</label>
            <select class="selectflight" name="state" id="state">
              <option value="none" >-</option>
              <option <?php if (isset($_SESSION["state"]) && $_SESSION["state"] == "VIC" ) echo "selected=\"selected\"";?> value="VIC" >VIC</option>
              <option <?php if (isset($_SESSION["state"]) && $_SESSION["state"] == "NSW" ) echo "selected=\"selected\"";?> value="NSM" >NSW </option>
              <option <?php if (isset($_SESSION["state"]) && $_SESSION["state"] == "QLD" ) echo "selected=\"selected\"";?> value="QLD" >QLD </option>
              <option <?php if (isset($_SESSION["state"]) && $_SESSION["state"] == "SA" ) echo "selected=\"selected\"";?> value="SA" >SA </option>
              <option <?php if (isset($_SESSION["state"]) && $_SESSION["state"] == "NT" ) echo "selected=\"selected\"";?> value="NT" >NT </option>
              <option <?php if (isset($_SESSION["state"]) && $_SESSION["state"] == "WA" ) echo "selected=\"selected\"";?> value="WA" >WA </option>
              <option <?php if (isset($_SESSION["state"]) && $_SESSION["state"] == "TAS" ) echo "selected=\"selected\"";?> value="TAS" >TAS </option>
              <option <?php if (isset($_SESSION["state"]) && $_SESSION["state"] == "ACT" ) echo "selected=\"selected\"";?> value="ACT" >ACT </option>
            </select>
            <span class="error"><?php if(isset($_SESSION["errors"]["stateErr"])) echo $_SESSION["errors"]["stateErr"];?></span>
          </p>
          <p><label for="postcode">Postcode <input type="text" id="postcode" name="postcode" maxlength="4" size="5" value="<?php if (isset($_SESSION["postcode"])) echo $_SESSION["postcode"];?>" /></label></p>
          <span class="error"><?php if (isset($_SESSION["errors"]["postcodeerr"])) echo $_SESSION["errors"]["postcodeerr"];?></span>
        </fieldset>
        <fieldset class="passengerinfo">
          <legend>Contact details </legend>
          <p>
            <label for="phone_num">Phone Number <input type="text" id="phone_num" name="phone_num" maxlength="10" size="20" placeholder="+61 (555) 555-555" pattern="^\d{10}$"  required="required" value="<?php if (isset($_SESSION["phone"])) echo $_SESSION["phone"];?>"/></label>
            <span class="error"><?php if(isset($_SESSION["errors"]["phone"])) echo $_SESSION["errors"]["phone"];?></span>
          </p>
          <p>
            <label for="contact_email">Email address  <input type="email" id="contact_email" name="contact_email" size="35" pattern="^.+@.+\..{2,3}$" placeholder="name@domain.com" required="required" value="<?php if (isset($_SESSION["email"])) echo $_SESSION["email"];?>"/></label>
            <span class="error"><?php if(isset($_SESSION["errors"]["email"])) echo $_SESSION["errors"]["email"];?></span>
          </p>
          <p>Preferred contact<br/>
            <label for="contact_by_email">Email <input type="radio" id="contact_by_email" name="pref_contact" <?php echo (isset($_SESSION["pContact"]) && $_SESSION["pContact"] == "Email" ) ? "checked": "";?> value="contact_by_email" required="required"/></label>
            <label for="contact_by_post">Post <input type="radio" id="contact_by_post" name="pref_contact" <?php echo (isset($_SESSION["pContact"]) && $_SESSION["pContact"] == "Post" ) ? "checked": "";?> value="contact_by_post" required="required"/></label>
            <label for="contact_by_phone">Phone <input type="radio" id="contact_by_phone" name="pref_contact" <?php echo (isset($_SESSION["pContact"]) && $_SESSION["pContact"] == "Phone" ) ? "checked": "";?> value="contact_by_phone" required="required"/></label>
            <span class="error"><?php if(isset($_SESSION["errors"]["p_contact"])) echo $_SESSION["errors"]["p_contact"];?></span>
          </p>
        </fieldset>

     <h2>Payment details</h2>
        <fieldset class="paymentform">
         <legend>Debit and credit card</legend>
         <p id="pay_method">Accepted card types:<br/><img src="images/payment2.jpg" alt="Payment cards"/></p>
         <p class="payment_data">
           <label for="card_name">Cardholder's Name*<br/><input type="text" id="card_name" name="card_name" maxlength="40" size="60" placeholder="Cardholder's Name" required="required" /></label>
           <span class="error"><?php if(isset($_SESSION["errors"]["card_name"])) echo $_SESSION["errors"]["card_name"];?></span>
         </p>

        <p id="cardtype" class="payment_data">Card Type*<br/>
        <label  for="visa"><input type="radio" id="visa" name="card" value="visa" required/> Visa </label>
        <label  for="mastercard"><input type="radio" id="mastercard" name="card" value="mastercard"/> MasterCard </label>
        <label  for="amex"><input type="radio" id="amex" name="card" value="amex"/> American Express </label>
        <span class="error"><?php if(isset($_SESSION["errors"]["card_type"])) echo $_SESSION["errors"]["card_type"];?></span>
      </p>


         <p class="payment_data"><label for="card_num">Card number* <br/><input type="text" id="card_num" name="card_num" maxlength="16" size="60"  required="required" /></label>
         <span class="error"><?php if(isset($_SESSION["errors"]["card_num"])) echo $_SESSION["errors"]["card_num"];?></span>
         </p>
         <p class="payment_data">
           <label for="expiry_date">Expiry Date*<input type="text" id="expiry_date" name="expiry_date" size="10" placeholder="MM/YY" pattern="\d{1,2}\/\d{1,2}" required="required"/></label>
           <span class="error"><?php if(isset($_SESSION["errors"]["card_exp"])) echo $_SESSION["errors"]["card_exp"];?></span>
           <label for="card_cvv">CVV code*<input type="text" id="card_cvv" name="card_cvv" maxlength="3" size="2" placeholder="000" required="required"/></label>
           <span class="error"><?php if(isset($_SESSION["errors"]["card_cvv"])) echo $_SESSION["errors"]["card_cvv"];?></span>
         </p>
         <p><span>A Payment Fee of 0.25% applies for Mastercard debit cards,
          0.41% for Visa debit cards and 0.99% for other Credit cards.</span></p>
       </fieldset>
       <fieldset class="paymentform">
         <legend>Billing information</legend>
         <p><label for="bill_info"><input type="checkbox" id="bill_info" class="checkbox" name="bill_info[]" value="same_bill_info"/>My contact details are the same for billing</label></p>

           <!--Total cost booking-->

           <input type="hidden" name="conf_flight_cost" id="conf_flight_cost" />
           <input type="hidden" name="extras_cost_dpt" id="extras_cost_dpt" />
           <input type="hidden" name="extras_cost_rtn" id="extras_cost_rtn" />
           <input type="hidden" name="total_extras" id="total_extras" />
           <input type="hidden" name="meals_cost_dpt" id="meals_cost_dpt" />
           <input type="hidden" name="meals_cost_rtn" id="meals_cost_rtn" />
           <input type="hidden" name="total_meals" id="total_meals" />
           <input type="hidden" name="total_cost" id="total_cost" />

       </fieldset>
       <input class="buttonform" type="submit" value="Check out"/>
       <input id="cancel_order" class="buttonform" type="reset" value="Cancel Order" />
   </form>
  </section>
   <?php include_once ("includes/footer.inc"); ?>
  </article>
  </body>
</html>
