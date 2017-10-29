 <?php
    session_start();
    if(isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    }
    $movie_id = $_POST["movie_id"];
    $quantity = $_POST["quantity"];
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
    $query="insert into cart values ('".$user_id."',".$movie_id.",".$quantity.")";
    //echo $query;
    $result = mysqli_query($conn,$query);
?>