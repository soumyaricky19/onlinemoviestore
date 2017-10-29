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
                $stop_list=array(",",";",":","a","about","above","after","again","against","all","am","an","and","any","are","aren't","as","at","be","because","been","before","being","below","between","both","but","by","can't","cannot","could","couldn't","did","didn't","do","does","doesn't","doing","don't","down","during","each","few","for","from","further","had","hadn't","has","hasn't","have","haven't","having","he","he'd","he'll","he's","her","here","here's","hers","herself","him","himself","his","how","how's","i","i'd","i'll","i'm","i've","if","in","into","is","isn't","it","it's","its","itself","let's","me","more","most","mustn't","my","myself","no","nor","not","of","off","on","once","only","or","other","ought","our","ours","ourselves","out","over","own","same","shan't","she","she'd","she'll","she's","should","shouldn't","so","some","such","than","that","that's","the","their","theirs","them","themselves","then","there","there's","these","they","they'd","they'll","they're","they've","this","those","through","to","too","under","until","up","very","was","wasn't","we","we'd","we'll","we're","we've","were","weren't","what","what's","when","when's","where","where's","which","while","who","who's","whom","why","why's","with","won't","would","wouldn't","you","you'd","you'll","you're","you've","your","yours","yourself","yourselves");
                $search_text = $_GET["search"];
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
                $tokens=tokenize($search_text);
                
                foreach($tokens as $token) {
                    if (!in_array($token,$stop_list))
                    {
                        //Title search 
                        $query="select * from movie where title like '%".$token."%'";
                        display($conn,$query);

                         //Director search
                        $query="select * from movie where director like '%".$token."%'";
                        display($conn,$query);

                        //Actor search
                        //$query="select * from movie where title like '%".$search_text."%'";
                        //display($conn,$query);
                    }
                }
                
               

                
                
                function display($conn,$query) {
                    $result = mysqli_query($conn,$query);
                    $list="<ul>";
                    while ($row = mysqli_fetch_array($result)){
                        $list=$list."<li>".$row["title"]."</li>";
                    }
                    $list=$list."</ul>";
                    echo $list;
                }
                // function tokenize($search_text)
                function tokenize($search_text)
                {
                    $tokens = explode(" ",$search_text); 
                    return $tokens;
                }
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


