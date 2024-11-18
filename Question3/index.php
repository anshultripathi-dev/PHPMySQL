<?php
$json_data = '{"name": "Anshul Tripathi", "rno": "23MIS0118", "email": "anshul.tripathi.sis@gmail.com", "address":"VIT,Katpadi,Vellore"}';
$res = json_decode($json_data);
echo "Data decoded from JSON <br><br>";
if ($res !== null) 
{
    echo "<b>Name: </b>" . $res->name . "<br>";
    echo "<b>Register Number: </b>" . $res->rno . "<br>";
    echo "<b>E-mail: </b>" . $res->email . "<br>";
    echo "<b>Address: </b>" . $res->address . "<br>";
} 
else 
{
    echo "Failed to decode JSON data.";
}
?>
