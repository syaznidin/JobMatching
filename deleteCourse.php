<?php
session_start();
include 'dbConnect.php';
$user_id = $_SESSION["user_id"];

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT id FROM user WHERE user_id='$user_id'");
        $id2 = mysqli_fetch_assoc($result);
        $courseid = implode(' ', $id2); 

        $string1 = $id;
        $string2 = $courseid;
        $result = str_replace($string1, "", $string2);

        $sql = mysqli_query($conn, "UPDATE user SET id='$result' WHERE user_id='$user_id'");
        
    }
?>
<!DOCTYPE html>
<html style='font-size: 16px;' lang='en'>
<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta charset='utf-8'><meta name='keywords' content=''>
    <meta name='description' content=''>
<title>Syllabus</title>
<link rel='stylesheet' href='nicepage.css' media='screen'>
<link rel='stylesheet' href='Syllabus.css' media='screen'>
<script class='u-script' type='text/javascript' src='jquery.js' defer=''></script>
<script class='u-script' type='text/javascript' src='nicepage.js' defer=''></script>
<meta name='generator' content='Nicepage 5.13.1, nicepage.com'>
<meta name='referrer' content='origin'>
<link id='u-theme-google-font' rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i'>
<script type='application/ld+json'>{ '@context': 'http://schema.org','@type': 'Organization','name': '','logo': 'jrwhitetrans.png'}</script><meta name='theme-color' content='#478ac9'><meta property='og:title' content='Syllabus'><meta property='og:type' content='website'><meta data-intl-tel-input-cdn-path='intlTelInput/'>
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
  </style></head>
<body class='u-body u-xl-mode' data-lang='en'>
    <header class='u-clearfix u-custom-color-1 u-header u-sticky u-sticky-c86f u-header' id='sec-dcff'>
        <div class='u-clearfix u-sheet u-sheet-1'>
            <a href='HomeIn.php' class='u-image u-logo u-image-1' data-image-width='500' data-image-height='500' title='Home'><img src='jrwhitetrans.png' class='u-logo-image u-logo-image-1'></a>
            <nav class='u-menu u-menu-one-level u-offcanvas u-menu-1'>
                <div class='menu-collapse' style='font-size: 1rem; font-weight: 500;'>
                <a class='u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-text-shadow u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base' href='#'>
                    <svg class='u-svg-link' viewBox='0 0 24 24'
                    ><use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#menu-hamburger'></use>
                </svg>
                <svg class='u-svg-content' version='1.1' id='menu-hamburger' viewBox='0 0 16 16' x='0px' y='0px' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg'><g><rect y='1' width='16' height='2'></rect>
                <rect y='7' width='16' height='2'></rect><rect y='13' width='16' height='2'></rect></g></svg></a></div>
<div class='u-custom-menu u-nav-container'>
    <ul class='u-nav u-spacing-2 u-unstyled u-nav-1'>
        <li class='u-nav-item'><a class='u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2' href='Account.php' style='padding: 10px 20px;'>Account</a></li>
        <li class='u-nav-item'><a class='u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2' href='AboutIn.html' style='padding: 10px 20px;'>About</a></li>
        <li class='u-nav-item'><a class='u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2' href='logout.php' style='padding: 10px 20px;'>Logout</a></li>
    </ul>
</div>
<div class='u-custom-menu u-nav-container-collapse'>
    <div class='u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav'>
        <div class='u-inner-container-layout u-sidenav-overflow'><div class='u-menu-close'></div>
        <ul class='u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2'>
            <li class='u-nav-item'><a class='u-button-style u-nav-link' href='Account.php'>Account</a></li>
            <li class='u-nav-item'><a class='u-button-style u-nav-link' href='AboutIn.html'>About</a></li>
            <li class='u-nav-item'><a class='u-button-style u-nav-link' href='logout.php'>Logout</a></li>
        </ul>
</div>
</div>
<div class='u-black u-menu-overlay u-opacity u-opacity-70'></div></div>
</nav></div>
</header><br>
    <section class="u-clearfix u-section-1" id="sec-c37">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-2 u-border-grey-75 u-form u-login-control u-form-1">
<!-- <br> -->
<form method="post" action="matching2.php" style="padding: 10px">
<table style="width: 100%;">
<tr><th>Registered Course</th></tr>
    <?php
    $result = mysqli_query($conn, "SELECT id FROM user WHERE user_id='$user_id'");
    while ($row = mysqli_fetch_row($result)) {
        $e = explode(",", $row[0]);
        foreach ($e as $courseId) {
            $result2 = mysqli_query($conn, "SELECT id, subject, description FROM course WHERE id='$courseId'");
            while ($courseRow = mysqli_fetch_row($result2)) {
                echo "<tr><td>$courseRow[0]. $courseRow[1] - $courseRow[2]</td></tr>";
            }
        }
    }
    $reid = implode(',', $e);
    $query1 = mysqli_query($conn, "UPDATE user SET id='$reid' WHERE user_id='$user_id'");
    ?>

</table>
<center>
    <button type="submit" style="margin: 20px; width: 200px; height: 50px;">Submit</button>
    <a href="Syllabus.php"><button type="button"s style="margin: 20px; width: 200px; height: 50px;" >Back</button></a>
</center>
</form>
</div></div>
</section>
<br>
<footer class='u-align-center u-clearfix u-footer u-grey-80 u-footer' id='sec-a21e'>
    <div class='u-clearfix u-sheet u-valign-middle u-sheet-1'>
        <p class='u-small-text u-text u-text-variant u-text-1'>2023 Job Recommender</p>
    </div>
</footer>
</body>
</html>