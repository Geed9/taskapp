<<?php
session_start();
require_once 'config.php';

/* register page */
if (isset($_POST['register'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['register_error'] = "Email already exists";
        $_SESSION['active_form'] = "register";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
    }

    header("Location: login.php");
    exit();
}

/* login page */
if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name']; 
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid password";
        }

    } else {
        $_SESSION['login_error'] = "Email not found";
    }

    $_SESSION['active_form'] = "login";
    header("Location: login.php");
    exit();
}
?>
