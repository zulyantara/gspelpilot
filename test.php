<?php

/**
 * Attempt MySQLi server connection. Assuming you are running MySQL
 * server with default setting (user 'root' with no password)
 *
 * Change root for username and password for your server.
 */
$conn = mysqli_connect("172.104.54.103", "gspeluser", "Ramadhan1438!");
 
// Check connection
if ($conn === false)
{
    exit("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
echo "Connect Successfully. Host info: " . mysqli_get_host_info($conn);

?>