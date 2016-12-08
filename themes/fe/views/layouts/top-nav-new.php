<nav id="menu">
  <ul class="clearfix full-width">
    <?php
	$menu1 = Region::model()->find(array('condition'=>'uid=:paramId','params'=>array(':paramId'=>'51d128695a71c')));
 
 	if( isset($menu1) && count($menu1)>0 ) 
		{
			$seo_reg = Propseo::model()->find(array('condition'=>'uid = :UID', 'params'=>array(':UID'=>$menu1->uid) ));
	?>
    <li><a href="<?php echo $this->createUrl('ourvillas/index',array('para1'=>$seo_reg->slug)); ?>" title="<?php echo $seo_reg->mainmenu; ?>" > <?php echo t('Our Villas'); ?> <span><?php echo t('Our exotic villas'); ?></span> </a>
      <div class="dropdown-wrapper">
        <nav>
          <ul class="clearfix">
            <?php
		$menu2 = Province::model()->findAll(array('condition'=>'status = 1 AND addtohome=1'));
				
		if(isset($menu2) && count($menu2) > 0 ){
            foreach($menu2 as $m) {
				   
				   $AvailTag = Pinfo::model()->find(array('condition'=>'province = :id AND status = 1','params'=>array(':id' => $m->id)));
				   if (isset($AvailTag) && count($AvailTag)>0 )  {
				   $seo_sub = Propseo::model()->find(array('condition'=>'uid = :UID', 'params'=>array(':UID'=>$m->uid) ));
		?>
            <li><a href="<?php echo $this->createUrl('ourvillas/province',array('para1'=>$seo_reg->slug,'para2'=>$seo_sub->slug)); ?>"><?php echo $seo_sub->mainmenu; ?></a></li>
            <?php }  } } ?>
          </ul>
        </nav>
        <div class="listing-wrapper col-4">
          <ul class="full-width clearfix">
            <li>
              <?php $prop_id = 10338; ?>
              <div class="listing-content">
                <div class="img"><img title="<?php echo Pinfo::getPageName($prop_id); ?>" alt="<?php echo Pinfo::getPageName($prop_id); ?>" src="<?php echo Gallery::GetPropThumbnail($prop_id); ?>"></div>
                <div class="title"><a title="<?php echo Pinfo::getPageName($prop_id); ?>" href="#"><?php echo Pinfo::getPageName($prop_id); ?></a></div>
                <p><?php echo t('Sleep'); ?> : <?php echo Pinfo::getPageSleep($prop_id); ?></p>
              </div>
            </li>
            <li>
              <?php $prop_id = 10339; ?>
              <div class="listing-content">
                <div class="img"><img title="<?php echo Pinfo::getPageName($prop_id); ?>" alt="<?php echo Pinfo::getPageName($prop_id); ?>" src="<?php echo Gallery::GetPropThumbnail($prop_id); ?>"></div>
                <div class="title"><a title="<?php echo Pinfo::getPageName($prop_id); ?>" href="#"><?php echo Pinfo::getPageName($prop_id); ?></a></div>
                <p><?php echo t('Sleep'); ?> : <?php echo Pinfo::getPageSleep($prop_id); ?></p>
              </div>
            </li>
            <li>
              <?php $prop_id = 10337; ?>
              <div class="listing-content">
                <div class="img"><img title="<?php echo Pinfo::getPageName($prop_id); ?>" alt="<?php echo Pinfo::getPageName($prop_id); ?>" src="<?php echo Gallery::GetPropThumbnail($prop_id); ?>"></div>
                <div class="title"><a title="<?php echo Pinfo::getPageName($prop_id); ?>" href="#"><?php echo Pinfo::getPageName($prop_id); ?></a></div>
                <p><?php echo t('Sleep'); ?> : <?php echo Pinfo::getPageSleep($prop_id); ?></p>
              </div>
            </li>
            <li>
              <?php $prop_id = 10318; ?>
              <div class="listing-content">
                <div class="img"><img title="<?php echo Pinfo::getPageName($prop_id); ?>" alt="<?php echo Pinfo::getPageName($prop_id); ?>" src="<?php echo Gallery::GetPropThumbnail($prop_id); ?>"></div>
                <div class="title"><a title="<?php echo Pinfo::getPageName($prop_id); ?>" href="#"><?php echo Pinfo::getPageName($prop_id); ?></a></div>
                <p><?php echo t('Sleep'); ?> : <?php echo Pinfo::getPageSleep($prop_id); ?></p>
              </div>
            </li>
          </ul>
          <ul class="full-width clearfix">
            <li>
              <?php $prop_id = 10271; ?>
              <div class="listing-content">
                <div class="img"><img title="<?php echo Pinfo::getPageName($prop_id); ?>" alt="<?php echo Pinfo::getPageName($prop_id); ?>" src="<?php echo Gallery::GetPropThumbnail($prop_id); ?>"></div>
                <div class="title"><a title="<?php echo Pinfo::getPageName($prop_id); ?>" href="#"><?php echo Pinfo::getPageName($prop_id); ?></a></div>
                <p><?php echo t('Sleep'); ?> : <?php echo Pinfo::getPageSleep($prop_id); ?></p>
              </div>
            </li>
            <li>
              <?php $prop_id = 10002; ?>
              <div class="listing-content">
                <div class="img"><img title="<?php echo Pinfo::getPageName($prop_id); ?>" alt="<?php echo Pinfo::getPageName($prop_id); ?>" src="<?php echo Gallery::GetPropThumbnail($prop_id); ?>"></div>
                <div class="title"><a title="<?php echo Pinfo::getPageName($prop_id); ?>" href="#"><?php echo Pinfo::getPageName($prop_id); ?></a></div>
                <p><?php echo t('Sleep'); ?> : <?php echo Pinfo::getPageSleep($prop_id); ?></p>
              </div>
            </li>
            <li>
              <?php $prop_id = 10003; ?>
              <div class="listing-content">
                <div class="img"><img title="<?php echo Pinfo::getPageName($prop_id); ?>" alt="<?php echo Pinfo::getPageName($prop_id); ?>" src="<?php echo Gallery::GetPropThumbnail($prop_id); ?>"></div>
                <div class="title"><a title="<?php echo Pinfo::getPageName($prop_id); ?>" href="#"><?php echo Pinfo::getPageName($prop_id); ?></a></div>
                <p><?php echo t('Sleep'); ?> : <?php echo Pinfo::getPageSleep($prop_id); ?></p>
              </div>
            </li>
            <li>
              <?php $prop_id = 10340; ?>
              <div class="listing-content">
                <div class="img"><img title="<?php echo Pinfo::getPageName($prop_id); ?>" alt="<?php echo Pinfo::getPageName($prop_id); ?>" src="<?php echo Gallery::GetPropThumbnail($prop_id); ?>"></div>
                <div class="title"><a title="<?php echo Pinfo::getPageName($prop_id); ?>" href="#"><?php echo Pinfo::getPageName($prop_id); ?></a></div>
                <p><?php echo t('Sleep'); ?> : <?php echo Pinfo::getPageSleep($prop_id); ?></p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </li>
    <?php
		}
  ?>
    <?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294e23a0107');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
    <li><a href="<?php echo $this->createUrl('tuscanytours/index',array('para1'=>$seo->slug)); ?>" title="<?php echo $seo->mainmenu; ?>"><?php echo $seo->mainmenu; ?> <span><?php echo t('Guide to Florence'); ?></span></a></li>
    <?php } ?>
    <?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294ed1e5b1f');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
    <li><a href="<?php echo $this->createUrl('site/aboutus',array('para1'=>$seo->slug)); ?>" title="<?php echo $seo->mainmenu; ?>"><?php echo $seo->mainmenu; ?> <span><?php echo t('Why us?'); ?></span></a></li>
    <?php } ?>
    <?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294ddeb28c6');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
    <li><a href="<?php echo $this->createUrl('testimonial/index',array('para1'=>$seo->slug)); ?>"><?php echo $seo->mainmenu; ?><span><?php echo t('What People Say'); ?></span></a></li>
    <?php } ?>
    <?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294cc8c06ff');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
    <li><a href="<?php echo $this->createUrl('site/contactus',array('para1'=>$seo->slug)); ?>"><?php echo $seo->mainmenu; ?><span><?php echo t('Let us Help'); ?></span></a></li>
    <?php } ?>
    <?php 
		$menu1 = Page::GetPageNameByGuidWithLang('54294beb24466');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
    <li><a href="<?php echo $this->createUrl('ourvillas/specialdeal',array('para1'=>$seo_reg->slug,'para2'=>$seo->slug)); ?>"><?php echo $seo->mainmenu; ?><span><?php echo t('Hot Offers'); ?></span></a></li>
    <?php } ?>
  </ul>
</nav>
