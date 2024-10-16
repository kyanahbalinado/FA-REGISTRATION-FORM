<?php  

if (isset($_GET['applicantName'])) {
	echo "<h2>Applicant Name: " . $_GET['applicantName']. "</h2>";
}

if (isset($_GET['age'])) {
	echo "<h2>Age: " . $_GET['age'] . "</h2>";
}
?>