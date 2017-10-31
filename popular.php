<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$db = "onlinemoviestore";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$query="select movie_id,title,imageUrl from movie order by votes limit 15";
	$result = mysqli_query($conn,$query);
	$list="";

    while ($row = mysqli_fetch_array($result)){
		//$img = getImage($row["title"]);
		//<a href="description.php?id='.$row["movie_id"].'"></a>
		$img = "<a href='description.php?id=".$row['movie_id']."'><img src='" .$row['imageUrl']. "' alt='Image not found' title='".$row['title']."' /></a>";
		$list=$list."<div class='cover-item'>".$img."</div>";
    }
    echo $list;
?>