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
        <ul>
          <?php
	$data = array();
	foreach($model as $m){  
		$data[] = $m->attributes;
	?>
          <li class="margin-b12 full-width clearfix">
            <div class="img"><img src="<?php echo $layout_asset; ?>/images/img-testimonial.jpg" alt="<?php echo t('Testimonial'); ?>" title="<?php echo t('Testimonial'); ?>" /></div>
            <div class="testimonial-details">
              <h3> <?php echo $m->title; ?> </h3>
              <br />
              <blockquote><span class="left-quote">&ldquo;</span>
                <p><?php echo $m->description; ?><span class="right-quote">&rdquo;</span> </p>
              </blockquote>
              <div class="testimonial-name">
                <p> <?php echo $m->fname; ?> </p>
              </div>
            </div>
          </li>         
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="pagination">
      <?php  $this->widget('application.components.SimplaPager', array('pages'=>$pages)); ?>
    </div>
  <div style="clear:both;"></div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('page'=>$page, 'meta'=>$meta,'layout_asset'=>$layout_asset)); ?>
</div>
</body>
