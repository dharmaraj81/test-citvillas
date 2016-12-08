<?php

	$i = 0;

	$soffer = Soffer::model()->findAll(array(

			'select'=>'*, rand() as rand',

			'condition'=>'status = :st AND value > :vl AND to_date >= :vdate',

			'params' => array(':st'=>1,':vl'=>0, ':vdate' => time()),

			'order'=>'rand',

			'limit'=>4

	)); 
	
	   if ( isset($soffer) && (count($soffer)>0) ) {

?>

<section class="featured-listings">
  <div class="container">
    <header class="masthead">
      <h2 class="left marT0 marB0"><?php echo t('View Our  Special Villa Deals'); ?></h2>
      <a class="view-all right" href="<?php echo Yii::app()->createUrl('ourvillas/specialdeal'); ?>"><?php echo t('View All'); ?><i class="icon-angle-right"></i></a>
      <div class="clear"></div>
    </header>
    <ul>
      <?php 

		   $node = 0;

		

        		foreach ($soffer as $s) {

					$f = Pinfo::model()->findByPk($s->prop_id);
					
					$meta2 = Seo::model()->find(array(
						'condition'=>'uid = :UID AND layout = :LYT',
						'params'=>array(':UID'=> $f->uid, ':LYT'=>'prop' )));

					if($node == 0 ) {
						
						

	    ?>
      <li class="feat-listing col span_3 first">
        <figure> <a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image"  alt="<?php echo $f->altTag; ?>"></a> </figure>
        <div class="grid-listing-info">
          <header>
            <h5 class="marB0"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo $f->tt_name; ?></a></h5>
            <p class="location marB0"><?php echo Town::GetName($f->town); ?>, <?php echo Province::GetName($f->province); ?> </p>
          </header>
          <p class="price marB0">
            <?php if(prop_min_price($f->id)!= 0 ) { ?>
            <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?> <?php echo t('Per Week'); ?>
            <?php } else { ?>
            <i class="icon-angle-right"></i>
            <a id="various3" data-rel="lightcase:myCollection" href="<?php echo Yii::app()->createUrl('site/villaenquirypopup',array('propid'=>$f->id)); ?>"> <?php echo t('ENQUIRE NOW'); ?></a>
            <?php } ?>
          </p>
          <p class="propinfo marB0">
            <?php if ($f->bedroom!=0) { ?>
            <span class="beds"><?php echo ($f->bedroom==1) ? $f->bedroom.' Bedroom' : $f->bedroom.' Bedrooms' ?> </span>
            <?php } ?>
            <?php if ($f->bathroom!=0) { ?>
            <span class="baths"><?php echo ($f->bathroom==1) ? $f->bathroom.' Bathroom' : $f->bathroom.' Bathrooms' ?> </span>
            <?php } ?>
            <?php if($f->size != 0 ) { ?>
            <span class="sqft"><?php echo $f->size; ?></span> Sq Mt
            <?php } ?>
          </p>
        </div>
      </li>
      <?php $node++; } else {?>
      <li class="feat-listing col span_3 ">
        <figure> <a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image" alt="<?php echo $f->altTag; ?>"></a> </figure>
        <div class="grid-listing-info">
          <header>
            <h5 class="marB0"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo $f->tt_name; ?></a></h5>
            <p class="location marB0"><?php echo Town::GetName($f->town); ?>, <?php echo Province::GetName($f->province); ?></p>
          </header>
          <p class="price marB0">
            <?php if(prop_min_price($f->id)!= 0 ) { ?>
            <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?> <?php echo t('Per Week'); ?>
            <?php } else { ?>
            <i class="icon-angle-right"></i>
            <a id="various3" data-rel="lightcase:myCollection" href="<?php echo Yii::app()->createUrl('site/villaenquirypopup',array('propid'=>$f->id)); ?>"> <?php echo t('ENQUIRE NOW'); ?></a>
            <?php } ?>
          </p>
          <p class="propinfo marB0">
            <?php if ($f->bedroom!=0) { ?>
            <span class="beds"><?php echo ($f->bedroom==1) ? $f->bedroom.' Bedroom' : $f->bedroom.' Bedrooms' ?> </span>
            <?php } ?>
            <?php if ($f->bathroom!=0) { ?>
            <span class="baths"><?php echo ($f->bathroom==1) ? $f->bathroom.' Bathroom' : $f->bathroom.' Bathrooms' ?> </span>
            <?php } ?>
            <?php if($f->size != 0 ) { ?>
            <span class="sqft"><?php echo $f->size; ?></span> Sq Mt
            <?php } ?>
          </p>
        </div>
      </li>
      <?php $node++; } }  ?>
    </ul>
    <div class="clear"></div>
  </div>
</section>
<?php } ?>
