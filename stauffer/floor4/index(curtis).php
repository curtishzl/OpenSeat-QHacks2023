<?php
    include_once '../includes/dbh.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Stauffer Library - 4th Floor - OpenSeat
        </title>
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

        /*
        // Insert new row
        $sql = "INSERT INTO nfc_tags (floor, description, occupied, time_last_updated)
        VALUES (4, 'B127', 1, CURRENT_TIMESTAMP);";
        mysqli_query($conn, $sql);
        */
    ?>

    <?php
    // Print % capacity
        $sql = "SELECT * FROM nfc_tags WHERE library='stauffer' AND occupied=1 AND floor=4;";
        $result = mysqli_query($conn, $sql);
        $occupied_seats = mysqli_num_rows($result);

        $sql = "SELECT * FROM nfc_tags WHERE library='stauffer' AND floor=4;";
        $result = mysqli_query($conn, $sql);
        $total_seats = mysqli_num_rows($result);

        $percent_full = round($occupied_seats / $total_seats * 100);
        
        echo "Stauffer Library 4th floor is currently " . $percent_full . "% full.<br><br>";
    ?>

    <?php
    // Print all seats
        $sql = "SELECT * FROM nfc_tags WHERE library='stauffer' AND floor=4;"; // select all (*)     ...nfc_tags WHERE occupied=1;
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result); // check to make sure it loaded
        
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { // $row is an array
                echo "Library: " . $row['library'] . "<br>";
                echo "Floor: " . $row['floor'] . "<br>";
                echo "Seat: " . $row['tag_id'] . "<br>";
                $is_occupied = ($row['occupied']==1) ? "OCCUPIED" : "AVAILABLE";
                echo $is_occupied . "<br>";
                
                // Automatically set seat to AVAILABLE after 3 hours in case someone forgot to check out
                $current_epoch_time = time()-21600; // 21600 for GMT -5
                $epoch_time_last_updated = strtotime($row['time_last_updated']);
                // echo "Current epoch time " . $current_epoch_time;
                // echo "<br>Epoch time last updated " . $epoch_time_last_updated . "<br>";
                if ($current_epoch_time - $epoch_time_last_updated > 10800) { // Set to 10800 for 3 hours
                    $sql = "UPDATE nfc_tags
                    SET occupied=0, time_last_updated=CURRENT_TIMESTAMP
                    WHERE time_last_updated = '".$row['time_last_updated']."'";
                    mysqli_query($conn, $sql);


                    $sql = "UPDATE nfc_tags
                    SET occupied=NOT occupied, time_last_updated=CURRENT_TIMESTAMP
                    WHERE tag_id='$target_tag_id'";
                    mysqli_query($conn, $sql);
                }
                echo $current_timestamp;
                echo "Time updated: " . $row['time_last_updated'] . "<br>";
                echo "<br>";
            }
        }
    ?>

    </body>
</html>