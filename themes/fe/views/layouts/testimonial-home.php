<?php
	$testi = Review::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1',
			'order'=>'rand',
			'group'=>'t.parent',
			'distinct'=>true,
			'limit'=>10
	)); 
?>

<section class="page-builder">
  <div class="container">
    <div id="aq-template-wrapper-575" class="aq-template-wrapper aq_row">
      <div id="aq-block-575-1" class="aq-block aq-block-aq_testimonial_block aq_span12 aq-first clearfix">
        <div class="flexslider">
          <ul class="slides">
            <?php 
		   $node = 0;
		   if ( isset($testi ) && (count($testi )>0) ) {
        		foreach ($testi  as $f) {
					if($node == 0 ) {
						$Prop = Pinfo::model()->findByPk( $f->parent );
	    ?>
            <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
              <p class="marB10"></p>
              <p><?php echo substr($f->description,0,150); ?>...</p>
              <p></p>
              <h5 class="marB0 auth"><?php echo $f->fname; ?></h5>
               <h6 class="marB0 location-info"> <a href="<?php echo $Prop->weburl; ?>"><?php echo $Prop->tt_name; ?> - <?php echo Province::GetName($Prop->province); ?></a><br />
              </h6>
             <div class="more-botton"><a class="view-all" href="<?php echo Yii::app()->createUrl('ourvillas/specialdeal'); ?>"><?php echo t('Read More'); ?></a> </div>
            </li>
            <?php $node++; } else { 
			$Prop = Pinfo::model()->findByPk( $f->parent ); ?>
            <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
              <p class="marB10"></p>
              <p class="testi"><?php echo substr($f->description,0,150); ?>...</p>
              <p></p>
              <h5 class="marB0 auth"><?php echo $f->fname; ?></h5>
              <h6 class="marB0 location-info"> <a href="<?php echo $Prop->weburl; ?>"><?php echo $Prop->tt_name; ?> - <?php echo Province::GetName($Prop->province); ?></a><br />
              </h6>
             <div class="more-botton"><a class="view-all" href="<?php echo Yii::app()->createUrl('ourvillas/specialdeal'); ?>"><?php echo t('Read More'); ?></a></div>
            </li>
            <?php $node++; } } } ?>
          </ul>
          <ul class="flex-direction-nav">
            <li><a class="flex-prev" href="#">Previous</a></li>
            <li><a class="flex-next" href="#">Next</a></li>
          </ul>
          
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</section>
