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
          <div class="contact-msg-direct"> <?php echo $page->content; ?> </div>
          <?php } ?>
          <?php	$form=$this->beginWidget('CActiveForm', array('id'=>'direct-payment-form', 'enableAjaxValidation'=>true)); ?>
          <?php echo $form->errorSummary(array($model)); ?>
          <div class="contact-form">
            <div class="form-item"> <?php echo $form->textField($model, 'name',array('class'=>'form-text','placeholder'=>'Full Name*')); ?> </div>
            <div class="form-item"> <?php echo $form->textField($model, 'email',array('class'=>'form-text','placeholder'=>'eMail*')); ?></div>
            <div class="form-item"> <?php echo $form->textField($model, 'amount',array('class'=>'form-text','placeholder'=>'Amount*')); ?></div>
            <div class="form-item-amt">
              <p> <input type="submit" value="Pay Now" class="flatbtn"> </p>
              <p>  <?php echo $page->h3_desc; ?> </p>
            </div>
          </div>
           <?php $this->endWidget(); ?>
        </div>
      </div>
    </div>
    <?php $this->renderPartial('//layouts/other-activity',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('page'=>$page, 'meta'=>$meta,'layout_asset'=>$layout_asset)); ?>
</div>
</body>
