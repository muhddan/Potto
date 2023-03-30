<?php
    //START A SESSION
    session_start();

    //CHECK IF THE USER IS LOGGED IN
    if(isset($_SESSION["admin"]) === true){
        header("location: index.php");
        exit;
    }

    include('../server.php');
    
    $staffID = $username = $password = $permission = $out = "";

    if(isset($_POST['login'])){
        $staffID = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['psw']);
        $staffID = addslashes($staffID);
        $password = addslashes($password);

        $sql_validate = "SELECT * FROM user WHERE username='$staffID' AND password='$password' AND permission='admin'";
        $res_validate = mysqli_query($conn, $sql_validate);

        if(mysqli_num_rows($res_validate) > 0){
            session_start();
            while($row = mysqli_fetch_array($res_validate)){
                //STORE DATA IN SESSION VARIABLES
                $username = $row["username"];
                $permission = $row["permission"];
                $uid = $row["user_id"];
                $email = $row["email"];

                $_SESSION["admin"] = true;
                $_SESSION["member"] = true;
                $_SESSION["permission"] = $permission;
                $_SESSION["uid"] = $uid;
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;

                header("location: index.php");
            }
        }else{
            $out = "Login Failed! Incorrect ID or Password!";
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
    <link rel="stylesheet" href="../nicepage.css" media="screen">
	<link rel="stylesheet" href="Log-In.css" media="screen">
    <script class="u-script" type="text/javascript" src="../jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../nicepage.js" defer=""></script>
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
}
    </script>
    <style>

      input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
      }

      input[type=button], input[type=submit], input[type=reset] {
        background-color: #04AA6D;
        border: none;
        color: white;
        padding: 12px 28px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 10px;
        margin: auto;
        text-align: center;
      }
  </style>
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

          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-align-center u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">

              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-section-1" id="sec-aed9">
      <div class="u-clearfix u-sheet u-sheet-1" style=" color: black !important; ">
          <h2 style="color: black;">Admin Login</h2>
          <br>
          <hr>
          <br>
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div style="text-align: left; width: 60%; margin: auto;">
              <label for="fname">Username</label>
              <input type="text" id="fname" name="username" placeholder="admin">
              <label for="lname">Password</label><br>
              <input type="text" id="lname" name="psw" placeholder="admin">

              <br>
              <p style="text-align: center; color: red;">
                <?php
                  echo $out;
                ?>
              </p>
              <br>

              <div style="text-align: center;">
                <input type="submit" value="Login" name="login">
              </div>
            </div>
          </form>
          <br><br>
      </div>
    </section>
    
    
    <footer class="u-clearfix u-footer u-grey-80" id="sec-893b"><div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
          <a class="u-social-url" title="Facebook" target="_blank" href="https://www.facebook.com/muhddan22/"><span class="u-file-icon u-icon u-social-facebook u-social-icon u-text-palette-1-dark-1 u-icon-1"><img src="../images/1051309-4af0ed0b.png" alt=""></span>
          </a>
          <a class="u-social-url" title="instagram" target="_blank" href="https://www.instagram.com/dansheeshh/"><span class="u-file-icon u-icon u-social-icon u-social-instagram u-icon-2"><img src="../images/1384063.png" alt=""></span>
          </a>
        </div>
        <p class="u-text u-text-default u-text-1">All right reserved @Potto 2023&nbsp;</p>
      </div></footer>
  
</body></html>