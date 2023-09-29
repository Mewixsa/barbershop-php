<?php
// Файл register.php

// Запускаем сессию
session_start();

// Получаем данные из формы регистрации
$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$conn = mysqli_connect("localhost", "root", "root", "users");

$query = "SELECT name FROM users WHERE name = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   
    echo "Пользователь с таким именем уже существует";
} else {
 
    $query = "INSERT INTO users (name, password) VALUES ('$username', '$hashedPassword')";
    mysqli_query($conn, $query);


    $_SESSION['name'] = $username;
    header("Location: ..//login/index.html");
}


mysqli_close($conn);
?>