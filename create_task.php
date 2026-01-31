<?php
session_start();
require_once "config.php"; 
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php 
    $showTaskAction = true; 
    include 'inc/header.php';
     ?>

    <div class="body">
        <?php include 'inc/navbar.php'; ?>
        <section class="section-2">
            <h4 class="title">Create New Task</h4>
            <form class="form-1" method="POST" action="add_task.php">

    <div class="input-holder">
        <label>Title</label>
        <input type="text" name="title" class="input-1">
    </div>

    <div class="description-holder">
        <label>Description</label>
        <textarea name="description" class="input-1"></textarea>
    </div>

    <div class="category-holder">
        <label>Category </label>
        <input type="text" name="category" class="input-1">
    </div>

    <div class="priority-holder">
        <label>Priority</label>
        <select name="priority" class="input-1">
            <option value="Low">Low</option>
            <option value="Medium" selected>Medium</option>
            <option value="High">High</option>
        </select>
    </div>

    <div class="status-holder">
        <label>Status</label>
        <select name="status" class="input-1">
            <option value="Pending">Pending</option>
            <option value="On-going">On-going</option>
            <option value="Completed">Completed</option>
        </select>
    </div>

    <div class="due-date-holder">
        <label>Due Date</label>
        <input type="date" name="due_date" class="input-1">
    </div>

    <button type="submit" name="submit_task" class="submit-btn">
        Submit Task
    </button>
    
<?php if (isset($_SESSION['error'])): ?>
    <div class="error-message">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>   
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="success-message">
        <?= $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
</form>
        </section>
    </div>
    
</body>
</html>