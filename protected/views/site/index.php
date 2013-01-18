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
      <a class="left carousel-control next-btn" href="#">&lsaquo;</a>
      <a class="right carousel-control prev-btn" href="#">&rsaquo;</a>
    </div><!-- /.carousel -->
          </div>
<!--        
        <div class="carousel-extension">
              <div id="textCarousel" class="carousel slide">
                  <div class="item active">
                      <p> * * Yom Haatzmaut parade * * </p>
                      <p>January 30th</p>
                      <p>Kimmel</p>
                  </div>
                  <div class="item">
                      <p>Test 2</p>
                  </div>
                  <div class="item">
                      <p>Test 3</p>
                  </div>
              </div>
          </div>
-->
          <div class="main-container">
              <div class="row-fluid">
                  <div class="span1"></div>
                  <div class="span3 main-block">
                      <h2>Events</h2>
                      <ul class="links-list list-events">
                          <li>
                              <h4><a href="/calendar/event/1">Young Alumni Shabbat Dinner</a></h4>
                              <p>Meat Me</p>
                              <p>Friday, January 25</p>
                              <p>6:30 PM - Midnight</p>
                          </li>
                          <li>
                              <h4><a href="/calendar/event/2">Young Alumni Shabbat Dinner 2</a></h4>
                              <p>Meat Me</p>
                              <p>Friday, January 25</p>
                              <p>6:30 PM - Midnight</p>
                          </li>
                      </ul>
                  </div>
                  <div class="span4 main-block">
                      <h2>News</h2>
                      <ul class="links-list list-news">
                      <?php foreach($news as $n_item):
                          
                      endforeach;?>
                          <li>
                              <h4>Greetings from Budapest, Israel and Nicaragua!</h4> 
                              <p>Bronfman Center Alternative Breaks are in full swing! Our next alternative break trip to leave is the Bridges: Muslim Jewish Interfaith Dialogue @ NYU trip to Joplin, MO. There they will be working with Rebuild Joplin to help rebuild homes. Keep checking our blog for updates on everyone's adventures.</p>
                          </li>
                          <li>
                              <h4>Greetings from Budapest, Israel and Nicaragua!</h4> 
                              <p>Bronfman Center Alternative Breaks are in full swing! Our next alternative break trip to leave is the Bridges: Muslim Jewish Interfaith Dialogue @ NYU trip to Joplin, MO. There they will be working with Rebuild Joplin to help rebuild homes. Keep checking our blog for updates on everyone's adventures.</p>
                          </li>
                      </ul>
                  </div>
                  <div class="span3 main-block">
                      <h2>The Feed</h2>
                      <ul class="links-list">
                          <?php foreach($posts as $post): ?>
                          <li>
                              <a style="font-size: 11px" href="<?php echo $post['actions'][0]['link']?>" target="_blank">
                                  <?php echo date('M j, ga', strtotime($post['created_time']));?>
                              </a>
                              <p><?php echo $post['message'];?></p>
                          </li>
                          <?php endforeach;?>
                      </ul>
                  </div>
                  <div class="span1"></div>
              </div>
          </div>
          
