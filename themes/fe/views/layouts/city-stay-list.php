<?php
	$citystay = Pinfo::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND tags LIKE "%1078%"',
			'order'=>'rand',
			'limit'=>4
	)); 
	
	  if ( isset($citystay ) && (count($citystay )>0) ) {
?>

	
	
	
<section class="featured-listings">
  <div class="container">
    <header class="masthead">
      <h2 class="left marT0 marB0"><?php echo t('View our Italian City Stay Apartments'); ?></h2>
      <a class="view-all right" href="<?php echo Yii::app()->createUrl('ourvillas/tags',array( 'tag' => 'city-stays' )); ?>"><?php echo t('View All'); ?><i class="icon-angle-right"></i></a>
      <div class="clear"></div>
    </header>
    <ul>
      <?php 
		   $node = 0;
		 
        		foreach ($citystay  as $f) {
					$meta2 = Seo::model()->find(array(
						'condition'=>'uid = :UID AND layout = :LYT',
						'params'=>array(':UID'=> $f->uid, ':LYT'=>'prop' )));
					if($node == 0 ) {
						
						
	    ?>
		
      <li class="feat-listing col span_3 first">
        <figure> 
			<div class="item wishItem">
				<a class="thumb" href="<?php echo $f->weburl; ?>">
				<img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image"  alt="<?php echo $f->altTag; ?>"></a>
				<a class="wishAction addToWish" data-img="<?php echo Gallery::GetPropThumbnail($f->id); ?>" data-title="<?php echo substr($f->tt_name, 0, 23); ?>" data-id="<?php echo $f->id; ?>" href="#"></a>
			</div> 
		</figure>
        <div class="grid-listing-info">
          <header>
            <h5 class="marB0"><a href="<?php echo $f->weburl; ?>"><?php echo substr($f->tt_name, 0, 23); ?></a></h5>
            <p class="location marB0"><?php echo Town::GetName($f->town); ?>, <?php echo Province::GetName($f->province); ?></p>
          </header>
          <p class="price marB0">
            <?php if(prop_min_price($f->id)!= 0 ) { ?>
            <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?> <?php echo t('Per Week'); ?>
            <?php } else { ?>
            <i class="icon-angle-right"></i> <a id="various3" data-rel="lightcase:myCollection" href="<?php echo Yii::app()->createUrl('site/villaenquirypopup',array('propid'=>$f->id)); ?>"> <?php echo t('ENQUIRE NOW'); ?></a>
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
      <?php $node++; } else { ?>
      <li class="feat-listing col span_3 ">
        <figure> 
			<div class="item wishItem">
				<a class="thumb" href="<?php echo $f->weburl; ?>">
				<img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image"  alt="<?php echo $f->altTag; ?>"></a> 
				<a class="wishAction addToWish" data-img="<?php echo Gallery::GetPropThumbnail($f->id); ?>" data-title="<?php echo substr($f->tt_name, 0, 23); ?>" data-id="<?php echo $f->id; ?>" href="#"></a>
			</div>
		</figure>	
        <div class="grid-listing-info">
          <header>
            <h5 class="marB0"><a href="<?php echo $f->weburl; ?>"><?php echo substr($f->tt_name, 0, 23); ?></a></h5>
            <p class="location marB0"><?php echo Town::GetName($f->town); ?>, <?php echo Province::GetName($f->province); ?></p>
          </header>
          <p class="price marB0">
            <?php if(prop_min_price($f->id)!= 0 ) { ?>
            <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?> <?php echo t('Per Week'); ?>
            <?php } else { ?>
            <i class="icon-angle-right"></i> <a id="various3" data-rel="lightcase:myCollection" href="<?php echo Yii::app()->createUrl('site/villaenquirypopup',array('propid'=>$f->id)); ?>"> <?php echo t('ENQUIRE NOW'); ?></a>
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
