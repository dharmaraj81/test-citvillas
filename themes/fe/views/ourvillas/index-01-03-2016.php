<?php
 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
		
		$url_last = Yii::app()->getBaseUrl(true).'/'.Yii::app()->request->getPathInfo();
		//echo Yii::app()->getBaseUrl(true);	
		$sort_js = '
			function sort_propertt(sorting_type)
		{
			window.location.href="<?php  echo $url_last; ?>?"+sorting_type;	
		}';
		
		Yii::app()->clientScript->registerScript('sort_js', $sort_js);	

?>

<body id="archive" class="archive author author-crob author-1">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
  </section>
  <?php if( ($meta->h2!='') && ( $meta->h3!='') ) { ?>
  <section class="cta center">
    <div class="container">
      <div class="col span_9 left-image">
        <h2 class="marT0 marB10"><?php echo $meta->h2; ?></h2>
        <p class="lead"><?php echo $meta->h3; ?></p>
      </div>
      <div class="col span_3 right-image"> </div>
    </div>
  </section>
  <?php } ?>
  <section id="main-content-2">
    <div class="container archive marT30">
      <article class="col span_9 first">
        <div class="page hentry col span_12 first">
          <div id="dsidx" class="dsidx-results">
            <div class="dsidx-sorting-control">
              <select name="sorting_property" id="sorting_property" onChange="sort_propertt(this.value)">
                <option value="" selected="selected"> Sort By </option>
                <option value="sorty_by_sleep_highlow">Sleeps (High to Low)</option>
                <option value="sorty_by_sleep_lowhigh"> Sleeps (Low to High)</option>
                <option value="sorty_by_price_highlow"> Price (High to Low)</option>
                <option value="sorty_by_price_lowhigh"> Price (Low to High)</option>
              </select>
            </div>
            <?php 

		   $node = 0;

		   if ( isset($model) && (count($model)>0) ) {

        		foreach ($model as $f) {
					if($node == 0 ) {

	    ?>
            <article class="listing list">
              <div class="list-listing-info col span_12">
                <div class="listing-thumb col span_5">
                  <figure> <a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'propid'=>$f->id)); ?>"> <img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image" width="306" height="202" alt="<?php echo $f->altTag; ?>"></a> </figure>
                  <p class="listing-imgs-attached marB0 propinfo"> <span class="beds"><?php echo $f->sleep; ?> Sleeps</span>
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
                <header>
                  <h4 class="marT5"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'propid'=>$f->id)); ?>"><?php echo $f->tt_name; ?></a></h4>
                  <p> <?php echo Town::GetName($f->town); ?>, <?php echo Province::GetName($f->province); ?></p>
                </header>
                <div class="price marT0 marB0">
                  <?php if(prop_min_price($f->id)!= 0 ) { ?>
                  <?php echo t('From'); ?> AUD <?php echo prop_min_price($f->id); ?> <?php echo t('Per Week'); ?>
                  <?php } ?>
                  <div class="enquiry marT0 marB0"> <a href="<?php echo Yii::app()->createUrl('site/villaenquiry',array('propid'=>$f->id)); ?>"> <?php echo t('Enquire Now'); ?> </a> </div>
                </div>
                <div class="listing-excerpt">
                  <p><?php echo $f->summaryContent; ?>...</p>
                </div>
              </div>
              <div class="clear"></div>
            </article>
            <?php } } } ?>
            <div class="pagination">
              <?php  $this->widget('application.components.SimplaPager', array('pages'=>$pages)); ?>
              <div class="clear"></div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </article>
      <div id="sidebar" class="col span_3">
        <div id="sidebar-inner" class="ourvillas">
          <?php //$this->renderPartial('//layouts/right-side-bar-search',array('layout_asset'=>$layout_asset, 'meta'=>$meta,'SearchWidget'=>$SearchWidget)); ?>
          <?php $this->renderPartial('//layouts/right-side-bar-tags',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
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
