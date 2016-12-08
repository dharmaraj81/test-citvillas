<div class="sitemap-links">
  <h4><?php echo t('Sitemap'); ?></h4>
  <div class="clearfix full-width">
    <ul>
      <?php
	$menu1 = Region::model()->find(array('condition'=>'uid=:paramId','params'=>array(':paramId'=>'51d128695a71c')));
 
 	if( isset($menu1) && count($menu1)>0 ) 
		{
			$seo_reg = Propseo::model()->find(array('condition'=>'uid = :UID', 'params'=>array(':UID'=>$menu1->uid) ));
	?>
      <li><a href="<?php echo FRONT_SITE_URL.$seo_reg->slug; ?>" title="<?php echo $seo_reg->mainmenu; ?>" > <?php echo t('Our Villas'); ?> </a> </li>
      <?php
		}
  ?>
      <?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294e23a0107');	
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
      <li><a href="<?php echo $this->createUrl('tuscanytours/index'); ?>" title="<?php echo $seo->mainmenu; ?>" ><?php echo $seo->mainmenu; ?> </a> </li>
      <?php } ?>
      <?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294ed1e5b1f');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
      <li><a href="<?php echo $this->createUrl('site/aboutus'); ?>" title="<?php echo $seo->mainmenu; ?>"><?php echo $seo->mainmenu; ?> </a> </li>
      <?php } ?>
      <?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294ddeb28c6');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
      <li><a href="<?php echo $this->createUrl('testimonial/index'); ?>"><?php echo $seo->mainmenu; ?></a></li>
      <?php } ?>
      <?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294cc8c06ff');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
      <li><a href="<?php echo $this->createUrl('site/contactus'); ?>"><?php echo $seo->mainmenu; ?></a></li>
      <?php } ?>
      <?php
		$menu1 = Page::GetPageNameByGuidWithLang('52ec8eaa0446e');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
      <li><a href="<?php echo create_URL($seo->uid); ?>"><?php echo $seo->mainmenu; ?></a></li>
      <?php } ?>
    </ul>
  </div>
</div>
