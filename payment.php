<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Flight Booking Assignment 1" />
    <meta name="keywords"    content="HTML,Tags" />
    <meta name="author"      content="Andrea Espitia" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="part2.t2.js"></script>
    <script src="enhancements.js"></script>
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

    <!--Flight Booking-->

    <h2>Rewiev and Pay</h2>

    <form id="bookreview" >
    <h4 class="book">Your Booking Details</h4>
      <p class="book"><strong>Passengers: </strong><span id="confirm_name"></span></p>
      <p class="book"><strong>Date of Birth: </strong><span  id="confirm_dob"></span></p><br/>
    <fieldset id="confirmtable">
      <table >
         <thead>
         </thead>
         <tbody>
           <tr>
             <th class="t_heads" scope="row"><p><strong>Departing Flight:  </strong></th>
             <td><span id="confirm_dpt_flight"></span></td>
             <td rowspan="2">$<span id="confirm_cost"></span></td>
           </tr>
           <tr>
             <th class="t_heads" scope="row"><p><strong>Returning Flight:  </strong></th>
             <td><span id="confirm_rtn_flight"></span></td>
           </tr>
         </tbody>
       </table>
     </fieldset>

     <fieldset id="confirmtable2">
       <table>
         <thead>
         </thead>
         <tbody>
           <tr>
            <td class="t_heads" >Extra services</td>
            <td class="t_heads" >Quantity</td>
            <td class="t_heads" >Price</td>
            <td class="t_heads" >Total extras</td>
          </tr>
           <tr>
             <td><strong>Departure checked bags:</strong><br/><span id="confirm_bag_dpt"></span> </td>
             <td><span id="qty_bag_dpt"></span></td>
             <td>$<span id="bag_cost_dpt"></span></td>
             <td rowspan="2">$<span id="confirm_cost_bags"></span></td>
           </tr>
           <tr>
             <td><strong>Returning checked bags:</strong><br/><span id="confirm_bag_rtn"></span> </td>
             <td><span id="qty_bag_rtn"></span></td>
             <td>$<span id="bag_cost_rtn"></span></td>
           </tr>
           <tr>
             <td class="t_heads" >Meals</td>
             <td class="t_heads" >Quantity</td>
             <td class="t_heads" >Price</td>
             <td class="t_heads" >Total meals</td>
           </tr>
           <tr>
             <td><span id="confirm_meal_noadd"></span><span id="confirm_meals"></span><br/><span id="confirm_meal_opt1"></span> </td>
             <td><span id="confirm_meal1_qty"></span></td>
             <td>$<span id="meal_cost_dpt"></span></td>
             <td rowspan="2">$<span id="confirm_cost_meals"></span></td>
           </tr>
           <tr>
             <td><span id="confirm_meal_noadd2"></span><span id="confirm_meals2"></span><br/><span id="confirm_meal_opt2"></span> </td>
             <td><span id="confirm_meal2_qty"></span></td>
             <td>$<span id="meal_cost_rtn"></span></td>
           </tr>
            <tr>
            <th class="t_heads" scope="col">Total Booking</th>
            <td class="t_heads" colspan="3">$<span id="confirm_total_cost"></span></td>
          </tr>
         </tbody>
       </table><br/><br/>
     </fieldset>
     </form>



    <h2>Payment details</h2>
    <form id="payform" method="post" action="process_order.php" novalidate>
         <fieldset class="paymentform">
           <legend>Debit and credit card</legend>
           <p id="pay_method">Accepted card types:<br/><img src="images/payment2.jpg" alt="Payment cards"/></p>
           <p class="payment_data">
             <label for="card_name">Cardholder's Name*<br/><input type="text" id="card_name" name="card_name" maxlength="40" size="60" placeholder="Cardholder's Name" required="required" /></label>
             <span class="error"><?php if(isset($phoneErr1, $phoneErr2)) echo $phoneErr1, $phoneErr2;?></span>
           </p>

          <p id="cardtype" class="payment_data">Card Type*<br/>
          <label  for="visa"><input type="radio" id="visa" name="card" value="visa" required/> Visa </label>
   			  <label  for="mastercard"><input type="radio" id="mastercard" name="card" value="mastercard"/> MasterCard </label>
   			  <label  for="amex"><input type="radio" id="amex" name="card" value="amex"/> American Express </label>
        </p>


           <p class="payment_data"><label for="card_num">Card number* <br/><input type="text" id="card_num" name="card_num" maxlength="16" size="60"  required="required" /></label>
           </p>
           <p class="payment_data">
             <label for="expiry_date">Expiry Date*<input type="text" id="expiry_date" name="expiry_date" size="10" placeholder="MM/YY" pattern="\d{1,2}\/\d{1,2}" required="required"/></label>
             <label for="card_cvv">CVV code*<input type="text" id="card_cvv" name="card_cvv" maxlength="3" size="2" placeholder="000" required="required"/></label>
           </p>
           <p><span>A Payment Fee of 0.25% applies for Mastercard debit cards,
            0.41% for Visa debit cards and 0.99% for other Credit cards.</span></p>
         </fieldset>
         <fieldset class="paymentform">
           <legend>Billing information</legend>
           <p><label for="bill_info"><input type="checkbox" id="bill_info" class="checkbox" name="bill_info[]" value="same_bill_info"/>My contact details are the same for billing</label>
           <p>
            <label for="address">Street Address <input type="text" id="address" name="s_address" maxlength="40" size="40" required="required"/></label><br/>
            <label for="suburb/town">Suburb/Town <input type="text" id="suburb/town" name="suburb/town" maxlength="20" size="30" required="required"/></label>
           </p>
           <p><label for="state">State</label>
             <select class="selectflight" name="state" id="state">
               <option value="VIC" selected="selected">VIC</option>
               <option value="NSW">NSW </option>
               <option value="QLD">QLD </option>
               <option value="SA">SA </option>
               <option value="NT">NT </option>
               <option value="WA">WA </option>
               <option value="TAS">TAS </option>
               <option value="ACT">ACT </option>
             </select>
             <label for="postcode">Postcode <input type="text" id="postcode" name="postcode" maxlength="4" size="5" required="required"/></label>
           </p>
           <p>
             <label for="phone_num">Phone Number <input type="text" id="phone_num" name="phone_num" maxlength="10" size="20" placeholder="+61 (555) 555-555" pattern="^\d{10}$" required="required"/></label>
             <label for="contact_email">Email address  <input type="email" id="contact_email" name="contact_email" size="24" pattern="^.+@.+\..{2,3}$" placeholder="name@domain.com" required="required"/></label>
           </p>

           <!--Flight information-->
           <input type="hidden" name="flight_dpt" id="flight_dpt" />
           <input type="hidden" name="flight_rtn" id="flight_rtn" />
           <input type="hidden" name="bag_dpt_qty" id="bags_qty1" />
           <input type="hidden" name="bag_rtn_qty" id="bags_qty2" />
           <input type="hidden" name="weight_bags_rtn" id="weight_bags_rtn" />
           <input type="hidden" name="weight_bags_dpt" id="weight_bags_dpt" />

           <!--Meals information-->
           <input type="hidden" name="meals_dpt" id="meals_dpt_conf" />
           <input type="hidden" name="meals_rtn" id="meals_rtn_conf" />
           <input type="hidden" name="meals_noadd" id="meals_noadd_conf" />
           <input type="hidden" name="meal_dpt_opt" id="meal_dpt_opt" />
           <input type="hidden" name="meal_rtn_opt" id="meal_rtn_opt" />
           <input type="hidden" name="meal_qty_dpt" id="meal_qty1" />
           <input type="hidden" name="meal_qty_rtn" id="meal_qty2" />
           <input type="hidden" name="special_add" id="special_add" />


           <!--Passenger information-->
           <input type="hidden" name="first_name" id="first_name" />
           <input type="hidden" name="last_name" id="last_name" />
           <input type="hidden" name="dob_date" id="dob_date" />
           <input type="hidden" name="state" id="state_conf" />
           <input type="hidden" name="postcode" id="postcode_conf" />
           <input type="hidden" name="phone_num" id="phone_num_conf" />
           <input type="hidden" name="contact_email" id="contact_email_conf" />
           <input type="hidden" name="pref_contact" id="pref_contact" />

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

    <?php include_once ("includes/footer.inc"); ?>
    </article>
  </body>
</html>
