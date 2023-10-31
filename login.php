<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $userData = file('users.txt', FILE_IGNORE_NEW_LINES);
    
    foreach ($userData as $user) {
        list($username, $storedEmail, $hashedPassword) = explode('|', $user);
        if ($email == $storedEmail && password_verify($password, $hashedPassword)) {
            $_SESSION['email'] = $email;
        
            header("Location: dashboard.php");
            exit();
        }
    }
    echo "Invalid credentials";
}
?>
