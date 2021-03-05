<?php include("header.php") ?>
<?php include("landing-nav.php") ?>
<div id="sign-up-section" class="alt-height">
  <div id="sign-up-content" class="mx-1">
        <div class="suc-right">
          <div id="comp-text" class="form-msg">
            <h1>Hey!</h1>
            <img class="hello-icon" src="src/imgs/hello.png" alt="">
            <p>This is U<span style="font-size:18px; color:#ee786c">P</span>rocess Dev team, How are you doing ?</p>
            <p>Currenty you are siging up as a Company <img src="src/imgs/company.png" height="20" alt=""> as you can see it is written on the left side below the heading, which means you will be the admin <img src="src/imgs/admin.png" height="20" alt=""> for your company. </p>
            <p>An admin can perform different roles such as monitoring employee performance, controling company registration and much more.</p>
          </div>
          <div class="fc-btn mx-0"> <a class="theme-button" href="sign-up-emp.php">Sign up as employee</a></div>
        </div>
    <div class="suc-left m-2">
      <div class="form-controller">
        <h1 class="sign-up-head">
          Sign Up To  <span id="brand-title">U<span style="color:#ee786c; font-size: 40px">P</span>rocess</span> 
          <br>
          <hr class="hr-form my-2">
          <span>Company</span>  
        </h1>
      </div>
      <div class="theme-form">
        <form method="post" action="sign-up-company.php" id="c-form" class="ui form">
          <div class="sixteen wide field">
            <input class="form-input-admin" type="text" name="company_name" placeholder="Company Name" required>
          </div>
          <div class="sixteen wide field">
            <input class="form-input-admin" type="text" name="username" placeholder="Username" required>
          </div>
          <div class="fields">
            <div class="eight wide field">
              <input class="form-input-admin input-mb" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="eight wide field">
              <input class="form-input-admin input-mb" type="password" name="con_password" placeholder="Confirm Password" required>
            </div>
          </div>
          <div class="sixteen wide field">
            <button class="ui button form-button" name="reg_comp" type="submit">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php") ?>
