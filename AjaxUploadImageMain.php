<html>
<head>
<title>Ajax Image Upload Using PHP and jQuery</title>
<link rel="stylesheet" href="style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>
	<h1>Ajax Image Upload/Retrieve to/from SQL Database</h1>
	<hr>
	<div id="upload">
	<h3>Upload Image</h3>
		<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
			<div id="image_preview">
				<img id="previewImg" src="noimage.png" />
			</div>
			<br>
			<div id="selectImage">
				<input type="file" name="image" id="file"/>
				<br><br>
				<input type="submit" name="submitImage" value="Upload" class="submit" />
			</div>
	   </form>
	   <h4 id="loading" >Loading....</h4>
	   <div id="message"></div>
   	</div>
   	
   	<div id="retrieve">
   	<h3>Download/Retrieve Image</h3>
		<form id="downloadimage" action="" method="post">
			<div id="image_show">
			</div>
			<br>
			<div id="selectImage">
				Enter Image ID: <br>
				<input type="text" name="imageID" id="file"/>
				<br><br>
				<input type="submit" name="retrieveImage" value="Download" class="submit" />
			</div>
	   </form>
	   <h4 id="dloading" >Downloading..</h4>
   	</div>
</body>
</html>