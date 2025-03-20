<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = $username;
            echo json_encode(["status" => "success", "message" => "Login berhasil!"]);
            exit();
        } else {
            echo json_encode(["status" => "error", "message" => "Password salah!"]);
            exit();
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Username tidak ditemukan!"]);
        exit();
    }
}
?>
