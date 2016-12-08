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
    <div class="container marT30">
    <article class="col span_8">
	
	
	<h5> Grazie <?php echo $model->Villaowner->name; ?>, <br><br>Thankyou for your booking for the <?php echo $model->Pinfo->tt_name; ?>. <br><br>You will receive further documentation about your booking very shortly. In the meantime we remain at your disposal for any additional assistance regarding flights, hotels, tours, car hire or ground transfers.<br><br>  Regards, <br>The CIT Villas Team </h5>
	
	</article>
     <div id="sidebar" class="col span_3">
        <div id="sidebar-inner about-us" class="about-us">
          <aside id="ct_listings-1" class="widget widget_ct_listings left">
            <h4><?php echo t('Property'); ?></h4>
            <ul>
              <?php 

	   	   $f = Pinfo::model()->findByPk($prop_id);
		   
		   if ( isset($f) && (count($f)>0) ) {
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
                  <?php if(prop_min_price($f->id)!= 0 ) { ?>
                  <p class="price marB0">
                    <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?> 
                  </p>
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
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>