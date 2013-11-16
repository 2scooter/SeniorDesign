<?php
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["images"]["error"] . "<br>";
}
else
{
	if (file_exists("images/" . $_FILES["images"]["name"]))
	{
	echo $_FILES["images"]["name"] . " already exists. ";
	}
	else
	{
	move_uploaded_file($_FILES["images"]["tmp_name"],
	"images/" . $_FILES["images"]["name"]);
	echo "Stored in: " . "images/" . $_FILES["images"]["name"];
	}
}



echo '<image src= "images/'. $_FILES["images"]["name"] .'" width = "100px" height = "100px">';

?> 