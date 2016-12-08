<?php

	$featured = Pinfo::model()->findAll(array(
		  			'condition'=>'town = :T AND sleep between :S AND :E AND status = 1 AND mstatus = 1',
					'params'=>array(':T'=>$page->town,':S'=>$page->sleep,':E'=>$page->sleep+$page->sleep),
					'limit'=>4
		  ));

?>

<section class="featured-listings property-detail-similar">
  <div class="container">
    <header class="masthead">
      <h2 class="left marT0 marB0"><?php echo t('Similar Properties'); ?></h2>
      <div class="clear"></div>
    </header>
    <ul>
      <?php 

		   $node = 0;

		   if ( isset($featured) && (count($featured)>0) ) {
			   
			   

        		foreach ($featured as $f) {
					
					$meta2 = Seo::model()->find(array(
						'condition'=>'uid = :UID AND layout = :LYT',
						'params'=>array(':UID'=> $f->uid, ':LYT'=>'prop' )));

					if($node == 0 ) {
						
						

	    ?>
      <li class="feat-listing col span_3 first">
        <figure><div class="item wishItem">	<a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image"   alt="<?php echo $f->tt_name; ?>"></a> <a class="wishAction addToWish" data-img="<?php echo Gallery::GetPropThumbnail($f->id); ?>" data-title="<?php echo substr($f->tt_name, 0, 23); ?>" data-id="<?php echo $f->id; ?>" href="#"></a></div></figure>
        <div class="grid-listing-info">
          <header>
            <h5 class="marB0"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo $f->tt_name; ?></a></h5>
            <p class="location marB0"><?php echo Province::GetName($f->province); ?> , <?php echo Town::GetName($f->town); ?></p>
          </header>
          <p class="price marB0">
            <?php if(prop_min_price($f->id)!= 0 ) { ?>
            <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?> <?php echo t('Per Week'); ?>
            <?php } else { ?>
            <i class="icon-angle-right"></i> <?php echo t('ENQUIRE NOW'); ?>
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
        <figure><div class="item wishItem"> <a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image"  alt="<?php echo $f->tt_name; ?>"></a><a class="wishAction addToWish" data-img="<?php echo Gallery::GetPropThumbnail($f->id); ?>" data-title="<?php echo substr($f->tt_name, 0, 23); ?>" data-id="<?php echo $f->id; ?>" href="#"></a></div></figure>
        <div class="grid-listing-info">
          <header>
            <h5 class="marB0"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo $f->tt_name; ?></a></h5>
            <p class="location marB0"><?php echo Province::GetName($f->province); ?> , <?php echo Town::GetName($f->town); ?></p>
          </header>
          <p class="price marB0">
            <?php if(prop_min_price($f->id)!= 0 ) { ?>
            <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?> <?php echo t('Per Week'); ?>
            <?php } else { ?>
            <i class="icon-angle-right"></i> <?php echo t('ENQUIRE NOW'); ?>
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
      <?php $node++; } } } ?>
     
    </ul>
    <div class="clear"></div>
  </div>
</section>
<div class="clear"></div>
