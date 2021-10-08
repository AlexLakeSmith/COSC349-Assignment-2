<!DOCTYPE HTML>
<html>
<main>
<head>
<title>Add Songs Page</title>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios@0.2.1/dist/axios.min.js"></script>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Add a new song to Alex's birthday Playlist</h1>

<form action="insert.php" method="post">
<label>Song:</label>
<input type="text" id="song" name="song" required="required" placeholder="Enter the song to add"/><br /><br />
<label>Artist:</label>
<input type="text" id="artist" name="artist" required="required" placeholder="Enter the artist"/><br/><br />
<input type="submit" value="Submit" name="submit"/><br /> 
</form>

<h1>Upload album artwork</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

    
</body>
</main>
</html>

