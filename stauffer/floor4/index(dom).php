<?php
    include_once '../includes/dbh.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      Stauffer Library - 4th Floor - OpenSeat
    </title>
    <style>
      /* Custom Style */
      .header {
        background-color: #3498db; /* Change the background color */
        color: white; /* Change the text color */
        text-align: center; /* Center align the text */
        padding: 1em; /* Add some padding */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); /* Add a drop shadow */
      }
      .header h1 {
        font-size: 3em; /* Increase the font size */
        margin: 0; /* Remove margins */
        font-family: 'Montserrat', sans-serif; /* Add a custom font */
        text-transform: uppercase; /* Change the text to uppercase */
        letter-spacing: 0.5em; /* Increase the letter spacing */
      }
      /* Progress Bar Style */
      .progress-bar {
        width: 80%; /* Width of the progress bar */
        background-color: #f1f1f1; /* Background color of the progress bar */
        height: 20px; /* Height of the progress bar */
        border-radius: 10px; /* Rounded corners of the progress bar */
        margin: 10px auto; /* Center align the progress bar */
      }
      .progress {
        background-color: #3498db; /* Progress color */
        width: 0%; /* Initial width of the progress */
        height: 100%; /* Height of the progress */
        border-radius: 10px; /* Rounded corners of the progress */
        transition: width 0.5s; /* Smooth transition of the progress */
      }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="header">
      <h1>Welcome to Stauffer Library</h1>
    </div>
    <div class="progress-bar">
      <div id="progress" class="progress"></div>
    </div>
    </body>

    <head>
        <style>
          /* styles for the classroom graphic */
          
          .classroom-graphic {
            width: 540px;
            height: 755px;
            background-image: url("https://i.imgur.com/61XAFbT.png");
            background-size: cover;
            position: relative;
            float: left;
            text-align: left;
            margin-top: 25px;
            margin-left: 100px;
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
          <?php
            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T120'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 90px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 90px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T121'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 120px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 120px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T122'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 150px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 150px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T123'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 180px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 180px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T124'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 210px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 210px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T125'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 240px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 240px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T126'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 370px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 370px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T127'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 400px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 400px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T128'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 430px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 430px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T129'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 460px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 460px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T130'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 490px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 490px;"></div>';
              }
            }

            $sql = "SELECT * FROM nfc_tags WHERE tag_id='T131'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
              $row = mysqli_fetch_assoc($result);
              $occupied = $row['occupied'];
              if ($occupied==1) {
                echo '<div class="dot red" style="left: 125px; top: 520px;"></div>';
              }
              else {
                echo '<div class="dot green" style="left: 125px; top: 520px;"></div>';
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
          document.write(busyness);
          progress.style.width = (busyness) + "%";
        </script>
      </body>
</html>