<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "problem9"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username; 
        header("Location: " . $_SERVER['PHP_SELF']); 
        exit;
    } else {
        $error_message = "Invalid username or password";
    }
    $stmt->close();
}

if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
</head>
<body>

<?php if ($is_logged_in): ?>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <form method="POST" action="">
        <button type="submit" name="logout">Log Out</button>
    </form>
<?php else: ?>
    <h2>Login</h2>

    <?php if (isset($error_message)): ?>
        <p style="color:red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" name="submit" value="Log In">
    </form>
<?php endif; ?>

</body>
</html>

<?php
$conn->close(); 
?>
