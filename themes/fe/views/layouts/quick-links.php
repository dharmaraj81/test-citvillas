<?php
		$menu2 = Tag::GetTagName();
		if( isset($menu2) && count($menu2) > 0 ){
?>

<div class="quick-links">
  <h4><?php echo t('Tags'); ?></h4>
  <div class="clearfix full-width">
    <ul>
      <?php
	  $i = 1;
	  
               foreach($menu2 as $m){
				   
				   $AvailTag = Pinfo::model()->findAll(array('condition'=>'tags LIKE :id','params'=>array(':id'=>$m->id)));
				   if ( isset($AvailTag) && count($AvailTag) ) {
				   $seo_sub = Propseo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$m->uid))); 
                   
                     if ( isset($seo_sub) && count($seo_sub) ) { ?>
      <li><a href="<?php echo Yii::app()->createUrl('ourvillas/provinc',array('province' => $seo_sub->slug)); ?>" > <?php echo $seo_sub->mainmenu; ?> </a></li>
      <?php } } } ?>
    </ul>
  </div>
</div>
<?php } ?>
