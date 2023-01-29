<?php
  include_once 'stauffer/includes/dbh.php';
?>

<!DOCTYPE html>
<html>
  <link  href="styles.css" rel="stylesheet">
  <head> 
    <title> OpenSeat </title> 
  <body>
    <header class = "header1">
      <h1 class ="h1"> OpenSeat </h1>
      <h2>We saved you a seat. Please select your library.</h2>
    </header>
    <div class="flex-container">
      <div class="flex-item1">
        <button class="button1" onclick="location.href='/stauffer/floor4'">Stauffer</button>
      </div>
      <div class="flex-item2">
          <div class="number-box">
            <script>
              //JavaScript to update the percent capacity of Stauffer (all floors)
              var busyness =    <?php
                                  // Get % capacity
                                  $sql = "SELECT * FROM nfc_tags WHERE library='stauffer' AND occupied=1;";
                                  $result = mysqli_query($conn, $sql);
                                  $occupied_seats = mysqli_num_rows($result);

                                  $sql = "SELECT * FROM nfc_tags WHERE library='stauffer';";
                                  $result = mysqli_query($conn, $sql);
                                  $total_seats = mysqli_num_rows($result);

                                  $percent_full = round($occupied_seats / $total_seats * 100);
                                  
                                  echo $percent_full;
                                  ?> // Update this value as per the current busyness of the library
              document.write(busyness + "%");
            </script>
            
          </div>
      </div>
      <div class="flex-item1">
        <button class="button1" onclick="location.href='error.html'">Douglas</button>
      </div>
      <div class="flex-item2">
          <div class="number-box">34%</div>
      </div>
      <div class="flex-item1">
        <button class="button1" onclick="location.href='error.html'">Law</button>
        </div>
        <div class="flex-item2">
            <div class="number-box">60%</div>
  </body>
</html>