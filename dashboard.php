<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.html");
    exit;
}

// Database connection
$conn = new mysqli("localhost", "root", "", "contact_form_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle favorite and delete actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['favorite_id'])) {
        $id = $_POST['favorite_id'];
        $conn->query("UPDATE contacts SET is_favorite = NOT is_favorite WHERE id = $id");
    } elseif (isset($_POST['delete_id'])) {
        $id = $_POST['delete_id'];
        $conn->query("DELETE FROM contacts WHERE id = $id");
    }
}

// Fetch messages from the database
$result = $conn->query("SELECT * FROM contacts ORDER BY is_favorite DESC, created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Welcome, Admin</h1>
    <h1>Messages</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Favorite</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                    <td>
                        <?php echo $row['is_favorite'] ? 'Yes' : 'No'; ?>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="favorite_id" value="<?php echo $row['id']; ?>">
                            <button type="submit"><?php echo $row['is_favorite'] ? 'Unmark' : 'Mark as Favorite'; ?></button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
    <form class="contact-container" action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
