<?php
// Database connection details
$serverName = "LENOVO"; // Your SQL Server name
$connectionOptions = [
    "Database" => "USER", // Your database name
    "Uid" => "", // Username (empty if using Windows Authentication)
    "PWD" => ""  // Password (empty if using Windows Authentication)
];

// Establish database connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Basic validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        die("All fields are required.");
    }

    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data
    $sql = "INSERT INTO USERS (USERNAME, EMAIL, PASSWORD_HASH, CREATED_AT) VALUES (?, ?, ?, GETDATE())";
    $params = [$username, $email, $hashed_password];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die("Error: " . print_r(sqlsrv_errors(), true));
    } else {
        echo "Registration successful!";
    }

    // Close the statement and connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>

