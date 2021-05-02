<?php
include("shared.php");
print($htmlNav);
$firstnameC = $_POST['firstname'];
$lastnameC = $_POST['lastname'];
$emailC = $_POST['email'];
$adminemailC = 'kathryn.kerr@mavs.uta.edu';
$phoneC = $_POST['phone'];
$subjectC = $_POST['subject'];
$messageC = $_POST['message'];

if (array_key_exists("submit", $_POST)) {
	// after running through all expected fields, check the $missing array. if there is no required field missing, the $missing array will be empty.
  $required = array('firstnameC', 'lastnameC', 'emailC', 'subjectC', 'messageC');
  $expected = array('firstnameC', 'lastnameC', 'emailC', 'phoneC', 'subjectC', 'messageC');
  $missing = array();


if (empty($missing)){
		if (!empty($emailC)) {
			$emailC = "<a href=mailto:$emailC>$emailC</a>"; }

			$output="<h1>We've Received Your Message!</h1>";

		$output.="<div class = 'container'><p>Thank you <span class='resEmphasis'>$firstnameC</span>, we'll have your order ready for pickup. </p> <p>Your confirmation number is:</p></div>";
		$to="$adminemailC, $emailC"; // change this to your own email address
		$subject=$subjectC;
		$header="From: bellavita@mysite.com";
		$message="$messageC";
// try setting $message = $output; and see what you receive in the email

$mailSent = mail($to,$subject,$message,$header);

// add $emailResultMessage to the comment preview table as the final output
$output = $output.$emailResultMessage;

	} else {

				$output = "<h3>Oops!</h3>\n
								<p>Our system is not able to process your request.  Please see the issues below.</p>\n";
	}
} else {
	$output = "Please use <a href='shoppingcart.php'>this form</a> to make an order.";
}
  print($output);
  print($htmlFooter);

?>
