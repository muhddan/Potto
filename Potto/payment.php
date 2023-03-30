<?php
    //START A SESSION
    session_start();

    include('server.php');

    $uid = $status = $email = "";

    if(isset($_SESSION["member"]) === true){
        //SET USER INFORMATION
        $uid = $_SESSION['uid'];

        $sql_userInformation = "SELECT * FROM user WHERE user_id='$uid'";
        $res_userInformation = mysqli_query($conn, $sql_userInformation);
        $row_userInformation = mysqli_fetch_array($res_userInformation);

        $username = $row_userInformation['username'];
        $email = $row_userInformation['email'];
    }else{
        header("location: index.php");
        exit;
    }

    //GET GALLERY INFORMATION
    $productID = $_REQUEST['productID'];
    
    $sql_insertCart = "INSERT INTO cart (user_id, gallery_id, target_email) VALUES ('$uid', '$productID', '$email')";
    if(mysqli_query($conn, $sql_insertCart)){
      header("location: cart.php");
    }else{
      echo "Server Error! Please check your query!";
    }

    
?>