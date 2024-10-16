<?php

require_once 'dbconfig.php';  

function insertIntoFlightAttendantRecords($pdo, $first_name, $last_name, $gender, $age, $birthday, $email, $experience) {
   
    $sql = "INSERT INTO flight_attendant_applicants 
            (first_name, last_name, gender, age, birthday, email, experience) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $gender, $age, $birthday, $email, $experience]);
}

function seeAllApplicants($pdo) {
    $sql = "SELECT * FROM flight_attendant_applicants";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute()) {
        return $stmt->fetchAll();
    }
    
    return [];
}

function getApplicantByID($pdo, $applicant_id) {
    $sql = "SELECT * FROM flight_attendant_applicants WHERE applicantID = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$applicant_id])) {
        return $stmt->fetch(); 
    }
    
    return null;  
}

function updateApplicant($pdo, $applicant_id, $first_name, $last_name, $gender, $age, $birthday, $email, $experience) {
    $sql = "UPDATE flight_attendant_applicants 
            SET first_name = ?, 
                last_name = ?, 
                gender = ?, 
                age = ?, 
                birthday = ?, 
                email = ?, 
                experience = ? 
            WHERE applicantID = ?";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $gender, $age, $birthday, $email, $experience, $applicant_id]);
}

function deleteApplicant($pdo, $applicant_id) {
    $sql = "DELETE FROM flight_attendant_applicants WHERE applicantID = ?";
    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute([$applicant_id]);  
}

?>
