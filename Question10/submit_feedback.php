<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "problem10";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$ice_cream = $_POST['ice_cream'];
$nut_allergy = isset($_POST['nut_allergy']) ? 1 : 0;
$milk_allergy = isset($_POST['milk_allergy']) ? 1 : 0;
$comments = $_POST['comments'];

$sql = "INSERT INTO feedback (name, email, ice_cream, nut_allergy, milk_allergy, comments) VALUES ('$name', '$email', '$ice_cream', '$nut_allergy', '$milk_allergy', '$comments')";
if ($conn->query($sql) === TRUE) {
    echo "<h1>Thank you, $name, for your feedback!</h1>";
    echo "<table border='1'>
            <tr><th>Key</th><th>Value</th></tr>
            <tr><td>Name</td><td>$name</td></tr>
            <tr><td>Email</td><td>$email</td></tr>
            <tr><td>Favourite Ice-cream</td><td>$ice_cream</td></tr>
            <tr><td>Nut Allergy</td><td>" . ($nut_allergy ? 'Yes' : 'No') . "</td></tr>
            <tr><td>Milk Allergy</td><td>" . ($milk_allergy ? 'Yes' : 'No') . "</td></tr>
            <tr><td>Comments</td><td>$comments</td></tr>
          </table>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
