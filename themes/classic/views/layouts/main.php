<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Shalhevet: Reborn</title>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="description" content="">
    <meta name="author" content="Shalhevet at NYU">
    <meta name="keywords" content="shalhevet nyu hillel jew community">

    <!-- Le styles -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <link href="./assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="./assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="./assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="./assets/ico/favicon.ico">
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script> 
    <script type="text/javascript">
        $(document).ready(function(){
            
            $('.next-btn').on('click', function(e) {
                e.preventDefault();
                $('.carousel').carousel('prev')
            });
            $('.prev-btn').on('click', function(e) {
                e.preventDefault();
                $('.carousel').carousel('next')
            });
        });        
    </script>
  </head>

  <body>
      <div style="min-height:100%; position:relative;">
          <header>
              <div style="width:60%;height:100px;margin: 0 auto;">
                  <div style="width: 8%; float:left">
                      <a href="//"><img src="./assets/img/nyu.png" height="100"></a>
                  </div>
                  <div style="width: 25%; float: left; line-height: 30px; margin-top: 10px;"> <span style="font:27px 'Copperplate / Copperplate Gothic Light, sans-serif'">SHALHEVET</span><hr style="margin: 5px 0">
                      <span style="font: 20px 'Brush Script MT', cursive">Orthodox Judaism at NYU</span></div>
                  <div style="width: 60%; float: left; font-size: 30px;line-height: 30px; position:absolute"> <ul class="social">
                          <li><a href="/contact"><img src="./assets/img/social/contact_icon.png" style="vertical-align: middle"/></a></li>
                          <li><a href="/help"><img src="./assets/img/social/help_icon.png" height="48" width="48"/></a></li>
                          <li><a href="http://twitter.com"><img src="./assets/img/social/Twitter.png" height="48" width="48" /></a></li>
                          <li><a href="http://www.facebook.com/nyu.shalhevet"><img src="./assets/img/social/Facebook.png" height="48" width="48" /></a></li>
                      </ul></div>
              </div>
          </header> 
          
<?php echo $content ?>          
<!--          <footer>
              <ul class="footer-list">
                  <li><a href="http://www.bronfmancenter.org" target="_blank">Bronfman Center</a> </li>
                  <li><a href="http://sites.google.com/site/manhattaneruv/" target="_blank">Manhattan Eruv</a> </li>
                  <li><a href="http://www.koshertopia.com/Listings/East-Village/NYU-Kosher-Cafeteria" target="_blank">Kosher Cafeteria</a></li>
                  <li><a href="http://hebrewjudaic.as.nyu.edu/page/home">NYU Hebrew &amp; Judaic Studies Department</a></li>
              </ul>
              <!--<div class="footer-block">
                  <h3>Contact Us</h3>
                  <p>7 East 10th Street <br>
                      New York, NY 10003</p>
                  <p>P: 212.998.4123 <br>
                      F: 212.995.4774</p>
              </div>
              
              <div class="footer-block">
                  <p><a href="http://www.bronfmancenter.org" target="_blank">Bronfman Center</a> </p>
                  <p><a href="http://sites.google.com/site/manhattaneruv/" target="_blank">Manhattan Eruv</a></p> 
                  <p><a href="http://www.koshertopia.com/Listings/East-Village/NYU-Kosher-Cafeteria" target="_blank">Kosher Cafeteria</a></p>
                  <p><a href="http://hebrewjudaic.as.nyu.edu/page/home">NYU Hebrew &amp; Judaic Studies Department</a></p>
              </div>
          </footer>
          -->
      </div>
  </body>
</html>
