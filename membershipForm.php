
<?php
include('db_conn.php');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $fullName = $_POST['fullName'];
    
    // Handle the uploaded file
    $picture = $_FILES['picture'];
    $pictureName = $picture['name'];
    $pictureTmpName = $picture['tmp_name'];
    $pictureError = $picture['error'];

    // Initialize picture path variable
    $picturePath = '';

    // Define the target directory for uploads
    $targetDir = __DIR__ . "/uploads/";  // Absolute path

    // Check if the uploads directory exists, if not create it
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true); // Create the directory if it doesn't exist
    }

    // Check for file upload error
    if ($pictureError === 0) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($pictureTmpName, $targetDir . basename($pictureName))) {
            $picturePath = $targetDir . basename($pictureName); // Store the path for database
        } else {
            echo "<script>alert('Error moving the uploaded file.')</script>";
            exit; // Stop execution if the file can't be moved
        }
    } else {
        echo "<script>alert('Error during file upload: " . $pictureError . "')</script>";
        exit; // Stop execution if there's an upload error
    }

    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $maritalStatus = $_POST['maritalStatus'];
    $nationality = $_POST['nationality'];
    $education = $_POST['education'];
    $profession = $_POST['profession'];
    $emergencyContactName = $_POST['emergencyContactName'];
    $emergencyContact = $_POST['emergencyContact'];
    $team = $_POST['team'];

    // Handle departments
    $departments = isset($_POST['department']) ? implode(',', $_POST['department']) : '';

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO registration (Title, Fullname, Picture, Gender, Dob, Phone, Email, Address,
     MaritalStatus, Nationality, Education, Profession, EmergencyContactName, EmergencyContact, Team, Department)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("ssssssssssssssss", $title, $fullName, $picturePath, $gender, $dob, $phone, $email, $address,
     $maritalStatus, $nationality, $education, $profession, $emergencyContactName, $emergencyContact, $team, $departments);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Data inserted successfully')</script>";
    } else {
        echo "<script>alert('There is an error: " . $stmt->error . "')</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION FORM</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <section>
    <div class="membershipGrouping">
        <div class="fHeadings">
            <img src="coloredLogo.PNG" class="cLogo">
            <h1>CHRIST COMMONWEALTH COMMUNITY (CCC)</h1>
            <h3><span style="font-size: 1.2em;">Membership Registration Form</span></h3>
        </div>


    <form id="memberform" method="POST" enctype="multipart/form-data">
    <div class="fDetail"> 
        <input type="hidden" name="id" id="memberId">
        </div>

    <div class="fDetail">
        <label id="lbl">Title</label><br>
        <input type="radio" name="title" id="title1" class="custom-radio" value="mr">
        <label class="radio-label" for="title1">Mr.</label>
    
        <input type="radio" name="title" id="title2" class="custom-radio" value="mrs">
        <label class="radio-label" for="title2">Mrs.</label>

        <input type="radio" name="title" id="title3" class="custom-radio" value="miss">
        <label class="radio-label" for="title3">Miss</label>
    </div>

    <div class="fDetail">
        <label for="fullname" id="lbl">Full Name <span style="color: red;">*</span></label> <br><br>
            <input type="text" name="fullName" id="placeholder" required>
    </div>


    <div class="fDetail">
        <label for="picture-upload" id="lbl">Passport Size Picture<span style="color: red;">*</span></label><br>
        <div class="picture-placeholder"></div>
            <input type="file" id="picture-upload" name="picture" accept="image/*" required>
    </div>

    <div class="fDetail">
        <label id="lbl">Gender <span style="color: red;">*</span></label><br>

        <input type="radio" name="gender" id="gender1" class="custom-radio" value="male">
        <label class="radio-label" for="gender1">Male</label>
    
        <input type="radio" name="gender" id="gender2" class="custom-radio" value="female">
        <label class="radio-label" for="gender2">Female</label>
    </div>    

    <div class="fDetail">
        <label id="lbl">Date of Birth <span style="color: red;">*</span></label><br><br>
            <input type="date" id="placeholder" name="dob">
    </div>

    <div class="fDetail">
        <label id="lbl">Phone Number <span style="color: red;">*</span></label><br><br>
            <input type="text" name="number" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label id="lbl" >Email Address <span style="color: red;">*</span></label><br><br>
            <input type="email" name="email" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label id="lbl">Residential Address <span style="color: red;">*</span></label><br><br>
            <input type="text" name="address" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label id="lbl">Marital Status</label><br>
        <input type="radio" name="maritalStatus" id="status1" class="custom-radio" value="single">
        <label class="radio-label" for="status1">Single</label>
    
        <input type="radio" name="maritalStatus" id="status2" class="custom-radio" value="married">
        <label class="radio-label" for="status2">Married</label>
    </div>

    <div class="fDetail">
        <label id="lbl">Nationality <span style="color: red;">*</span></label><br><br>
            <input type="text" name="nationality" id="placeholder" required>
    </div>

<div class="fDetail">
    <label id="lbl">Educational Level</label><br>

        <input type="radio" name="education" id="education1" class="custom-radio" value="basic_education">
        <label class="radio-label" for="education1">Basic Education</label>
    
        <input type="radio" name="education" id="education2" class="custom-radio" value="secondary_education">
        <label class="radio-label" for="education2">Secondary Education</label>

        <input type="radio" name="education" id="education3" class="custom-radio" value="tertiary_education">
        <label class="radio-label" for="education3">Tertiary Education</label>
</div>

    <div class="fDetail">
        <label id="lbl">Profession <span style="color: red;">*</span></label><br><br>
            <input type="text" name="profession" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label id="lbl">Name of Emergency Contact <span style="color: red;">*</span></label><br><br>
            <input type="text" name="emergencyContactName" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label id="lbl">Emergency Contact <span style="color: red;">*</span></label><br><br>
            <input type="text" name="emergencyContact" id="placeholder" required>
    </div>

    <div class="fDetail">
        <label id="lbl">Name of your Team <span style="color: red;">*</span></label><br><br>
            <input type="text" name="team" id="placeholder" required>
    </div>

    <div class="fDetail">
    <label id="lbl">Auxiliary Department</label><br>
    <label>
        <input type="checkbox" name="department[]" value="lead_presbyter"> Lead Presbyter
    </label>
    <label>
        <input type="checkbox" name="department[]" value="pastoral_board"> Pastoral Board
    </label>
    <label>
        <input type="checkbox" name="department[]" value="board_of_deacons"> Board of Deacons
    </label>
    <label>
        <input type="checkbox" name="department[]" value="clergy_wives"> Clergy Wives
    </label>
    <label>
        <input type="checkbox" name="department[]" value="music_department"> Music Department
    </label>
    <label>
        <input type="checkbox" name="department[]" value="media_department"> Media Department
    </label>
    <label>
        <input type="checkbox" name="department[]" value="ushering_department"> Ushering Department
    </label>
    <label>
        <input type="checkbox" name="department[]" value="league_of_extraordinary_ladies"> League of Extraordinary Ladies
    </label>
    <label>
        <input type="checkbox" name="department[]" value="league_of_extraordinary_gentlemen"> League of Extraordinary Gentlemen
    </label>
</div>

    <button type="submit" name="submit" class="mfButton">Submit</button>
</form>
</div>
</section>
</main>
<footer>
    <p>&copy; 2024 Christ Commonwealth Community Membership Registration System</p>
</footer>
</body>
</html>