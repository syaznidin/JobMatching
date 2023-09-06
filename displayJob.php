<?php
    session_start();
    include 'dbConnect.php';
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Java Developer, TNG Digital Sdn Bhd">
    <meta name="description" content="">
    <title>Job</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Job.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.13.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "jrwhitetrans.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Job">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-custom-color-1 u-header u-sticky u-sticky-c86f u-header" id="sec-dcff"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="HomeIn.php" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500" title="Home">
          <img src="jrwhitetrans.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; font-weight: 500;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-text-shadow u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect></g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
                <li class="u-nav-item"><a class="u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2" href="Account.php" style="padding: 10px 20px;">Account</a></li>
                <li class="u-nav-item"><a class="u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2" href="AboutIn.html" style="padding: 10px 20px;">About</a></li>
            </ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Account.php">Account</a></li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="AboutIn.html">About</a></li>
                </ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-8c6f">
    
    <div class="u-clearfix u-sheet u-sheet-1">
    <?php   
        if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];

        $result = mysqli_query($conn, "SELECT * FROM jobads WHERE job_id='$job_id'");
        $job = mysqli_fetch_assoc($result);
        
        if ($job) {
            echo "<h1 class='u-text u-text-default u-text-1'>Job Title: " . htmlspecialchars($job['job_name']) . "</h1>";
            echo "<h2 class='u-text u-text-default u-text-3'>" . htmlspecialchars($job['company_name']) . "</h2>";
            echo "<p class='u-text u-text-default u-text-2'>" . htmlspecialchars($job['date_posted']) . "</p>";
            echo "<p class='u-text u-text-default u-text-4'>" . htmlspecialchars($job['job_type']) . "</p>";
            echo "<h3 class='u-text u-text-default u-text-5'>" . htmlspecialchars($job['location']) . "</h3>";
            echo "<p>Salary: " . htmlspecialchars($job['salary']) . "</p>";
            echo "<p>Job Specialization: " . htmlspecialchars($job['job_specialization']) . "</p>";
            echo "<p>Job Skills Required: " . htmlspecialchars($job['skill']) . "</p>";
            echo "<a href=" . htmlspecialchars($job['url']) . " class='u-active-none u-border-2 u-border-active-palette-2-dark-1 u-border-hover-palette-2-base u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-btn u-button-style u-hover-none u-none u-text-hover-palette-2-base u-text-palette-1-base u-btn-1'>JobStreet Link</a>";
        } else {
            echo "<p>Job information not found.</p>";
        }
        } else {
            echo "<p>No job_id specified.</p>";
        }
    
    mysqli_close($conn);
    ?>
    <form action="matching2.php" method="post">
        <button type="submit" style="margin: 20px; width: 200px; height: 50px;">Back</button>
    </form>
    
    </div>
    </section>
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-a21e"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">2023 Job Recommender</p>
      </div></footer>
</body>
</html>