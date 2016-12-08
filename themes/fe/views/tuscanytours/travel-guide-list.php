<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);

?>

<body id="page" class="page page-id-173 page-template-default">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs-ourvillas',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'BreadCrumbs' => $BreadCrumbs )); ?>
    <div class="tour-list1 container marT30">
      <?php if( $page->id == 2 ) { ?>
      <div class="fourcol left last">
        <figure><img src="<?php echo PROPERTY_IMAGES_URL.'tours/food-wine-pghead.jpg'; ?>" class="attachment-620 wp-post-image" alt="<?php echo 'Food &amp; wine tour'; ?>" /></figure>
      </div>
      <?php } else { ?>
      <div class="fourcol left last">
        <figure><img src="<?php echo PROPERTY_IMAGES_URL.'tours/food-wine-pghead.jpg'; ?>" class="attachment-620 wp-post-image" alt="<?php echo 'Food &amp; wine tour'; ?>" /></figure>
      </div>
      <?php } ?>
      <br>
      <div class="col span_9 tour-list">
        <?php 

		  $ListTour = Tour::model()->findAll(array(

			'condition'=>'source = :SOURCE AND status = 1',

			'params'=>array(':SOURCE'=> $page->id ),

			));

	 ?>
        <?php

		if( isset($ListTour) && count($ListTour)>0 ) { 

			foreach ($ListTour as $l) { 

				  $img = Tgallery::model()->find(array(

					  'condition'=>'source=:id',

					  'params'=>array(':id'=>$l->id),

					  'order' => 'img_order ASC',

					  'limit'=>1

				  ));

				  $items = PROPERTY_IMAGES_URL.$l->id.'/fullsize/'.$img->img_url;  

				  $meta1 = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=> $l->uid )));

			?>
        <article class="post-234 post type-post status-publish format-standard has-post-thumbnail hentry category-articles col span_11 first">
          <div class="post-thumb col span_4 first">
            <figure><a class="thumb" href="<?php echo Yii::app()->createUrl('tuscanytours/detail',array('tlist'=>$meta->slug,'tdetail'=>$meta1->slug)); ?>"><img src="<?php echo $items; ?>" class="attachment-620 wp-post-image" alt="<?php echo $l->title; ?>" /></a></figure>
          </div>
          <div class="content col span_8">
            <div class="padL10">
              <header class="marB20">
                <h4 class="entry-title marT0 marB5"><a href="<?php echo Yii::app()->createUrl('tuscanytours/detail',array('tlist'=>$meta->slug,'tdetail'=>$meta1->slug)); ?>"><?php echo $l->title; ?></a></h4>
              </header>
              <div class="excerpt marT20">
                <h5 class="marB20"><?php echo $l->subtitle; ?></h5>
                <p><?php echo substr( strip_tags($l->content), 0, 100).'...'; ?></p>
              </div>
            </div>
          </div>
          <div class="page tourlist hentry col span_12 first">
            <p class="right"> <a class="btn right" title="<?php echo t('Send an Enquiry'); ?>" href="<?php echo Yii::app()->createUrl('site/excursionenquiry',array('id' => $l->id)); ?>"> <?php echo t('Send an Enquiry'); ?> </a> <a class="btn right"  title="<?php echo t('Know More'); ?>" href="<?php echo Yii::app()->createUrl('tuscanytours/detail',array('tlist'=>$meta->slug,'tdetail'=>$meta1->slug)); ?>"><?php echo t('Know More'); ?> </a></p>
            <div class="clear"></div>
          </div>
          <hr>
          <div class="clear"></div>
          <div class="clear"></div>
        </article>
        <?php } } ?>
      </div>
      <div id="sidebar" class="col span_3 tour">
        <div id="sidebar-inner">
          <?php $this->renderPartial('//layouts/right-side-bar-tour-list',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'tourid' => $page->id)); ?>
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
