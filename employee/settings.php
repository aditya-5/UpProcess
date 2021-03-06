<?php include("header.php") ?>
<style>
    label{
            font-family: "Nunito", sans-serif;
        }
    .form-button{
        font-family: "Nunito", sans-serif !important;
    }
    .task-form{
        margin-bottom: 0vh !important;
    }
</style>
<div class="emp-slide">
    <div class="emp-slide-left">
        <?php include("sidenav-head.php") ?>
    </div>
    <div class="emp-slide-right">
        <div class="main-content-emp">
            <nav class="tab-top-nav">
               <h1 class="tab-name">Edit Profile</h1>
               <p class="today-date"><i class="calendar alternate outline icon"></i> <?php echo date('D, M j, Y');?></p>
           </nav>
           <div class="section-two">
               <?php 
                 $username = $_SESSION['username'];

                 if ($_SESSION['designation']=='emp') {
                     $query_profile = "SELECT * FROM `employee` WHERE `username` = '$username'";
                    }else {
                     $query_profile = "SELECT * FROM `company` WHERE `username` = '$username'";
                 }
                 $results_profile = mysqli_query($db, $query_profile);
                 $row = $results_profile->fetch_assoc()
               
               ?>
               <div class="main-task-sec">
                    <div class="theme-form task-form">
                        <form method="post" action="settings.php" id="c-form" class="ui form">
                            <div class="fields">
                                <div class="five wide field">
                                    <label>Username</label>
                                    <input class="form-input-admin" type="text" name="username" value="<?php echo $row['username'];?>" placeholder="username" readonly>
                                </div>
                                <div class="seven wide field">
                                    <label>Full Name</label>
                                    <input class="form-input-admin" type="text" name="name" value="<?php echo $row['name'];?>" placeholder="Full Name">
                                </div>
                                <div class="five wide field">
                                    <label>Password</label>
                                    <input class="form-input-admin" type="password"  name="password"  placeholder="Password">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="eight wide field">
                                    <label>Company Code</label>
                                    <input class="form-input-admin" type="text" name="company_code" value="<?php echo $row['company_code'];?>" placeholder="Company Code" readonly>
                                </div>
                                <div class="eight wide field">
                                    <label>Facebook Profile Link</label>
                                    <input class="form-input-admin" type="text" name="fb_link" value="<?php echo $row['fb_link'];?>" placeholder="Facebook Profile Link">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="eight wide field">
                                    <label>Instagram Profile Link</label>
                                    <input class="form-input-admin" type="text" name="insta_link" value="<?php echo $row['insta_link'];?>" placeholder="Instagram Profile Link">
                                </div>
                                <div class="eight wide field">
                                    <label>Linked In Profile Link</label>
                                    <input class="form-input-admin" type="text" name="li_link" value="<?php echo $row['li_link'];?>" placeholder="Linked In Profile Link">
                                </div>
                            </div>
                            <div class="sixteen wide field mt-4">
                                <button class="ui button form-button" name="update_profile" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                    <div class="card mx-4 profile-card">
                        <div class="card-body">
                            <svg id="profile-pic" enable-background="new 0 0 512 512" height="37" viewBox="0 0 512 512" width="37" xmlns="http://www.w3.org/2000/svg"><g><g><g><path d="m256.025 483.334 101.429-25.614c57.895-48.074 94.771-120.586 94.771-201.719 0-125.144-87.711-229.801-205.012-255.852-137.316 4.631-247.213 117.407-247.213 255.851 0 71.112 29 135.446 75.812 181.836z" fill="#cbe2ff"/></g><g><path d="m446.914 256c0 83.915-40.381 158.391-102.765 205.079l92.031-23.241c46.815-46.39 75.82-110.724 75.82-181.838 0-141.385-114.615-256-256-256-11.024 0-21.886.698-32.543 2.05 126.019 15.988 223.457 123.59 223.457 253.95z" fill="#bed8fb"/></g><g><g><g><path d="m319.621 96.952c0-13.075-10.599-23.674-23.674-23.674h-81.582c-30.091 0-54.485 24.394-54.485 54.485v60.493h192.209v-59.635c0-13.075-10.599-23.674-23.674-23.674h-.798c-4.416 0-7.996-3.579-7.996-7.995z" fill="#365e7d"/><path d="m328.415 104.947h-.798c-4.416 0-7.996-3.58-7.996-7.996 0-13.075-10.599-23.674-23.674-23.674h-8.945v114.978h65.086v-59.635c.001-13.073-10.599-23.673-23.673-23.673z" fill="#2b4d66"/><path d="m425.045 372.355c-6.259-6.182-14.001-10.963-22.79-13.745l-69.891-22.128-76.348-2.683-76.38 2.683-69.891 22.128c-23.644 7.486-39.713 29.428-39.713 54.229v19.094c44.789 47.328 107.451 77.568 177.183 79.92 78.128-17.353 143.129-69.576 177.83-139.498z" fill="#4a80aa"/><path d="m441.968 431.932v-19.094c0-17.536-8.04-33.635-21.105-44.213-37.111 75.626-110.422 130.268-197.346 141.317 10.492 1.329 21.178 2.038 32.026 2.057 10.423-.016 20.708-.62 30.824-1.782 61.031-7.212 115.485-35.894 155.601-78.285z" fill="#407093"/><path d="m261.796 508.168c15.489-30.751 55.822-118.067 44.321-172.609l-50.101-19.499-50.148 19.5c-11.856 56.225 31.37 147.277 45.681 175.29 3.442-.826 6.859-1.721 10.247-2.682z" fill="#e4f6ff"/><path d="m288.197 483.789-20.314-79.917h-23.767l-20.264 79.699 25.058 27.897c6.361-1.457 12.634-3.146 18.81-5.057z" fill="#e28086"/><path d="m249.302 511.905c2.075.054 4.154.091 6.241.095 2.415-.004 4.822-.046 7.222-.113l12.907-14.259c-10.159 3.564-20.61 6.506-31.309 8.779z" fill="#dd636e"/><g><g><g><g><g><g><g><g><path d="m298.774 328.183v-45.066h-85.58v45.066c0 23.632 42.79 49.446 42.79 49.446s42.79-25.814 42.79-49.446z" fill="#ffddce"/></g></g></g></g></g></g></g><path d="m352.089 180.318h-16.359c-9.098 0-16.473-7.375-16.473-16.473v-9.015c0-11.851-11.595-20.23-22.847-16.511-26.243 8.674-54.579 8.676-80.823.006l-.031-.01c-11.252-3.717-22.845 4.662-22.845 16.512v9.019c0 9.098-7.375 16.473-16.473 16.473h-16.358v26.938c0 6.883 5.58 12.464 12.464 12.464 2.172 0 3.939 1.701 4.076 3.869 2.628 41.668 37.235 74.654 79.565 74.654 42.33 0 76.937-32.986 79.565-74.654.137-2.167 1.904-3.869 4.076-3.869 6.883 0 12.464-5.58 12.464-12.464v-26.939z" fill="#ffddce"/><path d="m335.73 180.318c-9.098 0-16.473-7.375-16.473-16.473v-9.015c0-11.851-11.595-20.23-22.847-16.511-3.108 1.027-6.247 1.923-9.407 2.707v88.972c-.438 28.948-16.3 54.142-39.725 67.758 2.861.311 5.763.486 8.706.486 42.33 0 76.937-32.986 79.565-74.654.137-2.167 1.904-3.869 4.076-3.869 6.883 0 12.464-5.58 12.464-12.464v-26.938h-16.359z" fill="#ffcbbe"/></g><g fill="#f4fbff"><path d="m213.194 316.06-33.558 27.267 35.192 43.513c4.281 4.168 11.019 4.424 15.605.594l26.465-22.107z"/><path d="m298.79 316.06-41.892 49.267 24.874 21.268c4.557 3.896 11.327 3.7 15.651-.453l34.94-42.815z"/></g></g><path d="m213.194 316.06-49.256 24.199c-3.75 1.842-5.256 6.404-3.341 10.117l9.65 18.71c2.501 4.848 1.578 10.756-2.282 14.61-1.987 1.983-4.139 4.131-6.004 5.993-3.338 3.332-4.537 8.255-3.067 12.737 11.651 35.517 67.725 89.828 88.946 109.478 1.427.038 2.857.064 4.29.08-15.389-29.933-69.922-143.655-38.936-195.924z" fill="#365e7d"/><path d="m344.019 383.695c-3.861-3.854-4.783-9.762-2.282-14.61l9.65-18.71c1.915-3.713.409-8.275-3.341-10.117l-49.256-24.198c30.978 52.255-23.517 165.929-38.923 195.9 1.448-.025 2.893-.061 4.335-.109 21.265-19.695 77.248-73.94 88.888-109.424 1.47-4.482.271-9.405-3.067-12.737-1.865-1.863-4.017-4.012-6.004-5.995z" fill="#365e7d"/><path d="m256.898 365.327-26.06 21.764 13.278 16.781h23.767l13.279-17.771z" fill="#dd636e"/></g></g></g></g></svg>
                            <h5 class="card-title d-inline"> <?php echo ucfirst($row['name']);?></h5>
                            <p class="card-text"><a class="fb_link profile-link-p" href="<?php echo $row['fb_link']?>"><i class="facebook icon"></i> <?php echo $row['fb_link']?></a></p>
                            <p class="card-text"><a class="insta_link profile-link-p" href="<?php echo $row['insta_link']?>"><i class="instagram icon"></i> <?php echo $row['insta_link']?></a></p>
                            <p class="card-text"><a class="li_link profile-link-p" href="<?php echo $row['li_link']?>"><i class="linkedin icon"></i> <?php echo $row['li_link']?></a></p>
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

<?php include("sidenav-foot.php") ?>
<?php include("footer.php") ?>
