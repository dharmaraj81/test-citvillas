<?php

if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);

$this->pageTitle=Yii::app()->name . ' - Error ( Not Found )';
$error = Yii::app()->errorHandler->error;

//print_r($error);

?>

<body id="archive" class="archive author author-crob author-1">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs-aboutus',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
    <div class="container archive marT30">
      <div class="col span_9 about_us first">
        <div class="agent author-info col">
          <h1 class="errorpage">Error <?php echo CHtml::encode($error['code']); ?></h1>
          <div class="symple-box yellow center " style="text-align: center; width: 100%;"><?php echo CHtml::encode($error['message']); ?></div>
          <!-- <p> <?php print_r($error); ?> </p> -->
        </div>
        <div class="clear"></div>
      </div>
      <div id="sidebar" class="col span_3">
        <div id="sidebar-inner" class="about-us">
          <?php $this->renderPartial('//layouts/latest-right-side-pane',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'prop'=>1)); ?>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/featured-list',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
  <div style="display:none">
    <div class="grofile-hash-map-8f11ad2b25432f80bc426a5ed5eb94d4"> </div>
  </div>
</div>
</body>
