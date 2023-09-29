<?php
require_once("initialize.php");

$msg = (isset($_GET['msg']) && $_GET['msg'] != '') ? $_GET['msg'] : '';

switch ($msg) {
    case 'add':
        msg_us();
        break;
}
function msg_us() {
    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        // Check if any of the required fields are empty
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
            // Handle the case when required fields are not filled
            message("All fields are required!", "error");
            redirect("index.php?p=contact");
        } else {
            // Sanitize user input
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            
            // TODO: Add database connection code here
            
            // Insert data into the database (replace with your database logic)
            $conn = new mysqli("your_server", "your_username", "your_password", "your_database");
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "INSERT INTO your_table (name, email, message) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $message);
            
            if ($stmt->execute()) {
                // Data successfully inserted into the database
                message("Message sent successfully!", "success");
                redirect("index.php?p=contact");
            } else {
                // Handle the case when data insertion fails
                message("Error: " . $stmt->error, "error");
                redirect("index.php?p=contact");
            }
            
            $stmt->close();
            $conn->close();
        }
    }
}
?>