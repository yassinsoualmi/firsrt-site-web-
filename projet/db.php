<?php
$serverName = "LENOVO";  // Your server name
$connectionOptions = [
    "Database" => "LENOVO", // Your database name
    "Uid" => "",            // Username (empty if using Windows Authentication)
    "PWD" => ""             // Password (empty if using Windows Authentication)
];

// Establish connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
