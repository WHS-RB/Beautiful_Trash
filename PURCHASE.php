<html>
	<h1> Data sent... <br></h1>
</html>

<?php
	function securecheck($form){
		$form = trim($form);
		$form = stripslashes($form);
		$form = htmlspecialchars($form);
		return $form;
	}
	$name = $school = $email = "";
	$nameError = $schoolError = $emailError = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") { //Validate
		if (empty($_POST["name"])) {
    			$nameError = "Name is required";
  		}
		else{
    			$name = securecheck($_POST["name"]); //Sanitize
		}
		if(preg_match("/[^a-z\s-]/i",$name)){ //Check if name is realistic
			$nameError = "Only letters, spaces, and dashes allowed";
		}
	//Repeat for school & email

		if (empty($_POST["school"])) {
    			$schoolError = "School is required";
  		}
		else{
    			$school = securecheck($_POST["school"]);
		}
		if(preg_match("/[^a-z\s-]/i",$name)){
			$nameError = "Only letters, spaces, and dashes allowed";
		}


		if (empty($_POST["email"])) {
    			$emailError = "Email is required";
  		}
		else{
    			$email = securecheck($_POST["email"]);
		}
   		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			$emailErr = "Invalid email format"; 
    		}
	}

	$host = "avp-hs.org"; //SQL Stuff Starts
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "NWAPW 2018";
	$connec = new mysqli($host,$dbusername,$dbpassword,$dbname); //Connect to DB
	if(!$connec){
		die("Connect error: ".mysqli_connect_errno().mysqli_connect_error());
	}
	else{
		echo "Connected successfully...";
	}
	

?>