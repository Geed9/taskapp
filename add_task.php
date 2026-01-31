<?php
session_start();
require_once "config.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_POST['submit_task'])) {
    header("Location: create_task.php");
    exit();
}

function validate_input($data) {
    return htmlspecialchars(stripslashes(trim($data))); //
}

$title       = validate_input($_POST['title']); 
$description = validate_input($_POST['description']);
$due_date    = validate_input($_POST['due_date']);
$category =trim($_POST['category'] ?? '');
$priority    = $_POST['priority'];
$status      = $_POST['status'];

$errors = [];//array to hold validation errors

if (empty($title) || empty($description) || empty($due_date) || empty($category) ) {
    $errors[] = "Please fill in all required fields.";
    
}
if(!empty($errors)){
    $error=implode(" ",$errors);
    $_SESSION['error']=$error;
    header("Location: create_task.php");
    exit();
}

$stmt = $conn->prepare("
    INSERT INTO tasks 
    (user_id, title, description, due_date, category, priority, status)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "issssss",
    $_SESSION['user_id'],
    $title,
    $description,
    $due_date,
    $category,
    $priority,
    $status
);

if ($stmt->execute()) { 
    $success = "Task added successfully.";
    header("Location: create_task.php");;
} else {
    $error = "Error: " . $stmt->error;
    header("Location: create_task.php");
}



$stmt->close();
$conn->close();
exit();
