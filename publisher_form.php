<?php
require_once "config.php";
if($_SESSION['session_role'] != "Admin")
{
    if($_SESSION['session_role'] == "Guest")
    header("location:login.php");
    else
    header("location:store.php");
}

$tab_title = 'Publisher';

// CREATE PUBLISHER
if(isset($_POST['submit_publisher'])){ //check if form was submitted
    $image = $_POST["image"];
    $name = mysqli_real_escape_string($link, $_POST["name"]);
    $bio = mysqli_real_escape_string($link, $_POST["bio"]);

    $sql = "INSERT INTO publisher (image, pname, bio)
    VALUES ('$image', '$name', '$bio')";

    if(mysqli_query($link, $sql)){
        //echo "No records matching your query were found.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=publisher_form.php">';
    exit;
}

// GET PUBLISHER LIST
$sql_game = "SELECT * FROM publisher";
if($result = mysqli_query($link, $sql_game)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $list[] = array(
                "publisher_id" => $row['publisher_id'],
                "image" => $row['image'],
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
$php_array = $list;
$list_js = json_encode($php_array);


// UPDATE PUBLISHER
if(isset($_POST['submit_edit_publisher'])){
    $id = $_POST["edit_id"];
    $image = $_POST["edit_image"];
    $name = mysqli_real_escape_string($link, $_POST["edit_name"]);
    $bio = mysqli_real_escape_string($link, $_POST["edit_bio"]);

    $sql_update_game = "UPDATE publisher SET image = '".$image."', pname = '".$name."', bio = '".$bio."'
    WHERE publisher_id = $id";

    if(mysqli_query($link, $sql_update_game)){
        // echo "Publisher Updated.";
    } else{ 
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=publisher_form.php">';
    exit;
}

// DELETE GAME
if(isset($_POST['delete_edit_publisher'])){
    $id = $_POST["edit_id"];
    $sql_delete = "DELETE FROM publisher WHERE publisher_id = $id";

    if(mysqli_query($link, $sql_delete)){
        //echo "Game Deleted.";
    } else{ 
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=publisher_form.php">';
    exit; 
    mysqli_close($link);
}




include 'html/nav.html';
include 'html/publisher_form.html';
include 'html/footer.html';
?>