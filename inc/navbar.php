<?php 
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>


<nav class="side-bar">
            <div class="user-p">
                <img src="../taskapp/img/user.jpg"></img>
                <h4>@<?php echo $_SESSION['username']; ?></h4>
            </div>
            <ul>
                <li class ="<?=($currentPage == 'index.php') ? 'active' : '' ?>">
                    <a href="index.php">
                        <i class="fa fa-dashboard" aria-hidden="true">
                            
                        </i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class ="<?=($currentPage == 'my_tasks.php') ? 'active' : '' ?>">
                    <a href="my_tasks.php">
                        <i class="fa fa-tasks" aria-hidden="true">

                        </i>
                        <span>My Tasks</span>
                    </a>
                </li>
                <li class ="<?=($currentPage == 'archive.php') ? 'active' : '' ?>">
                    <a href="archive.php">
                        <i class="fa fa-archive" aria-hidden="true">

                        </i>

                        <span>Archive</span>
                    </a>
                </li>
                <li class ="<?=($currentPage == 'logout.php') ? 'active' : '' ?>">
                    <a href="logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true">

                        </i>
                        <span>Logout</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true">
                            
                        </i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop" aria-hidden="true">
                            
                        </i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
            </ul>
        </nav>