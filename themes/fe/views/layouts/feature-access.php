<?php  
		 $amn = Amenities::model()->findAll(array('condition'=>'status = 1 AND lang = 2')); 
		 if($amn) { ?>

<h2 class="border-bottom marB20"><?php echo t('Features'); ?> &amp; <?php echo t('Accessories'); ?></h2>
<?php

			//print_r($amn);
			//$Tot_Items[]='';
		  ?>
<?php
	$i=0;
	foreach ($amn as $am) {
    //echo $amn[$i++]->id;
	if( Pinfo::CheckAmn( $amn[$i++]->id , $page->id ) == 1 ) {
		$Tot_Items[] =  $am->name;
 
  } }
  
  //echo count($Tot_Items); 
  $split_first =  round((count($Tot_Items)/2),0,PHP_ROUND_HALF_UP); ?>
<div class="twocol left">
  <ul class="propfeatures left marR30">
    <?php $j=0; 
for ($j=0; $j<$split_first; $j++) { ?>
    <li><i class="fa fa-check-circle"></i><?php echo $Tot_Items[$j]; ?></li>
    <?php } ?>
  </ul>
</div>
<div class="twocol left last">
  <ul class="propfeatures left marR20">
    <?php $j=0; 
for ($j=$split_first; $j<count($Tot_Items); $j++) { ?>
    <li><i class="fa fa-check-circle"></i><?php echo $Tot_Items[$j]; ?></li>
    <?php } ?>
  </ul>
</div>
<div class="clear"></div>
<?php } ?>
<div class="clear"></div>
