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
                                  <label for='checkbox-3f4d'>" . $row['subject'] . " - " . $row['description'] . "</label><br>";
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
                                        <label for='checkbox-3f4d'>" . $row['subject'] . " - " . $row['description'] . "</label><br>";
                                }
                        }
                            ?>
                        </div>

                          <svg class="u-caret u-caret-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="fill:currentColor;" xml:space="preserve"><polygon class="st0" points="8,12 2,4 14,4 "></polygon></svg>
                        </div><br>
                        <!-- end of semester 1 -->