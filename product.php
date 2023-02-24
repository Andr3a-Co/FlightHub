<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Flight Booking Assignment 1" />
    <meta name="keywords"    content="HTML,Tags" />
    <meta name="author"      content="Andrea Espitia" />
        <!--Viewport set to scale 1.0-->
    <script src="enhancements2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale= 1.0"/>
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

      <aside>
        <h3>Covid-19 Travel Support</h3>
        <p>Keep up-to-date with important information about travelling.Visit our Covid <a href="product.html#contact">FQAs & Contact us</a> before booking your travel</p>
      </aside>
      <h2 id="cities">Find destinations in Australia</h2>
        <p>Explore the most popular destinations across Australia.</p>
      <section id="sectioncity1">
        <h3><a href="https://www.visitvictoria.com/">Explore the best of Melbourne!</a></h3>
        <a href="enquire.html#flight_info"><img src="images/melbourne.png" alt="Melbourne_city" /></a>
      </section>
      <section id="sectioncity2">
        <h3><a href="https://www.sydney.com/">Start your Sidney adventure! </a> </h3>
        <a href="enquire.html#flight_info"><img src="images/sidney.png" alt="Sidney_city" /></a>
      </section>
      <section id="sectioncity3">
        <h3><a href="https://southaustralia.com/destinations/adelaide">Best things to do in Adelaide! </a></h3>
        <a href="enquire.html#flight_info"><img src="images/adelaide.png" alt="Adelaide_city" /></a>
      </section>
      <section id="sectioncity4">
        <h3 ><a href="https://www.visitbrisbane.com.au/"> Brisbane Even Better With You!</a></h3>
        <a href="enquire.html#flight_info"><img src="images/brisbane.png" alt="Brisbane_city" /></a>
      </section>


    <section>
    <h2 id="last_deals">Latest FlightHub Deals</h2>
    <p>Discover amazing flight deals for your next trip following these simple steps: </p>
      <ol class="lists">
        <li>Choose from a range of destination within Australia <a href='product.html#cities'>here</a></li>
        <li>Book with confidence with competitive low fares</li>
        <li>Became a MemberHub to receive special discounts</li>
      </ol>

    <!--Table section-->
    <table id="tabledeals">
       <caption>FlightHub Deals</caption>
       <thead class="t_heads">
          <tr>
            <th rowspan="2" scope="col">City</th>
            <th colspan="2" scope="col">Flight type</th>
            <th colspan="2" scope="col">Availability</th>
          </tr>
          <tr>
            <th scope="col">One way</th>
            <th scope="col">Round trip</th>
            <th scope="col">Travel period</th>
            <th scope="col">Sale ends</th>
          </tr>
      </thead>
      <tbody>
       <tr>
         <th class="t_heads" scope="row">Melbourne<br/>to Brisbane</th>
         <td>From $70</td>
         <td>From $140</td>
         <td>12 Jul - 15 Sep 21</td>
         <td>Friday 09 Apr 21<br/><input class="button" type="button" value="Book flight"></td>
       </tr>
       <tr>
         <th class="t_heads" scope="row">Melbourne<br/>to Adelaide</th>
         <td>From $50</td>
         <td>From $120</td>
         <td>22 Jul - 16 Sep 21</td>
         <td>Friday 01 May 21<br/><input class="button"  type="button" value="Book flight"></td>
       </tr>
       <tr>
         <th class="t_heads" scope="row">Melbourne<br/>to Sidney</th>
         <td>From $60</td>
         <td>From $120</td>
         <td>22 Jun - 16 Aug 21</td>
         <td>Friday 30 Apr 21<br/><input class="button" type="button" value="Book flight"></td>
       </tr>
      </tbody>
      <tfoot>
       <tr>
          <th colspan="5" scope="col"><span>*Sale ends 11:59pm, unless sold out prior</span></th>
       </tr>
      </tfoot>
    </table>
    </section>

    <section>
      <h2 id="about_us">About FlightHub</h2>
        <p>FlightHub is dedicated to make it easy for you to find the cheapest and best flight in Australia:</p>
        <ul class="lists">
          <li>Search a wide range of destinations with the lowest price guaranteed</li>
          <li>Compare prices between different destinations and airlines</li>
          <li>Receive our travel newsletter monthly with the last travel updates and deals</li>
        </ul>
      <h2>Become MemberHub</h2>
        <p>Join the MemberHub today for just <strong>$35 AUD</strong> to receive special benefits and discounts </p>
        <input id= "joinbutton" type="button" value="Join MemberHub"/>
    </section>
    <?php include_once ("includes/footer.inc"); ?>
</article>
  </body>
</html>
