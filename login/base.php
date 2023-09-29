<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
// echo $_POST['username']. " ". $_POST['password'];
$conn = mysqli_connect("localhost", "root", "root", "users");

$query = "SELECT password FROM users WHERE name = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];

    if (password_verify($password, $storedPassword)) {
        $_SESSION['name'] = $username;

        header("Location: ..//page-1/Page1.html");
    } else {
        echo "Неправильный пароль";
    }
} else {
    echo "Пользователь не найден";
}

mysqli_close($conn);
?>