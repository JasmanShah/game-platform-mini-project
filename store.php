<?php
require_once "config.php";
$_SESSION['session_startup'] = true;
$tab_title = 'Store';
$sql = "SELECT * FROM game";
$sql_game = "SELECT * FROM game ORDER BY game_id DESC LIMIT 3";
//Get Game table Data START
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $game_list[] = array(
                "game_id" => $row['game_id'],
                "image" => $row['image'],
                "gname" => $row['gname'],
                "desc_game" => $row['desc_game'],
                "price" => $row['price'],
                "release_date" => $row['release_date'],
                "publisher_id" => $row['publisher_id'],
            );
        }
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
//Get Game table Data END

include 'html/nav.html';
include 'html/store.html';
include 'html/footer.html';
?>
