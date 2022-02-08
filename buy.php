<?php
require_once "config.php";

if(isset($_POST['buy_game'])){ //check if form was submitted
    $price = $_POST["price"];
    $user_id = $_SESSION['session_id'];
    $game_id = $_POST["game_id"];
    $_SESSION['selected_game_id'] = $_POST["game_id"];

    $sql = "INSERT INTO transactions (value, user_id, game_id)
    VALUES ('$price', '$user_id', '$game_id')";

    if(mysqli_query($link, $sql)){
        // echo "Game successfully published.";
    } else {
        echo "Game failed to be added." . mysqli_error($link);
    }
    mysqli_close($link);
}


include 'html/thank_you.html';
?>
