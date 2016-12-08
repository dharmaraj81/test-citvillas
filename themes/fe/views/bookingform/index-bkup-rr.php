<?php
 	if(YII_DEBUG)
    	$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, true);
	else 
		$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, false);
?>

<body class="inner-page">
<div class="wrapper">
  <header id="header">
    <?php $this->renderPartial('//layouts/headerlogo',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
  </header>
  <div class="menu-item full-width clearfix">
    <?php $this->renderPartial('//layouts/top-menu',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
  </div>
  <div id="main" class="page-width">
    <?php //$this->renderPartial('common.front_layouts.default.breadcrumbs',array('breadcrumbs'=>$breadcrumbs,'layout_asset'=>$layout_asset)); ?>
   
    <h1> <?php echo $meta->h1; ?> </h1>
    <h2> <?php echo $meta->h2; ?> </h2>
    <div class="about-content margin-auto margin-top">
      <div class="margin-t20 testi-details">
        <?php if($page->h3_desc!='') { ?>
        <ul>
          <li class="margin-b12 full-width clearfix"> <?php echo $page->h3_desc; ?> </li>
        </ul>
        <?php } ?>
        <div class="contact-wrapper">
          <?php if($page->content!='') { ?>
          <div class="contact-msg"> <?php echo $page->content; ?> </div>
          <?php } ?>
         
         
        </div>
      </div>
    </div>
    <?php $this->renderPartial('//layouts/other-activity',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('page'=>$page, 'meta'=>$meta,'layout_asset'=>$layout_asset)); ?>
</div>
</body>
