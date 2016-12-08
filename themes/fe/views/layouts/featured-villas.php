<?php
	$i = 0;
	$featured = Pinfo::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND addtohome = 1',
			'order'=>'rand',
			'limit'=>6
	)); 
?>

<div class="listing-wrapper margin-top col-3">
  <ul class="full-width clearfix">
    <?php if( isset($featured) && (count($featured)) ) {
        		foreach ($featured as $f) {
					
					if($i!=1) {
	    ?>
    <li>
      <div class="listing-content">
        <div class="img"><a href="<?php echo Yii::app()->createUrl('property/index',array('province'=>GetProvinceURL($f->province),'town'=>GetTownURL($f->town),'propid'=>$f->id)); ?>" title="<?php echo $f->tt_name; ?>" ><img src="<?php echo Gallery::GetPropThumbnail1($f->id); ?>" width="315" height="224" alt="<?php echo $f->tt_name; ?>" title="<?php echo $f->tt_name; ?>" /></a></div>
        <div class="img-info clearfix">
          <h3><a href="<?php echo Yii::app()->createUrl('property/index',array('province'=>GetProvinceURL($f->province),'town'=>GetTownURL($f->town),'propid'=>$f->id)); ?>"><?php echo $f->tt_name; ?></a></h3>
          <ul>
            <li><?php echo Province::GetName($f->province); ?>, <?php echo Region::GetName($f->region); ?></li>
            <li><?php echo t('Sleeps'); ?><?php echo " ".$f->sleep; ?></li>
          </ul>
        </div>
        <?php if (Soffer::ValidOffer($f->id)!=0) { ?>
        <div class="offer text-center"><?php echo Soffer::ValidOffer($f->id); ?>% <br />
          Offer</div>
        <?php } ?>
      </div>
    </li>
    <?php } else { ?>
    <li> <span class="features"><?php echo t('Featured Villas'); ?></span>
      <p>We have beautiful antique houses and reinassance palaces whose interiors have been completely renovated and outfitted with modern amenities while their exteriors have retained their historical charm.</p>
    </li>
    <?php } $i++; } } ?>
  </ul>
</div>
