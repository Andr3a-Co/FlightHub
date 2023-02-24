<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Flight Booking Assignment 1" />
    <meta name="keywords"    content="HTML,Tags" />
    <meta name="author"      content="Andrea Espitia" />
        <!--Viewport set to scale 1.0-->
    <script src="enhancements2.js"></script>
    <link href="styles/csst.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="styles/style.css" rel="stylesheet"/>
    <link href="styles/enhancements.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <title>Flight Booking - FlightHub</title>
  </head>
  <body>
  <article>
    <?php include_once ("includes/header.inc"); ?>
    <?php include_once ("includes/menu.inc"); ?>

    <section id="about">
      <h2 class="head_about">Student information details</h2>
        <figure>
          <img class="imgabout" src="images/myphoto.jpg" alt="My_Photo"/>
          <figcaption>Andrea Espitia</figcaption>
        </figure>
        <dl class="lists">
          <dt class="aboutlistdt">Name: </dt>
          <dd class="aboutlistdd">Andrea Espitia</dd>
          <dt class="aboutlistdt">Student ID: </dt>
          <dd class="aboutlistdd">s103165504</dd>
          <dt class="aboutlistdt">Course: </dt>
          <dd class="aboutlistdd">Bachelor of Computer Science</dd>
          <dt class="aboutlistdt">Email: </dt>
          <dd class="aboutlistdd"><a href="mailto:103165504@student.swin.edu.au">103165504@student.swin.edu.au</a></dd>
        </dl>
    </section>
    <aside id="aboutme">
      <p>Hi there! I am Andrea I am studying Computer Science at Swinburne University in Melbourne Australia
         I decided to change my occupation after three years of working as event planner<br/><br/>
         I am passionate about technology and web design I look forward to landing a job in web development.
         When not studying or coding I enjoy cooking, travelling around Australia and sharing time with my friends and family. </p>
    </aside>

    <section>
        <h2 class="head_about">Timetable Details</h2>
        <table id="table_about">
          <thead class="t_heads">
            <tr>
              <th scope="col">Day/Time</th>
              <th scope="col">Monday</th>
              <th scope="col">Tuesday</th>
              <th scope="col">Wednesday</th>
              <th scope="col">Thursady</th>
              <th scope="col">Friday</th>
            </tr>
          </thead>
          <tbody id="tbody_about">
            <tr>
              <th class="t_heads" scope="row">8:30</th>
              <td class="emptycells" colspan="3"></td>
              <td class="COS4" rowspan="4">TNE10005 <br/>Network Administration Practical 1 <span class="tooltiptext">08:30am to 11:30am</span></td>
              <td class="emptycells"></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row">9:30</th>
              <td class="emptycells" colspan="3"></td>
              <td class="emptycells"></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row">10:30</th>
              <td class="emptycells" colspan="1"></td>
              <td class="COS2" rowspan="3"> COS10009 <br/>Introduction to Programming <span class="tooltiptext">10:00am to 12:00pm</span></td>
              <td class="emptycells" colspan="1"></td>
              <td class="COS2" rowspan="3"> COS10009 <br/> Workshop 1 Introduction to Programming<span class="tooltiptext2">10:30am to 12:30pm</span></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row">11:30</th>
              <td class="COS1" rowspan="3"> COS10011 <br/>Creating Web Applications <span class="tooltiptext">11:30am to 01:30pm</span></td>
              <td class="emptycells"></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row">12:30</th>
              <td class="emptycells" colspan="1"></td>
              <td class="COS3" rowspan="3"> COS10003 <br/>Tutorial 1 Computer & Logic Essentials <span class="tooltiptext">12:30pm to 02:30pm</span></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row" >01:30 pm</th>
              <td class="COS1"> COS10011 <br/>Lab1 Creating Web Applications <span class="tooltiptext2">12:30pm to 01:30pm</span></td>
              <td class="COS3" rowspan="3"> COS10003 <br/>Computer & Logic Essentials <span class="tooltiptext2">01:00pm to 03:00pm</span></td>
              <td class="COS2" rowspan="3"> COS10009 <br/>Tutorial 2 Introduction to Programming <span class="tooltiptext3">12:30pm to 02:30pm</span> </td>
            <tr>
              <th class="t_heads" scope="row" >02:30 pm</th>
              <td class="emptycells"></td>
              <td class="emptycells"></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row" >03:30 pm</th>
              <td class="emptycells" colspan="2"></td>
              <td class="emptycells"></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row" >04:30 pm</th>
              <td class="emptycells" colspan="5"></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row" >05:30 pm</th>
              <td class="emptycells" colspan="5"></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row" >06:30 pm</th>
              <td class="emptycells" colspan="3"></td>
              <td class="COS4" rowspan="3"> TNE10005 <br/> Network Administration <span class="tooltiptext2">06:30pm to 08:30pm</span></td>
              <td class="emptycells"></td>
            <tr>
              <th class="t_heads" scope="row" >07:30 pm</th>
              <td class="emptycells" colspan="3"></td>
              <td class="emptycells"></td>
            </tr>
            <tr>
              <th class="t_heads" scope="row" >08:30 pm</th>
              <td class="emptycells" colspan="3"></td>
              <td class="emptycells"></td>
            </tr>
            </tbody>
          </table>
      </section>
      <?php include_once ("includes/footer.inc"); ?>
</article>
 </body>
</html>
