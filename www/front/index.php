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

<table border="1">
<tr><th>Song</th><th>Artist</th></tr>
<?php 


/*Must change details for this, need to establish RDS on AWS.*/
#$db_host   = '192.168.2.13';
#$db_name   = 'testdb';
#$db_user   = 'admin';
#$db_passwd = 'password123';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
$q = $pdo->query("SELECT * FROM music");

while($row = $q->fetch()){
  echo "<tr><td>".$row["songname"]."</td><td>".$row["artist"]."</td></tr>\n";
}
?>


</table>

<h1> Below is the current playlist available on Spotify.</h1>
<iframe src="https://open.spotify.com/embed/playlist/1ES17dZFaxLUtBpEJo3zlY" width="100%" height="380" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
</body>
</main>
</html>