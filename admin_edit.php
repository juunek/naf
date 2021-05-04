<?php 

include("dbconn.inc.php");  
include("shared_admin.php"); 

$conn = dbConnect();



$outputString = $_COOKIE["cookieArr"];
$outputArr = explode(',', $outputString);



$FirstName = $outputArr[0];
$LastName =$outputArr[1];
$Email = $outputArr[2];
$PhoneNumber = $outputArr[3];
$DonationType = $outputArr[4];
$DonationDetail = $outputArr[5];




	$stmt = $conn->stmt_init();

	$sql = "INSERT INTO NAFDonation (FirstName, LastName, Email, PhoneNumber, DonationType, DonationDetail) VALUES (?, ?, ?, ?, ?, ?)";

	if ($stmt->prepare($sql)){
			
			$stmt->bind_param ('ssssss', $FirstName, $LastName, $Email, $PhoneNumber, $DonationType, $DonationDetail);
			$stmt_prepared = 1;
	}

	if ($stmt_prepared == 1){ 

		if ($stmt->execute()){

			$output = "<span class='success'>Success!</span><p>The following information has been saved in the database:</p>";
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


