<?php

$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];
$date = date('d-m');
$year = date('Y');
$validity = (int)$year+15;
if($age<18)
{
	echo "<b>Error:</b> Could not display driving license <br>";
	echo "Your age is less than 18 <br>";
}
else
{
	echo "<h2> <u> Driving License Details  </u> </h2>";
	echo "<b>Name: </b>$name<br>";
	echo "<b>Age: </b>$age<br>";
	echo "<b>Address: </b>$address</br>";
	echo "<b>Validity: </b>From $date-$year to $date-$validity</br>";
}

?>