<?php
require_once "config.php";
if($_SESSION['session_role'] != "Guest")
{
    header("location:profile.php");
}
$message = '';


// LOGIN
if(isset($_POST['login_btn'])){
    $login_id = $_POST["loginId"];
    $login_id_lower = strtolower($_POST["loginId"]);
    $password = $_POST["loginPass"];

    $sql = "SELECT * FROM user WHERE (email = '$login_id' AND passwd = '$password') OR (username = '$login_id' AND passwd = '$password')
    OR (email = '$login_id_lower' AND passwd = '$password')";

    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                    $_SESSION['session_id'] = $row['user_id'];
                    $_SESSION['session_user'] = $row['username'];
                    $_SESSION['session_role'] = $row['role'];
            }
            mysqli_free_result($result);
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
    header('location: profile.php');
}

// REGISTER
if(isset($_POST['reg_btn'])){ //check if form was submitted
    $username = $_POST["regName"];
    $email = strtolower($_POST["regEmail"]);
    $password = $_POST["regPass"];

    $sql = "INSERT INTO user (username, passwd, email)
    VALUES ('$username', '$password', '$email')";

    if(mysqli_query($link, $sql)){
        $message = "Registration successfully.";
    } else{
        $message = "Registration failed." . mysqli_error($link);
    }
    mysqli_close($link);
}


include 'html/nav.html';
include 'html/login.html';
include 'html/footer.html';
?>
