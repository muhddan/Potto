<?php
    //START A SESSION
    session_start();

    include('server.php');

    $uid = "";

    if(isset($_SESSION["member"]) === true){
        //SET USER INFORMATION
        $uid = $_SESSION['uid'];
        
        $sql_userInformation = "SELECT * FROM user WHERE user_id='$uid'";
        $res_userInformation = mysqli_query($conn, $sql_userInformation);
        $row_userInformation = mysqli_fetch_array($res_userInformation);

        $username = $row_userInformation['username'];
    }

?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Gallery</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Gallery.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.7.9, nicepage.com">
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
    <meta property="og:title" content="Gallery">
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
    <section class="u-align-center u-clearfix u-grey-10 u-section-1" id="carousel_a682">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-font-oswald u-text u-text-default u-text-palette-3-base u-text-1">Gallery</h1>
        <p class="u-text u-text-2">Unique photos that will give you motivation to find success.</p>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <?php
              $sql_searchGallery = "SELECT * FROM gallery";
              $res_searchGallery = mysqli_query($conn, $sql_searchGallery);
              
              if(mysqli_num_rows($res_searchGallery) > 0){
                while($row = mysqli_fetch_assoc($res_searchGallery)){
                  echo '<div class="u-container-style u-list-item u-repeater-item u-white u-list-item-2">
                    <div class="u-container-layout u-similar-container u-container-layout-3">
                      <img class="u-image u-image-2" src="resource/gallery_pic/'.$row['picture'].'" data-image-width="787" data-image-height="327">
                      <div class="u-container-style u-group u-video-cover u-group-2">
                        <div class="u-container-layout u-container-layout-4">
                          <h3 class="u-custom-font u-font-oswald u-text u-text-default u-text-6">'.$row['name'].'</h3>
                          <p class="u-text u-text-default u-text-7">'.$row['description'].'</p>
                          <h6 class="u-text u-text-palette-3-base u-text-8">RM '.$row['price'].'</h6>
                          <a href="payment.php?productID='.$row['gallery_id'].'" class="u-btn u-btn-rectangle u-button-style u-grey-10 u-btn-2">add to cart</a>
                        </div>
                      </div>
                    </div>
                  </div>';
                }
              }
            ?>

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