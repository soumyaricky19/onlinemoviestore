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
	
	$query="select * from movie where is_available=1 order by votes limit 10";
	$result = mysqli_query($conn,$query);
    $list="<ul>";
	require 'flickr.php';
    $flickr = new flickr('78dc2b13d9cc1127139a1aa12bf9fcc6'); 
    while ($row = mysqli_fetch_array($result)){
		$data = $flickr->search($row["title"]);
		foreach($data['photos']['photo'] as $photo) { 
			echo '<a href="description.php?id='.$row["movie_id"].'"><img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '_t.jpg" title="'.$row["title"].'"></a>'; 
		}
        $list=$list."<li>".$row["title"]."</li>";
    }
    $list=$list."</ul>";
    echo $list;
?>