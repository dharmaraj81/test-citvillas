<div id="header-wrap">
  <div class="container">
    <header id="masthead">
      <div class="col span_12 inner-logo"> <a href="<?php echo FRONT_SITE_URL; ?>"> <img class="logo" src="<?php echo PROPERTY_IMAGES_URL; ?>site-images/logo.png" alt="CIT Villas" /></a> 
 
     
      </div>
      
      <div class="col span_12">
        <nav class="right-changed">
          <div id="nav" class="menu-primary-container inner-page">
            <ul id="cbp-tm-menu" class="cbp-tm-menu">
              <li class="menu-item"> <a href="#" title="<?php echo t('Our Italian Villas'); ?>" > <?php echo t('Our italian Villas'); ?> </a> <i class="icon-angle-down"></i>
                <ul class="sub-menu">
                  <?php

					$RegionMenu = Region::model()->findAll (array('condition' => 'status = 1','order'=>'name ASC'));

 					if( isset($RegionMenu) && count($RegionMenu)>0 ) {
						foreach ($RegionMenu as $Reg ) {
							$RegSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$Reg->uid)));
						    if( isset($RegSeo) && count($RegSeo)>0 ) {
								$noofprop = Pinfo::model()->findAll(array('condition'=>'region = :REG AND status = 1', 'params'=>array(':REG'=>$Reg->id)));
								if( isset($noofprop) && count($noofprop)>0 ) { ?>
                  <li class="menu-item"> <a href="<?php echo $this->createUrl('ourvillas/region', array( 'region'=>$RegSeo->slug )); ?>"><?php echo $RegSeo->mainmenu; ?><i class="icon-angle-right"></i></a>
                    <?php  
				
						$ProvinceMenu = Province::model()->findAll(array('condition'=>'source = :SRC AND status = 1','params'=>array(':SRC'=>$Reg->id)));
						  if( isset($ProvinceMenu) && count($ProvinceMenu)>0 ) { 
				?>
                    <ul class="sub-menu1">
                      <?php 
						      foreach ( $ProvinceMenu as $Pro) {
						  		$ProSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$Pro->uid)));
								 if( isset($ProSeo) && count($ProSeo)>0 )  {
									 $noofprop1 = Pinfo::model()->findAll(array('condition'=>'province = :PRO AND region = :REG1 AND status = 1', 'params'=>array(':PRO'=>$Pro->id, ':REG1'=>$Reg->id)));
									 if( isset($noofprop1) && count($noofprop1)>0 ) {
						  ?>
                      <li class="menu-item"> <a href="<?php echo $this->createUrl('ourvillas/provinc', array( 'region'=>$RegSeo->slug, 'province'=>$ProSeo->slug )); ?>"><?php echo $ProSeo->mainmenu; ?></a> </li>
                      <?php } } } ?>
                    </ul>
                    <?php } ?>
                  </li>
                  <?php	}
								
							}
						}
					}

			  ?>
                </ul>
              </li>
              <?php

				$menu1 = Page::GetPageNameByGuidWithLang('5193948b900aa');		

				if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>
              <li class="menu-item"> <a href="<?php echo $this->createUrl('site/aboutus'); ?>"><?php echo $seo->mainmenu; ?></a></li>
              <?php } ?>
              <?php

				  $menu1 = Page::GetPageNameByGuidWithLang('5193958c0408a');		

				  if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>
              <li class="menu-item"><a href="<?php echo $this->createUrl('testimonial/index'); ?>"><?php echo $seo->mainmenu; ?></a></li>
              <?php } ?>
              <?php

				$menu1 = Page::GetPageNameByGuidWithLang('5193952a0a751');		

				if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>
              <li class="menu-item"><a href="#"><?php echo $seo->mainmenu; ?></a> <i class="icon-angle-down"></i>
                <ul class="sub-menu">
                  <?php

					$menu2 = Tourtype::GetTourtypeName();

		

					if($menu2 && count($menu2) > 0 ){

               			foreach($menu2 as $m){

				   			$seo_sub = Seo::GetPageNameByUid($m->uid);

				  ?>
                  <li class="menu-item"><a href="<?php echo Yii::app()->createUrl('tuscanytours/list',array('tlist'=>$seo_sub->slug)); ?>"><?php echo $seo_sub->mainmenu; ?></a></li>
                  <?php } } ?>
                </ul>
              </li>
              <?php } ?>
              <li id="menu-item-557" class="menu-item"><a href="http://italian-travel-guide.citvillas.com/"><?php echo t('Italian Travel Guide'); ?></a></li>
              <?php

				$menu1 = Page::GetPageNameByGuidWithLang('52d65d4e726ec');		

				if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>
              <li class="menu-item"><a href="http://blog.citvillas.com/"><?php echo $seo->mainmenu; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </nav>
      </div>
      <div class="clear"></div>
    </header>
  </div>
</div>
