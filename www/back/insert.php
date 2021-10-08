<!DOCTYPE HTML>
<html>
<main>
<head>
<title>Add Songs Page</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<?php
/*Must change details for this, need to establish RDS on AWS.*/
$db_host   = 'testdb.c5ztqfyuxwe0.us-east-1.rds.amazonaws.com';
$db_name   = 'testdb';
$db_user   = 'admin';
$db_passwd = 'password123';

$conn = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);

if(!$conn){
  die("Connection Error: " . mysqli_connect_error());
}

$song = $_POST['song'];
$artist = $_POST['artist'];

$sql = "INSERT INTO music (songname, artist) VALUES('$song', '$artist')";

if (mysqli_query($conn, $sql)){
  echo "Successfully added song to the playlist";
} else{
  echo "Failed to add selected song to the playlist";
  }

mysqli_close($conn);

?>
</body>
</main>
</html>

