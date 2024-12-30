<?php
include 'db_conn.php';

header('content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare("SELECT  * FROM members WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $member = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($member);
        } else {
            $stmt = $pdo->query("SELECT  * FROM members");
            $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($members);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $pdo->prepare("INSERT INTO members (title, fullName, picture, gender, dob, phone, 
        emailStatus, address, nationality, education, profession, emergencyName, emergencyContact,
         team, department) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
         $stmt-> execute(array_values($data));
         echo json_encode($data);
         break;

         case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            $stmt = $pdo->prepare("UPDATE members SET title = ?, fullName = ?, picture = ?, gender = ?, dob = ?, phone = ?, 
        emailStatus = ?, address = ?, nationality = ?, education = ?, profession = ?, emergencyName = ?, emergencyContact = ?,
         team = ?, department = ? WHERE id = ?"); 
         $stmt-> execute([...array_values($data), $data['id']]);
         echo json_encode($data);
         break;

         case 'DELETE':
            $stmt = $pdo->prepare("DELETE FROM members WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            echo json_encode(['deleted' => true]);
            break;
}
?>