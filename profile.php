<?php 
require_once "config.php";
if($_SESSION['session_role'] == "Guest")
{
    header("location:login.php");
}

// GET PROFILE
$current_user_id = $_SESSION['session_id'];
$sql = "SELECT * FROM user WHERE user_id = $current_user_id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                $user_id = $row['user_id'];
                $avatar = $row['avatar'];
                $username = $row['username'];
                $password = $row['passwd'];
                $email = $row['email'];
                $bio = $row['bio'];
                $role = $row['role'];
        }
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

//GET GAME LIST
$current_user_id = $_SESSION['session_id'];
$sql = "SELECT * FROM transactions as trans
INNER JOIN user WHERE trans.user_id = $current_user_id ORDER BY trans.transaction_id DESC";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $game_id[] = $row['game_id'];
        }
        $no_data = false;
        $game_id = array_unique($game_id);
        $idList = implode(',', $game_id);
        mysqli_free_result($result);

        // GET USER GAME LIST PURCHASED START
        $sql_game = "SELECT * FROM game WHERE game_id IN ($idList)  ORDER BY field(game_id, $idList) LIMIT 3";
        if($result = mysqli_query($link, $sql_game)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        $game_list[] = array(
                            "image" => $row['image'],
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

// UPDATE PROFILE
if(isset($_POST['save_profile'])){ //check if form was submitted
    $image = $_POST["image"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $bio = mysqli_real_escape_string($link, $_POST["bio"]);

    $sql = "UPDATE user SET avatar = '".$image."', email = '".$email."', username = '".$username."', bio = '".$bio."'
    WHERE user_id = $current_user_id";

    if(mysqli_query($link, $sql)){
        $message = "Profile updated.";
    } else{ 
        $message = "Profile update failed." . mysqli_error($link);
    }
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=profile.php">';
    exit; 
    mysqli_close($link);
}

// UPDATE PROFILE PASSWORD
if(isset($_POST['save_password'])){ //check if form was submitted
    $oldPass = $_POST["oldPass"];
    $newPass = $_POST["newPass"];
    $cPass = $_POST["cPass"];

    $sql = "UPDATE user SET passwd = '".$newPass."'
    WHERE user_id = $current_user_id";

    if(mysqli_query($link, $sql)){
        $message = "Password updated.";
    } else{ 
        $message = "Password update failed." . mysqli_error($link);
    }
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=profile.php">';
    exit; 
    mysqli_close($link);
}

include 'html/nav.html';
include 'html/profile.html';
include 'html/footer.html';
?>