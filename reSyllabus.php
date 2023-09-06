<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Syllabus</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Syllabus.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.13.1, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/jrwhitetrans.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Syllabus">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-custom-color-1 u-header u-sticky u-sticky-c86f u-header" id="sec-dcff"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="Home.html" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500" title="Home">
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
            <ul class="u-nav u-spacing-2 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2" href="Account.html" style="padding: 10px 20px;">Account</a>
</li><li class="u-nav-item"><a class="u-active-grey-5 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-hover-grey-80 u-nav-link u-text-active-custom-color-1 u-text-custom-color-2 u-text-hover-custom-color-2" href="About.html" style="padding: 10px 20px;">About</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Account.html">Account</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.html">About</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-e43f">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-38 u-layout-cell-1">
                <div class="u-border-2 u-border-grey-75 u-container-layout u-container-layout-1">
                  <div class="u-form u-form-1"><p>Please re-choose courses</p>
                    <form action="regSyllabus.php" method="post" style="padding: 10px;">
                      <div class="u-form-group u-form-select u-form-group-1">
                        <label for="course" class="u-label">Choose Course (1st Semester):</label>
                        <div class="u-form-select-wrapper">
                          
                          <?php
                            include 'dbConnect.php';
                            $result = mysqli_query($conn, "select * from course where semester='1'");
                            while($row = mysqli_fetch_row($result))
                            {
                              echo"<input type='checkbox' id='checkbox-3f4d' name='course[]' value='$row[0]'>
                              <label for='checkbox-3f4d'>$row[1] - $row[2]</label><br>";
                            }
                          ?>
                          
                          <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div><br>
                        <label for="course" class="u-label">Choose Course (2nd Semester):</label>
                        <div class="u-form-select-wrapper">
                          <?php
                            include 'dbConnect.php';
                            $result = mysqli_query($conn, "select * from course where semester='2'");
                            while($row = mysqli_fetch_row($result))
                            {
                              echo"<input type='checkbox' id='checkbox-3f4d' name='course[]' value='$row[0]'>
                              <label for='checkbox-3f4d'>$row[1] - $row[2]</label><br>";
                            }
                          ?>
                          <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div><br>
                        <label for="course" class="u-label">Choose Course (3rd Semester):</label>
                        <div class="u-form-select-wrapper">
                        <?php
                            include 'dbConnect.php';
                            $result = mysqli_query($conn, "select * from course where semester='3'");
                            while($row = mysqli_fetch_row($result))
                            {
                              echo"<input type='checkbox' id='checkbox-3f4d' name='course[]' value='$row[0]'>
                              <label for='checkbox-3f4d'>$row[1] - $row[2]</label><br>";
                            }
                          ?>
                          <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div><br>
                        <label for="course" class="u-label">Choose Course (4th Semester):</label>
                        <div class="u-form-select-wrapper">
                        <?php
                            include 'dbConnect.php';
                            $result = mysqli_query($conn, "select * from course where semester='4'");
                            while($row = mysqli_fetch_row($result))
                            {
                              echo"<input type='checkbox' id='checkbox-3f4d' name='course[]' value='$row[0]'>
                              <label for='checkbox-3f4d'>$row[1] - $row[2]</label><br>";
                            }
                          ?>
                          <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div><br>
                        <label for="course" class="u-label">Choose Course (5th Semester):</label>
                        <div class="u-form-select-wrapper">
                        <?php
                            include 'dbConnect.php';
                            $result = mysqli_query($conn, "select * from course where semester='5'");
                            while($row = mysqli_fetch_row($result))
                            {
                              echo"<input type='checkbox' id='checkbox-3f4d' name='course[]' value='$row[0]'>
                              <label for='checkbox-3f4d'>$row[1] - $row[2]</label><br>";
                            }
                          ?>
                          <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div><br>
                        <label for="course" class="u-label">Choose Course (6th Semester):</label>
                        <div class="u-form-select-wrapper">
                        <?php
                            include 'dbConnect.php';
                            $result = mysqli_query($conn, "select * from course where semester='6'");
                            while($row = mysqli_fetch_row($result))
                            {
                              echo"<input type='checkbox' id='checkbox-3f4d' name='course[]' value='$row[0]'>
                              <label for='checkbox-3f4d'>$row[1] - $row[2]</label><br>";
                            }
                          ?>
                          <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div><br>
                        <label for="course" class="u-label">Choose Course (Electives):</label>
                        <div class="u-form-select-wrapper">
                        <?php
                            include 'dbConnect.php';
                            $result = mysqli_query($conn, "select * from course where semester='4,5,6'");
                            while($row = mysqli_fetch_row($result))
                            {
                              echo"<input type='checkbox' id='checkbox-3f4d' name='course[]' value='$row[0]'>
                              <label for='checkbox-3f4d'>$row[1] - $row[2]</label><br>";
                            }
                          ?>
                          <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div><br>
                      </div>
                        <input type="submit" value="Submit" >
                        
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-a21e"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">2023 Job Recommender</p>
      </div></footer>
  
</body></html>
