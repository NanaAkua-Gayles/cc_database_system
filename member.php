<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

        $title = $_POST['title'];
        $fullName = $_POST['fullName'];
        $picture = $_POST['image'];
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
        $department = $_POST['department'];


// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
}else{
        $stmt = $conn->prepare("insert into registration(title, fullname, image, gender, dob, phone, email, address, 
        maritalStatus, nationality, education, profession, emergencyContact, team, department)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssss",$title, $fullname, $image, $gender, $dob, $phone, $email, $address, 
        $maritalStatus, $nationality, $education, $profession, $emergencyContact, $team, $department);
        $stmt->execute();
        echo "Registration  Successful";
        $stmt->close();
        $conn->close();
}         
?>
