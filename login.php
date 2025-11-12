<?php
session_start();

$users = array(
    "okxn" => "okxn123",
    // Info o autorze itd.
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Szybkie konto admin do testów:
    if ($username === 'admin' && $password === 'twojeAdminHaslo') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = 'admin';
        header("Location: dashboard.php");
        exit;
    }

    // Oryginalna walidacja dla hardcoded users
    if (array_key_exists($username, $users) && $users[$username] === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid auth key.";
    }
}
?>

