<?php include("header.php") ?>
<?php include("landing-nav.php") ?>
<div id="sign-in-section" class="alt-height">
  <div id="sign-in-content" class="mx-2 mt-5">
      <div class="form-controller">
        <h1 class="sign-up-head">
          Sign In To  <span id="brand-title">U<span style="color:#ee786c; font-size: 40px">P</span>rocess</span> 
        </h1>
      </div>
      <div class="theme-form">
        <form method="post" action="sign-in.php" id="c-form" class="ui form">
          <?php include('errors.php'); ?>
          <div class="sixteen wide field">
            <input class="form-input-admin" type="text" name="username" placeholder="Username" required>
          </div>
          <div class="sixteen wide field">
            <input class="form-input-admin" type="password" name="password" placeholder="Password" required>
          </div>
          <div class="sixteen wide field">
            <button class="ui button form-button" name="signin_user" type="submit">Sign In</button>
          </div>
        </form>
      </div>
    </div>
</div>

<?php 
if (isset($_GET['logout'])) {
    // Unachived tasks
    date_default_timezone_set('Asia/Kolkata'); 
    $curr_time = date("G:i:s", time());
    $end_time = "10:15:00";
    if ($curr_time > $end_time) {
      $category = "admin";
      $assigned_to = $_SESSION['username'];
      $change_status = "unachived";
      $sub_time = date("G:i:s", time());
      $today_date = Date('Y-m-d');
      $query= "UPDATE `tasks` SET  `sub_time`='$sub_time',`status`='$change_status' WHERE `assigned_to`= '$assigned_to' AND `status` = 'pending' AND `task_date` = '$today_date'";
        mysqli_query($db, $query);
    }


    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['name']);
    unset($_SESSION['company-code']);
    unset($_SESSION['designation']);
    unset($_SESSION['attendance']);
    header("location: index.php?");
}
?>
<?php include("footer.php") ?>
