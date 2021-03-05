<?php include("header.php") ?>
<?php include("landing-nav.php") ?>
<div id="sign-up-section" class="alt-height">
  <div id="sign-up-content" class="mx-2">
        <div class="suc-right">
          <div id="emp-text" class="form-msg">
            <h1>Hey!</h1>
            <img class="hello-icon" src="src/imgs/hello.png" alt="">
            <p>This is U<span style="font-size:18px; color:#ee786c">P</span>rocess Dev team, How are you doing ?</p>
            <p>Currenty you are siging up as a Employee <img src="src/imgs/employee.png" height="20" alt=""> as you can see it is written on the left side below the heading, which means you will be a part of a already registered company <img src="src/imgs/company.png" height="20" alt=""> .</p>
            <p>You have to enter the company code in order to sign up as a employee which will be provided to you by the company admin.</p>
          </div>
          <div class="fc-btn mx-0"> <a class="theme-button" href="sign-up-company.php">Register Company</a></div>
        </div>
    <div class="suc-left m-2">
      <div class="form-controller">
        <h1 class="sign-up-head">
          Sign Up To  <span id="brand-title">U<span style="color:#ee786c; font-size: 40px">P</span>rocess</span> 
          <br>
          <hr class="hr-form my-2">
          <span>Employee</span>  
        </h1>
      </div>
      <div class="theme-form">
        <form method="post" action="sign-up-emp.php" class="ui form">
          <div class="sixteen wide field">
            <input onkeypress='validate(event);' class="form-input-admin company-code" type="text" name="company_code" placeholder="Company Code (Paste Only)" required>
          </div>
          <div class="fields">
            <div class="sixteen wide field">
              <input class="form-input-admin input-mb" type="text" name="name" placeholder="Full Name" required>
            </div>
            <div class="sixteen wide field">
              <input class="form-input-admin input-mb" type="text" name="username" placeholder="Username" required>
            </div>
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
            <button class="ui button form-button" name="reg_emp" type="submit">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php") ?>
