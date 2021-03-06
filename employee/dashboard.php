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
               <div class="msg-section">
                   <p class="msg-one">Welcome <?php echo $_SESSION['designation'];?></p>
                   <p class="msg-two">Check your daily tasks & Schedules</p>
               </div>
               <div class="right-side">
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

<?php include("sidenav-foot.php") ?>
<?php include("footer.php") ?>
