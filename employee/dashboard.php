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
                                <button onclick="return checkPresent()" type="submit" name="mark_present" value='<?php echo $_SESSION["username"] ?>' id="delete" class="ui large icon button tt-btn <?php echo $user_att == "P" ? 'disabled' : ''?>">
                                      <?php echo $user_att == "P" ? 'Marked Present <i class="calendar check icon"></i>' : 'Mark Present <i class="calendar minus icon"></i>'?>
                                    
                                </button>
                            </form>
                      </div>
                      <div class="recent_attendance">
                          <div class="ra-table">
                              <h2>Your recent attendance</h2>
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
                                            <th>Task Status</th>
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
    function checkPresent() {
        return confirm("Are you sure you want mark yourself present?");
    }
</script>
<?php include("sidenav-foot.php") ?>
<?php include("footer.php") ?>
