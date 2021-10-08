<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<main>
<head>
<title>Alex's Playlist Catalogue</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Welcome to the Alex's Birthday Playlist Catalogue</h1>

<p>Below are the current songs included in the playlist:</p>
<p>To add a song to the playlist, click <a href="http://ec2-54-145-223-235.compute-1.amazonaws.com/">here</a>.</p>

<table border="1">
<tr><th>Song</th><th>Artist</th></tr>
<?php 

/*Must change details for this, need to establish RDS on AWS.*/
$db_host   = 'testdb.c5ztqfyuxwe0.us-east-1.rds.amazonaws.com';
$db_user   = 'admin';
$db_passwd = 'password123';
$db_name   = 'testdb';

$conn = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);

if(!$conn){
  die("Connection Error: " . mysqli_connect_error());
}

$sql = "SELECT * FROM music";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
  echo "<tr><td>".$row["songname"]."</td><td>".$row["artist"]."</td></tr>\n";
}
mysqli_close($conn);
?>
</table>

<h1> Below is the current playlist available on Spotify.</h1>
<iframe src="https://open.spotify.com/embed/playlist/1ES17dZFaxLUtBpEJo3zlY" width="100%" height="380" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
</body>
</main>
</html>