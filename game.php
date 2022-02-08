<?php
require_once "config.php";
$_SESSION['selected_game_id'] = $_GET['game_id'];
$sql = "SELECT * FROM game WHERE game_id = '".$_SESSION['selected_game_id']."'";

//Get Game table Data START
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                $game_id = $row['game_id'];
                $image = $row['image'];
                $gname = $row['gname'];
                $desc_game = $row['desc_game'];
                $price = $row['price'];
                $release_date = $row['release_date'];
                $publisher_id = $row['publisher_id'];
        }
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Get transaction 
$sql = "SELECT * FROM transactions WHERE user_id = '".$_SESSION['session_id']."'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $list[] = array(
                "game_id" => $row['game_id'],
            );
            $php_array = $list;
            $list_js = json_encode($php_array);
        }
        mysqli_free_result($result);
    } else {
        // echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Get Publisher
$sql_publisher = "SELECT * FROM publisher WHERE publisher_id = $publisher_id";
if($result = mysqli_query($link, $sql_publisher)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                $publisher_id = $row['publisher_id'];
                $logo = $row['image'];
                $pname = $row['pname'];
                $bio = $row['bio'];
        }
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


include 'html/nav.html';
include 'html/game.html';
include 'html/footer.html';
?>
