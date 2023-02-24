

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

	<section id = "managerlogin">
	<h2>Manager Log-in</h2>
	<form method="post" action="enhancements1.php">
	<fieldset>
		<p>	<label for="manager">Manager ID: </label>
			<input type="text" name="manager" id="manager" /></p>
		<p>	<label for="lastname">Last Name: </label>
			<input type="text" name="lastname" id="lastname" /></p>
		<p>	<input class="buttonform" type="submit" value="Log In" /></p>
	</fieldset>
	</form>
</section>
<?php
    if (isset($_POST["lastname"]) && isset($_POST["manager"])){
	$lastname	= trim($_POST["lastname"]);
	$managerId	= trim($_POST["manager"]);
	if ((!$lastname=="") && (!$managerId=="")){

 	require_once('settings.php');

	$conn = mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);


	if (!$conn) {
		echo "<p>Database connection failure</p>";
	} else {

		$tableName = "manager_login";

		// Set up the SQL command to add the data into the table
		$query = "SELECT 	employee_id, last_name  FROM $tableName WHERE employee_id = '$managerId' and last_name = '$lastname' order by employee_id, last_name";

		$result = mysqli_query($conn, $query);


		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else if ($managerId == "104955") {
			header ("location:manage.php");
		} else {
			echo "<p>Invalid password, please insert valid credentials</p>";
		}
	 }
 }
 mysqli_close($conn);
}

?>
		<?php include_once ("includes/footer.inc"); ?>
		</article>
	</body>
</html>
