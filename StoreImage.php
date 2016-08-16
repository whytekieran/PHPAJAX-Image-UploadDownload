<?php
include 'Connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$validextensions = array("jpeg", "jpg", "png");
	$temporary = explode(".", $_FILES['image']['name']);//Creates an array with filename, fileExtension
	$file_extension = end($temporary); //Extension is last element so get that so we can check if the extension is valid
	
	if(isset($_FILES['image']['type']) && !empty($_FILES["image"]["type"]))
	{
		if ((($_FILES['image']['type'] == "image/png") || ($_FILES['image']['type'] == "image/jpg") || 
			 ($_FILES['image']['type'] == "image/jpeg")) && ($_FILES['image']['size'] < 2000000) && in_array($file_extension, $validextensions))
		{
			if ($_FILES["image"]["error"] > 0)
			{
				echo "Error Code: " . $_FILES['image']['error'] . "<br/><br/>";
			}
			else
			{
				$image = $_FILES['image']['tmp_name'];
				$name = $_FILES['image']['name'];
				$image = file_get_contents($image);
				$image = base64_encode($image);
				saveImage($name, $image);
			}
		}
	}
	else 
	{
		echo 'Please select an image or an image with a jpeg, jpg or png extension type.';	
	}
}

function saveImage($name, $image)
{
	$con = connectDB();
	$query = "insert into userpics (name, image) values ('$name','$image')";
	$result = mysql_query($query, $con);

	if($result)
	{
		echo "<br> Image Uploaded";
	}
	else
	{
		echo "<br> Image Not Uploaded <br>";
		echo mysql_error($con);
	}
	
	mysql_close($con);
}

?>