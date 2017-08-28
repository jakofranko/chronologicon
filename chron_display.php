<?php 

    // I've redacted sensitive data.

    $serv = "localhost";
    $user = "XXXXXX";
    $pass = "XXXXXX";
    $data = "XXXXXX";
                
    $conn = new mysqli($serv, $user, $pass, $data);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get everything from the database
    $sql = "SELECT * FROM chronologicon";

    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        
        $result = $conn->query($sql);
        
        if($result) {
            
            while($row = $result->fetch_array()) {
                // For each row of the database, write a comma-separated string with the last four columns' data. Might have been easier to do this as part of the database query, but I was getting weird outputs so I'm doing it like this.
                $encode[] = $row[1] . ", " . $row[2] . ", " . $row[3] . ", " . $row[4];
            }
            
            // Send the comma-separated strings from the database back to the Ajax script on display.html, as an array.
            echo json_encode($encode);
            
        } else {
            echo("No logs discovered. ");
        }
        
        // Clear out the memory and close the connection.
        $result->free();
    }

    mysql_close($conn);

?>
