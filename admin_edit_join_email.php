<?php

include("dbconn.inc.php");
include("shared_admin.php");

$conn = dbConnect();



$outputString = $_COOKIE["cookieArrJoinlist"];
$outputArr = explode(',', $outputString, 6);

//print_r($outputArr);

$ELFirstName = $outputArr[0];
$ELLastName =$outputArr[1];
$ELEmail = $outputArr[2];


print($outputArr);

	$stmt = $conn->stmt_init();

	$sql = "INSERT INTO NAFEmailList (ELFirstName, ELLastName, ELEmail) VALUES (?, ?, ?)";

	if ($stmt->prepare($sql)){

			$stmt->bind_param ('sss', $ELFirstName, $ELLastName, $ELEmail);
			$stmt_prepared = 1;
	}

	if ($stmt_prepared == 1){

		if ($stmt->execute()){

			$output = "<span class='success'>Success!</span><p>The following information has been saved in the database:</p>";

			if (!empty($ELEmail)) {
				$emailEL = "<a href=mailto:$ELEmail>$ELEmail</a>"; }
			$to="kathryn.kerr@mavs.uta.edu, $ELEmail"; // change this to your own email address
			$subject="You have subscribed to the Neuro Assistance Foundation Newsletter";
			$header="From: Neuro Assistance Foundation Newsletter <naf@gmail.com>";
			$message="Hi $ELFirstName $ELLastName,
			Thank you for your interest in the Neuro Assitance Foundation! You have signed up to receive our monthly newsletters, if you would like to opt out you may unsubscribe at any time.
		  Thank you,
			Neuro Assitance Team
			";
	// try setting $message = $output; and see what you receive in the email

	$mailSent = mail($to,$subject,$message,$header);

	// add $emailResultMessage to the comment preview table as the final output
	$output = $output.$emailResultMessage;
		} else {

				$ouput = "<div class='error'>Database operation failed.  Please contact the webmaster.</div>";
		}

	} else {

		$output = "<div class='error'>Database query failed.  Please contact the webmaster.</div>";
	}

function GoToNow ($url){
echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
}

 $url = "http://ctec4350.krk1266.uta.cloud/naf/thankyou.php";
 GoToNow($url);

?>
