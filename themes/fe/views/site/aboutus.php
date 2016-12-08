<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);

?>

<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset,'seo' => $seo)); ?>
  <div id="main" class="site-main container_16">
    <div class="inner">
      <div id="primary" class="grid_11 suffix_1">
        <article class="single">
          <div class="entry-content">
            <div class="long-description"> 
              
              <?php echo $page->content; ?> </div>
          </div>
          <div class="clear"></div>
        </article>
      </div>
       
    </div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
