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
                <li class='active'><a href='/'>Home</a></li> 
                <li><a href='/checkin' style='height: 10px'>Login</a></li>
                <li><a href='/borrower' style='height: 10px'>Sign Up</a></li>
                <li><a href='/fines' style='height: 10px'>Cart</a></li>
            </ul>
            <form method = 'GET' action = '/' class='navbar-form navbar-right'>
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
                //$search_text = $_GET["text"];
                $search_text="Guardians of the Galaxy";
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
                $query="select * from movie where title like '%".$search_text."%'";
                $result = mysqli_query($conn,$query);
                $list="<ul>";
                while ($row = mysqli_fetch_array($result)){
                    $list=$list."<li>".$row["title"]."</li>";
                }
                $list=$list."</ul>";
                echo $list;
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


