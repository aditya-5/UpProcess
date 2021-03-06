<?php 
    include("header.php");
    date_default_timezone_set('Asia/Kolkata'); 
?>
<div class="emp-slide">
    <div class="emp-slide-left">
        <?php include("sidenav-head.php") ?>
    </div>
    <div class="emp-slide-right">
        <div class="main-content-emp">
           <nav class="tab-top-nav">
               <h1 class="tab-name">Dashboard</h1>
               <p class="today-date"><i class="calendar alternate outline icon"></i> <?php echo date('D, M j, Y');?></p>
           </nav>
           <div class="section-one">
              <div class="left-side">
                <div class="msg-section">
                    <p class="msg-one">Welcome <?php echo ucfirst($_SESSION['username']);?></p>
                    <p class="msg-two">Check your daily tasks & Schedules</p>
                </div>
                 <div class="left-down">
                      <div class="attendance">
                          <h2>Don't forget to mark yourself present today </h2>
                          <i class="caret right icon"></i>
                          <?php 
                                    date_default_timezone_set('Asia/Kolkata');
                                    $user_att = 'A';
                                    $username = $_SESSION['username'];
                                    $date = Date('Y-m-d');
                                    $query_attendance = "SELECT * FROM `attendance` WHERE `username` = '$username' AND `date` = '$date' LIMIT 1";
                                    $results_attendance = mysqli_query($db, $query_attendance);
                                    if($results_attendance->num_rows > 0){
                                        $user_att = "P";
                                    }
                          ?>
                            <form method="post" action="dashboard.php" class="ui form delete">
                                <button onclick="return checkPresent()" type="submit" name="mark_present" value='<?php echo $_SESSION["username"] ?>' id="delete" class="ui large icon button tt-btn at-btn <?php echo $user_att == "P" ? 'disabled' : ''?>">
                                      <?php echo $user_att == "P" ? 'Marked Present <i class="calendar check icon"></i>' : 'Mark Present <i class="calendar minus icon"></i>'?>
                                    
                                </button>
                            </form>
                      </div>
                      <div class="recent_attendance">
                          <div class="ra-table">
                              <h2 class="d-inline">Your recent attendance</h2>
                              <button type="button" class="modal-attendance" data-toggle="modal" data-target="#exampleModal">see more <i class="address book outline icon"></i></button>
                               <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Attendance History</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="overflow-y:auto; height:70vh;">
                                                <table class="ui basic stackable table at-dash">
                                                    <thead>
                                                        <tr>
                                                        <th>Date</th>
                                                        <th>Day</th>
                                                        <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                                date_default_timezone_set('Asia/Kolkata');
                                                                $user_att = 'A';
                                                                $username = $_SESSION['username'];
                                                                $query_attendance = "SELECT * FROM `attendance` WHERE `username` = '$username'  ORDER BY `date`";
                                                                $results_attendance = mysqli_query($db, $query_attendance);
                                                                if($results_attendance->num_rows > 0){
                                                                    while($row = $results_attendance->fetch_assoc()) { 
                                                                            $date=date_create($row['date']);
                                                                        ?>
                                                                            <tr>
                                                                                <td><?php echo date_format($date, 'j / M')?></td>
                                                                                <td><?php echo date_format($date, 'l')?></td>
                                                                                <td style="color:green">Present <i class="calendar check outline icon ml-1"></i></td>
                                                                            </tr>
                                                                            
                                                                            <?php }
                                                                }
                                                            ?>
                                                        </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="theme-buttonclose-modal-btn" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <table class="ui basic stackable table at-dash">
                                   <thead>
                                       <tr>
                                       <th>Date</th>
                                       <th>Day</th>
                                       <th>Status</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                          <?php 
                                date_default_timezone_set('Asia/Kolkata');
                                $user_att = 'A';
                                $username = $_SESSION['username'];
                                $query_attendance = "SELECT * FROM `attendance` WHERE `username` = '$username'  ORDER BY `date` DESC LIMIT 4";
                                $results_attendance = mysqli_query($db, $query_attendance);
                                if($results_attendance->num_rows > 0){
                                    while($row = $results_attendance->fetch_assoc()) { 
                                            $date=date_create($row['date']);
                                        ?>
                                            <tr>
                                                <td><?php echo date_format($date, 'j / M')?></td>
                                                <td><?php echo date_format($date, 'l')?></td>
                                                <td style="color:green">Present <i class="calendar check outline icon ml-1"></i></td>
                                            </tr>
                                            
                                            <?php }
                            }
                            ?>
                                </tbody>
                            </table>
                          </div>
                          <div class="ra-left">
                                <div class="ra-table">
                                    <h2>Your recent tasks</h2>
                                    <table class="ui basic stackable table at-dash">
                                        <thead>
                                            <tr>
                                                <th>Due <i class="clock outline icon"></i></th>
                                                <th>Task Name</th>
                                                <th>Task Status <i class='circle mini blue icon'></i><i class='circle mini yellow icon'></i><i class='circle mini green icon'></i><i class='circle mini red icon'></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php 
                                        $done_status ="<i class='star small green icon ml-1'></i>";
                                        $sub_status ="<i class='star small yellow icon ml-1'></i>";
                                        $pen_status ="<i class='star small blue icon ml-1'></i>";
                                        $un_status ="<i class='circle small red icon ml-1'></i>";
                                        date_default_timezone_set('Asia/Kolkata');
                                        $username = $_SESSION['username'];
                                        $query_tasks = "SELECT * FROM `tasks` WHERE `assigned_to` = '$username'  ORDER BY `id` DESC LIMIT 4";
                                        $results_tasks = mysqli_query($db, $query_tasks);
                                        if($results_tasks->num_rows > 0){
                                            while($row = $results_tasks->fetch_assoc()) { 
                                                ?>
                                                    <tr>
                                                        <td><?php echo date('g:i A', strtotime($row['due_time']));?></td>
                                                        <td><?php echo $row['name']?></td>
                                                        <td>
                                                            <?php
                                                                if ($row['status']=="done") {
                                                                    echo ucfirst($row['status'])." ".$done_status; 
                                                                } 
                                                                else if ($row['status']=="submitted") {
                                                                    echo ucfirst($row['status'])." ".$sub_status; 
                                                                } else if ($row['status']=="unachived") {
                                                                    echo ucfirst($row['status'])." ".$un_status; 
                                                                } else {
                                                                    echo ucfirst($row['status'])." ".$pen_status;
                                                                }
                                                                
                                                                ?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php }
                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                          </div>
                      </div>
                 </div>
              </div>
               <div class="right-side bg-dark">
                    <div class="rs-top bg-light">
                        <h1>Hey!</h1>
                        <img class="hello-icon" src="../src/imgs/hello.png" alt="">
                        <p class="my-2">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure sit amet quam aut explicabo velit provident. Et commodi, impedit ducimus perspiciatis dolores nihil dicta iste architecto reprehenderit expedita facere quibusdam.
                        </p>
                   </div>
                   <div class="social-open-links">
                       <div class="so-link">
                           <a class="fb-bg" href="<?php echo $_SESSION['fb_link'] ?>" target="_blank" rel="noopener noreferrer"><i class="facebook icon"></i> Facebook</a>
                       </div>
                       <div class="so-link insta-bg">
                           <a class="insta-bg" href="<?php echo $_SESSION['insta_link'] ?>" target="_blank" rel="noopener noreferrer"><i class="instagram icon"></i> Instagram</a>
                       </div>
                       <div class="so-link li-bg">
                           <a class="li-bg" href="<?php echo $_SESSION['li_link'] ?>" target="_blank" rel="noopener noreferrer"><i class="linkedin icon"></i> LinkedIn</a>
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
    function checkPresent() {
        return confirm("Are you sure you want mark yourself present?");
    }
</script>
<?php include("sidenav-foot.php") ?>
<?php include("footer.php") ?>
