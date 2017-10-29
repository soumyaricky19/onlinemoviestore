<!DOCTYPE html>
<html>  
  <head>
    <title></title>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css", rel="stylesheet">
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
  </head>
  <body>  
      <nav class='navbar navbar-inverse' style='background-color: rgba(10, 10, 10, 1); margin:0%;'>
          <div class='container-fluid'>
            <ul class='nav navbar-nav'>
                <li class='active'><a href='home.html'>Home</a></li> 
                <li><a href='/checkin' style='height: 10px'>Login</a></li>
                <li><a href='/borrower' style='height: 10px'>Sign Up</a></li>
                <li><a href='/fines' style='height: 10px'>Cart</a></li>
            </ul>
            <form method = 'GET' action = 'search_result.php' class='navbar-form navbar-right'>
              <div class='form-group'>
                <input type = 'text' class='form-control' name = 'search' placeholder = 'Search Movie' size='40'/>&nbsp; &nbsp;
                <button type = 'submit' class='btn btn-primary' style = 'width: 150px'>Search</button>
              </div>
            </form>
          </div>         
      </nav>
        <br/> 
      <div>
            <?php
                $movie_id = $_GET["id"];
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
                
                $query="select * from movie where movie_id=".$movie_id;
                $result = mysqli_query($conn,$query);
                require 'flickr.php';
                $flickr = new flickr('78dc2b13d9cc1127139a1aa12bf9fcc6'); 
                $row = mysqli_fetch_array($result);
                    $list=$list."<li>".$row["title"]."</li>"; 
                    $data = $flickr->search($row["title"]);
                    foreach($data['photos']['photo'] as $photo) { 
                        echo '<a href="description.php?id='.$row["movie_id"].'"><img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '_t.jpg" title="'.$row["title"].'"></a>'; 
                    }
                $info='<table><tr><td>Title: '.$row["title"].'</td></tr><tr><td>Description: '.$row["description"].'</td></tr><tr><td>Director: '.$row["director"].'</td></tr><tr><td>Year: '.$row["year"].'</td></tr><tr><td>Duration: '.$row["duration"].' mins</td></tr><tr><td> Rating: '.$row["rating"].'</td></tr><tr><td> Votes:'.$row["votes"].'</td></tr><tr><td>Available quantity: '.$row["quantity"].'</td></tr><tr><td>Price:'.$row["price"].'</td></tr></table>';

                echo $info;
            ?>
        </div>  
        <h1>Recent</h1>
        <div id="recent">  
            <script src="recent.js"></script> 
        </div>
        <h1>Popular</h1>
        <div id="popular">  
            <script src="popular.js"></script> 
        </div>
        
  </body>
</html>


