<?php 
session_start();
error_reporting(0);

// initializing variables
$username = "";
$company_code ="";
$errors = array(); 
$_SESSION['attendance'] = "";
// connect to the user database
$db = mysqli_connect('127.0.0.1', 'root', '','up_process');
$db -> select_db('company');

// Check if username is taken or not
function checkUsernameIsTakenOrNot($db, $username) {
    $flag_user="true";
      $emp_check_query = "SELECT * FROM `employee` WHERE username='$username' LIMIT 1";
      $result = mysqli_query($db, $emp_check_query);
      $emp = mysqli_fetch_assoc($result);
      $company_check_query = "SELECT * FROM `company` WHERE username='$username' LIMIT 1";
      $result_company = mysqli_query($db, $company_check_query);
      $company = mysqli_fetch_assoc($result_company);
      if ($emp || $company) { 
        $flag_user="";
      }
      return $flag_user;
}
// echo addNumbers(5, "5 days");
// REGISTER COMPANY
if (isset($_POST['reg_comp'])) {

  // Receive all input values from the form
  $company_code = md5(microtime().rand());
  $company_name = mysqli_real_escape_string($db, $_POST['company_name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['con_password']);
  $designation = "admin";

  //   Validation
  if ($password_1 != $password_2) 
  {
    array_push($errors, "The two passwords do not match");
  }
  $flag_user = checkUsernameIsTakenOrNot($db, $username);
  if (empty($flag_user)) { array_push($errors, "Username already taken"); }

  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO `company`(`company_name`, `username`, `password`, `company_code`, `designation`) VALUES ('$company_name','$username','$password','$company_code', '$designation')";
    mysqli_query($db, $query);
    $_SESSION['company_name'] = $company_name;
    $_SESSION['username'] = $username;
    $_SESSION['company_code'] = $company_code;
    $_SESSION['designation'] = $designation;
    header('location: company/dashboard.php?');
  }

}
// REGISTER EMPLOYEE
if (isset($_POST['reg_emp'])) {

// Receive all input values from the form
//   $company_code = md5(microtime().rand());
  $company_code = mysqli_real_escape_string($db, $_POST['company_code']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['con_password']);
  $designation = "emp";


  //   Validation
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
  $company_code_check_query= "SELECT * FROM `company` WHERE `company_code`='$company_code'";
  $result = mysqli_query($db, $company_code_check_query);
  $company_code_result = mysqli_fetch_assoc($result);
  if ($company_code_result) {
      $flag_user = checkUsernameIsTakenOrNot($db, $username);
      if (empty($flag_user)) { array_push($errors, "Username already taken"); }
      
      // Finally, register user if there are no errors in the form
      if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO employee (`name`, `username`,`password`, `company_code`, `designation`) 
              VALUES('$name', '$username', '$password', '$company_code', '$designation')";
        mysqli_query($db, $query);
        $_SESSION['name'] = ucfirst($name);
        $_SESSION['username'] = $username;
        $_SESSION['company_code'] =$company_code;
        $_SESSION['designation'] = $designation;
      header('location: employee/dashboard.php?');
  }
   } else {
    if (empty($flag)) { array_push($errors, "Not authorized for registration"); }
   }
   

}
// SIGN USER
if (isset($_POST['signin_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (count($errors) == 0) {
        $hash_password = md5($password);
        $query = "SELECT * FROM `employee` WHERE `username`='$username' AND `password`='$hash_password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $row = $results-> fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['company_code'] =  $row['company_code'];
            $_SESSION['designation'] = $row['designation'];
            $_SESSION['fb_link'] = $row['fb_link'];
            $_SESSION['insta_link'] = $row['insta_link'];
            $_SESSION['li_link'] = $row['li_link'];

          header('location: employee/dashboard.php');
        }else {
          $query_company = "SELECT * FROM `company` WHERE `username`='$username' AND `password`='$hash_password'";
          $results_company = mysqli_query($db, $query_company);
          if (mysqli_num_rows($results_company) == 1) {
            $row = $results_company-> fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['company_code'] =  $row['company_code'];
            $_SESSION['designation'] = $row['designation'];
            $_SESSION['fb_link'] = $row['fb_link'];
            $_SESSION['insta_link'] = $row['insta_link'];
            $_SESSION['li_link'] = $row['li_link'];

            header('location: company/dashboard.php');
          }else {
              array_push($errors, "Incorrect Username or Password");
          }
        }
    }
  }

  // Add task emp
if (isset($_POST['task_add'])) {
    date_default_timezone_set('Asia/Kolkata'); 
  // Receive all input values from the form
    $task_name = mysqli_real_escape_string($db, $_POST['task_name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $assigned_time = date("G:i:s", time());
    $due_time = mysqli_real_escape_string($db, $_POST['due_time']);
    $sub_time = "";
    $category = $_SESSION['designation'];
    $assigned_to = $_SESSION['designation'] == "admin" ? $_POST['assigned_to'] : $_SESSION['username'];
    $assigned_by = $_SESSION['username'];
    $status = "pending";

    $query="INSERT INTO `tasks`(`name`, `description`, `assigned_time`, `due_time`, `sub_time`, `category`, `assigned_to`, `assigned_by`, `status`) 
    VALUES ('$task_name','$description','$assigned_time','$due_time','$sub_time','$category', '$assigned_to', '$assigned_by', '$status' )";
      mysqli_query($db, $query);
      header('location: tasks.php');
     } 
if (isset($_POST['done_task'])) {
    date_default_timezone_set('Asia/Kolkata'); 
  // Receive all input values from the form
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $id = mysqli_real_escape_string($db, $_POST['done_task']);
    $change_status = "submitted";
    if ($category == 'emp') {
       $change_status = "done";
      }
    $sub_time = date("G:i:s", time());
    $query= "UPDATE `tasks` SET  `sub_time`='$sub_time',`status`='$change_status' WHERE `id`= '$id'";
      mysqli_query($db, $query);
      header('location: tasks.php');
} 

// Mark Present 
if(isset($_POST['mark_present'])) 
  {  
    date_default_timezone_set('Asia/Kolkata'); 
    $curr_time = date("G:i:s", time());
    $today_date = Date('Y-m-d');
    $username = mysqli_real_escape_string($db, $_POST['mark_present']);
    $marked = "Present";
    $query = "INSERT INTO `attendance`(`marked`, `username`, `date`, `time`) VALUES ('$marked','$username','$today_date','$curr_time')";
    mysqli_query($db, $query);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

if (isset($_POST['update_profile'])) {
  $username = $_SESSION['username'];
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $fb_link = mysqli_real_escape_string($db, $_POST['fb_link']);
  $insta_link = mysqli_real_escape_string($db, $_POST['insta_link']);
  $li_link = mysqli_real_escape_string($db, $_POST['li_link']);
  $hash_pass = md5($password);
 if($password == "") {

   if ($_SESSION['designation'] == 'emp') {
     $query= "UPDATE `employee` SET  `name`='$name', `fb_link`='$fb_link',`insta_link`='$insta_link',`li_link`='$li_link' WHERE `username`= '$username'";
   } else {
     $query= "UPDATE `company` SET  `name`='$name', `fb_link`='$fb_link', `insta_link`='$insta_link',`li_link`='$li_link' WHERE `username`= '$username'";
   }
   
  } else {
   if ($_SESSION['designation'] == 'emp') {
     $query= "UPDATE `employee` SET  `name`='$name',`password`='$hash_pass', `fb_link`='$fb_link',`insta_link`='$insta_link',`li_link`='$li_link' WHERE `username`= '$username'";
   } else {
     $query= "UPDATE `company` SET  `name`='$name',`password`='$hash_pass', `fb_link`='$fb_link', `insta_link`='$insta_link',`li_link`='$li_link' WHERE `username`= '$username'";
   }

 }
  echo $query;
    mysqli_query($db, $query);
    header('location: settings.php?'.$query);
} 
// DELETE 
if(isset($_POST['delete'])) 
  {    
    $id = mysqli_real_escape_string($db, $_POST['delete']);
    $query = "DELETE FROM `tasks` WHERE `id` = $id";
    mysqli_query($db, $query);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>

