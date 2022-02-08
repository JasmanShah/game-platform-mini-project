<?php
require_once "config.php";
if($_SESSION['session_role'] == "Guest")
{
    header("location:login.php");
}

//Get Game table Data START
$current_user_id = $_SESSION['session_id'];
$sql = "SELECT * FROM transactions
INNER JOIN user ON transactions.user_id = $current_user_id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $game_id[] = $row['game_id'];
            $no_data = false;
        }
        $game_id = array_unique($game_id);
        $idList = implode(',', $game_id);
        mysqli_free_result($result);

        // GET USER GAME LIST PURCHASED START
        $sql_game = "SELECT * FROM game WHERE game_id  IN ($idList)";
        if($result = mysqli_query($link, $sql_game)){
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
        // GET USER GAME LIST PURCHASED END

    } else {
        $no_data = true;
        // echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
//Get Game table Data END

include 'html/nav.html';
include 'html/library.html';
include 'html/footer.html';
?>
