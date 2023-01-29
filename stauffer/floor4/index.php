<?php
    include_once '../includes/dbh.php';
?>

<!DOCTYPE html>
<html>
  <link  href="styles.css" rel="stylesheet">
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php
      // Get query string        
      if (!empty($_SERVER['QUERY_STRING'])) {
          $query_parts = explode('&', $_SERVER['QUERY_STRING']);
          $target_tag_id = $query_parts[0];
          //echo $target_tag_id;
          // Update row with tag_id == $target_tag_id
          $sql = "UPDATE nfc_tags
          SET occupied=NOT occupied, time_last_updated=CURRENT_TIMESTAMP
          WHERE tag_id='$target_tag_id'";
          mysqli_query($conn, $sql);
      }
    ?>
    <header class ="header2">
      <h1 class = "hlib">Stauffer Library</h1>
      <div class ="buttonrow">
        <button class="square-button" onclick="location.href='../../error.html'">B</button>
        <button class="square-button" onclick="location.href='../../error.html'">1</button>
        <button class="square-button" onclick="location.href='../../error.html'">2</button>
        <button class="square-button" onclick="location.href='../../error.html'">3</button>
        <button class="square-button" onclick="location.href=''">4</button>
        </div>
    </header>
    <div class="flex-containerb">
      <div class="progress-bar">
        <div id="progress" class="progress"></div>
      </div>
      <div class="flex-item10">Floor 4 — 
        <script>
          //JavaScript to update the progress bar
          var busyness =    <?php
                              // Get % capacity
                              $sql = "SELECT * FROM nfc_tags WHERE library='stauffer' AND occupied=1 AND floor=4;";
                              $result = mysqli_query($conn, $sql);
                              $occupied_seats = mysqli_num_rows($result);

                              $sql = "SELECT * FROM nfc_tags WHERE library='stauffer' AND floor=4;";
                              $result = mysqli_query($conn, $sql);
                              $total_seats = mysqli_num_rows($result);

                              $percent_full = round($occupied_seats / $total_seats * 100);
                              
                              echo $percent_full;
                              ?> // Update this value as per the current busyness of the library
          document.write(busyness + "% full");
        </script>
      </div>
    </div>
    <!-- <script>
      // JavaScript to update the progress bar
      var busyness = 5.5; // Update this value as per the current busyness of the library
      var progress = document.getElementById("progress");
      progress.style.width = (busyness * 10) + "%";
    </script> -->
    </body>
    <head>
        <style>
          /* styles for the classroom graphic */
          
          .classroom-graphic {
            width: 944px;
            height: 755px;
            background-image: url("https://i.imgur.com/uPz9w7r.png");
            background-size: cover;
            position: relative;
            margin: 0 auto;
          }
          
          /* styles for the dots */
          .dot {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            position: absolute;
            cursor: pointer;
          }
          
          /* style for filled seats */
          .red {
            background-color: red;
          }
          
          /* style for empty seats */
          .green {
            background-color: green;
          }
        </style>
      </head>
      <body>
        <div class="classroom-graphic">
          <?php
            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T120'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 90px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 90px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T121'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 120px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 120px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T122'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 150px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 150px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T123'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 180px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 180px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T124'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 210px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 210px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T125'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 240px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 240px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T126'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 370px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 370px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T127'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 400px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 400px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T128'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 430px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 430px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T129'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 460px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 460px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T130'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 490px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 490px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T131'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 325px; top: 520px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 325px; top: 520px;"></div>';
              }
            }
          ?>
        </div>
        <script>
          // JavaScript to update the progress bar
          var busyness =    <?php
                              // Get % capacity
                              $sql = "SELECT * FROM nfc_tags WHERE library='stauffer' AND occupied=1 AND floor=4;";
                              $result = mysqli_query($conn, $sql);
                              $occupied_seats = mysqli_num_rows($result);

                              $sql = "SELECT * FROM nfc_tags WHERE library='stauffer' AND floor=4;";
                              $result = mysqli_query($conn, $sql);
                              $total_seats = mysqli_num_rows($result);

                              $percent_full = round($occupied_seats / $total_seats * 100);
                              
                              echo $percent_full;
                              ?> // Update this value as per the current busyness of the library
          var progress = document.getElementById("progress");
          progress.style.width = (busyness) + "%";
        </script>
      </body>
</html>