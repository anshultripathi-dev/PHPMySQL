<?php

include 'dbconnect.php';

$query = "INSERT into Artist (artName,artNationality) values ('Muse','British'),('Mr. Scruff','British'),('DeadMau5','Canadian'),('Mark Ronson','British'),('Mark Ronson & The Business Intl','British'),('Animal Collective','American'),('Kings of Leon','American'),('Maroon 5','American')";

if(mysqli_query($conn,$query))
{
	echo "Values inserted to Artist Table Successfully!"."<br>";
}

$query = "INSERT into CD(artID,cdTitle,cdPrice,cdGenre,cdRating,cdYear) values (1,'Black Holes and Revelations',9.99,'Rock',78,2006),(1,'The Resistance',11.99,'Rock',90,2009),(2,'Ninja Tuna',9.99,'Electronica',55,2008),(3,'For Lack of a Better Name',9.99,'Electro House',38,2009),(4,'Version',11.99,'Rock',77,2007),(5,'Record Collection',12.99,'Pop',22,2010),(6,'Merriweather Post Pavilion',12.99,'Electronica',82,2009),(7,'Only By The Night',9.99,'Rock',67,2008),(7,'Come Around Sundown',12.99,'Rock',31,2010),(8,'Hands All Over',11.99,'Pop',64,2010)";

if(mysqli_query($conn,$query))
{
	echo "Values inserted to CD Table Successfully!"."<br>";
}

$query = "SELECT cdTitle,cdGenre from CD";
$result = mysqli_query($conn,$query);
echo "<br><br> ==== Given Query Successful ==== <br><br>";
echo "<b>cdTitle,cdGenre</b><br>";
while($row=mysqli_fetch_row($result))
{
	echo "$row[0],$row[1]<br>";
}
$query = "SELECT artName, cdTitle, cdGenre, cdRating, cdYear FROM Artist NATURAL JOIN CD";
$result = mysqli_query($conn, $query);
echo "<br><br> ==== Given Query Successful ==== <br><br>";

echo "<table border='1' cellspacing='0' cellpadding='10'> 
<tr> 
<th> artName </th> 
<th> cdTitle </th> 
<th> cdGenre </th> 
<th> cdRating </th> 
<th> cdYear </th> 
</tr>";

while ($row = mysqli_fetch_row($result)) {
    echo "<tr> 
    <td>$row[0]</td> 
    <td>$row[1]</td>
    <td>$row[2]</td>
    <td>$row[3]</td>
    <td>$row[4]</td>
    </tr>";
}

echo "</table>";


$query = "SELECT artName, AVG(cdRating) AS avgRating, artNationality 
          FROM Artist 
          NATURAL JOIN CD 
          GROUP BY artName, artNationality";
$result = mysqli_query($conn, $query);
echo "<br><br> ==== Given Query Successful ==== <br><br>";

echo "<table border='1' cellspacing='0' cellpadding='10'> 
<tr> 
<th>artName</th> 
<th>Average Rating</th> 
<th>artNationality</th> 
</tr>";

while ($row = mysqli_fetch_row($result)) {
    echo "<tr> 
    <td>$row[0]</td> 
    <td>$row[1]</td>
    <td>$row[2]</td>
    </tr>";
}

echo "</table>";


$query = "SELECT artName, AVG(cdRating) AS avgRating, artNationality 
          FROM Artist 
          NATURAL JOIN CD 
          GROUP BY artName, artNationality";
$result = mysqli_query($conn, $query);
echo "<br><br> ==== Given Query Successful ==== <br><br>";

echo "<table border='1' cellspacing='0' cellpadding='10'> 
<tr> 
<th>artName</th> 
<th>Average Rating</th> 
<th>artNationality</th> 
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $avgRating = $row['avgRating'];
    $class = '';

    if ($avgRating >= 0 && $avgRating <= 39) {
        $class = 'poorrating';
    } elseif ($avgRating >= 40 && $avgRating <= 59) {
        $class = 'okrating';
    } elseif ($avgRating >= 60 && $avgRating <= 79) {
        $class = 'goodrating'; 
    } elseif ($avgRating >= 80 && $avgRating <= 100) {
        $class = 'greatrating'; 
    }

    echo "<tr> 
    <td>{$row['artName']}</td> 
    <td class='$class'>{$avgRating}</td>
    <td>{$row['artNationality']}</td>
    </tr>";
}

echo "</table>";

?>

<style>
.poorrating {
    color: red;
}
.okrating {
    color: orange;
}
.goodrating {
    color: yellow;
}
.greatrating {
    color: green;
}
</style>