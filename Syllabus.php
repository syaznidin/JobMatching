<?php
session_start();
include 'dbConnect.php';
$user_id = $_SESSION["user_id"];
?>
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
  </style></head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-custom-color-1 u-header u-sticky u-sticky-c86f u-header" id="sec-dcff"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="HomeIn.php" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500" title="Home">
          <img src="jrwhitetrans.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; font-weight: 500;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-text-shadow u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg></a>
</div>
<div class="u-custom-menu u-nav-container">
<ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Account.php">Account</a></li>
  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="AboutIn.html">About</a></li>
  <li class="u-nav-item"><a class="u-button-style u-nav-link" href="logout.php">Logout</a></li></ul>
  </div>
<div class="u-custom-menu u-nav-container-collapse">
<div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
<div class="u-inner-container-layout u-sidenav-overflow">
<div class="u-menu-close"></div>

  <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Account.php">Account</a></li>
    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="AboutIn.html">About</a></li>
    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="logout.php">Logout</a></li>
  </ul>
</div></div>
<div class="u-black u-menu-overlay u-opacity u-opacity-70"></div></div>
</nav></div>
</header><br>
<section class="u-clearfix u-section-1" id="sec-4002">
<div class="u-clearfix u-sheet u-sheet-1">
<div class="u-border-2 u-border-grey-75 u-form u-login-control u-form-1">

<form action="regSyllabus.php" method="post" style="padding: 20px;">
  <div class="u-form-group u-form-select u-form-group-1" >
  <table style="width: 100%;">
    <tr><th>Registered Course</th><th>Action</th></tr>

    <?php
      $result = mysqli_query($conn, "SELECT id FROM user WHERE user_id='$user_id'");

      while ($row = mysqli_fetch_row($result)) {
      $e = explode(",", $row[0]);
      sort($e);

      foreach ($e as $courseId) {
      $result2 = mysqli_query($conn, "SELECT * FROM course WHERE id='$courseId'");
      while ($courseRow = mysqli_fetch_row($result2)) {
        $courseIdEncoded = urlencode($courseRow[0]);
        echo "<tr><td>$courseRow[0]. $courseRow[1] - $courseRow[2]</td>";
        echo "<td><a href='deleteCourse.php?id=$courseIdEncoded' onclick='return confirmDelete();'>Delete</a></td></tr>";
      }
      }
      }

      $reid = implode(',', $e);
      $query1 = mysqli_query($conn, "UPDATE user SET id='$reid' WHERE user_id='$user_id'");
    ?>

  <script>
    function confirmDelete() {
    return confirm("Are you sure you want to delete this course?");
    }
  </script>

  </table><br>

  <!-- semester 1 -->
  <label for="course" class="u-label">Choose Course (1st Semester):</label>
  <div class="u-form-select-wrapper">
  <?php
    include 'dbConnect.php';

    // Fetch user IDs using prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result2 = mysqli_stmt_get_result($stmt);
    $idArray = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $idArray[] = $row2['id'];
    }
    // Define an example array
    $idArray = array();

    // Check if the array is empty
    if (empty($idArray)) {
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '1'");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
              <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
      }
    } else {
      $idString = implode(',', $idArray);
      // Fetch courses using prepared statements to prevent SQL injection
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '1' AND id NOT IN ($idString)");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Fetch all rows into an array
      $courses = array();
      while ($row3 = mysqli_fetch_assoc($result)) {
        $courses[] = $row3;
      }

      // Now you can use the $courses array which contains the rows from the 'course' table.
      foreach ($courses as $row) {
        echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
        <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
      }
    }
    ?>
    </div><br>
  <!-- end of semester 1 -->

  <!-- semester 2 -->
  <label for="course" class="u-label">Choose Course (2nd Semester):</label>
  <div class="u-form-select-wrapper">
  <?php
    include 'dbConnect.php';

    // Fetch user IDs using prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result2 = mysqli_stmt_get_result($stmt);
    $idArray = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $idArray[] = $row2['id'];
    }
    // Define an example array
    $idArray = array();

    // Check if the array is empty
    if (empty($idArray)) {
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '2'");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
              <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
      }
    } else {
      $idString = implode(',', $idArray);

      // Fetch courses using prepared statements to prevent SQL injection
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '2' AND id NOT IN ($idString)");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Fetch all rows into an array
      $courses = array();
      while ($row3 = mysqli_fetch_assoc($result)) {
        $courses[] = $row3;
      }

    // Now you can use the $courses array which contains the rows from the 'course' table.
    foreach ($courses as $row) {
      echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
          <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
    }
    }
  ?>
  </div><br>
  <!-- end of semester 2 -->

  <!-- semester 3 -->
  <label for="course" class="u-label">Choose Course (3rd Semester):</label>
  <div class="u-form-select-wrapper" >
  <?php
    include 'dbConnect.php';

    // Fetch user IDs using prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result2 = mysqli_stmt_get_result($stmt);
    $idArray = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $idArray[] = $row2['id'];
    }
    // Define an example array
    $idArray = array();

    // Check if the array is empty
    if (empty($idArray)) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '3'");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
            <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
    }
    } else {
      $idString = implode(',', $idArray);

      // Fetch courses using prepared statements to prevent SQL injection
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '3' AND id NOT IN ($idString)");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Fetch all rows into an array
      $courses = array();
      while ($row3 = mysqli_fetch_assoc($result)) {
        $courses[] = $row3;
      }

    // Now you can use the $courses array which contains the rows from the 'course' table.
    foreach ($courses as $row) {
      echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
          <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
    }
    }
  ?>
  </div><br>
  <!-- end of semester 3 -->

  <!-- semester 4 -->
  <label for="course" class="u-label" >Choose Course (4th Semester):</label>
  <div class="u-form-select-wrapper">
  <?php
    include 'dbConnect.php';

    // Fetch user IDs using prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result2 = mysqli_stmt_get_result($stmt);
    $idArray = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $idArray[] = $row2['id'];
    }
    // Define an example array
    $idArray = array();

    // Check if the array is empty
    if (empty($idArray)) {
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '4'");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
            <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
      }
    } else {
      $idString = implode(',', $idArray);

      // Fetch courses using prepared statements to prevent SQL injection
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '4' AND id NOT IN ($idString)");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Fetch all rows into an array
      $courses = array();
      while ($row3 = mysqli_fetch_assoc($result)) {
        $courses[] = $row3;
      }

      // Now you can use the $courses array which contains the rows from the 'course' table.
      foreach ($courses as $row) {
      echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
          <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
      }
    }
  ?>
  </div><br>
  <!-- end of semester 4 -->

  <!-- semester 5 -->
  <label for="course" class="u-label">Choose Course (5th Semester):</label>
  <div class="u-form-select-wrapper">
  <?php
  include 'dbConnect.php';

  // Fetch user IDs using prepared statements to prevent SQL injection
  $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE user_id = ?");
  mysqli_stmt_bind_param($stmt, "s", $user_id);
  mysqli_stmt_execute($stmt);
  $result2 = mysqli_stmt_get_result($stmt);
  $idArray = array();
  while ($row2 = mysqli_fetch_assoc($result2)) {
    $idArray[] = $row2['id'];
  }
  // Define an example array
  $idArray = array();

  // Check if the array is empty
  if (empty($idArray)) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '5'");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
    echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
        <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
    }
  } else {
    $idString = implode(',', $idArray);

    // Fetch courses using prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '5' AND id NOT IN ($idString)");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch all rows into an array
    $courses = array();
    while ($row3 = mysqli_fetch_assoc($result)) {
      $courses[] = $row3;
    }

    // Now you can use the $courses array which contains the rows from the 'course' table.
    foreach ($courses as $row) {
      echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
          <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
    }
  }
  ?>
  </div><br>
  <!-- end of semester 5 -->

  <!-- semester 6 -->
  <label for="course" class="u-label">Choose Course (6th Semester):</label>
  <div class="u-form-select-wrapper">
  <?php
    include 'dbConnect.php';

    // Fetch user IDs using prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result2 = mysqli_stmt_get_result($stmt);
    $idArray = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $idArray[] = $row2['id'];
    }
    // Define an example array
    $idArray = array();

    // Check if the array is empty
    if (empty($idArray)) {
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '6'");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result)) {
      echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
          <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
      }
    } else {
      $idString = implode(',', $idArray);

      // Fetch courses using prepared statements to prevent SQL injection
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '6' AND id NOT IN ($idString)");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Fetch all rows into an array
      $courses = array();
      while ($row3 = mysqli_fetch_assoc($result)) {
        $courses[] = $row3;
      }

      // Now you can use the $courses array which contains the rows from the 'course' table.
      foreach ($courses as $row) {
        echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
        <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
      }
    }
  ?>
  </div><br>
  <!-- end of semester 6 -->

  <!-- electives -->
  <label for="course" class="u-label">Choose Course (Electives):</label>
  <div class="u-form-select-wrapper">
  <?php
    include 'dbConnect.php';

    // Fetch user IDs using prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result2 = mysqli_stmt_get_result($stmt);
    $idArray = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $idArray[] = $row2['id'];
    }
    // Define an example array
    $idArray = array();

    // Check if the array is empty
    if (empty($idArray)) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '4,5,6'");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
    echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
        <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
    }
    } else {
      $idString = implode(',', $idArray);

      // Fetch courses using prepared statements to prevent SQL injection
      $stmt = mysqli_prepare($conn, "SELECT * FROM course WHERE semester = '4,5,6' AND id NOT IN ($idString)");
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // Fetch all rows into an array
      $courses = array();
      while ($row3 = mysqli_fetch_assoc($result)) {
        $courses[] = $row3;
      }

      // Now you can use the $courses array which contains the rows from the 'course' table.
      foreach ($courses as $row) {
        echo "<input type='checkbox' id='checkbox-3f4d' name='course[]' value='" . $row['id'] . "'>
            <label for='checkbox-3f4d'>" . $row['id'] . ". " . $row['subject'] . " - " . $row['description'] . "</label><br>";
      }
    }
  ?>
  </div><br>
  <!-- end of electives -->
<center>
  <button type="submit" style="color: black; margin: 20px; width: 200px; height: 50px;">Continue</button>
    <a href="HomeIn.php">
      <button type="button" style="color: black; margin: 20px; width: 200px; height: 50px;">Back</button>
    </a>
</center>

  </form>
                 
  </div>
  </div>
</section><br>
<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-a21e"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
  <p class="u-small-text u-text u-text-variant u-text-1">2023 Job Recommender</p>
</div>
</footer>
</body>
</html>
