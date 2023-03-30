<?php
    //START A SESSION
    session_start();

    include('server.php');

    //CHECK IF USER IS ALREADY LOGIN
    if(!empty($_SESSION["member"])){
        header("location: index.php");
        exit;
    }

    $staffID = $username = $password = $permission = $out = "";

    if(isset($_POST["login"])){
        $staffID = $_POST['username'];
        $password = $_POST['password'];
        $staffID = addslashes($staffID);
        $password = addslashes($password);

        // echo $password;
        // echo $staffID;

        $sql_validate = "SELECT * FROM user WHERE username='$staffID' AND password='$password' AND permission='member'";
        $res_validate = mysqli_query($conn, $sql_validate);

        if(mysqli_num_rows($res_validate) > 0){
            session_start();
            while($row = mysqli_fetch_array($res_validate)){
                //STORE DATA IN SESSION VARIABLES
                $permission = $row["permission"];
                $uid = $row["user_id"];

                $_SESSION["member"] = true;
                $_SESSION["permission"] = $permission;
                $_SESSION["uid"] = $uid;

                header("location: index.php");
            }
        }else{
            echo '<script>alert("Wrong email or password!")</script>';
        }
    }

?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Log In</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Log-In.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.7.9, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Potto - Home",
		"sameAs": [
				"https://www.facebook.com/muhddan22/",
				"https://www.instagram.com/dansheeshh/"
		]
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Log In">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-stick-footer u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-palette-4-dark-2 u-header" id="sec-b049"><div class="u-clearfix u-sheet u-sheet-1">
        <h3 class="u-align-center u-custom-font u-font-courier-new u-headline u-text u-text-1">
          <a href="/">Potto</a>
        </h3>
        <div class="u-align-left u-border-1 u-border-grey-15 u-expanded-width u-line u-line-horizontal u-line-1"></div>
        <nav class="u-align-left u-font-size-14 u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse">
            <a class="u-button-style u-nav-link" href="#">
              <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 302 302" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-622f"></use></svg>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-622f" x="0px" y="0px" viewBox="0 0 302 302" style="enable-background:new 0 0 302 302;" xml:space="preserve" class="u-svg-content"><g><rect y="36" width="302" height="30"></rect><rect y="236" width="302" height="30"></rect><rect y="136" width="302" height="30"></rect>
              </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-custom-font u-font-courier-new u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-white u-text-hover-palette-1-light-1 u-text-white" href="index.php" style="padding: 10px 20px;">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-white u-text-hover-palette-1-light-1 u-text-white" style="padding: 10px 20px;">Account</a>

<div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-2">
  <?php
    if(empty($uid)){
      echo '
    <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="Log-In.php">Log In</a>
    </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="Sign-Up.php">Sign Up</a>';
    }else{
      echo '
    <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="cart.php">My Cart</a>
    <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="logout.php">Logout</a>';
    }
  ?>
</li></ul>
</div>

</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-white u-text-hover-palette-1-light-1 u-text-white" href="About.php" style="padding: 10px 20px;">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-white u-text-hover-palette-1-light-1 u-text-white" href="Help.php" style="padding: 10px 20px;">Help</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-align-center u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link">Account</a><div class="u-nav-popup"><ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-nav-4"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Log-In.php">Log In</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Sign-Up.php">Sign Up</a>
</li></ul>
</div>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="About.php">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Help.php">Help</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-section-1" id="sec-aed9">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-align-center u-container-style u-image u-image-default u-layout-cell u-left-cell u-size-30 u-image-1" data-image-width="720" data-image-height="1080">
                <div class="u-container-layout u-container-layout-1"></div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h1 class="u-align-center u-custom-font u-font-oswald u-text u-text-body-color u-text-default u-text-1">LOGIN</h1>
                  <div class="u-form u-form-1">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" style="max-width:500px;margin:auto" method="post" enctype="multipart/form-data" style="padding: 10px">
                      <div class="u-form-group u-form-name u-label-none">
                        <label for="name-c359" class="u-label">Name</label>
                        <input type="text" placeholder="Username" id="name-c359" name="username" class="u-input u-input-rectangle u-radius-25" required="">
                      </div>
                      <br>
                      <div class="u-form-group u-label-none">
                        <label for="text-1595" class="u-label">Input</label>
                        <input type="password" placeholder="Password" id="text-1595" name="password" class="u-input u-input-rectangle u-radius-25" required="required">
                      </div>
                      <br>
                      <div class="u-align-center u-form-group u-form-submit">
                        <button type="submit" name="login" style="width: 130px; height: 50px;">Login</button>
                      </div>
                    </form>
                  </div>
                  <br>
                  <a href="Sign-Up.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-btn u-button-style u-none u-text-hover-black u-text-palette-1-base u-btn-2">Don't have an account?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="u-clearfix u-footer u-grey-80" id="sec-893b"><div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
          <a class="u-social-url" title="Facebook" target="_blank" href="https://www.facebook.com/muhddan22/"><span class="u-file-icon u-icon u-social-facebook u-social-icon u-text-palette-1-dark-1 u-icon-1"><img src="images/1051309-4af0ed0b.png" alt=""></span>
          </a>
          <a class="u-social-url" title="instagram" target="_blank" href="https://www.instagram.com/dansheeshh/"><span class="u-file-icon u-icon u-social-icon u-social-instagram u-icon-2"><img src="images/1384063.png" alt=""></span>
          </a>
        </div>
        <p class="u-text u-text-default u-text-1">All right reserved @Potto 2023&nbsp;</p>
      </div></footer>
  
</body></html>