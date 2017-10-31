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
	
	$query = "select movie_id,title,imageUrl from movie order by year desc limit 15";
	
	$result = mysqli_query($conn,$query);
	$list="";
	
    while ($row = mysqli_fetch_array($result)){
		
		
		$img = "<a href='description.php?id=".$row['movie_id']."'><img src='" .$row['imageUrl']. "' alt='Image not found' title='".$row['title']."' /></a>";
		$list=$list."<div class='cover-item'>".$img."</div>";
		//$img = getImage($row["title"]);
		//$query1 = "UPDATE `movie` SET `imageUrl`= '".$img."' WHERE `movie_id` = '".$row['movie_id']."'";
		//mysqli_query($conn,$query1);
		//echo $row['movie_id']."<br>";
    }
	echo $list;
?>
