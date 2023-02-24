<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Flight Booking Assignment 1" />
    <meta name="keywords"    content="HTML,Tags" />
    <meta name="author"      content="Andrea Espitia" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="enhancements.js"></script>
        <!--Viewport set to scale 1.0-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="styles/style.css" rel="stylesheet"/>
    <link href="styles/csst.css" rel="stylesheet"/>
    <link href="styles/stylemanage.css" rel="stylesheet"/>
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
  <p><img id="confirmation" src="images/confirmation.jpg" alt="Confirmation"/></p>
  <section id="confirm1">
  <h2>Booking Confirmation</h2>
  <table >
     <thead>
     </thead>
     <tbody>
       <tr>
         <th class="t_heads" scope="row"><p><strong>Booking Reference</strong></th>
       </tr>
       <tr>
       <th>HAHAKMIJ <br/> <button type="button" class="buttonform">Manage Booking</button></th>
       </tr>
       <tr>
         <th class="t_heads" scope="row"><p><strong>Check-in Options</strong></th>
       </tr>
       <th>Check in online from 24 hours before your <br/> domestic flight <br/><button type="button" class="buttonform">Web check-in</button></td>
       <tr>
         <th><strong>At the airport:</strong> Print this itinerary and check in at <br/> the airport kiosks or at the airline counter.</th>
       </tr>
     </tbody>
   </table>
 </section>
 <section>
   <h3><?php if(isset($_SESSION["first_name"])) echo "<p>", $_SESSION["first_name"], ",  all set for your flight! <br/></p>";?></h3>
   <p>Here's your flight itinerary confirmation. <br/> We look forward to seeign you onboard</p>
   <h2>Your Flight Itinerary</h2>
   <p>Itinerary issue date: <?php echo date("l") . date("d/m/Y") . "<br>"; ?></p>

   <table >
      <thead>
      </thead>
      <tbody>
        <tr>
          <th class="t_heads" scope="row"><p><strong>Departing Flight:  </strong></th>
          <td><span><?php if(isset($_SESSION["flightDpt"])) echo $_SESSION["flightDpt"];?></span></td>
        </tr>
        <tr>
          <th class="t_heads" scope="row"><p><strong>Returning Flight:  </strong></th>
          <td><span><?php if(isset($_SESSION["flightRtn"])) echo $_SESSION["flightRtn"];?></span></td>
        </tr>
      </tbody>
    </table>

    <ul class="lists">
      <li><strong>Passengers: </strong><span><?php if(isset($_SESSION["first_name"], $_SESSION["lname"])) echo $_SESSION["first_name"]," ", $_SESSION["lname"];?></span></li>
      <li><strong>Date of Birth: </strong><span><?php if(isset($_SESSION["dob"])) echo $_SESSION["dob"];?></span></li>
    </ul>

    <h2>Extras and services requested: </h2>
    <ul class="lists">
      <li><strong>Carry-on Baggage:</strong> 7kg</li>
      <li><strong>Checked Baggage: </strong></li>
        <ul>
          <li><strong>Departure:</strong><span><?php if(isset($_SESSION["dptbag"])) echo $_SESSION["dptbag"];?></span></li>
          <li><strong>Returning:</strong><span><?php if(isset($_SESSION["rtnbag"])) echo $_SESSION["rtnbag"];?></span></li>
        </ul>
      <li><strong>Meals:</strong></li>
        <ul>
          <li><strong>Departure:</strong><span><?php if(isset($_SESSION["dptmeal"], $_SESSION["nomeal"])) echo $_SESSION["dptmeal"]," ", $_SESSION["nomeal"];?></span></li>
          <li><strong>Returning:</strong><span><?php if(isset($_SESSION["rtnmeal"], $_SESSION["nomeal"])) echo $_SESSION["rtnmeal"]," ", $_SESSION["nomeal"];?></span></li>
        </ul>
          <?php if(isset($_SESSION["special"])) echo"<li><strong>Special service request:</strong>", $_SESSION["special"], "</li>";?>
    </ul>

    <h2>Booking Contact Details</h2>
    <ul class="lists">
      <li><strong>Contact name:</strong><span><?php if(isset($_SESSION["first_name"], $_SESSION["lname"])) echo $_SESSION["first_name"]," ", $_SESSION["lname"];?></span></li>
      <li><strong>Email:</strong><span><?php if(isset($_SESSION["email"])) echo $_SESSION["email"];?></span></li>
      <li><strong>Phone number:</strong><span><?php if(isset($_SESSION["phone"])) echo $_SESSION["phone"];?></span></li>
      <li><strong>Address:</strong><span><?php if(isset($_SESSION["address_conf"])) echo $_SESSION["address_conf"];?></span></li>
      <li><strong>*We will contact you in case there's any changes to your flight via your</strong><span><?php if(isset($_SESSION["pContact"])) echo $_SESSION["pContact"];?></span></li>
    </ul>
    <h2>Your Trip Receipt</h2>
    <h3>Summary Charges</h3>
    <ul class="lists">
      <li><strong>Base Flight Fare:</strong><span> $ <?php if(isset($_SESSION["flightCost"])) echo $_SESSION["flightCost"];?></span></li>
      <li><strong>Baggage fee:</strong><span> $ <?php if(isset($_SESSION["extrasCost"])) echo $_SESSION["extrasCost"];?></span></li>
      <li><strong>Extras & meals fee:</strong><span> $ <?php if(isset($_SESSION["mealsCost"])) echo $_SESSION["mealsCost"];?></span></li>
      <li><strong>TOTAL PRICE:</strong><span> $ <?php if(isset($_SESSION["totalCost"])) echo $_SESSION["totalCost"];?></span></li>
      <li><strong>*GST tax applies for Australia</strong></li>
    </ul>

    <h3><strong>Payment received<strong></h3>
    <p><?php echo date("l") . date("d/m/Y") . "<br>"; ?></p>
    <p><img src="images/credit_card.jpg" alt="creditcard"/><span><?php if(isset($_SESSION["card"])) echo $_SESSION["card"];?> xxxx xxxx xxxx xxxx</span></p>






 </section>
    <?php include_once ("includes/footer.inc"); ?>
    </article>
  </body>
  </html>
