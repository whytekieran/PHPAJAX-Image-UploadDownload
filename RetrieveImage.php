<?php
include 'Connect.php';

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	if(isset($_GET['imageID']))
	{
		$id = htmlentities($_GET['imageID']);

		if(!empty($id))
		{
			$con = connectDB();
			$query = "select id, image from userpics where id=".$id;
			
			if($result = mysql_query($query, $con))	
			{
				$queryNumRows = mysql_num_rows($result);
				
				if($queryNumRows == 0)
				{
					echo '<p>No Image with this ID was found</p>';
				}
				else if($queryNumRows == 1)
				{
					$row = mysql_fetch_array($result);
					echo '<img height="200" width="200" src="data:image;base64,'.$row[1].'">';
				}
			}
			
			mysql_close($con);
		}
		else 
		{
			echo '<p>You must enter an ID</p>';
		}
	}
}
?>