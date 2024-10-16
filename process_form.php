<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password is blank
$dbname = "contact_form_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the form inputs
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert form data into the MySQL database
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // If successful, show a success alert and redirect to the home page
        echo "<script>
                alert('Thank you! Your message has been sent successfully.');
                window.location.href = 'index.html';
              </script>";
    } else {
        // If there's an error, show an error alert and redirect to the home page
        echo "<script>
                alert('There was an error submitting your message. Please try again.');
                window.location.href = 'index.html';
              </script>";
    }

    // Close the database connection
    $conn->close();
}
?>
