<?php if(Yii::app()->user->hasFlash('success')):?>
<div class="alert alert-success" style="position:absolute; width:100%;top:0">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <p style="text-align:center"><?php echo Yii::app()->user->getFlash('success'); ?></p>
</div>
<?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
endif;
Yii::app()->clientScript->registerScript(
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
          <div class="main-container">
              <div class="row-fluid">
                  <div class="span1"></div>
                  <div class="span3">
                      <div class="main-block">
                      <h2>Events</h2>
                      <ul class="links-list list-events">
                          <?php foreach($events as $event):?>
                          <li>
                              <h4><a href="/calendar/event/<?php echo $event->id ?>"><?php echo $event->name ?></a></h4>
                              <p><?php echo $event->location ?></p>
                              <p><?php echo date('M j', strtotime($event->start_time)) ?></p>
                              <p><?php echo date('ga', strtotime($event->start_time));
                                if($event->end_time) echo ' - '.date('ga', strtotime($event->end_time)); ?></p>
                          </li>
                          <?php endforeach; ?>
                      </ul>
                      </div>
                      <div class="main-block-post"></div>
                  </div>
                  <div class="span4">
                      <div class="main-block">
                      <h2>News</h2>
                      <ul class="links-list list-news">
                      <?php foreach($news as $n_item):?>
                          <li>
                              <h4 style="margin:0"><?php echo $n_item->title ?></h4> 
                              <p style="text-align: right;font-size:11px; padding-right:10px; color:gray"><?php echo date('M j, ga', strtotime($n_item->date_created)); ?></p>
                              <p><?php echo $n_item->content ?></p>
                          </li>                          
                      <?php endforeach;?>
                      </ul>
                      </div>
                      <div class="main-block-post"></div>
                  </div>
                  <div class="span3">
                      <div class="main-block">
                      <h2>The Feed</h2>
                      <ul class="links-list">
                          <?php foreach($posts as $post): ?>
                          <li>
                              <a style="font-size: 11px" href="<?php echo $post->link ?>" target="_blank">
                                  <?php echo date('M j, ga', strtotime($post->created_time));?>
                              </a>
                              <p><?php echo $post->message;?></p>
                          </li>
                          <?php endforeach;?>
                      </ul>
                      </div>
                      <div class="main-block-post"></div>
                  </div>
                  <div class="span1"></div>
              </div>
          </div>
          
