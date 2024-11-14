<?php
// Connect to your database
$conn = new mysqli("localhost", "root", "", "contact_form_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hash the password and update the table
$hashedPassword = password_hash('Admin@123', PASSWORD_DEFAULT);
$sql = "UPDATE admin_users SET password='$hashedPassword' WHERE username='admin'";

if ($conn->query($sql) === TRUE) {
    echo "Password updated successfully.";
} else {
    echo "Error updating password: " . $conn->error;
}

// Close connection
$conn->close();
?>

<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password is blank
$dbname = "contact_form_db"; // Name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query to fetch user data
    $sql = "SELECT * FROM admin_users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session and redirect to dashboard
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Incorrect password.'); window.location.href = 'admin_login.html';</script>";
        }
    } else {
        echo "<script>alert('Username not found.'); window.location.href = 'admin_login.html';</script>";
    }
}

// Close connection
$conn->close();
?>
