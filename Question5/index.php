<?php
function random_strings($length_of_string)
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), 0, $length_of_string);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $len = $_POST['length'];
    if ($len > 0) {
        echo "<h3>Generated Random String: </h3>";
        echo "<p>" . random_strings($len) . "</p>";
    } else {
        echo "<p>Please enter a valid length greater than 0.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Random Strings</title>
</head>
<body>
    <h3>Random String Generator</h3>
    <form action="" method="POST">
        <label for="length">Enter Length for Random String: </label>
        <input type="number" id="length" name="length" " min="1"><br><br>
        <input type="submit" value="Generate String">
    </form>
</body>
</html>
