<?php
  include("dbconn.inc.php");
  include("shared.php");
  $conn = dbConnect();
  print($htmlNav);
?>
<?php
print("<div class='container'>");


	print("<h1 class='my-5 text-center header-blue'>Giving Thanks</h1>

  <div class='row mb-4'>
      <div class='col-md-10 mx-auto'>


      <div class='row' id='volunteer-banner'>

         <img src='img/giving-thanks-hero-van.png' width='100%' id='volunteer-img'>

        <div class='col-md-12 bg-naf-blue' id='volunteer-text'>
            <h4>Volunteer today! You CAN make a difference!</h4>
            <p class='text-white'>Volunteers are vital to the mission of Neuro Assistance Foundation. We are looking for volunteers in numerous capacities. Whether you would like to assist with a special NAF event, spread the word about NAF, or help us raise valuable financial support—we need your help!</p>
        </div>
      </div>

       </div>
  </div>");

	$sql = "SELECT GTID, GTImage, GTAdditionalImage, GTHeader, GTDetails, GTPersonName, GTPersonDetails FROM GivingThanks";

/* create a prepared statement */
$stmt = $conn->stmt_init();

if ($stmt->prepare($sql)) {

	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($GTID, $GTImage, $GTAdditionalImage, $GTHeader, $GTDetails, $GTPersonName, $GTPersonDetails);

	print ("<div>");

	/* fetch values */
	while ($stmt->fetch()) {
		print ("<div class='col-md-10 mx-auto row py-4'>
    <div class='col-md-4'>
      <img class='cover mb-5' src='img/$GTImage'  alt='$GTHeader' Image title= '$GTHeader Image'>
      <img class='cover' src='img/$GTAdditionalImage'  alt='Additional $GTHeader Image' title= Additional '$GTHeader Image'>
    </div>
     <div class='d-flex align-items-start flex-column col-md-8'>
     <h3 class='events-mobile-spacing header-blue'>$GTHeader</h3><p class='cover'>$GTDetails</p>
     <h4>$GTPersonName</h4><p>$GTPersonDetails</p>
     </div>
     </div>");
}
print ("</div>");

/* close statement */
$stmt->close();

} else {
print ("query failed");
}

print("</div>");

$conn->close();
?>
<?php
  print($htmlFooter);
?>
