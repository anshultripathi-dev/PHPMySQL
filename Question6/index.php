<?php

$filename = 'data.csv';
echo "Data fetched from given CSV file. <br><br>";
if (($handle = fopen($filename, 'r')) !== false) {
    echo "<table border='1' cellspacing=0 cellpadding=5>";
    echo "<tr><th>Name</th><th>Age</th><th>Gender</th><th>City</th><th>State</th><th>Phone Number</th><th>Email</th></tr>";

    while (($data = fgetcsv($handle)) !== false) {
        if ($data[0] == 'Name') {
            continue;
        }

        echo "<tr>";
        foreach ($data as $column) {
            echo "<td>" . htmlspecialchars($column) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    fclose($handle);
} else {
    echo "Error opening the CSV file.";
}
?>
