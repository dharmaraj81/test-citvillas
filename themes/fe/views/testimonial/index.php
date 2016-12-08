<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);

?>

<body id="archive" class="archive category category-articles category-2">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
    <div class="container archive marT30">
      <div class="col span_9 first">
        <?php

					$data = array();

					foreach($model as $m)

					{  

					$data[] = $m->attributes;

					$Prop = Pinfo::model()->findByPk( $m->parent );
					
					$meta2 = Seo::model()->find(array(
						'condition'=>'uid = :UID AND layout = :LYT',
						'params'=>array(':UID'=> $Prop->uid, ':LYT'=>'prop' )));

			  ?>
        <article class="post-234 post type-post status-publish format-standard has-post-thumbnail hentry category-articles col span_11 first">
          <div class="post-thumb col span_4 first">
            <figure><a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($Prop->region),'province'=>GetProvinceNURL($Prop->province),'town'=>GetTownNURL($Prop->town),'property' => $meta2->slug)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($Prop->id); ?>" class="attachment-620 wp-post-image" alt="<?php echo $Prop->tt_name; ?>" /></a></figure>
          </div>
          <div class="content col span_8">
            <div class="padL10">
              <header class="marB20">
                <h3 class="entry-title marT0 marB5"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($Prop->region),'province'=>GetProvinceNURL($Prop->province),'town'=>GetTownNURL($Prop->town),'property' => $meta2->slug)); ?>"><?php echo $Prop->tt_name; ?></a></h3>
                <div class="post-meta"> <small class="marB0"> <span class="meta-user"><i class="icon-user"></i> <?php echo $m->fname; ?></span>
                  <?php if ($m->date_added != 0 ) { ?>
                  <span class="meta-cat"><i class="icon-calendar"></i> <?php echo date('d-M-Y',$m->date_added); ?> </span>
                  <?php } ?>
                  <span class="meta-comments"><i class="icon-map-marker"></i> <?php echo Town::GetName($Prop->town); ?>, <?php echo Province::GetName($Prop->province); ?></span> </small> </div>
              </header>
              <div class="excerpt marT20">
                <h4 class="marB20"><?php echo $m->title; ?></h4>
                <p><?php echo $m->description; ?></p>
              </div>
            </div>
          </div>
          <div class="clear"></div>
        </article>
        <?php } ?>
        <div class="clear"></div>
        <div class="pagination">
          <?php  $this->widget('application.components.SimplaPager', array('pages'=>$pages)); ?>
          <div class="clear"></div>
        </div>
      </div>
      <div id="sidebar" class="col span_3 ">
  <div id="sidebar-inner">
      <?php if ($pages->getCurrentPage()==0) { ?>
      <?php $this->renderPartial('//layouts/latest-right-side-pane',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
      <?php } ?>
      <?php $this->renderPartial('//layouts/right-side-bar-tags',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
      </div> </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
