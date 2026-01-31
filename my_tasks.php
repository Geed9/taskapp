<?php session_start();
require_once "config.php";
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id = ?"; //query to fetch task 
$stmt = $conn->prepare($sql); //set the statment 
$stmt->bind_param("i",$user_id); //bind the user id to the stmt
$stmt->execute(); //execute the stmt
$result = $stmt->get_result(); //get the result

$tasks = $result->fetch_all(MYSQLI_ASSOC); //fetch all the user tasks
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../taskapp/css/style.css">
</head>
<body>
    <input type="checkbox" id="checkbox">
    <?php 
    $showTaskAction = true;
    include 'inc/header.php';
     ?>

    <div class="body">
        <?php include 'inc/navbar.php'; ?>
        <section class="section-3">
<div class="section-title">
            <h1>My Tasks</h1>
</div>
            <?php if (empty($tasks)):?>
                
                    <h2>No tasks found</h2>
            
            <?php else: ?>

                    <div class="task-list">
                        <?php foreach($tasks as $tasks): ?>  
                            <div class ="task-card">
                                 <a href="task-view.php?id=<?=$tasks['id']?>" class="task-link">

                                 <h3 class="card-title"><?=$tasks['title']?></h3>
                                <span class="category"><?=$tasks['category']?></span>
                        
                                <p class="description"><?=$tasks['description'];?></p>
                                 <div class ="info">
                                    <span class="priority"><?=$tasks['priority'];?>
                                </span>
                                    <span class="status"><?=$tasks['status'];?></span>
                                    <span class="due_date">Due:<?=$tasks['due_date'];?></span>
                        </div>
                                    <div class="btn-action">
                                            <a href="edit.php?id=<?=$tasks['id']?>" class="edit-btn">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="archive.php?id=<?=$tasks['id']?>" class="archive-btn">
                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                            </a>                
                                    </div>
                            </div>
                        
                                     
                        <?php endforeach; ?>
                        </a>
                    </div>
            <?php endif; ?>
        </section>
    </div>
    <script src="js/script.js"></script>
</body>
</html>














  
