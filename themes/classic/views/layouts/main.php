<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Shalhevet: Reborn</title>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="description" content="">
    <meta name="author" content="Shalhevet at NYU">
    <meta name="keywords" content="shalhevet nyu hillel jew community mark bryk judaism">

    <link href="<?php echo Yii::app()->theme->baseUrl ?>/css/main.css" rel="stylesheet">
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
  </head>

  <body>
      <div style="min-height:100%; position:relative;">
          <?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'brand'=>'Shalhevet',
    'brandUrl'=>Yii::app()->homeUrl,
    'type'=>(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id =='index')?'default':'inverse',
    'collapse'=>true, // requires bootstrap-responsive.css
    'fixed'=>false,
    'htmlOptions'=>array('style'=>'margin-bottom:0'),
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>'#', 'active'=>true),
                array('label'=>'Calendar', 'url'=>'/calendar'),
                array('label'=>'Photos', 'url'=>'/gallery', 'icon'=>'picture'),
                )
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                //array('label'=>'About Us', 'url'=>'/about', 'icon'=>'question-sign'),
                //array('label'=>'Donate Now!', 'url'=>'/donate', 'icon'=>'shopping-cart'),
                array('label'=>'Connect', 'items'=>array(
                    array('label'=>'Subscribe to our bi-weekly email', 'url'=>'http://eepurl.com/jmbYn/','linkOptions'=>array('target'=>'_blank')),
                    array('label'=>'Find us on Facebook', 'url'=>'http://www.facebook.com/nyu.shalhevet/','linkOptions'=>array('target'=>'_blank')),
                    array('label'=>'Email Shalhevet', 'url'=>'mailto: nyushalhevet@gmail.com'),
                )),
                array('label'=>'Links', 'items'=>array(
                    array('label'=>'Bronfman Center', 'url'=>'http://www.bronfmancenter.org','linkOptions'=>array('target'=>'_blank')),
                    array('label'=>'Manhattan Eruv', 'url'=>'http://sites.google.com/site/manhattaneruv/','linkOptions'=>array('target'=>'_blank')),
                    array('label'=>'Kosher Caf', 'url'=>'http://www.koshertopia.com/Listings/East-Village/NYU-Kosher-Cafeteria','linkOptions'=>array('target'=>'_blank')),
                    array('label'=>'NYU Hebrew/Judaic Studies Department', 'url'=>'http://hebrewjudaic.as.nyu.edu/page/home','linkOptions'=>array('target'=>'_blank')),
                )),
                (!Yii::app()->user->isGuest)?
                    array('label'=>'Admin', 'items'=>array(
                    array('label'=>'Update Events', 'url'=>'/admin/updateEvents'),
                    array('label'=>'Update Feed', 'url'=>'/admin/updateFeed'),
                    array('label'=>'New News', 'url'=>'/admin/newNews'),
                    array('label'=>'Delete Items', 'url'=>'/admin/view'),
                    array('label'=>'Logout', 'url'=>'/site/logout'),
                        )):''
            ),
        )
    )
)); ?>
          
<?php         Yii::app()->clientScript->registerScript(
        'startCarousel',
        '$(".carousel").carousel({interval: 3000});
            $(".next-btn").on("click", function(e) {
                e.preventDefault();
                $(".carousel").carousel("prev")
            });
            $(".prev-btn").on("click", function(e) {
                e.preventDefault();
                $(".carousel").carousel("next")
            });',
        CClientScript::POS_READY);
Yii::app()->clientScript->registerCss(
        'fadeCarousel',
        '.carousel .item {-webkit-transition: opacity 3s; -moz-transition: opacity 3s; -ms-transition: opacity 3s; -o-transition: opacity 3s; transition: opacity 3s;}
.carousel .active.left {left:0;opacity:0;z-index:2;}
.carousel .next {left:0;opacity:1;z-index:1;}
.carousel .active.right {left:0;opacity:0;z-index:2;}
.carousel .prev {left:0;opacity:1;z-index:1;}',
        CClientScript::POS_HEAD
        );
?>


<div class="main-carousel">
              <div id="picCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <div>
              <p> * * Bowling * * </p>
              <p>January 30th</p>
              <p>Kimmel</p>
          </div>
            <img src="./assets/img/front/bowling.jpg" alt="" width="1000">
        </div>        
        <div class="item">
          <img src="./assets/img/front/yom_haatzmaut.jpg" alt="" width="1000">
          <div>
              <p> * * Yom Haatzmaut parade * * </p>
              <p>January 30th</p>
              <p>Kimmel</p>
          </div>
        </div>
        <div class="item">
          <img src="./assets/img/front/panoply.jpg" alt="" width="700">
          <div>
              <p> * * Panoply * * </p>
              <p>January 30th</p>
              <p>Kimmel</p>
          </div>
        </div>
      </div>
      <a class="left carousel-control next-btn" href="#" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control prev-btn" href="#" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->
          </div>

          
              <?php echo $content ?>          
          
      </div>
  </body>
</html>
