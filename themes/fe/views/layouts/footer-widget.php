<div id="footer-widgets">
  <div class="container">
    <aside id="text-3" class="widget col span_3 widget_text">
      <div class="textwidget"><img src="<?php echo PROPERTY_IMAGES_URL; ?>CIT-logo-2016-Trans-white.png" alt="CIT Villas">
        <p class="marT30">We know it can be overwhelming to search for the perfect Italian villa vacation or holiday rental. Let our experts take the confusion out of finding a authentic Italian villa for you. We provide you with an experienced travel consultant to understand your requirements, guide you through the rental process and be your concierge for arranging tours, restaurants and activities!.</p>
      </div>
    </aside>
    <aside id="nav_menu-3" class="widget col span_3 span_3_1 widget_nav_menu first_col">
      <h5><?php echo t('Italian Regions'); ?></h5>
      <div class="menu-primary-container">
        <ul id="menu-primary" class="menu">
        
         <?php

					$RegionMenu = Region::model()->findAll (array('condition' => 'status = 1','order'=>'name ASC'));

 					if( isset($RegionMenu) && count($RegionMenu)>0 ) {
						foreach ($RegionMenu as $Reg ) {
							$RegSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$Reg->uid)));
						    if( isset($RegSeo) && count($RegSeo)>0 ) {
								$noofprop = Pinfo::model()->findAll(array('condition'=>'region = :REG AND status = 1', 'params'=>array(':REG'=>$Reg->id)));
								if( isset($noofprop) && count($noofprop)>0 ) { ?>
                <li class="menu-item menu-item-type-custom" >
                <a href="<?php echo $this->createUrl('ourvillas/region', array( 'region'=>$RegSeo->slug )); ?>"><?php echo $RegSeo->mainmenu; ?></a></li>
   				<?php } } } }?>     
         
        </ul>
      </div>
    </aside>
    
    
    <aside id="nav_menu-3" class="widget col span_3 span_3_2 widget_nav_menu second_col">
      <h5><?php echo t('Tuscan Regions'); ?></h5>
      <div class="menu-primary-container">
        <ul id="menu-primary" class="menu">
          <?php

					$RegionMenu = Region::model()->findByPk(1045);

 					if( isset($RegionMenu) && count($RegionMenu)>0 ) {
						
							$RegSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$RegionMenu->uid)));
						    if( isset($RegSeo) && count($RegSeo)>0 ) {
								
								$ProvinceMenu = Province::model()->findAll(array('condition'=>'source = :SRC AND status = 1','params'=>array(':SRC'=>$RegionMenu->id)));

					if($ProvinceMenu && count($ProvinceMenu) > 0 ){

               			foreach($ProvinceMenu as $m){

				   		$ProSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$m->uid)));
								 if( isset($ProSeo) && count($ProSeo)>0 )  {
									 $noofprop1 = Pinfo::model()->findAll(array('condition'=>'province = :PRO AND region = :REG1 AND status = 1', 'params'=>array(':PRO'=>$m->id, ':REG1'=>$RegionMenu->id)));
									 if( isset($noofprop1) && count($noofprop1)>0 ) {

				 ?>
          <li class="menu-item menu-item-type-custom" > <a href="<?php echo $this->createUrl('ourvillas/provinc', array( 'region'=>$RegSeo->slug, 'province'=>$ProSeo->slug )); ?>"><?php echo $ProSeo->mainmenu; ?></a> </li>
          <?php } } } } }  } ?>
        </ul>
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
      <br />
      <h5><?php echo t('Contact Info'); ?></h5>
     
      <div class="details col">
        <h4 class="author">CIT Europe Pty Ltd</h4>
        <p class="marT3 marB0">L3, 309 George Street </p>
        <p class="marT3 marB0">Sydney NSW 2000, Australia</p>
        <p class="marT3 marB0">Consumer enquiries : +1 300 380 992</p>
        <p class="marT3 marB0">Travel Trade/Agent enquiries : +1 300 361 500</p>
        <p class="marT3 marB0">Phone : +61 (0)292671255</p>
        <p class="marT3 marB0"><a href="mailto:citvillas@cit.com.au">citvillas@cit.com.au</a></p>
      </div>
    </aside>
    <div class="clear"></div>
   <!-- <div class="footer-caption"><?php echo t('Italian dream'); ?></div> -->
  </div>
</div>
