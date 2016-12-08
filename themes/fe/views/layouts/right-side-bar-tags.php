<?php

		$menu2 = Tag::model()->findAll(array('condition'=>'status = 1 AND addtohome = 1'));

		if( isset($menu2) && count($menu2) > 0 ){

?>
<h4><?php echo t('Quick Links'); ?></h4>
<aside id="ct_listings-2" class="widget widget_ct_listings left">
  
  <ul class="propfeatures left marR30">
    <?php

	  $i = 1;
               foreach($menu2 as $m){
				   
				   $AvailTag = Pinfo::model()->findAll(array('condition'=>'tags LIKE :id','params'=>array(':id'=>'%'.$m->id.'%')));
				   if ( isset($AvailTag) && count($AvailTag) ) {
					   
				   $seo_sub = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$m->uid))); 
                     if ( isset($seo_sub) && count($seo_sub) ) { ?>
    <li><i class="fa fa-check-circle"></i><a href="<?php echo Yii::app()->createUrl('ourvillas/tags',array('tag' => $seo_sub->slug)); ?>" > <?php echo $seo_sub->mainmenu; ?> </a></li>
    <?php } } } ?>
  </ul>
</aside>
<div class="clear"></div>
<?php } ?>
