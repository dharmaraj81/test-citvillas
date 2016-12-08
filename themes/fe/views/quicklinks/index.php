<?php
 	if(YII_DEBUG)
    	$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, true);
	else 
		$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, false);
?>

<body class="inner-page">
<div class="wrapper">
  <header id="header">
    <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  </header>
  <div class="menu-item full-width clearfix">
    <?php $this->renderPartial('//layouts/top-menu',array('layout_asset'=>$layout_asset)); ?>
  </div>
  <div id="main" class="page-width">
    <?php //$this->renderPartial('common.front_layouts.default.breadcrumbs',array('breadcrumbs'=>$breadcrumbs,'layout_asset'=>$layout_asset)); ?>
    <h1> <?php echo $meta->h1; ?> </h1>
    <h2> <?php echo $meta->h2; ?> </h2>
    

    <?php $this->renderPartial('//layouts/other-activity',array('layout_asset'=>$layout_asset)); ?>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
