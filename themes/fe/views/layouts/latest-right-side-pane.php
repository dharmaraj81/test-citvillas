
    <aside id="ct_listings-1" class="widget widget_ct_listings left">
      <h4><?php echo t('Latest Listings'); ?></h4>
      <ul>
        <?php
		
		if(isset($prop) && ($prop!=0) ) {  

	   	   $model = Pinfo::model()->findAll(array('condition'=>'status=1', 'limit'=>$prop, 'order'=>'created DESC'));
		} else {
			  $model = Pinfo::model()->findAll(array('condition'=>'status=1', 'limit'=>5, 'order'=>'created DESC'));
		}
		    

		   $node = 0;

		   if ( isset($model) && (count($model)>0) ) {

        		foreach ($model as $f) {



					if($node == 0 ) {
						
						$meta2 = Seo::model()->find(array(
						'condition'=>'uid = :UID AND layout = :LYT',
						'params'=>array(':UID'=> $f->uid, ':LYT'=>'prop' )));

	    ?>
        <li>
          <figure> <a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image" width="259" height="171" alt="<?php echo $f->tt_name; ?>"></a> </figure>
          <div class="grid-listing-info">
            <header>
              <h5 class="marB0"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo $f->tt_name; ?></a></h5>
              <p class="location marB0"><?php echo Province::GetName($f->province); ?> , <?php echo Town::GetName($f->town); ?></p>
            </header>
            <p class="price marB0">
              <?php if(prop_min_price($f->id)!= 0 ) { ?>
              <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?>
              <?php } else { ?>
              <a href="<?php echo Yii::app()->createUrl('site/villaenquiry',array('propid'=>$f->id)); ?>"> <?php echo t('ENQUIRE NOW'); ?></a>
              <?php } ?>
            </p>
            <p class="propinfo marB0"> <span class="beds"><?php echo $f->bedroom; ?> Bed</span><span class="baths"><?php echo $f->bathroom; ?> Bath</span>
              <?php if($f->size != 0 ) { ?>
              <span class="sqft"><?php echo $f->size; ?></span> Sq Ft
              <?php } ?>
            </p>
            <div class="clear"></div>
          </div>
        </li>
        <?php } } } ?>
      </ul>
    </aside>
    <div class="clear"></div>
 
