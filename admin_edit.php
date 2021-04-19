<?php 

include("dbconn.inc.php");  
include("shared.php"); 

$conn = dbConnect();

$outputString = $_COOKIE["cookieArr"];
$outputArr = explode(',', $outputString);



$FirstName = $outputArr[0];
$LastName =$outputArr[1];
$Email = $outputArr[2];
$PhoneNumber = $outputArr[3];
$DonationType = $outputArr[4];
$DonationDetail = $outputArr[5];

//if (isset($_POST['Submit'])) { 


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
//} else {
	//$output = "<div class='error'>Please begin your product managment operation from the <a href='admin_linkList.php'>Admin page</a>.</div>";
//}

header("Location: http://ctec4321.tkn7277.uta.cloud/naf/donation.html");
die();


?>

<?php 
	print $HTMLHeader; 
?>
<header>
</header>



<main class='flexboxContainer'>
    
    <div>   
       
    </div>

</main>


</body>
</html>