<div id="footer-widgets">

    <div class="container">

      <aside id="text-3" class="widget col span_3 widget_text">
      <div class="textwidget"><img src="<?php echo $layout_asset; ?>/images/logo-inverse.png" alt="Ciao Italy Villas">
        <p class="marT30">We know it can be overwhelming to search for the perfect vacation rental. Let our experts take the confusion out of finding a villa for you. We provide you with an experienced travel consultant to understand your requirements, guide you through the rental process and be your concierge for arranging tours, restaurants and activities!.</p>
      </div>
    </aside>

      <aside id="nav_menu-3" class="widget col span_3 widget_nav_menu">

        <h5><?php echo t('Tuscan Regions'); ?></h5>

        <div class="menu-primary-container">

          <ul id="menu-primary" class="menu">

          

           <?php

					$menu2 = Province::GetProvinceName();

					if($menu2 && count($menu2) > 0 ){

               			foreach($menu2 as $m){

				   			$seo_sub = Seo::GetPageNameByUid($m->uid);

				 ?>

                  <li class="menu-item menu-item-type-custom" > <a href="<?php echo $this->createUrl('ourvillas/provinc', array( 'region'=>'tuscany-vacation-rentals', 'province'=>$seo_sub->slug )); ?>"><?php echo $seo_sub->mainmenu; ?></a> </li>

                  <?php } } ?>

                  

            

          

          </ul>

        </div>

      </aside>
	  <!--
      <aside id="ct_agentinfo-4" class="widget col span_3 widget_ct_agentinfo">

        <h5>Contact Info</h5>

        <figure class="col span_3"><img class="authorimg" alt="Elizabeth Morris" src="<?php echo $layout_asset; ?>/images/liz.jpg"></figure>

        <div class="details col span_8">

          <h4 class="author">Ciao Italy Pty Ltd</h4>

          <p class="tagline"><strong>Elizabeth Morris.</strong></p>

          <p class="marT3 marB0">PO Box 101, Double Bay,</p>

          <p class="marT3 marB0">NSW 2028, Australia</p>

          <p class="marT3 marB0">USA +1 (415) 3662939 </p>

          <p class="marT3 marB0">Australia +61 294755353</p>

          <p class="marT3 marB0"><a href="mailto:info@ciaoitalyvillas.com">info@ciaoitalyvillas.com</a></p>

        </div>

      </aside>
	  -->
      
      <aside id="ct_agentinfo-4" class="widget col span_3 widget_ct_agentinfo">
      <h5><?php echo t('Contact Info'); ?></h5>
      <div class="details col span_8">
        <h4 class="author">CIT Europe Pty Ltd</h4>
        <p class="marT3 marB0">L3, 309 George Street </p>
        <p class="marT3 marB0">Sydney NSW 2000, Australia</p>
        <p class="marT3 marB0">Ph +61 292671255</p>
        <p class="marT3 marB0"><a href="mailto:citvillas@cit.com.au">citvillas@cit.com.au</a></p>
      </div>
    </aside>
      <aside id="ct_social-3" class="widget col span_3 widget_ct_social">
      <h5><?php echo t('Follow Us'); ?></h5>
      <ul>
        <li class="facebook"><a href="https://www.facebook.com/CiaoItalyVillas" target="_self"><i class="icon-facebook"></i></a></li>
        <li class="gplus"><a href="https://plus.google.com/+Ciaoitalyvillas" target="_self"><i class="icon-google-plus"></i></a></li>
        <li class="instagram"><a href="https://instagram.com/ciaoitalyvillas/" target="_self"><i class="icon-instagram"></i></a></li>
        <li class="linkedin"><a href="https://au.linkedin.com/in/elizabethmorrisciaoitalyvillas/" target="_self"><i class="icon-linkedin"></i></a></li>
        <li class="pinterest"><a href="https://www.pinterest.com/tuscanvillas" target="_self"><i class="icon-pinterest"></i></a></li>
        <li class="skype"><a href="skype:traveltuscany?call" target="_self"><i class="icon-skype"></i></a></li>
        <li class="twitter"><a href="https://twitter.com/ciaoitalyvillas" target="_self"><i class="icon-twitter"></i></a></li>
        <li class="youtube"><a href="https://www.youtube.com/user/CiaoItalyVillas" target="_self"><i class="icon-youtube"></i></a></li>
        <li class="email"><a href="mailto:info@ciaoitalyvillas.com"><i class="icon-envelope"></i></a></li>
      </ul>
    </aside>
    <div class="clear"></div>
    <div class="footer-caption"><?php echo t('Italian dream'); ?></div>

    </div>

  </div>