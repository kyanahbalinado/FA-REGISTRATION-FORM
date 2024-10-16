<?php

require_once 'dbconfig.php';  
require_once 'model.php';    

if (isset($_POST['insertNewApplicantBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $age = trim($_POST['age']);
    
    $birthday = trim($_POST['birthday']);
    $email = trim($_POST['email']);
    $experience = trim($_POST['experience']);

    // Check if all required fields are filled
    if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($birthday) && !empty($email) && !empty($experience)) {
        $query = insertIntoFlightAttendantRecords($pdo, $firstName, $lastName, $gender, $age, $birthday, $email, $experience);

        if ($query) {
            header("Location: ../index.php");
            exit; // Ensure script exits after redirect
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['editApplicantBtn'])) {
    $applicant_id = trim($_POST['applicant_id']); // Getting applicant ID from POST
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $age = trim($_POST['age']);
    $birthday = trim($_POST['birthday']); // Capture birthday
    $email = trim($_POST['email']);
    $experience = trim($_POST['experience']);

    if (!empty($applicant_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($birthday) && !empty($email) && !empty($experience)) {
        // Call to update function with all required fields
        $query = updateApplicant($pdo, $applicant_id, $firstName, $lastName, $gender, $age, $birthday, $email, $experience);

        if ($query) {
            header("Location: ../index.php");
            exit(); // Make sure to exit after a header redirect
        } else {
            echo "Update failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['deleteApplicantBtn'])) {
    if (isset($_GET['applicant_id'])) { // Ensure applicant ID is accessed correctly
        $applicant_id = trim($_GET['applicant_id']); // Keep this as $_GET
        $query = deleteApplicant($pdo, $applicant_id);

        if ($query) {
            header("Location: ../index.php");
            exit(); // Make sure to exit after a header redirect
        } else {
            echo "Deletion failed";
        }
    } else {
        echo "Applicant ID is required.";
    }
}

?>
