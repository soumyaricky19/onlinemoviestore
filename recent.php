<?php
	$search_text = $_GET["text"];
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
	
	$query = "select * from movie order by year desc limit 10";
	$result = mysqli_query($conn,$query);
    $list="<ul>";
    while ($row = mysqli_fetch_array($result)){
        $list=$list."<li>".$row["title"]."</li>";
    }
    $list=$list."</ul>";
    echo $list;
?>