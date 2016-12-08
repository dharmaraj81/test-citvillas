<?php
	$i = 0;
	$soffer = Soffer::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND value>0 AND from_date<='.time().' AND to_date>='.time(),
			'order'=>'rand',
			'limit'=>2
	)); 
?>

<div class="sidebar">
  <div class="sidebar-top text-center"> <a href="#" title=""><img src="<?php echo $layout_asset; ?>/images/logo_bbb.png" alt="<?php echo t('Better Business Bureau - Start With Trust'); ?>" title="<?php echo t('Better Business Bureau - Start With Trust'); ?>" /></a> <span>A+</span> </div>
  <div class="special-deals">
    <?php
	$menu1 = Region::model()->find(array('condition'=>'uid=:paramId','params'=>array(':paramId'=>'51d128695a71c')));
 
 	if( isset($menu1) && count($menu1)>0 ) 
		{
			$seo_reg = Propseo::model()->find(array('condition'=>'uid = :UID', 'params'=>array(':UID'=>$menu1->uid) ));
	?>
    <?php 
		$menu1 = Page::GetPageNameByGuidWithLang('54294beb24466');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); ?>
    <h5><a href="<?php echo Yii::app()->createUrl('ourvillas/provinc',array('province' => $seo->slug)); ?>"><?php echo $seo->mainmenu; ?></a></h5>
    <?php } } ?>
    <ul>
      <?php if( isset($soffer) && (count($soffer)>0) ) {
        		foreach ($soffer as $s) {
	    ?>
      <li>
        <div class="sidebar-img"><img src="<?php echo Gallery::GetPropThumbnail($s->prop_id); ?>" alt="<?php echo Pinfo::getPageName($s->prop_id); ?>" title="<?php echo Pinfo::getPageName($s->prop_id); ?>" /></div>
        <div class="info">
          <h3><a href="#" title="<?php echo Pinfo::getPageName($s->prop_id); ?>"><?php echo Pinfo::getPageName($s->prop_id); ?></a></h3>
          <p><?php echo $s->name; ?></p>
          <div class="discount"><?php echo $s->value; ?>%</div>
        </div>
      </li>
      <?php } } ?>
    </ul>
  </div>
</div>
