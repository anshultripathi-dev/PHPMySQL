<?php
$filename = $_FILES["image"]["name"];
$isUploaded = is_uploaded_file($_FILES["image"]["tmp_name"]);
$filenameIsImage = preg_match("/\.(gif|jpg)$/", $filename);
if($isUploaded && $filenameIsImage) {
move_uploaded_file($_FILES["image"]["tmp_name"], $filename);
} else {
header("HTTP/1.1 400 Unable to accept uploaded file.");
die("Unable to accept uploaded file");
}
?>
<html>
<head> <title>Image Uploaded<?= $filename ?> </title> </head>
<body>
<p>23MIS0118<p>
<img src="<?= $filename ?>" alt="user uploaded image" >
</body>
</html>