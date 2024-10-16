<?php require_once 'core/dbconfig.php'; ?>
<?php require_once 'core/model.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Applicant</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
        }
        input {
            font-size: 1.5em;
            height: 50px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h1>Are you sure you want to delete this applicant?</h1>
    <?php 
    $applicantId = $_GET['applicant_id']; 
    $getApplicantByID = getApplicantByID($pdo, $applicantId); 

    if (!$getApplicantByID) {
        echo "<p>Applicant not found.</p>"; 
        exit; 
    }
    ?>
    <form action="core/handleForms.php?applicant_id=<?php echo htmlspecialchars($applicantId); ?>" method="POST">
        <div>
            <p>First Name: <?php echo htmlspecialchars($getApplicantByID['first_name']); ?></p>
            <p>Last Name: <?php echo htmlspecialchars($getApplicantByID['last_name']); ?></p>
            <p>Gender: <?php echo htmlspecialchars($getApplicantByID['gender']); ?></p>
            <p>Age: <?php echo htmlspecialchars($getApplicantByID['age']); ?></p>
            <p>Birthday: <?php echo htmlspecialchars($getApplicantByID['birthday']); ?></p>
            <p>Email: <?php echo htmlspecialchars($getApplicantByID['email']); ?></p>
            <p>Experience: <?php echo htmlspecialchars($getApplicantByID['experience']); ?> years</p>
            <input type="submit" name="deleteApplicantBtn" value="Delete">
        </div>
    </form>
</body>
</html>
