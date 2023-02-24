<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Flight Booking Assignment 1" />
    <meta name="keywords"    content="HTML,Tags" />
    <meta name="author"      content="Andrea Espitia" />
    <script src="test2.js"></script>
    <script src="enhancements.js"></script>

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

    <!--Flight Booking-->

    <section id="section1">
    <h2 id="flight_info">Book your flight</h2>

      <form method="post" action="index.html" novalidate>
        <fieldset>
          <p>
            <label for="one_way"><input type="radio" id="one_way" name="flight_type" value="One Way" required="required"/> One Way </label>
            <label for="round_trip"><input type="radio" id="round_trip" name="flight_type" value="Round Trip"/> Round Trip </label>
            <label for="multy_city"><input type="radio" id="multy_city" name="flight_type" value="Multy-City"/> Multy-City </label>
            <label for="numpassenger">Passenger</label>
              <select class="selectflight" name="numpassenger" id="numpassenger">
                <option value="1" selected="selected">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
          </p>
          <p><label for="dep_flight">Flying from:</label>
            <select class="selectflight" name="dep_flight" id="dep_flight">
              <option value="melbourne" selected="selected">Melbourne</option>
              <option value="adelaide">Adelaide</option>
              <option value="Brisbane">Brisbane</option>
              <option value="Sidney">Sidney</option>
            </select>
          <label for="rtn_flight">Flying to:</label>
            <select class="selectflight" name="rtn_flight" id="rtn_flight">
              <option value="select" selected="selected">Where to</option>
              <option value="melbourne">Melbourne</option>
              <option value="adelaide">Adelaide</option>
              <option value="Brisbane">Brisbane</option>
              <option value="Sidney">Sidney</option>
            </select>
          </p>
          <p>
            <label for="dep_date">Departing date: <input type="date" id="dep_date" name="dep_date" required="required"/></label>
            <label for="rtn_date">Returning date: <input type="date" id="rtn_date" name="rtn_date" required="required"/></label>
          </p>
          <p><label>Voucher</label><br/>
            <textarea name="voucher_code" class="voucher" rows="1" cols="20" placeholder="Insert voucher code"></textarea>
          </p>
          <p><input class="buttonform" type="submit" value="Find Flights"/></p>
        </fieldset>
      </form>
  </section>

      <!--Flight information-->
    <section id="section2">
    <h2>Flight Options</h2><br/>
    <span class="error"><?php if(isset($dpt_flightError)) echo $dpt_flightError;?></span>
    <h3>Departing Flight</h3>
    <form id= "bookform" method="post" action="payment.php" novalidate>
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
           <th class="t_heads" scope="row"><label for="dpt_flight1"><input type="radio" class="optradio" id="dpt_flight1" name="flight_option_dpt" value="JetStar 7656 MEL Melbourne 07:00 -  BNE Brisbane 08:25"  required="required" /></label> JetStar 7656</th>
           <td><Strong>Departure:</strong><br/>MEL Melbourne 07:00 - BNE Brisbane 08:25</td>
           <td>Direct - 2hrs 30min </td>
           <td >$99</td>
         </tr>
         <tr>
           <th class="t_heads" scope="row"><label for="dpt_flight2"><input type="radio" class="optradio" id="dpt_flight2" name="flight_option_dpt" value="Virgin Australia 467 MEL Melbourne 10:30 - BNE Brisbane 13:25"  required="required"/>Virgin<br/></label> Australia 467</th>
           <td><Strong>Departure:</strong><br/>MEL Melbourne 10:30 - BNE Brisbane 13:25</td>
           <td>Direct - 2hrs 25min </td>
           <td >$120</td>
         </tr>
         <tr>
           <th class="t_heads" scope="row"><label for="dpt_flight3"><input type="radio" class="optradio" id="dpt_flight3" name="flight_option_dpt" value="Qantas Airways 54 MEL Melbourne 14:25 - BNE Brisbane  16:30"  required="required"/></label>Qantas<br/> Airways 54</th>
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

     <span class="error"><?php if(isset($rtn_flightError)) echo $rtn_flightError;?></span>
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
             <th class="t_heads" scope="row"><label for="rtn_flight1"><input type="radio" class="optradio" id="rtn_flight1" name="flight_option_rtn" value="JetStar 8909 BNE Brisbane 19:30 - MEL Melbourne 22:45"  required="required"/></label> JetStar 8909</th>
             <td><Strong>Returning:</strong><br/>BNE Brisbane 19:30 - MEL Melbourne 22:45</td>
             <td>Direct - 2hrs 30min </td>
             <td>$130</td>
           </tr>
           <tr>
             <th class="t_heads" scope="row" ><label for="rtn_flight2"><input type="radio" class="optradio" id="rtn_flight2" name="flight_option_rtn" value="Virgin Australia 346 BNE Brisbane 15:10 - MEL Melbourne 17:20 "  required="required"/></label> Virgin<br/> Australia 346</th>
             <td><Strong>Returning:</strong><br/>BNE Brisbane 15:10 - MEL Melbourne 17:20 </td>
             <td>Direct - 2hrs 30min </td>
             <td>$100</td>
           </tr>
           <tr>
             <th class="t_heads" scope="row"> <label for="rtn_flight3"><input type="radio" class="optradio" id="rtn_flight3" name="flight_option_rtn" value="Qantas Airways 6 BNE Brisbane  09:45 -  MEL Melbourne 11:35 "  required="required"/></label> Qantas<br/> Airways 6</th>
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
        <span class="error"><?php if(isset($bagError)) echo $bagError;?></span>
        <h4><label for="checked_bag1">Departure flight MEL - BNE</label></h4>
          <select class="qtextras" name="checked_bag_dpt" id="checked_bag1">
            <option value="none" selected="selected">-</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
           </select>
          <p class="add_option"><label  for="d_baggage1"><input type="radio" id="d_baggage1" name="bag_weight_dpt" value="15kg"/> 15 Kg - $25 each </label></p>
  			  <p class="add_option"><label  for="d_baggage2"><input type="radio" id="d_baggage2" name="bag_weight_dpt" value="20kg"/> 20 Kg - $35 each </label></p>
  			  <p class="add_option"><label  for="d_baggage3"><input type="radio" id="d_baggage3" name="bag_weight_dpt" value="30kg"/> 30 Kg - $49 each </label></p>
          <p class="add_option"><label  for="d_baggage0"><input type="radio" id="d_baggage0" name="bag_weight_dpt" value="none"/> No include checked baggage </label></p>
          <span class="error"><?php if(isset($bag_dptError)) echo $bag_dptError;?></span>
          <h4><label for="checked_bag2">Returning flight BNE - MEL</label></h4>
          <select class="qtextras" name="checked_bag_rtn" id="checked_bag2">
            <option value="none" selected="selected">-</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
           </select>
          <p class="add_option"><label for="r_baggage1"><input type="radio" id="r_baggage1" name="bag_weight_rtn" value="15kg"/> 15 Kg - $25 each </label></p>
  			  <p class="add_option"><label for="r_baggage2"><input type="radio" id="r_baggage2" name="bag_weight_rtn" value="20kg"/> 20 Kg - $35 each </label></p>
  			  <p class="add_option"><label for="r_baggage3"><input type="radio" id="r_baggage3" name="bag_weight_rtn" value="30kg"/> 30 Kg - $49 each </label></p>
          <p class="add_option"><label  for="r_baggage0"><input type="radio" id="r_baggage0" name="bag_weight_rtn" value="none"/> No include checked baggage </label></p>
          <span class="error"><?php if(isset($bag_rtnError)) echo $bag_rtnError;?></span>
          <p><span>*Checked baggage must be checked in before you go to the gate</span></p>
      </fieldset>
     <fieldset id="extraservice3">
      <h3 class="add_head">Meals and Snacks</h3>
        <span class="error"><?php if(isset($mealsError)) echo $mealsError;?></span>
          <h4><label for="meals_dpt"><input type="checkbox" class="checkbox" id="meals_dpt" name="meals[]" value="meals_added"/>Departure flight MEL - BNE</label></h4>
          <span class="error"><?php if(isset($mealdptErr)) echo $mealdptErr;?></span>
          <p class="qtextras2"><strong>Quantity</strong></p>
          <p class="add_option"><label for="dpt_meal1"><input type="radio" id="dpt_meal1" name="dpt_meal" value="Banana Bread Slice + Hot drink"/>Banana Bread Slice + Hot drink - $7</label></p>
          <p class="add_option"><label for="dpt_meal2"><input type="radio" id="dpt_meal2" name="dpt_meal" value="Beef pie + Hot drink"/>Beef pie + Hot drink - $10</label></p>
      		<p class="add_option"><label for="dpt_meal3"><input type="radio" id="dpt_meal3" name="dpt_meal" value="Gourmet sandwich + Cold drink"/>Gourmet sandwich + Cold drink - $13</label>
          <label for="dpt_qty_meal"><input type="text" id="dpt_qty_meal" class="qtextras" name="dpt_qty_meal" maxlength="1" size="4" /></label></p>

          <h4><label for="meals_rtn"><input type="checkbox" id="meals_rtn" class="checkbox" name="meals[]" value="meals_added"/>Returning flight MEL - BNE</label></h4>
          <span class="error"><?php if(isset($mealrtnErr)) echo $mealrtnErr;?></span>
          <p class="add_option"><label for="rtn_meal1"><input type="radio" id="rtn_meal1" name="rtn_meal" value="Banana Bread Slice + Hot drink"/>Banana Bread Slice + Hot drink - $7</label></p>
          <p class="add_option"><label for="rtn_meal2"><input type="radio" id="rtn_meal2" name="rtn_meal" value="Beef pie + Hot drink"/>Beef pie + Hot drink - $10</label></p>
      		<p class="add_option"><label for="rtn_meal3"><input type="radio" id="rtn_meal3" name="rtn_meal" value="Gourmet sandwich + Cold drink"/>Gourmet sandwich + Cold drink - $13</label>
            <label for="rtn_qty_meal"><input type="text" id="rtn_qty_meal" class="qtextras" name="rtn_qty_meal" maxlength="1" size="4" /></label></p>
          <h4><label for="no_add_meals"><input type="checkbox" id="no_add_meals" class="checkbox" name="meals[]" value="no_meals_added"/>No include meal preference </label></h4>
          <span class="error"><?php if(isset($mealqtyError, $mealformatErr)) echo $mealqtyError, $mealformatErr;?></span>
          <span class="error"><?php if(isset($mealqtyError2)) echo $mealqtyError2;?></span>
          <p><strong>*Maximun 3 meals quantity offered per flight</strong></p>
      </fieldset>
      <h2 id="specialadd">Special Requirements</h2>
        <p>
        <label>Include below any special requirement to consider in your flight</label><br/>
        <textarea id="special_add" class="comments" name="requirements" rows="4" cols="40" placeholder="Write a description of your requirement here"></textarea>
      </p>


      <!--Passenger details-->
      <h2>Passenger and contact details</h2>
      <fieldset class="passengerinfo">
        <legend>Passenger 1</legend>
        <p>
          <label for="first_name">First Name <input type="text" id="first_name" name="first_name" maxlength="25" size="25" required="required" pattern="^[a-zA-Z ]+$"/></label>
          <span class="error"><?php if(isset($fnameError1, $fnameError2)) echo $fnameError1, $fnameError2;?></span>
          <label for="last_name">Last Name <input type="text"  id="last_name" name="last_name" maxlength="25" size="25" required="required" pattern="^[a-zA-Z ]+$"/></label>
          <span class="error"><?php if(isset($lnameError1, $lnameError2)) echo $lnameError1, $lnameError2;?></span>
        </p>
        <p>
          <label for="dob_date">Date of Birth <input type="text" id="dob_date" name="dob_date" size="10" placeholder="dd/mm/yyy" pattern="\d{1,2}\/\d{1,2}\/\d{4}" required="required"/></label>
          <span class="error"><?php if(isset($dobErr1, $dobErr2)) echo $dobErr1, $dobErr1;?></span>
        </p>
      </fieldset>
        <fieldset class="passengerinfo">
          <legend>Address Details</legend>
          <p><label for="s_address">Street Address <input type="text" id="s_address" name="s_address" maxlength="40" size="40" required="required"/></label></p>
          <span class="error"><?php if(isset($addressErr1, $addressErr2)) echo $addressErr1, $addressErr2;?></span>
          <p><label for="suburb/town">Suburb/Town <input type="text" id="suburb/town" name="suburb/town" maxlength="20" size="30" required="required"/></label></p>
          <span class="error"><?php if(isset($subErr1, $subErr2)) echo $subErr1, $subErr2;?></span>
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
            <span class="error"><?php if(isset($stateErr)) echo $stateErr;?></span>
          </p>
          <p><label for="postcode">Postcode <input type="text" id="postcode" name="postcode" maxlength="4" size="5"/></label></p>
          <span class="error"><?php if(isset($postcodeErr1, $postcodeErr2 )) echo $postcodeErr1, $postcodeErr2;?></span>
        </fieldset>
        <fieldset class="passengerinfo">
          <legend>Contact details </legend>
          <p>
            <label for="phone_num">Phone Number <input type="text" id="phone_num" name="phone_num" maxlength="10" size="10" placeholder="+61 (555) 555-555" pattern="^\d{10}$"  required="required"/></label>
            <span class="error"><?php if(isset($phoneErr1, $phoneErr2)) echo $phoneErr1, $phoneErr2;?></span>
          </p>
          <p>
            <label for="contact_email">Email address  <input type="email" id="contact_email" name="contact_email" size="35" pattern="^.+@.+\..{2,3}$" placeholder="name@domain.com" required="required"/></label>
            <span class="error"><?php if(isset($emailErr1, $emailErr2)) echo $emailErr1, $emailErr2;?></span>
          </p>
          <p>Preferred contact<br/>
            <label for="contact_by_email">Email <input type="radio" id="contact_by_email" name="prefer_contact" value="email" required="required"/></label>
            <label for="contact_by_post">Post <input type="radio" id="contact_by_post" name="prefer_contact" value="post" required="required"/></label>
            <label for="contact_by_phone">Phone <input type="radio" id="contact_by_phone" name="prefer_contact" value="phone" required="required"/></label>
            <span class="error"><?php if(isset($pcontErr)) echo $pcontErr;?></span>
          </p>
        </fieldset>
        <input class="buttonform" type="submit" value="Continue to Payment"/>
    </form>
  </section>
  <?php include_once ("includes/footer.inc"); ?>
  </article>
  </body>
</html>
