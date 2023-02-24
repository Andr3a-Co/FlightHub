<?php

echo"<nav class='menu'>";
  echo"<ul>";
    echo"<li id= 'droplist4' class='menubtn4'><a href='#'>Flights</a>";
      echo"<ul id='flights_list' class='flightlist'>";
        echo"<li><a href='enquire.php#section2'>Flight Options</a></li>";
        echo"<li><a href='enquire.php#extra_opt'>Baggage & Extras</a></li>";
      echo"</ul>";
    echo"</li>";
    echo"<li id= 'droplist' class='menubtn'><a href='#'>Destinations</a>";
      echo"<ul id='destinations_list' class='menulist'>";
        echo"<li><a href='product.php#sectioncity1'>Melbourne</a></li>";
        echo"<li><a href='product.php#sectioncity2'>Adelaide</a></li>";
        echo"<li><a href='product.php#sectioncity3'>Brisbane</a></li>";
        echo"<li><a href='product.php#sectioncity4'>Sidney</a></li>";
      echo"</ul>";
    echo"</li>";
    echo"<li id='droplist2' class='menubtn2'><a href='#'>Last Deals</a>";
      echo"<ul id='deals_list' class='dealslist'>";
        echo"<li><a href='product.php#tabledeals'>Hot deals</a></li>";
        echo"<li><a href='enquire.php#flight_info'>Search Flights</a></li>";
      echo"</ul>";
    echo"</li>";
    echo"<li id='droplist3' class='menubtn3'><a href='#'>Get in touch</a>";
      echo"<ul id='contact_list' class='contactlist'>";
        echo"<li><a href='enquire.php#member'>MemberHub</a></li>";
        echo"<li><a href='enquire.php#contact'>Contact</a></li>";
        echo"<li><a href='product.php#about_us'>Who we are </a></li>";
      echo"</ul>";
    echo"</li>";
    echo"<li><a href='about.php#about'>Student</a></li>";
    echo"<li><a href='enhancements1.php'>Manager</a></li>";
  echo"</ul>";
 echo"</nav>";
  ?>
