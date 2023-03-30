<?php
    //START A SESSION
    session_start();

    include('server.php');

    $uid = $status = "";

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
    <meta name="keywords" content="My name is Danish, ​Objectives of website">
    <meta name="description" content="">
    <title>About</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="About.css" media="screen">
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
    <meta property="og:title" content="About">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-palette-4-dark-2 u-header" id="sec-b049"><div class="u-clearfix u-sheet u-sheet-1">
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
    <section class="u-clearfix u-gradient u-section-1" id="carousel_7d2f">
      <div class="u-expanded-width u-shape u-shape-rectangle u-white u-shape-1"></div>
      <img src="images/z7BWXNRw9rsoRDfFUNCVVV.jpg" alt="" class="u-image u-image-default u-image-1" data-image-width="2000" data-image-height="1334">
      <div class="u-container-style u-group u-white u-group-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
          <h2 class="u-text u-text-1">My name is <span style="font-weight: 700;">Danish</span>
          </h2>
          <p class="u-custom-font u-font-courier-new u-text u-text-2"> I am the person who make this website possible. I like to look for random pictures or images, thus that is where the idea came from.</p>
        </div>
      </div>
      <style data-mode="XXL">@media (max-width: 0px) {
   .u-section-1 {
    background-image: none;
    min-height: 834px;
  }
  .u-section-1 .u-shape-1 {
    background-image: none;
    height: 324px;
    margin-top: 0;
    margin-bottom: 0;
  }
  .u-section-1 .u-image-1 {
    width: 984px;
    height: 629px;
    object-position: 23.86% 50%;
    --animation-custom_in-translate_x: 0px;
    --animation-custom_in-translate_y: 300px;
    --animation-custom_in-opacity: 0;
    --animation-custom_in-rotate: 0deg;
    --animation-custom_in-scale: 1;
    margin-top: -263px;
    margin-right: auto;
    margin-bottom: 0;
    margin-left: calc(((100% - 1320px) / 2));
  }
  .u-section-1 .u-group-1 {
    width: 751px;
    min-height: 273px;
    background-image: none;
    height: auto;
    --animation-custom_in-translate_x: 0px;
    --animation-custom_in-translate_y: 0px;
    --animation-custom_in-opacity: 0;
    --animation-custom_in-rotate: 0deg;
    --animation-custom_in-scale: 0.3;
    margin-top: -189px;
    margin-right: calc(((100% - 1320px) / 2));
    margin-bottom: 60px;
    margin-left: auto;
  }
  .u-section-1 .u-container-layout-1 {
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 40px;
    padding-right: 40px;
  }
  .u-section-1 .u-text-1 {
    margin-top: 0;
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
  }
  .u-block-5fa6-57 {
    font-size: 1.125rem;
    margin-top: 20px;
    margin-left: 0;
    margin-right: 0;
    margin-bottom: 0;
  }
  .u-block-5fa6-58 {
    border-style: solid;
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }
}</style>
    </section>
    <section class="u-clearfix u-container-align-center u-palette-1-dark-3 u-section-2" id="carousel_9362">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-col">
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-container-align-center-lg u-container-align-center-xl u-container-style u-layout-cell u-size-59 u-layout-cell-1">
                    <div class="u-container-layout u-container-layout-1">
                      <div class="u-container-align-center-sm u-container-align-center-xs u-container-style u-expanded-width u-group u-radius-50 u-shape-round u-white u-group-1">
                        <div class="u-container-layout u-container-layout-2">
                          <h2 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-custom-font u-font-oswald u-text u-text-default u-text-1"> Objectives of website</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="u-container-style u-layout-cell u-size-1 u-layout-cell-2">
                    <div class="u-container-layout u-container-layout-3"></div>
                  </div>
                </div>
              </div>
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-container-align-center u-container-style u-layout-cell u-size-20 u-layout-cell-3">
                    <div class="u-container-layout u-valign-bottom u-container-layout-4">
                      <div class="u-container-align-center-sm u-container-align-center-xs u-container-align-left-lg u-container-align-left-md u-container-align-left-xl u-container-style u-expanded-width u-group u-palette-4-base u-radius-50 u-shape-round u-group-2">
                        <div class="u-container-layout u-valign-middle u-container-layout-5"><span class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-icon u-icon-circle u-text-palette-4-base u-white u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 55.867 55.867" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-2458"></use></svg><svg class="u-svg-content" viewBox="0 0 55.867 55.867" x="0px" y="0px" id="svg-2458" style="enable-background:new 0 0 55.867 55.867;"><path d="M11.287,54.548c-0.207,0-0.414-0.064-0.588-0.191c-0.308-0.224-0.462-0.603-0.397-0.978l3.091-18.018L0.302,22.602
	c-0.272-0.266-0.37-0.663-0.253-1.024c0.118-0.362,0.431-0.626,0.808-0.681l18.09-2.629l8.091-16.393
	c0.168-0.342,0.516-0.558,0.896-0.558l0,0c0.381,0,0.729,0.216,0.896,0.558l8.09,16.393l18.091,2.629
	c0.377,0.055,0.689,0.318,0.808,0.681c0.117,0.361,0.02,0.759-0.253,1.024L42.475,35.363l3.09,18.017
	c0.064,0.375-0.09,0.754-0.397,0.978c-0.308,0.226-0.717,0.255-1.054,0.076l-16.18-8.506l-16.182,8.506
	C11.606,54.51,11.446,54.548,11.287,54.548z M3.149,22.584l12.016,11.713c0.235,0.229,0.343,0.561,0.287,0.885L12.615,51.72
	l14.854-7.808c0.291-0.154,0.638-0.154,0.931,0l14.852,7.808l-2.836-16.538c-0.056-0.324,0.052-0.655,0.287-0.885l12.016-11.713
	l-16.605-2.413c-0.326-0.047-0.607-0.252-0.753-0.547L27.934,4.578l-7.427,15.047c-0.146,0.295-0.427,0.5-0.753,0.547L3.149,22.584z
	"></path></svg></span>
                          <h5 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-2"> Motivates</h5>
                          <p class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-3">Help users to get motivated by looking at our images.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="u-container-align-center u-container-style u-layout-cell u-size-20 u-layout-cell-4">
                    <div class="u-container-layout u-valign-bottom u-container-layout-6">
                      <div class="u-container-align-center-sm u-container-align-center-xs u-container-align-left-lg u-container-align-left-md u-container-align-left-xl u-container-style u-expanded-width u-group u-palette-3-base u-radius-50 u-shape-round u-group-3">
                        <div class="u-container-layout u-container-layout-7"><span class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-icon u-icon-circle u-text-palette-3-base u-white u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 54 54" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-5620"></use></svg><svg class="u-svg-content" viewBox="0 0 54 54" x="0px" y="0px" id="svg-5620" style="enable-background:new 0 0 54 54;"><g><path d="M27,8c-9.374,0-17,7.626-17,17c0,7.112,4.391,13.412,11,15.9V50c0,0.553,0.447,1,1,1h1v2c0,0.553,0.447,1,1,1h6
		c0.553,0,1-0.447,1-1v-2h1c0.553,0,1-0.447,1-1v-9.1c6.609-2.488,11-8.788,11-15.9C44,15.626,36.374,8,27,8z M30,49
		c-0.553,0-1,0.447-1,1v2h-4v-2c0-0.553-0.447-1-1-1h-1v-5h8v5H30z M31.688,39.242C31.277,39.377,31,39.761,31,40.192V42h-8v-1.808
		c0-0.432-0.277-0.815-0.688-0.95C16.145,37.214,12,31.49,12,25c0-8.271,6.729-15,15-15s15,6.729,15,15
		C42,31.49,37.855,37.214,31.688,39.242z"></path><path d="M27,6c0.553,0,1-0.447,1-1V1c0-0.553-0.447-1-1-1s-1,0.447-1,1v4C26,5.553,26.447,6,27,6z"></path><path d="M51,24h-4c-0.553,0-1,0.447-1,1s0.447,1,1,1h4c0.553,0,1-0.447,1-1S51.553,24,51,24z"></path><path d="M7,24H3c-0.553,0-1,0.447-1,1s0.447,1,1,1h4c0.553,0,1-0.447,1-1S7.553,24,7,24z"></path><path d="M43.264,7.322l-2.828,2.828c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293
		s0.512-0.098,0.707-0.293l2.828-2.828c0.391-0.391,0.391-1.023,0-1.414S43.654,6.932,43.264,7.322z"></path><path d="M12.15,38.436l-2.828,2.828c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293
		s0.512-0.098,0.707-0.293l2.828-2.828c0.391-0.391,0.391-1.023,0-1.414S12.541,38.045,12.15,38.436z"></path><path d="M41.85,38.436c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414l2.828,2.828c0.195,0.195,0.451,0.293,0.707,0.293
		s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414L41.85,38.436z"></path><path d="M12.15,11.564c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293c0.391-0.391,0.391-1.023,0-1.414l-2.828-2.828
		c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414L12.15,11.564z"></path><path d="M27,13c-6.617,0-12,5.383-12,12c0,0.553,0.447,1,1,1s1-0.447,1-1c0-5.514,4.486-10,10-10c0.553,0,1-0.447,1-1
		S27.553,13,27,13z"></path>
</g></svg></span>
                          <h5 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-4"> User friendly</h5>
                          <p class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-5">Create a user friendly website that were easy to navigate.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="u-container-align-center u-container-style u-layout-cell u-size-20 u-layout-cell-5">
                    <div class="u-container-layout u-valign-bottom u-container-layout-8">
                      <div class="u-container-align-center-sm u-container-align-center-xs u-container-align-left-lg u-container-align-left-md u-container-align-left-xl u-container-style u-expanded-width u-group u-palette-5-base u-radius-50 u-shape-round u-group-4">
                        <div class="u-container-layout u-container-layout-9"><span class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-icon u-icon-circle u-text-palette-5-base u-white u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 54 54" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bfac"></use></svg><svg class="u-svg-content" viewBox="0 0 54 54" x="0px" y="0px" id="svg-bfac" style="enable-background:new 0 0 54 54;"><g><path d="M51.22,21h-5.052c-0.812,0-1.481-0.447-1.792-1.197s-0.153-1.54,0.42-2.114l3.572-3.571
		c0.525-0.525,0.814-1.224,0.814-1.966c0-0.743-0.289-1.441-0.814-1.967l-4.553-4.553c-1.05-1.05-2.881-1.052-3.933,0l-3.571,3.571
		c-0.574,0.573-1.366,0.733-2.114,0.421C33.447,9.313,33,8.644,33,7.832V2.78C33,1.247,31.753,0,30.22,0H23.78
		C22.247,0,21,1.247,21,2.78v5.052c0,0.812-0.447,1.481-1.197,1.792c-0.748,0.313-1.54,0.152-2.114-0.421l-3.571-3.571
		c-1.052-1.052-2.883-1.05-3.933,0l-4.553,4.553c-0.525,0.525-0.814,1.224-0.814,1.967c0,0.742,0.289,1.44,0.814,1.966l3.572,3.571
		c0.573,0.574,0.73,1.364,0.42,2.114S8.644,21,7.832,21H2.78C1.247,21,0,22.247,0,23.78v6.439C0,31.753,1.247,33,2.78,33h5.052
		c0.812,0,1.481,0.447,1.792,1.197s0.153,1.54-0.42,2.114l-3.572,3.571c-0.525,0.525-0.814,1.224-0.814,1.966
		c0,0.743,0.289,1.441,0.814,1.967l4.553,4.553c1.051,1.051,2.881,1.053,3.933,0l3.571-3.572c0.574-0.573,1.363-0.731,2.114-0.42
		c0.75,0.311,1.197,0.98,1.197,1.792v5.052c0,1.533,1.247,2.78,2.78,2.78h6.439c1.533,0,2.78-1.247,2.78-2.78v-5.052
		c0-0.812,0.447-1.481,1.197-1.792c0.751-0.312,1.54-0.153,2.114,0.42l3.571,3.572c1.052,1.052,2.883,1.05,3.933,0l4.553-4.553
		c0.525-0.525,0.814-1.224,0.814-1.967c0-0.742-0.289-1.44-0.814-1.966l-3.572-3.571c-0.573-0.574-0.73-1.364-0.42-2.114
		S45.356,33,46.168,33h5.052c1.533,0,2.78-1.247,2.78-2.78V23.78C54,22.247,52.753,21,51.22,21z M52,30.22
		C52,30.65,51.65,31,51.22,31h-5.052c-1.624,0-3.019,0.932-3.64,2.432c-0.622,1.5-0.295,3.146,0.854,4.294l3.572,3.571
		c0.305,0.305,0.305,0.8,0,1.104l-4.553,4.553c-0.304,0.304-0.799,0.306-1.104,0l-3.571-3.572c-1.149-1.149-2.794-1.474-4.294-0.854
		c-1.5,0.621-2.432,2.016-2.432,3.64v5.052C31,51.65,30.65,52,30.22,52H23.78C23.35,52,23,51.65,23,51.22v-5.052
		c0-1.624-0.932-3.019-2.432-3.64c-0.503-0.209-1.021-0.311-1.533-0.311c-1.014,0-1.997,0.4-2.761,1.164l-3.571,3.572
		c-0.306,0.306-0.801,0.304-1.104,0l-4.553-4.553c-0.305-0.305-0.305-0.8,0-1.104l3.572-3.571c1.148-1.148,1.476-2.794,0.854-4.294
		C10.851,31.932,9.456,31,7.832,31H2.78C2.35,31,2,30.65,2,30.22V23.78C2,23.35,2.35,23,2.78,23h5.052
		c1.624,0,3.019-0.932,3.64-2.432c0.622-1.5,0.295-3.146-0.854-4.294l-3.572-3.571c-0.305-0.305-0.305-0.8,0-1.104l4.553-4.553
		c0.304-0.305,0.799-0.305,1.104,0l3.571,3.571c1.147,1.147,2.792,1.476,4.294,0.854C22.068,10.851,23,9.456,23,7.832V2.78
		C23,2.35,23.35,2,23.78,2h6.439C30.65,2,31,2.35,31,2.78v5.052c0,1.624,0.932,3.019,2.432,3.64
		c1.502,0.622,3.146,0.294,4.294-0.854l3.571-3.571c0.306-0.305,0.801-0.305,1.104,0l4.553,4.553c0.305,0.305,0.305,0.8,0,1.104
		l-3.572,3.571c-1.148,1.148-1.476,2.794-0.854,4.294c0.621,1.5,2.016,2.432,3.64,2.432h5.052C51.65,23,52,23.35,52,23.78V30.22z"></path><path d="M27,18c-4.963,0-9,4.037-9,9s4.037,9,9,9s9-4.037,9-9S31.963,18,27,18z M27,34c-3.859,0-7-3.141-7-7s3.141-7,7-7
		s7,3.141,7,7S30.859,34,27,34z"></path>
</g></svg></span>
                          <h5 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-6">Responsive</h5>
                          <p class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-7">Create a responsive website and useful for users.</p>
                        </div>
                      </div>
                    </div>
                  </div>
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