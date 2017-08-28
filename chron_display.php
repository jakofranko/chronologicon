<?php 
    $serv = "localhost";
    $user = "XXXXXX";
    $pass = "XXXXXX";
    $data = "XXXXXX";
                
    $conn = new mysqli($serv, $user, $pass, $data);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM chronologicon";

    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        
        $result = $conn->query($sql);
        
        if($result) {
            
            while($row = $result->fetch_array()) {
                $encode[] = $row[1] . ", " . $row[2] . ", " . $row[3] . ", " . $row[4];
            }
            
            echo json_encode($encode);
            
        } else {
            echo("No logs discovered. ");
        }
        
        $result->free();
    }

    mysql_close($conn);

?>
