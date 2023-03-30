<?php
    //START A SESSION
    session_start();

    include('../server.php');

    $username = $permission = $staffID = $profilePicture = "";

    //CHECK IF THE USER IS LOGGED IN
    if($_SESSION["admin"] !== true){
        header("location: login.php");
        exit;
    }

    $permission = $_SESSION["permission"];
    $uid = $_SESSION["uid"];
    $username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="../js/javascript.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="body">
    <div class="sidebar">
        <div id="sidebar-header">
            Nav Menu
        </div>
        <a href="index.php"><i class='bx bx-list-ol' ></i> Order List</a>
        <a class="active" href="gallary.php"><i class='bx bxs-info-circle' ></i> Gallary Info</a>
        <a href="gallary_create.php"><i class='bx bx-book-add' ></i> Gallary Create</a>
        <a href="logout.php"><i class='bx bxs-exit'></i> Logout</a>
    </div>

    <div class="content">
        <div style="width: 70%; margin: auto;">
            <br>
            <h1 style="text-align: center;">Gallery Information</h1>
            <br>
                <table id="table">
                    <tr>
                        <th style="width: 50px;">ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                        <?php
                            $sqll = "Select count(*) from gallery";
                            $retnum = mysqli_query($conn,$sqll);
                            $count = mysqli_fetch_array($retnum, MYSQLI_NUM);
                            $rec_count = $count['0'];
                            $rec_limit = 6;
                            $last_page = ceil($rec_count/$rec_limit);
                            
                            if(!empty($_REQUEST["page"])){
                            $page = $_REQUEST['page'];
                            $offset = ($page - 1) * $rec_limit;
                            }else{
                                $page= 1;
                                $offset = 0;
                            }
                            $postp = $page + 1;
                            $prevp = $page - 1;

                            $sql2 = "Select * from gallery";
                            $result = mysqli_query($conn,$sql2);
                        

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                        echo "<td>".$row['gallery_id']."</td>";
                                        echo "<td style='text-align: center;'><img style='margin: auto; width: 35px; height: 35px;' src='../resource/gallery_pic/".$row['picture']."'></img></td>";
                                        echo "<td>".$row['name']."</td>";
                                        echo "<td>".$row['description']."</td>";
                                        echo "<td style='text-align: right;'>RM".$row['price']."</td>";
                                        echo "<td><a style='text-decoration: none;' href='edit_gallery.php?productID=".$row['gallery_id']."'><div class='action-btn'><span>Edit</span></div></a>
                                            <a style='text-decoration: none;' href='delete_gallery.php?productID=".$row['gallery_id']."'><div style='background-color: red; margin-top: 5px;' class='action-btn'><span>Delete</span></div></a></td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr>";
                                    echo "<td style='text-align: center;' colspan='7'>Empty!</td>";
                                echo "</tr>";
                            }
          
                        ?>
                </table>
        </div>  
    </div>
</body>

</html>