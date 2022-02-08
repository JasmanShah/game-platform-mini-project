<?php
require_once "config.php";
if($_SESSION['session_role'] != "Admin")
{
    if($_SESSION['session_role'] == "Guest")
    header("location:login.php");
    else
    header("location:store.php");
}

// GET PUBLISHER LIST
$sql_publisher = "SELECT * FROM publisher";
if($result = mysqli_query($link, $sql_publisher)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $publisher_list[] = array(
                "publisher_id" => $row['publisher_id'],
                "logo" => $row['image'],
                "pname" => $row['pname'],
                "bio" => $row['bio'],
            );
        }
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// PUBLISH GAME
if(isset($_POST['submit_game'])){ //check if form was submitted
    $image = $_POST["image"];
    $name = mysqli_real_escape_string($link, $_POST["name"]);
    $price = $_POST["price"];
    $desc = mysqli_real_escape_string($link, $_POST["desc"]);
    $date = $_POST["date"];
    $publisher = $_POST["publisher"];

    $sql = "INSERT INTO game (image, gname, price, desc_game, release_date, publisher_id)
    VALUES ('$image', '$name', '$price','$desc', '$date', '$publisher')";

    if(mysqli_query($link, $sql)){
        //echo "No records matching your query were found.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=game_form.php">';
    exit;
}

// GET GAME LIST
$sql_game = "SELECT * FROM game";
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
$php_array = $game_list;
$game_list_js = json_encode($php_array);

// UPDATE GAME
if(isset($_POST['submit_edit_game'])){
    $id2 = $_POST["edit_game_id"];
    $image2 = $_POST["edit_image"];
    $name2 = mysqli_real_escape_string($link, $_POST["edit_name"]);
    $price2 = $_POST["edit_price"];
    $desc2 = mysqli_real_escape_string($link, $_POST["edit_desc"]);
    $date2 = $_POST["edit_date"];
    $publisher2 = $_POST["edit_publisher"];

    $sql_update_game = "UPDATE game SET image = '".$image2."', gname = '".$name2."', desc_game = '".$desc2."', price = '".$price2."', release_date = '".$date2."', publisher_id = '".$publisher2."' 
    WHERE game_id = $id2";


    if(mysqli_query($link, $sql_update_game)){
        //echo "Game Updated.";
    } else{ 
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=game_form.php">';
    exit; 
    mysqli_close($link);
}

// DELETE GAME
if(isset($_POST['delete_edit_game'])){
    $id2 = $_POST["edit_game_id"];
    $sql_delete = "DELETE FROM game WHERE game_id = $id2";

    if(mysqli_query($link, $sql_delete)){
        //echo "Game Deleted.";
    } else{ 
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=game_form.php">';
    exit; 
    mysqli_close($link);
}


include 'html/nav.html';
include 'html/game_form.html';
include 'html/footer.html';
?>
