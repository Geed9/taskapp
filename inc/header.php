<header class="header">
    <h2 class="u-name">Student <b>Tasks</b>
    <label for="checkbox">
        <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
    </label>
    </h2>

    <?php if (isset($showTaskAction) && $showTaskAction === true):?>
        <div class="header-actions">
        <a href="/taskapp/create_task.php" class="create-task-btn">
            + Create New Task
</a>
            

    </div>
    <?php endif;?>
</header>