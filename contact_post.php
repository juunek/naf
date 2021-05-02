<?php
include("shared.php");
print($htmlNav);
$firstnameC = $_POST['firstname'];
$lastnameC = $_POST['lastname'];
$emailC = $_POST['email'];
$adminemailC = 'kkerr98@sbcglobal.net';
$phoneC = $_POST['phone'];
$subjectC = $_POST['subject'];
$messageC = $_POST['message'];

if (array_key_exists("submit", $_POST)) {
		/*if (!empty($emailC)) {
			$emailC = "<a href=mailto:$emailC>$emailC</a>"; }*/

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
	$output = "<h1>Please use <a href='shoppingcart.php'>this form</a> to make an order.</h1>";
}
  print($output);
  print($htmlFooter);

?>
