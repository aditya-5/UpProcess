<?php include("header.php") ?>
<?php 
    $category = $_GET['category'] ? $_GET['category'] : "" ;
    $status = $_GET['status'] ? $_GET['status'] : "" ;
    $username = $_SESSION['username'];
?>
<div class="emp-slide">
    <div class="emp-slide-left">
        <?php include("sidenav-head.php") ?>
    </div>
    <div class="emp-slide-right">
        <div class="main-content-emp">
            <nav class="tab-top-nav">
               <h1 class="tab-name">Tasks</h1>
               <p class="today-date"><i class="calendar alternate outline icon"></i> <?php echo date('D, M j, Y');?></p>
           </nav>
           <div class="section-two">
               <div class="main-task-sec">
                    <div class="theme-form task-form">
                        <h2 class="task-form-head">Add new task <i class="plus small icon"></i></h2>
                        <form method="post" action="tasks.php" id="c-form" class="ui form">
                            <div class="fields">
                                <div class="eight wide field">
                                    <input class="form-input-admin" type="text" name="task_name" placeholder="Task name" required>
                                </div>
                                <div class="sixteen wide field">
                                    <input class="form-input-admin" type="text" name="description" placeholder="Description" required>
                                </div>
                                <div class="five wide field">
                                    <input class="form-input-admin" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" name="due_time" placeholder="Due Time" required>
                                </div>
                                <div class="five wide field">
                                    <button class="ui button form-button" name="task_add" type="submit">Add</button>
                                </div>
                            </div>
                        </form>
                        <div class="filter-tasks-btns">
                            <i class="filter large icon"></i>
                             <a class="<?php echo $_GET['category']=="emp" ? "theme-button" : "theme-outline-button" ;?> filter-btn" href="tasks.php?category=emp&status=<?php echo $status?>">
                                 Self Assd.
                             </a>
                             <a class="<?php echo $_GET['category']=="admin" ? "theme-button" : "theme-outline-button" ;?> filter-btn" href="tasks.php?category=admin&status=<?php echo $status?>">
                                 Company Assd.
                             </a>
                             <a class="<?php echo $_GET['status']=="submitted" ? "theme-button" : "theme-outline-button" ;?> filter-btn" href="tasks.php?category=<?php echo $category?>&status=submitted">
                                 Submitted
                             </a>
                             <a class="<?php echo $_GET['status']=="done" ? "theme-button" : "theme-outline-button" ;?> filter-btn" href="tasks.php?category=<?php echo $category?>&status=done">
                                 Done
                             </a>
                             <a class="<?php echo $_GET['status']=="unachieved" ? "theme-button" : "theme-outline-button" ;?> filter-btn" href="tasks.php?category=<?php echo $category?>&status=unachived">
                                Unachieved 
                             </a>
                             <a class="<?php echo $_GET['status']=="done" ? "theme-outline-button" : ($_GET['status']=="submitted" ? "theme-outline-button" : ($_GET['category']=="admin" ? "theme-outline-button" : ($_GET['category']=="emp" ? "theme-outline-button" : ($_GET['status']=="unachived" ? "theme-outline-button" : "theme-button")))) ;?> filter-btn" href="tasks.php">
                                 Clear <i class="filter icon"></i>
                             </a>
                        </div>
                        <div class="tasks-table">
                            <table class="ui basic table task-table-struc">
                                <thead class="task-table-head">
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Description</th>
                                        <th>Assgined <i class="clock outline icon"></i></th>
                                        <th>Due <i class="clock outline icon"></i></th>
                                        <th>Status <i class='circle mini blue icon'></i><i class='circle mini yellow icon'></i><i class='circle mini green icon'></i><i class='circle mini red icon'></i></th>
                                        <?php
                                            $category = $_GET['category'] ? $_GET['category'] : "" ;
                                            if ($category == "admin") 
                                            { ?>
                                                <th>Submit</th>
                                                <?php } else if ($category == "emp"){ ?>
                                                    <th class="tt-done-head">Done</th>
                                                    <th>Delete</th>
                                                <?php } else { ?>
                                                    <th>Done or Submit</th>
                                            <?php }
                                         ?>
                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $category = $_GET['category'] ? $_GET['category'] : "" ;
                                        $status = $_GET['status'] ? $_GET['status'] : "" ;
                                        $username = $_SESSION['username'];
                                        if ($category != "") {
                                            $query_tasks_ch = " AND `category`='$category'";
                                        } else {
                                            $query_tasks_ch = "";
                                        }
                                        if ($status != "") {
                                            $query_tasks_sh = " AND `status`='$status'";
                                        } else {
                                            $query_tasks_sh = "";
                                        }


                                    $query_tasks_fh = "SELECT * FROM `tasks` WHERE `assigned_to`='$username'";
                                    $query_tasks_lh = " ORDER BY assigned_time DESC ";
                                    $query_tasks = $query_tasks_fh.$query_tasks_ch.$query_tasks_sh.$query_tasks_lh;
                                    $results_tasks = mysqli_query($db, $query_tasks);
                                    $done_status ="<i class='circle small green icon ml-1'></i>";
                                    $sub_status ="<i class='circle small yellow icon ml-1'></i>";
                                    $pen_status ="<i class='circle small blue icon ml-1'></i>";
                                    $un_status ="<i class='circle small red icon ml-1'></i>";
                                    if ($results_tasks->num_rows > 0) {
                                        while($row = $results_tasks->fetch_assoc()) {
                                        
                                    ?>
                            
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo date('g:i A', strtotime($row['assigned_time'])); ?></td>
                                            <td><?php echo date('g:i A', strtotime($row['due_time'])); ?></td>
                                            <td>
                                                 <?php
                                                      if ($row['status']=="done") {
                                                          echo ucfirst($row['status'])." ".$done_status; 
                                                      } 
                                                      else if ($row['status']=="submitted") {
                                                        echo ucfirst($row['status'])." ".$sub_status; 
                                                      } else {
                                                        echo ucfirst($row['status'])." ".$pen_status;
                                                      }
                                                      
                                                    ?>
                                            </td>
                                            <td> 
                                                <center>
                                                    <form method="post" action="tasks.php" class="ui form delete">
                                                        <input type="text" name="category" class="d-none" value="<?php echo $row["category"] ?>">
                                                        <button onclick="return comfirmDone()" type="submit" name="done_task" value='<?php echo $row["id"] ?>' id="delete" class="ui mini icon button tt-btn <?php echo $row['status']!="pending" ? "disabled" : "" ?>">
                                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </center>
                                            </td>
                                            <?php 
                                                 if ($category == "emp") { ?>
                                                    <td>
                                                        <center>
                                                            <form method="post" action="tasks.php" class="ui form delete">
                                                                <button onclick="return checkDelete()" type="submit" name="delete" value='<?php echo $row["id"] ?>' id="delete" class="ui mini icon button tt-btn">
                                                                    <i class="trash icon"></i>
                                                                </button>
                                                            </form>
                                                        </center>
                                                    </td>
                                                <?php }
                                                ?>
                                        </tr>

                                <?php
                                }
                            } 
                            
                            ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
               </div>
               <div class="right-side right-side-tasks bg-dark">
                   <div class="rs-top bg-light">
                        <h1>Hey!</h1>
                        <img class="hello-icon" src="../src/imgs/hello.png" alt="">
                        <p class="my-2">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure sit amet quam aut explicabo velit provident. Et commodi, impedit ducimus perspiciatis dolores nihil dicta iste architecto reprehenderit expedita facere quibusdam.
                        </p>
                   </div>
                   <div class="social-open-links">
                       <div class="so-link">
                           <a class="fb-bg" href="#" target="_blank" rel="noopener noreferrer"><i class="facebook icon"></i> Facebook</a>
                       </div>
                       <div class="so-link insta-bg">
                           <a class="insta-bg" href="#" target="_blank" rel="noopener noreferrer"><i class="instagram icon"></i> Instagram</a>
                       </div>
                       <div class="so-link li-bg">
                           <a class="li-bg" href="#" target="_blank" rel="noopener noreferrer"><i class="linkedin icon"></i> LinkedIn</a>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
</div>

<style>
@media only screen and (min-width: 480px) {
    body{
        overflow-y: hidden !important;
    }
}
</style>
<script>
    function checkDelete() {
        return confirm("Are you sure you want to Delete?");
    }
    function comfirmDone() {
    return confirm("Are you sure you to mark it as done?");
    }
</script>
<?php include("sidenav-foot.php") ?>
<?php include("footer.php") ?>
