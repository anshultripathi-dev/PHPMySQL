<?php

$conn = mysqli_connect('localhost','root','','Problem7');

if($conn)
{
	echo "Connected to DataBase Successfully!"."<br>";
}
else
{
	echo  "Connection to DataBase Failed!".mysqli_connect_error();
}

?>