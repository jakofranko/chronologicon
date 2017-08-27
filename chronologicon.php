<?php 

    // I've obfuscated passwords and usernames.

    $m_disc_u = $_POST['disc'];
    $m_proj_u = $_POST['proj'];
    $m_date_u = $_POST['date'];
    $m_hour_u = $_POST['hour'];
    $m_pass_u = $_POST['pass'];

    $serv = "localhost";
    $user = "XXXXXX";
    $pass = "XXXXXX";
    $data = "XXXXXX";

    // Remove HTML tags for security, then lowercase everything for consistency.
    $m_disc = strtolower(strip_tags($m_disc_u));
    $m_proj = strtolower(strip_tags($m_proj_u));
    $m_date = strtolower(strip_tags($m_date_u));
    $m_hour = strtolower(strip_tags($m_hour_u));

    // MD5 encrypt the password string. This is dumb but the worst case scenario here is just that I have to restore a backup. Chronologicon's database is sandboxed and not public. I'll use a different solution eventually.
    $m_pass = md5($m_pass_u);

    if($m_disc != null) {

        if(is_numeric($m_date) && is_numeric($m_hour)) { // HTML doesn't have a convenient cross-browser numeric-only form field, so I'm just using text inputs and verifying that the values are numeric here.
                
            if($m_pass === "cea596a386909fb7dbc8f0bc53d6f41d") { // Check the MD5'd password against what it should be. Again, this is so, so dumb, but it's quick and I don't care.
            // The MD5 above has been changed from what it is on the live site, but I didn't redact it totally so you can still see what it should look like.
                
                $conn = new mysqli($serv, $user, $pass, $data);
                
                if($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "INSERT INTO chronologicon (discipline, project, date, hour)
                VALUES ('$m_disc', '$m_proj', '$m_date', '$m_hour')";

                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
            } else {
                echo('Password incorrect.');
            }

        } else {
            echo('Data format for at least one time input is incorrect. Format should be YYMMDD HH.');
        }
        
    } else {
        echo('Please enter a discipline.');
    }

?>
