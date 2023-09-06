<?php
session_start();
include 'dbConnect.php';

$user_id = $_SESSION["user_id"];
$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the fields exist in $_POST before accessing them
    if (isset($_POST["firstName"], $_POST["lastName"], $_POST["birthDate"], $_POST["email"], $_POST["gender"])) {
        // Sanitize and validate the input
        $firstname = $_POST["firstName"];
        $lastname = $_POST["lastName"];
        $bDate = $_POST["birthDate"];
        $email = $_POST["email"];
        $phoneNum = $_POST["phoneNum"];
        $gender = $_POST["gender"];
        $query2 = mysqli_query($conn, "UPDATE user SET first_name='$firstname', last_name='$lastname', username='$email', birth_date='$bDate', phone_number='$phoneNum',  gender='$gender' WHERE user_id='$user_id'");
    }else {
        // Handle the case where one or more fields are missing in the form submission
        // You can display an error message or take any appropriate action here
        $edit_err = "Something went wrong.";
    }
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Account</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Account.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.13.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/jrwhitetrans.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Account">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
  <style>
    table, th, td{
      padding: 10px;
      border: 1px solid black;
      border-collapse: collapse;
    }

    .space {
      width: 4px;
      height: auto;
      padding-top: 10px;
    }
  </style>
</head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-custom-color-1 u-header u-sticky u-sticky-c86f u-header" id="sec-dcff"><div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
        <a href="HomeIn.php" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500" title="Home">
          <img src="jrwhitetrans.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; font-weight: 500;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-text-shadow u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
              </g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
              <li class="u-nav-item"><a class="u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2" href="#" style="padding: 10px 20px;">Account</a></li>
              <li class="u-nav-item"><a class="u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2" href="AboutIn.html" style="padding: 10px 20px;">About</a></li>
              <li class="u-nav-item"><a class="u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2" href="logout.php" style="padding: 10px 20px;">Logout</a></li>
            </ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="#">Account</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="AboutIn.html">About</a></li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <!-- <section class="u-clearfix u-section-1" id="sec-126c">
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section> -->
    
    <section class="u-clearfix u-section-1" id="sec-4002">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-2 u-border-grey-75 u-form u-login-control u-form-1">
          <form action="#" class="u-clearfix u-form-custom-backend u-form-spacing-0 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 20px;" method="post">
            
            <div class="u-form-group u-form-name">
            <?php
              $result = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$user_id'");
              while($row = mysqli_fetch_row($result)){
                echo "<p>User Profile &emsp;<a href='editAccount.php'>Edit Profile</a></p>";
                echo "<label for='firstName' class='u-label'>First Name: </label><input type='text'  id='firstName' name='firstName' class='u-input u-input-rectangle u-none u-input-1' value='$row[1]' readonly>";
                echo "<label for='lastName' class='u-label'><br>Last Name: </label><input type='text'  id='lastName' name='lastName' class='u-input u-input-rectangle u-none u-input-1' value='$row[2]' readonly>";
                echo "<label for='birthDate' class='u-label'><br>Birth Date: </label><input type='date'  id='birthDate' name='birthDate' class='u-input u-input-rectangle u-none u-input-1' value='$row[7]' readonly>";
                echo "<label for='email' class='u-label'><br>Email: </label><input type='text'  id='email' name='email' class='u-input u-input-rectangle u-none u-input-1' value='$row[3]' readonly>";
                echo "<label for='phoneNum' class='u-label'><br>Phone Number: </label><input type='text'  id='phoneNum' name='phoneNum' class='u-input u-input-rectangle u-none u-input-1' value='$row[5]' readonly>";
                echo "<label for='location' class='u-label'><br>Gender: </label><input type='text'  id='gender' name='gender' class='u-input u-input-rectangle u-none u-input-1' value='$row[6]' readonly>";
              }
            ?>
            <label for='password' class='u-label'><br>Password: </label>
            <input type='text'  id='password' name='password' class='u-input u-input-rectangle u-none u-input-2' value='Hidden' readonly>
              <br><a href="password.php" >Change Password</a>
            </div>
            
          </form>
          <form action="matching2.php" class="u-clearfix u-form-custom-backend u-form-spacing-0 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 20px;" method="post">
          
          <p>Registered Course</p>
          <table style="width: 100%;"><tr><th>Course Code</th><th>Course Name</th>
          <?php
            $result = mysqli_query($conn, "SELECT id FROM user WHERE user_id='$user_id'");
              while ($row = mysqli_fetch_row($result)) {
              $e = explode(",", $row[0]);
              foreach ($e as $courseId) {
              $result2 = mysqli_query($conn, "SELECT subject, description FROM course WHERE id='$courseId'");
              while ($courseRow = mysqli_fetch_row($result2)) {
                echo "<tr style='height: 50px;'><td>$courseRow[0]</td><td>$courseRow[1]</td></tr>";
              }
              }
            }
            $reid = implode(',', $e);
            $query1 = mysqli_query($conn, "UPDATE user SET id='$reid' WHERE user_id='$user_id'");
          ?>
          </table>
          <center>
                <a href="Syllabus2.php"><input type="button" style="color: black; margin: 20px; width: 200px; height: 50px;" value="Edit"></a>
          <a href="HomeIn.php">
            <button type="button" style="color: black; margin: 20px; width: 200px; height: 50px;">Back</button>
          </a>
          </center>
          
          </form>
        </div>
      </div>
 
    </section>
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-a21e"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">2023 Job Recommender</p>
      </div></footer>
  
</body></html>