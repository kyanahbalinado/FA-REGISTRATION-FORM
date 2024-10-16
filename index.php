<?php 
require_once 'core/dbconfig.php'; 
require_once 'core/model.php';   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Attendant Registration Form</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
        }
        input, select {
            font-size: 1.2em;
            height: 30px;
            width: 250px;
            margin-bottom: 10px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3>Flight Attendant Registration Form</h3>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="firstName">First Name:</label> 
            <input type="text" name="firstName" required>
        </p>
        <p>
            <label for="lastName">Last Name:</label> 
            <input type="text" name="lastName" required>
        </p>
        <p>
            <label for="gender">Gender:</label> 
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </p>
        <p>
            <label for="age">Age:</label> 
            <input type="number" name="age" required>
        </p>
        <p>
            <label for="birthday">Birthday:</label> 
            <input type="date" name="birthday" required>
        </p>
        <p>
            <label for="email">Email:</label> 
            <input type="email" name="email" required>
        </p>
        <p>
            <label for="experience">Experience (Years):</label> 
            <input type="number" name="experience" required>
        </p>
        <p>
            <input type="submit" name="insertNewApplicantBtn" value="Submit">
        </p>
    </form>

    <table style="width:80%; margin-top: 50px;">
        <tr>
            <th>Applicant ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Birthday</th>
            <th>Email</th>
            <th>Experience</th>
            <th>Action</th>
        </tr>

        <?php 
        $seeAllApplicants = seeAllApplicants($pdo);  
        if (!empty($seeAllApplicants)) {
            foreach ($seeAllApplicants as $row) { 
        ?>
        <tr>
            <td><?php echo htmlspecialchars($row['applicantID']); ?></td>
            <td><?php echo htmlspecialchars($row['first_name']); ?></td>
            <td><?php echo htmlspecialchars($row['last_name']); ?></td>
            <td><?php echo htmlspecialchars($row['gender']); ?></td>
            <td><?php echo htmlspecialchars($row['age']); ?></td>
            <td><?php echo htmlspecialchars($row['birthday']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['experience']); ?> years</td>
            <td>
                <a href="editapplicant.php?applicant_id=<?php echo $row['applicantID']; ?>">Edit</a>
                <a href="deleteapplicant.php?applicant_id=<?php echo $row['applicantID']; ?>">Delete</a>
            </td>
        </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='9'>No applicants found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
