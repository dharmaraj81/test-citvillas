<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
?>
<body id="archive" class="archive author author-crob author-1">
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
    <?php
		if ( isset($prop_id) && ( $prop_id != '' ) ) {
		  
		  $BookingId = Booking::model()->findByPk($prop_id);
		  if( isset($BookingId) && count($BookingId)>0 ) {
	?>
    <div class="container marT30">
      <article class="col span_9">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'booking-quote-show','enableAjaxValidation'=>true)); ?>
        <?php echo $form->errorSummary(array($model)); ?>
        <h3> <?php echo t('Payment Terms'); ?> </h3>
        <?php 
			if( time() < $BookingId->fdate ) { 
		      $DaysDiff = abs(($BookingId->fdate - time())/(60*60*24));
			  if ($DaysDiff>62) {
		?>
        <div class="onethirdcol left">
          <h4> <?php echo t('Due Date'); ?> </h4>
          <br>
          <?php echo t('Time of Booking'); ?> <br>
          <?php echo t('Time of Booking'); ?> </div>
        <div class="onethirdcol left">
          <h4> <?php echo t('Amount Due'); ?> </h4>
          <br>
          <?php echo 'AU$ '.round($BookingId->total_price*0.3); ?> <br>
          <?php echo 'AU$ '.round($BookingId->total_price*0.7); ?> </div>
        <?php }  else { ?>
        <div class="onethirdcol left">
          <h4> <?php echo t('Due Date'); ?> </h4>
          <br>
          <?php echo t('Time of Booking'); ?> </div>
        <div class="onethirdcol left">
          <h4> <?php echo t('Amount Due'); ?> </h4>
          <br>
          <?php echo $BookingId->currency.$BookingId->total_user_currency; ?> </div>
        <?php } } ?>
        <div class="onethirdcol left last">
          <h4> <?php echo t('Action'); ?> </h4>
          <br>
          <div class="input-prepend">
            <input id="submit" class="symple-button-inner" type="submit" value="<?php echo t('Pay & Reserve Now'); ?>">
            <br>
          </div>
        </div>
        <div class="clear"></div>
        <?php $this->endWidget(); ?>
      </article>
      <div id="sidebar" class="col span_3">
        <div id="sidebar-inner about-us" class="about-us">
          <aside id="ct_listings-1" class="widget widget_ct_listings left">
            <h4><?php echo t('Property'); ?></h4>
            <ul>
              <?php 

	   	   
		$f = Pinfo::model()->findByPk($BookingId->prop_id);
		   
		   if ( isset($f) && (count($f)>0) ) {
	    ?>
              <li>
                <figure> <a class="thumb" target="_blank" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'propid'=>$f->id)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image" width="259" height="171" alt="<?php echo $f->tt_name; ?>"></a> </figure>
                <div class="grid-listing-info">
                  <header>
                    <h5 class="marB0"><a target="_blank" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'propid'=>$f->id)); ?>"><?php echo $f->tt_name; ?></a></h5>
                    <p class="location marB0"><?php echo Province::GetName($f->province); ?> , <?php echo Town::GetName($f->town); ?></p>
                  </header>
                  <?php if(prop_min_price($f->id)!= 0 ) { ?>
                  <p class="price marB0"> <?php echo t('From'); ?> AU$ <?php echo prop_min_price($f->id); ?> </p>
                  <?php }  ?>
                  <p class="propinfo marB0"> <span class="beds"><?php echo $f->bedroom; ?> Bed</span><span class="baths"><?php echo $f->bathroom; ?> Bath</span>
                    <?php if($f->size != 0 ) { ?>
                    <span class="sqft"><?php echo $f->size; ?></span> Sq Ft
                    <?php } ?>
                  </p>
                  <div class="clear"></div>
                </div>
              </li>
              <?php }  ?>
            </ul>
          </aside>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <?php } } ?>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
