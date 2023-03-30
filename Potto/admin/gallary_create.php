<?php
    //START A SESSION
    session_start();

    include('../server.php');

    $username = $permission = $staffID = $profilePicture = $submitErr = $submitOut = "";

    //CHECK IF THE USER IS LOGGED IN
    if($_SESSION["admin"] !== true){
        header("location: login.php");
        exit;
    }

    $permission = $_SESSION["permission"];
    $uid = $_SESSION["uid"];

    //GET USER INFORMATION
    $sql_userInformation = "SELECT * FROM user WHERE user_id='$uid'";
    $res_userInformation = mysqli_query($conn, $sql_userInformation);
    $row_userInformation = mysqli_fetch_array($res_userInformation);

    $username = $row_userInformation['username'];

    $submitErr = $submitOut = $categoryName = "";

    if(isset($_POST["submit"])){
        
        $productName = $_POST['product-name'];
        $productPrice = $_POST['product-price'];
        $productDescription = $_POST['product-description'];

        $productName = addslashes($productName);
        $productPrice = addslashes($productPrice);
        $productDescription = addslashes($productDescription);

        if(!empty($productName) || !empty($productPrice) || !empty($productDescription)){

            $target_dir = "../resource/gallery_pic/";
			$target_file = $target_dir.basename($_FILES['file']['name']);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$uniqid = date('YmdHis');
			$new_image_name = $uniqid.".".$imageFileType;
			$real_target_dir = "../resource/gallery_pic/".$new_image_name;

            if($_FILES['file']['size'] > 8000000){
                $submitErr = "File Size Too Big!";
            }

            //CHECK FILE TYPE
            if(!empty(basename($_FILES['file']['name']))){
                if($imageFileType != "gif" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jpg"){
                    $submitErr = "Invalid File Type!";
                }
            }

            if(empty($submitErr)){
                if(move_uploaded_file($_FILES['file']['tmp_name'],$real_target_dir)){
					$bCover = basename($_FILES['file']['name']);

					$sql_insertData = "INSERT INTO gallery (name, description, picture, price) VALUES ('$productName', '$productDescription', '$new_image_name', '$productPrice')";

                    if(mysqli_query($conn, $sql_insertData)){
                        $submitOut = "Successfully Added!";
                    }else{
                        $submitErr = "Ops! Something Wrong! Please check your database!";
                    }
				}
            }
        }else{
            $submitErr = "Information missing!";
        }

    }
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
        <a href="gallary.php"><i class='bx bxs-info-circle' ></i> Gallery Info</a>
        <a class="active" href="gallary_create.php"><i class='bx bx-book-add' ></i> Gallery Create</a>
        <a href="logout.php"><i class='bx bxs-exit'></i> Logout</a>
    </div>

    <div class="content">
        <div style="width: 70%; margin: auto;">
            <br>
            <h1 style="text-align: center;">Create New Gallery</h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="create-product-container">
                    <div class="right-create-product-container">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" name="file" id="imageUpload" onchange="previewFile(this);" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div style="overflow: hidden;" class="avatar-preview">
                                <img id="previewImg" style="width: 200px; height: 200px;">
                            </div>
                        </div>

                        <label for="product-name">Gallery Name</label>
                        <input type="text" id="product-name" name="product-name">
                        <br>
                        <label for="product-price">Gallery Price (RM)</label>
                        <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="product-price" min="0.00" step="0.10" name="product-price">
                        <div style="width: 100%; margin: auto;">
                            <label for="description">Gallery Description</label>
                            <br>
                            <textarea id="textarea-product-description" name="product-description"></textarea>
                        </div>
                        <br>
                        <center>
                            <input type="submit" id="submit-btn" name="submit" value="Submit"></input>
                            <p style="color: green;"><?php echo $submitOut; ?></p>
                            <p style="color: red;"><?php echo $submitErr; ?></p>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src",reader.result);
                $("#previewImg").hide();
                $("#previewImg").fadeIn(650);
            }

            reader.readAsDataURL(file);
        }
    }
</script>