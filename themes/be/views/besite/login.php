<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('frontend.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('frontend.assets.frontend'), false, -1, false);

?>

<body id="page" class="home page page-id-585 page-template page-template-template-home page-template-template-home-php">
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <div class="container marT30">
      <article class="col span_12 first">
        <div class="col span_6 first">
          <h4 class="marB30">Already a member? Login here.</h4>
          
           <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ct_login_form',
	'htmlOptions'=>array('class'=>'ct_form'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
          
         
            <fieldset>
              <?php echo $form->label($model,'username'); ?>
              <?php echo $form->textField($model,'username',array('class'=>'text-input')); ?>
              <?php echo $form->label($model,'password'); ?>
             <?php echo $form->passwordField($model,'password',array('class'=>'text-input')); ?>
              <div class="clear"></div>
              <?php echo $form->checkBox($model,'rememberMe'); ?> <?php echo $form->label($model,'rememberMe',array('class'=>'checkbox')); ?>
              <input type="hidden" name="ct_login_nonce" value="9027be0010">
              <input id="ct_login_submit" type="submit" value="Login">
            </fieldset>
          <?php $this->endWidget(); ?>
        </div>
        <div class="col span_6">
          <p class="no-registration">User registration is not enabled</p>
        </div>
        <div class="clear"></div>
      </article>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
  <div style="display:none"> </div>
</div>
</body>

<!-- form -->

