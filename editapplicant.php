<?php require_once 'core/dbconfig.php'; ?>
<?php require_once 'core/model.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Applicant</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
			margin-bottom: 10px;
		}
		table, th, td {
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<?php 
	$applicantId = $_GET['applicant_id']; // Get the applicant ID from the URL
	$getApplicantByID = getApplicantByID($pdo, $applicantId); 

	if (!$getApplicantByID) {
		echo "<p>Applicant not found.</p>"; // Display a message if the applicant is not found
		exit; // Stop execution
	}
	?>
	<form action="core/handleForms.php" method="POST">
		<input type="hidden" name="applicant_id" value="<?php echo htmlspecialchars($applicantId); ?>"> <!-- Hidden input for applicant ID -->
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo htmlspecialchars($getApplicantByID['first_name']); ?>" required>
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo htmlspecialchars($getApplicantByID['last_name']); ?>" required>
		</p>
		<p>
			<label for="gender">Gender</label>
			<input type="text" name="gender" value="<?php echo htmlspecialchars($getApplicantByID['gender']); ?>" required>
		</p>
		<p>
			<label for="age">Age</label>
			<input type="number" name="age" value="<?php echo htmlspecialchars($getApplicantByID['age']); ?>" required>
		</p>
		<p>
			<label for="birthday">Birthday</label>
			<input type="date" name="birthday" value="<?php echo htmlspecialchars($getApplicantByID['birthday']); ?>" required>
		</p>
		<p>
			<label for="email">Email</label>
			<input type="email" name="email" value="<?php echo htmlspecialchars($getApplicantByID['email']); ?>" required>
		</p>
		<p>
			<label for="experience">Experience</label>
			<input type="number" name="experience" value="<?php echo htmlspecialchars($getApplicantByID['experience']); ?>" required>
		</p>
		<p>
			<input type="submit" name="editApplicantBtn" value="Update Applicant">
		</p>
	</form>
</body>
</html>
