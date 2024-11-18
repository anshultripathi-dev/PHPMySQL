<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $input_date = $_POST['target_date'];
    $target_days = strtotime($input_date);

    if ($target_days === false) 
    {
        echo "Invalid date format. Please use 'mm-dd-yyyy'.<br>";
    } 
    else {
        $today = time();
        $diff_days = ($target_days - $today);
        $days = (int)($diff_days / 86400);

        if ($days >= 0) 
        {
            echo "Days till the birthday date: $days days!<br>";
        } 
        else 
        {
            echo "The birthday date has already passed.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Question: 4</title>
</head>
<body>
    <h1>Calculate Days Between Today and Birthday Date</h1>
    <form method="POST" action="">
        <label for="target_date">Enter your birthday date (mm-dd-yyyy):</label>
        <input type="text" id="target_date" name="target_date" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
