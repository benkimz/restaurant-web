<?php
require("server.php");
define('db', "restaurant_infinity");


/*$r = new mysqli('db', 'MYSQL_USER', 'MYSQL_PASSWORD');

print_r($r);*/

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["submit"])){
		$name = $_POST["name"]; $email = $_POST["email"]; $phone = $_POST["phone"]; $guests = $_POST["number-guests"];
		$date = $_POST["date"]; $time = $_POST["time"]; $message = $_POST["message"];
		
		class MakeReservation extends smtdata{
			public function __construct($name, $email, $phone, $guests, $date, $time, $message){
				parent::__construct();
				if(self::enterData(array(
					"UserName" => $name, 
					"EmailAddress" => $email, 
					"PhoneNumber" => $phone, 
					"Guests" => $guests, 
					"DateTime" => $date, 
					"EventTime" => $time, 
					"Message" => $message			
				), db.".reservations") === true){
					exit("
					<center>
						Thank you for making a reservation with us.<br/>
						<a href='../../'>Back to Home</a>
						</center>
					");
				}else{
					echo "Error";
				}
			}
		}
		
		$reserve = new MakeReservation($name, $email, $phone, $guests, $date, $time, $message);
	}
}
?>