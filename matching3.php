<?php
session_start();
include 'dbConnect.php';

function getCourseSkillsFromDatabase($conn, $user_id): array {
    $courseSkills = array();
    $query1 = mysqli_query($conn, "SELECT id FROM user WHERE user_id='$user_id'");
    
    // if ($row = mysqli_fetch_assoc($query1)) {
    //     $cid = $row['id']; // Access the column by name
    //     $cidArray = explode(',', $cid); // Convert the comma-separated string to an array
    //     $cid2 = implode(',', $cidArray);
    //     // Check if $cidArray is not empty before using it in the SQL query
    //     if (!empty($cidArray)) {
    //         $result = mysqli_query($conn, "SELECT skills FROM course WHERE id='$cidArray'");
            
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $courseSkills[] = $row['skills'];
    //             echo "$row";
    //         }
    //     }
    // }
    while ($row = mysqli_fetch_row($query1)) {
        $e = explode(",", $row[0]);
        // Sort the $e array in ascending order
    
        foreach ($e as $courseId) {
            $result2 = mysqli_query($conn, "SELECT skills FROM course WHERE id='$courseId'");
            while ($courseRow = mysqli_fetch_row($result2)) {
                $courseSkills[] = $courseRow[0];
            }
        }
    }
    return $courseSkills;
}

function getJobSkillsFromDatabase($conn, $user_id): array {
    $jobSkills = array();
    $result = mysqli_query($conn, "SELECT * FROM jobads");

    while ($row = mysqli_fetch_assoc($result)) {
        $row['id'] = $row['job_id'];
        $row['job_title'] = $row['job_name'];
        $row['date'] = $row['date_posted'];
        $row['company'] = $row['company_name'];
        $row['type'] = $row['job_type'];
        $row['sal'] = $row['salary'];
        $row['loc'] = $row['location'];
        $row['specialization'] = $row['job_specialization'];
        $row['jskill'] = explode(',', $row['skill']);
        $row['link'] = $row['url']; 
        $jobSkills[] = $row;
    }
    return $jobSkills;
}

function levenshteinDistance(string $str1, string $str2): int {
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    
    $dp = array();
    
    for ($i = 0; $i <= $len1; $i++) {
        $dp[$i] = array();
        for ($j = 0; $j <= $len2; $j++) {
            $dp[$i][$j] = 0;
        }
    }
    
    for ($i = 0; $i <= $len1; $i++) {
        for ($j = 0; $j <= $len2; $j++) {
            if ($i == 0) {
                $dp[$i][$j] = $j;
            } elseif ($j == 0) {
                $dp[$i][$j] = $i;
            } elseif ($str1[$i - 1] == $str2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1];
            } else {
                $dp[$i][$j] = 1 + min($dp[$i - 1][$j], $dp[$i][$j - 1], $dp[$i - 1][$j - 1]);
            }
        }
    }
    
    return $dp[$len1][$len2];
}

function fuzzyMatchSkills(array $courseSkills, array $jobSkills, int $threshold): array {
    $matchedSkills = array();
    $implodedSkills = implode('  ', $courseSkills);
    $matchedSkills = array();
    // foreach ($courseSkills as $courseSkill) {
        foreach ($jobSkills as $job) {
            foreach ($job['jskill'] as $jobSkill){
                // $array1 = $courseSkills; // Assuming $courseSkills is a multidimensional array
                // $implodedStrings = array();
                
                // foreach ($array1 as $innerArray) {
                //     $implodedStrings[] = implode(', ', $innerArray);
                // }
                
                // $string = implode(' | ', $implodedStrings);
                // echo $string;


                // echo $implodedSkills;

                $distance = levenshteinDistance(strtolower($jobSkill), strtolower($implodedSkills));
                $length = max(strlen($jobSkill), strlen($implodedSkills));
            
                if ($length === 0) {
                    continue;
                }
                $similarity = ($length - $distance) / $length * 100;
            
                if ($similarity >= $threshold) {
                    $matchedSkills[$implodedSkills][] = [
                        'id' => $job['job_id'],
                        'job_title' => $job['job_name'],
                        'date' => $job['date_posted'],
                        'company' => $job['company_name'],
                        'type' => $job['job_type'],
                        'sal' => $job['salary'],
                        'loc' => $job['location'],
                        'specialization' => $job['job_specialization'],
                        'link' => $job['url'],
                        'job_skill' => $jobSkill,
                        'similarity' => $similarity
                    ];
                }
            }
        }
    // }
    var_dump($matchedSkills);
    return $matchedSkills;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION["user_id"];

    $courseSkills = getCourseSkillsFromDatabase($conn, $user_id);
    
    $jobSkills = getJobSkillsFromDatabase($conn, $user_id);
    $threshold = 30;

    $matchedSkills = fuzzyMatchSkills( $courseSkills, $jobSkills, $threshold);

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta charset='utf-8'><meta name='keywords' content=''>
    <meta name='description' content=''>
<title>Result Page</title>
    <style>
    table, th, td{
      padding: 10px;
      border: 1px solid black;
      border-collapse: collapse;
      margin: 20px;
    }
    .sorting{
        margin: 20px;
    }
    .sorting-option{
        height: 50px;
    }
    </style>
<link rel='stylesheet' href='nicepage.css' media='screen'>
<link rel='stylesheet' href='Syllabus.css' media='screen'>
<script class='u-script' type='text/javascript' src='jquery.js' defer=''></script>
<script class='u-script' type='text/javascript' src='nicepage.js' defer=''></script>
<meta name='generator' content='Nicepage 5.13.1, nicepage.com'>
<meta name='referrer' content='origin'>
<link id='u-theme-google-font' rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i'>
<script type='application/ld+json'>{ '@context': 'http://schema.org','@type': 'Organization','name': '','logo': 'jrwhitetrans.png'}</script><meta name='theme-color' content='#478ac9'><meta property='og:title' content='Syllabus'><meta property='og:type' content='website'><meta data-intl-tel-input-cdn-path='intlTelInput/'></head>
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
</header>
</head>
<body>
    <section class='u-clearfix u-section-1' id='sec-e43f'>
    <div class='u-clearfix u-sheet u-sheet-1'>
    <div class='u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1'>
    <div class='u-layout'><div class='u-container-style u-layout-cell u-size-38 u-layout-cell-1'><div class='u-border-2 u-border-grey-75 u-container-layout u-container-layout-1'><div class='u-form u-form-1'>
    <!-- <div class='u-form-group u-form-select u-form-group-1'> -->
    <!-- <form method="post" action="" class="sorting">
        <select name="sort_order" id="sort_order" class="sorting-option">
            <option value="desc" <?php echo isset($_POST['sort_order']) && $_POST['sort_order'] === 'desc' ? 'selected' : ''; ?>>Descending</option>
            <option value="asc" <?php echo isset($_POST['sort_order']) && $_POST['sort_order'] === 'asc' ? 'selected' : ''; ?>>Ascending</option>
        </select>
        <button type="submit" style="height: 50px;">Sort</button>
    </form> -->
    <form action="displayJob.php" method="post">
    <table>
    <tr>
        <th>Job Title</th>
        <th>Similarity</th>
        <th>Action</th>
    </tr>
    <?php 
    if (isset($matchedSkills) && count($matchedSkills) > 0) {
        // Sort the $matchedSkills array based on 'similarity' in the specified order
        // $sortOrder = isset($_POST['sort_order']) && ($_POST['sort_order'] === 'asc' || $_POST['sort_order'] === 'desc') ? $_POST['sort_order'] : 'asc';
        // usort($matchedSkills, function ($a, $b) use ($sortOrder) {
        //     $result = $a[0]['similarity'] - $b[0]['similarity'];
        //     return $sortOrder === 'desc' ? $result : -$result;
        // });
        usort($matchedSkills, function ($a, $b) {
            $similarityA = $a[0]['similarity'];
            $similarityB = $b[0]['similarity'];
            return $similarityB - $similarityA;        });
        foreach ($matchedSkills as $courseSkill => $matches) {
            if (is_array($matches)) {
                foreach ($matches as $match) {
                    echo "<tr><td>"  . htmlspecialchars($match['job_title']) . " - " . htmlspecialchars($match['company']) . "<br>" . htmlspecialchars($match['job_skill']) . "</td>";
                    echo "<td>" . round($match['similarity'], 0) . "%</td><td><a href='displayJob.php?job_id=" . urlencode($match['id']) . "'>More</a></td></tr>";
                }
            }
        }
    } else {
        echo "<tr><td colspan='3'>No matching skills found.</td></tr>";
    }
    ?>
    </table>
    </form>
    </div></div></div></div></div></div>
    </section>
</body>
</html>