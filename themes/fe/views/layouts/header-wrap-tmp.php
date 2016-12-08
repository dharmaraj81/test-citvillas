<div id="header-wrap">
  <div class="container">
    <header id="masthead">
      <div class="col span_12">
        <nav>
          <div id="nav" class="menu-primary-container">
            <ul id="cbp-tm-menu" class="cbp-tm-menu">
              <?php

					$menu1 = Region::GetRegionByGuidWithLang('514311c661bba');

 					if($menu1!=null) 

						{

						$seo = Seo::GetPageNameByUid($menu1->uid);

			  ?>
              <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-has-children menu-item-665 drop"> <a href="<?php echo $this->createUrl('ourvillas/region', array('region'=>$seo->slug)); ?>" title="<?php echo $seo->mainmenu; ?>" > <?php echo $seo->mainmenu; ?> </a> <i class="icon-angle-down"></i>
                <ul class="sub-menu">
                  <?php

					$menu2 = Province::GetProvinceName();

					if($menu2 && count($menu2) > 0 ){

               			foreach($menu2 as $m){

				   			$seo_sub = Seo::GetPageNameByUid($m->uid);

				 ?>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-664"> <a href="<?php echo $this->createUrl('ourvillas/provinc', array( 'region'=>$seo->slug, 'province'=>$seo_sub->slug )); ?>"><?php echo $seo_sub->mainmenu; ?></a> </li>
                  <?php } } ?>
                  <?php 

					 $get_subcoity=Seo::model()->find(array('select'=>'uid,mainmenu,slug','condition'=>"slug='florence-city-villas'"));

					 $uid_city=$get_subcoity->uid;

					 $mainmenu_city=$get_subcoity->mainmenu;

					 if($uid_city!='')

					 { 

				   ?>
                  <li><a href="#"><?php echo $mainmenu_city; ?></a></li>
                  <?php } ?>
                  <?php 

        			 $get_subcoitysenia=Seo::model()->find(array('select'=>'uid,mainmenu,slug','condition'=>"slug='siena-city-villas'"));

					 $uid_citysenia=$get_subcoitysenia->uid;

					 $mainmenu_citysenia=$get_subcoitysenia->mainmenu;

					 if($uid_citysenia!='')

					 {

				  ?>
                  <li><a href="#"><?php echo $mainmenu_citysenia; ?></a></li>
                  <?php } ?>
                </ul>
              </li>
              <?php } ?>
              <?php

				$menu1 = Page::GetPageNameByGuidWithLang('5193948b900aa');		

				if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>
              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-631"> <a href="<?php echo $this->createUrl('site/aboutus'); ?>"><?php echo $seo->mainmenu; ?></a></li>
              <?php } ?>
              <!-- <?php

				  $menu1 = Page::GetPageNameByGuidWithLang('5193958c0408a');		

				  if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>
              <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-631"><a href="<?php echo $this->createUrl('testimonial/index'); ?>"><?php echo $seo->mainmenu; ?></a></li>
              <?php } ?>
              -->
              <?php

				$menu1 = Page::GetPageNameByGuidWithLang('5193952a0a751');		

				if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>
              <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-558 drop"><a href="#"><?php echo $seo->mainmenu; ?></a> <i class="icon-angle-down"></i>
                <ul class="sub-menu">
                  <?php

					$menu2 = Tourtype::GetTourtypeName();

		

					if($menu2 && count($menu2) > 0 ){

               			foreach($menu2 as $m){

				   			$seo_sub = Seo::GetPageNameByUid($m->uid);

				  ?>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-570"><a href="<?php echo Yii::app()->createUrl('tuscanytours/list',array('tlist'=>$seo_sub->slug)); ?>"><?php echo $seo_sub->mainmenu; ?></a></li>
                  <?php } } ?>
                </ul>
              </li>
              <?php } ?>
              <!--   <li id="menu-item-557" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-557"><a href="http://www.ciaoitalyvillas.com/tuscany-travel-guide"><?php echo t('Tuscany Travel Guide'); ?></a></li>-->
              <?php

				$menu1 = Page::GetPageNameByGuidWithLang('519395f1edcc8');		

				if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>
              <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-568 drop"><a href="#"><?php echo $seo->mainmenu; ?></a> <i class="icon-angle-down"></i>
                <ul class="sub-menu">
                  <?php

					$menu2 = Region::GetRegionName();

					

					if($menu2 && count($menu2) > 0 ){

						   foreach($menu2 as $m){

				   			$seo = Seo::GetPageNameByUid($m->uid); ?>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-580"><a href="<?php echo $this->createUrl('ourvillas/region',array('region'=>$seo->slug)); ?>"><?php echo $seo->mainmenu; ?></a></li>
                  <?php } } ?>
                  <?php 

                 $menu3 = Province::GetOtherProvinceName();

					if($menu3 && count($menu3) > 0 ){

               		foreach($menu3 as $m){

				   		$seo_sub = Seo::GetPageNameByUid($m->uid); 

						$fnd_province = Province::model()->find(array('condition'=>'uid=:UID', 'params'=>array(':UID'=>$seo_sub->uid)));

						$fnd_region = Region::model()->findByPk($fnd_province->source);

						$seo_sub1 = Seo::GetPageNameByUid($fnd_region->uid); 

						?>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-580"><a href="<?php echo $this->createUrl('ourvillas/provinc', array( 'region'=>$seo_sub1->slug, 'province'=>$seo_sub->slug )); ?>"><?php echo $seo_sub->mainmenu; ?></a></li>
                  <?php } } ?>
                </ul>
              </li>
              <?php } ?>
              <!-- <?php

				$menu1 = Page::GetPageNameByGuidWithLang('52d65d4e726ec');		

				if($menu1!=null) { $seo = Seo::GetPageNameByUid($menu1->uid); ?>
              <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-557"><a href="http://blog.ciaoitalyvillas.com/"><?php echo $seo->mainmenu; ?></a></li>
              <?php } ?> -->
            </ul>
          </div>
          <a href="#" class="show-hide" style="display: inline;"><i class="icon-reorder"></i></a></nav>
      </div>
      <div class="clear"></div>
    </header>
  </div>
</div>
