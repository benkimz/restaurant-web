<?php
require("serverd.php");
define('db', "restaurant_infinity");

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["submit"])){
		$email = htmlspecialchars(
			stripslashes(
				trim($_POST["email"])
			)
		);
		
		class SubscribeToNewsletters extends smtdata{
			public function __construct($email){
				parent::__construct();
				if(self::enterData(array("EmailAddress" => $email), db.".newsletters") === true){
					exit("
					<center>
						Thank you for signing to our newsletters.<br/>
						<a href='../../'>Back to Home</a>
						</center>
					");
				}else{
					echo "Error";
				}
			}
		}
		
		$subscribe = new SubscribeToNewsletters($email);
	}
}
?>