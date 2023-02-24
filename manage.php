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

    <p><img id="manage" src="images/manage.jpg" alt="Manage"/></p>
    <h2>Booking management tool</h2>
    <section id="managelist">
    <p>Welcome to Manager webpage!</p>
    <ul>
      <li>Retrieve flights, baggage, meals</li>
      <li>Retrieve booking cost </li>
      <li>Modify order status</li>
      <li>Cancel orders</li>
    </ul>
  </section><br/>
    <section id="section1m">
      <form id="ordersearch" method="post" action="manage.php">
      <fieldset>
      <legend>Search tools</legend>
        <p><label for="order">Status</label>
        <select class="selectflight" name="order" id="order">
          <option value="none" selected="selected">-</option>
          <option value="all">All orders </option>
          <option value="pending">Orders pending</option>
          <option value="paid">Orders paid </option>
          <option value="fulfilled">Orders fulfilled </option>
          <option value="archived">Orders archived </option>
        </select>
        </p>
        <p><label for="customer_name">Customer's Name <input type="text" id="customer_name" name="customer_name"  /></label></p>
        <p><label for="order">Airline </label>
        <select class="selectflight" name="airline" id="airline">
          <option value="none" selected="selected">-</option>
          <option value="virgin">Virgin Australia </option>
          <option value="jetstar">Jetstar</option>
          <option value="qantas">Qantas</option>
        </select>
        </p>
        <p><label for="cost">Order cost</label>
          <select class="selectflight" name="cost" id="cost">
            <option value="none" selected="selected">-</option>
            <option value="highprice">Highest Cost </option>
            <option value="lowprice">Lowest Cost</option>
        </select>
        </p>
      <p><input class="buttonform" type="submit" value="Search"/></p>
      </fieldset>
    </form>
  </section>
  <section id="section2m">
    <form id="orderupdate" method="post" action="manage.php">
      <fieldset>
      <legend id="update">Update Order </legend>
      <p><label for="order_id_up">Order id <input type="text" id="order_id_up" name="order_id_up"  /></label></p>
      <p><label for="status">Order Status</label>
      <select class="selectflight" name="status" id="status">
        <option value="none" selected="selected">-</option>
        <option value="pending">Pending</option>
        <option value="paid">Paid </option>
        <option value="fulfilled">Fulfilled </option>
        <option value="archived">Archived </option>
      </select>
      </p><br/><br/>
      <p><input class="buttonform" type="submit" value="Update"/></p>
      </fieldset>
     </form>
   </section>
   <section id="section3m">
     <form id="orderupdate" method="post" action="manage.php">
       <fieldset>
       <legend >Cancel Order </legend>
       <p><label for="order_id_cancel">Order id <input type="text" id="order_id_cancel" name="order_id_cancel"  /></label></p><br/><br/><br/>
       <p><input class="buttonform" type="submit" value="Cancel Order"/></p>
       </fieldset>
      </form>
    </section><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <a href='index.php'><button class="buttonform" type='button'>Log-out</button></a>
    <section id="section4m">


    <?php

    if (isset($_POST["order"])){
	  $orderQuery = trim($_POST["order"]);
    if (!$orderQuery == "") {

    require_once ("settings.php");

    $conn = @mysqli_connect($host,
    	$user,
    	$pwd,
    	$sql_db
  	);

    $tableName = "booking_orders";


    if (!$conn) {
      echo"<p>Database connection failure</p>";
    } else if ($orderQuery == "all")  {

      $query =  "SELECT * FROM $tableName";

      $result = mysqli_query($conn, $query);

    if (!$result) {
      echo"<p>Something is wrong with ", $query, "</p>";
    } else {

      echo"<h3>Results Found</h3>";
      echo"<table>";
      echo"<tr>\n "
          ."<th scope=\"col\">Order ID </th>\n"
          ."<th scope=\"col\">Order Date</th>\n"
          ."<th scope=\"col\">Departing <br/> Flight</th>\n"
          ."<th scope=\"col\">Returning<br/> Flight</th>\n"
          ."<th scope=\"col\">Departure Bag</th>\n"
          ."<th scope=\"col\">Returning Bag</th>\n"
          ."<th scope=\"col\">Meals Departure</th>\n"
          ."<th scope=\"col\">Meals Return</th>\n"
          ."<th scope=\"col\">Special Service</th>\n"
          ."<th scope=\"col\">Total cost</th>\n"
          ."<th scope=\"col\">Name</th>\n"
          ."<th scope=\"col\">Last Name</th>\n"
          ."<th scope=\"col\">Order Status</th>\n"
          ."</tr>\n";

      //retrieve current record pinted by the result pointer

      while ($row = mysqli_fetch_assoc($result)) {
        echo"<tr>\n ";
        echo"<td>", $row["order_id"], "</td>\n ";
        echo"<td>", $row["order_date"], "</td>\n ";
        echo"<td>", $row["flight_dpt"], "</td>\n ";
        echo"<td>", $row["flight_rtn"], "</td>\n ";
        echo"<td>", $row["bag_departure"], "</td>\n ";
        echo"<td>", $row["bag_return"], "</td>\n ";
        echo"<td>", $row["meal_dpt_opt"], "</td>\n ";
        echo"<td>", $row["meal_rtn_opt"], "</td>\n ";
        echo"<td>", $row["special_add"], "</td>\n ";
        echo"<td>", $row["order_cost"], "</td>\n ";
        echo"<td>", $row["first_name"], "</td>\n ";
        echo"<td>", $row["last_name"], "</td>\n ";
        echo"<td>", $row["order_status"], "<br/><a href='manage.php#update'><button type='button'>Update</button></a></td>\n";
        echo"</tr>\n ";
      }

      echo"</table>\n ";
      mysqli_free_result($result);
    }
    mysqli_close($conn);
    }
  }
}

    ?>

    <?php

    if (isset ($_POST["customer_name"])) {
    $nameQuery = trim($_POST["customer_name"]);
    if (!$nameQuery=="") {

    require_once ("settings.php");

    $conn = @mysqli_connect($host,
    	$user,
    	$pwd,
    	$sql_db
  	);

    if (!$conn) {
      echo"<p>Database connection failure</p>";
    } else {

      $query =  "SELECT order_id, first_name, last_name, contact_email FROM $tableName WHERE first_name like  '$nameQuery%'
                 ORDER BY order_id, first_name";

      $result = @mysqli_query($conn, $query);

    if (!$result) {
      echo"<p>Something is wrong with ", $query, "</p>";
    } else {

    if(mysqli_num_rows($result)>0) {

      echo"<h3>Results Found</h3>";
      echo"<table>";
      echo"<tr>\n "
          ."<th scope=\"col\">Order ID </th>\n"
          ."<th scope=\"col\">Name</th>\n"
          ."<th scope=\"col\">Last Name</th>\n"
          ."<th scope=\"col\">Email </th>\n"
          ."</tr>\n";



      while ($row = mysqli_fetch_assoc($result)) {
        echo"<tr>\n ";
        echo"<td>", $row["order_id"], "</td>\n ";
        echo"<td>", $row["first_name"], "</td>\n ";
        echo"<td>", $row["last_name"], "</td>\n ";
        echo"<td>", $row["contact_email"], "</td>\n ";
        echo"</tr>\n ";
      }

      echo"</table>\n ";
      mysqli_free_result($result);
      }
    }
    mysqli_close($conn);
    }
  }
}
    ?>

    <?php

    if (isset($_POST["order"])){
	  $orderQuery = trim($_POST["order"]);
    if (!$orderQuery == "") {

    require_once ("settings.php");

    $conn = @mysqli_connect($host,
    	$user,
    	$pwd,
    	$sql_db
  	);

    if (!$conn) {
      echo"<p>Database connection failure</p>";
    } else if ($orderQuery == "pending") {

      $query = "SELECT order_id, order_date, order_status, first_name, last_name FROM $tableName WHERE order_status = 'PENDING'
                ORDER BY order_id, order_status";

      $result = mysqli_query($conn, $query);


    if (!$result) {
      echo"<p>Something is wrong with ", $query, "</p>";
    } else {
      echo"<h3>Results Found</h3>";
      echo"<table>";
      echo"<tr>\n "
          ."<th scope=\"col\">Order ID </th>\n"
          ."<th scope=\"col\">Order Date</th>\n"
          ."<th scope=\"col\">Order status</th>\n"
          ."<th scope=\"col\">Name</th>\n"
          ."<th scope=\"col\">Last Name</th>\n"
          ."</tr>\n";


          while ($row = mysqli_fetch_assoc($result)) {
            echo"<tr>\n ";
            echo"<td>", $row["order_id"], "</td>\n ";
            echo"<td>", $row["order_date"], "</td>\n ";
            echo"<td>", $row["order_status"], "</td>\n ";
            echo"<td>", $row["first_name"], "</td>\n ";
            echo"<td>", $row["last_name"], "</td>\n ";
            echo"</tr>\n ";
          }

          echo"</table>\n ";
          mysqli_free_result($result);
        }
      } else if ($orderQuery == "fulfilled") {

        $query = "SELECT order_id, order_date, order_status, first_name, last_name FROM $tableName WHERE order_status = 'FULFILLED'
                  ORDER BY order_id, order_status";

        $result = mysqli_query($conn, $query);


      if (!$result) {
        echo"<p>Something is wrong with ", $query, "</p>";
      } else {
        echo"<h3>Results Found</h3>";
        echo"<table>";
        echo"<tr>\n "
            ."<th scope=\"col\">Order ID </th>\n"
            ."<th scope=\"col\">Order status</th>\n"
            ."<th scope=\"col\">Order Date</th>\n"
            ."<th scope=\"col\">Name</th>\n"
            ."<th scope=\"col\">Last Name</th>\n"
            ."</tr>\n";


            while ($row = mysqli_fetch_assoc($result)) {
              echo"<tr>\n ";
              echo"<td>", $row["order_id"], "</td>\n ";
              echo"<td>", $row["order_date"], "</td>\n ";
              echo"<td>", $row["order_status"], "</td>\n ";
              echo"<td>", $row["first_name"], "</td>\n ";
              echo"<td>", $row["last_name"], "</td>\n ";
              echo"</tr>\n ";
            }

            echo"</table>\n ";
            mysqli_free_result($result);
          }
        } else if ($orderQuery == "paid") {

          $query = "SELECT order_id, order_date, order_status, first_name, last_name FROM $tableName WHERE order_status = 'PAID'
                    ORDER BY order_id, order_status";

          $result = mysqli_query($conn, $query);


        if (!$result) {
          echo"<p>Something is wrong with ", $query, "</p>";
        } else {
          echo"<h3>Results Found</h3>";
          echo"<table>";
          echo"<tr>\n "
              ."<th scope=\"col\">Order ID </th>\n"
              ."<th scope=\"col\">Order status</th>\n"
              ."<th scope=\"col\">Order Date</th>\n"
              ."<th scope=\"col\">Name</th>\n"
              ."<th scope=\"col\">Last Name</th>\n"
              ."</tr>\n";


              while ($row = mysqli_fetch_assoc($result)) {
                echo"<tr>\n ";
                echo"<td>", $row["order_id"], "</td>\n ";
                echo"<td>", $row["order_date"], "</td>\n ";
                echo"<td>", $row["order_status"], "</td>\n ";
                echo"<td>", $row["first_name"], "</td>\n ";
                echo"<td>", $row["last_name"], "</td>\n ";
                echo"</tr>\n ";
              }

              echo"</table>\n ";
              mysqli_free_result($result);
            }
          } else if ($orderQuery == "archived") {

            $query = "SELECT order_id, order_date, order_status, first_name, last_name FROM $tableName WHERE order_status = 'ARCHIVED'
                      ORDER BY order_id, order_status";

            $result = mysqli_query($conn, $query);


          if (!$result) {
            echo"<p>Something is wrong with ", $query, "</p>";
          } else {
            echo"<h3>Results Found</h3>";
            echo"<table>";
            echo"<tr>\n "
                ."<th scope=\"col\">Order ID </th>\n"
                ."<th scope=\"col\">Order status</th>\n"
                ."<th scope=\"col\">Order Date</th>\n"
                ."<th scope=\"col\">Name</th>\n"
                ."<th scope=\"col\">Last Name</th>\n"
                ."</tr>\n";


                while ($row = mysqli_fetch_assoc($result)) {
                  echo"<tr>\n ";
                  echo"<td>", $row["order_id"], "</td>\n ";
                  echo"<td>", $row["order_date"], "</td>\n ";
                  echo"<td>", $row["order_status"], "</td>\n ";
                  echo"<td>", $row["first_name"], "</td>\n ";
                  echo"<td>", $row["last_name"], "</td>\n ";
                  echo"</tr>\n ";
                }

                echo"</table>\n ";
                mysqli_free_result($result);
              }
        mysqli_close($conn);
        }
      }
    }

    ?>

    <?php

    if (isset ($_POST["airline"])) {
    $airlineQuery = trim($_POST["airline"]);
    if (!$airlineQuery=="") {

    require_once ("settings.php");

    $conn = @mysqli_connect($host,
    	$user,
    	$pwd,
    	$sql_db
  	);

    if (!$conn) {
      echo"<p>Database connection failure</p>";
    } else {

      $query =  "SELECT order_id, order_date, flight_dpt, order_status FROM $tableName WHERE flight_dpt like  '$airlineQuery%'
                 ORDER BY order_id, flight_dpt";

      $result = @mysqli_query($conn, $query);

    if (!$result) {
      echo"<p>Something is wrong with ", $query, "</p>";
    } else {

    if(mysqli_num_rows($result)>0) {

      echo"<h3>Results Found</h3>";
      echo"<table>";
      echo"<tr>\n "
          ."<th scope=\"col\">Order ID </th>\n"
          ."<th scope=\"col\">Order Date</th>\n"
          ."<th scope=\"col\"> Flight </th>\n"
          ."<th scope=\"col\">Order status</th>\n"
          ."</tr>\n";



      while ($row = mysqli_fetch_assoc($result)) {
        echo"<tr>\n ";
        echo"<td>", $row["order_id"], "</td>\n ";
        echo"<td>", $row["order_date"], "</td>\n ";
        echo"<td>", $row["flight_dpt"], "</td>\n ";
        echo"<td>", $row["order_status"], "</td>\n ";
        echo"</tr>\n ";
      }

      echo"</table>\n ";
      mysqli_free_result($result);
      }
    }
    mysqli_close($conn);
    }
  }
}
    ?>

    <?php

    if (isset ($_POST["cost"])) {
    $costQuery = trim($_POST["cost"]);
    if (!$costQuery=="") {

    require_once ("settings.php");

    $conn = @mysqli_connect($host,
    	$user,
    	$pwd,
    	$sql_db
  	);

    if (!$conn) {
      echo"<p>Database connection failure</p>";
    } else if ($costQuery == "highprice") {

      $query =  "SELECT order_id, order_date, order_cost FROM $tableName ORDER BY order_cost DESC";

    $result = @mysqli_query($conn, $query);

    if (!$result) {
      echo"<p>Something is wrong with ", $query, "</p>";
    } else {

    if(mysqli_num_rows($result)>0) {

      echo"<h3>Results Found</h3>";
      echo"<table>";
      echo"<tr>\n "
          ."<th scope=\"col\">Order ID </th>\n"
          ."<th scope=\"col\">Order Date</th>\n"
          ."<th scope=\"col\"> Order Cost </th>\n"
          ."</tr>\n";



      while ($row = mysqli_fetch_assoc($result)) {
        echo"<tr>\n ";
        echo"<td>", $row["order_id"], "</td>\n ";
        echo"<td>", $row["order_date"], "</td>\n ";
        echo"<td>", $row["order_cost"], "</td>\n ";
        echo"</tr>\n ";
      }

      echo"</table>\n ";
      mysqli_free_result($result);
      }
    }
  } else if ($costQuery == "lowprice") {

       $query =  "SELECT order_id, order_date, order_cost FROM $tableName ORDER BY order_cost ASC";

     $result = @mysqli_query($conn, $query);

     if (!$result) {
       echo"<p>Something is wrong with ", $query, "</p>";
     } else {

     if(mysqli_num_rows($result)>0) {

       echo"<h3>Results Found</h3>";
       echo"<table>";
       echo"<tr>\n "
           ."<th scope=\"col\">Order ID </th>\n"
           ."<th scope=\"col\">Order Date</th>\n"
           ."<th scope=\"col\"> Order Cost </th>\n"
           ."</tr>\n";

       while ($row = mysqli_fetch_assoc($result)) {
         echo"<tr>\n ";
         echo"<td>", $row["order_id"], "</td>\n ";
         echo"<td>", $row["order_date"], "</td>\n ";
         echo"<td>", $row["order_cost"], "</td>\n ";
         echo"</tr>\n ";
       }

       echo"</table>\n ";
       mysqli_free_result($result);
    }
    mysqli_close($conn);
    }
   }
  }
}
    ?>

    <?php

    if (isset($_POST["order_id_up"])){
	  $idQuery = trim($_POST["order_id_up"]);
    if (isset($_POST["status"])){
	  $statusQuery = trim($_POST["status"]);
    if (!$statusQuery == "" AND !$idQuery == "" ) {

    require_once ("settings.php");

    $conn = @mysqli_connect($host,
    	$user,
    	$pwd,
    	$sql_db
  	);

    $tableName = "booking_orders";


    if (!$conn) {
      echo"<p>Database connection failure</p>";
    } else if ($statusQuery == "pending") {


      $query =  "UPDATE $tableName SET order_status = 'PENDING' WHERE order_id = '$idQuery'";

      $result = @mysqli_query($conn, $query);


      if (!$result) {
      echo"<p>Something is wrong with ", $query, "</p>";
      } else {
      echo"<p>Order status Successfully updated</p>";
      }
      } else if ($statusQuery == "fulfilled") {


      $query =  "UPDATE $tableName SET order_status = 'FULFILLED' WHERE order_id = '$idQuery'";

      $result = @mysqli_query($conn, $query);

      if (!$result) {
      echo"<p>Something is wrong with ", $query, "</p>";
      } else {
      echo"<p>Order status Successfully updated</p>";
      }
      } else if ($statusQuery == "paid") {


      $query =  "UPDATE $tableName SET order_status = 'PAID' WHERE order_id = '$idQuery'";

      $result = @mysqli_query($conn, $query);

      if (!$result) {
      echo"<p>Something is wrong with ", $query, "</p>";
      } else {
      echo"<p>Order status Successfully updated</p>";
      }
      } else if ($statusQuery == "archived") {


      $query =  "UPDATE $tableName SET order_status = 'ARCHIVED' WHERE order_id = '$idQuery'";

      $result = @mysqli_query($conn, $query);

    if (!$result) {
    echo"<p>Something is wrong with ", $query, "</p>";
    } else {
    echo"<p>Order status Successfully updated</p>";
    }
      mysqli_close($conn);
    }
   }
  }
 }
    ?>

    <?php

    if (isset($_POST["order_id_cancel"])){
	  $cancelQuery = trim($_POST["order_id_cancel"]);
    if (!$cancelQuery == "") {

    require_once ("settings.php");

    $conn = @mysqli_connect($host,
    	$user,
    	$pwd,
    	$sql_db
  	);

    $tableName = "booking_orders";


    if (!$conn) {
      echo"<p>Database connection failure</p>";
    } else  {

      $query =  "DELETE FROM $tableName WHERE order_status = 'PENDING' AND order_id = '$cancelQuery' ";

      $result = mysqli_query($conn, $query);

      if (!$result) {
      echo"<p>Something is wrong with ", $query, "</p>";
      } else if ($result) {
      echo"<p>Order Successfully cancelled</p>";
      } else  {
      echo"<p>Error: Order cannot be cancelled, please check order status</p>";
      }
    mysqli_close($conn);
    }
  }
}

    ?>

    
    </section>

    <?php include_once ("includes/footer.inc"); ?>
    </article>
  </body>
  </html>
