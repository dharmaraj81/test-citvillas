<?php

 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/lightcase.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/lightcase.init.js', CClientScript::POS_HEAD);
		
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/webplate.css');
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/lightcase.css');
?>

<body id="page">
<?php $this->renderPartial('//layouts/ga-code'); ?>

<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-home',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/slider',array('layout_asset'=>$layout_asset)); ?>
    <div class="clear"></div>
    <?php $this->renderPartial('//layouts/self-history',array('layout_asset'=>$layout_asset)); ?>
    <div class="clear"></div>
    <?php $this->renderPartial('//layouts/search-widget',array('layout_asset'=>$layout_asset,'SearchWidget'=>$SearchWidget)); ?>
    <div class="clear"></div>
     <?php $this->renderPartial('//layouts/city-stay-list',array('layout_asset'=>$layout_asset)); ?>
    <div class="clear"></div>
    <?php $this->renderPartial('//layouts/featured-list',array('layout_asset'=>$layout_asset)); ?>
    <div class="clear"></div>
    <?php $this->renderPartial('//layouts/special-deal-list',array('layout_asset'=>$layout_asset)); ?>
    <div class="clear"></div>
    <?php $this->renderPartial('//layouts/luxury-villa-list',array('layout_asset'=>$layout_asset)); ?>
    <div class="clear"></div>
    <?php $this->renderPartial('//layouts/wedding-villa-list',array('layout_asset'=>$layout_asset)); ?>
    <div class="clear"></div>
    <?php $this->renderPartial('//layouts/testimonial-home',array('layout_asset'=>$layout_asset)); ?>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
  <div style="display:none"> </div>
</div>
</body>
