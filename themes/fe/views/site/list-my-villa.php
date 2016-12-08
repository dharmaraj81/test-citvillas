<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);

?>

<body id="archive" class="archive author author-crob author-1">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
    <div class="container marT30">
      <article class="col span_12 first">
        <p><strong> <?php echo t('List your Property with CIT Europe Pty Ltd'); ?> </strong></p>
        <p>To contact CIT Europe Pty Ltd regarding a potential collaboration please complete the form below in as much detail as possible and we look through your information. If you would prefer to speak to us in person then please see our "Contact Us" page for our contact information.</p>
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'list-my-villa-form','enableAjaxValidation'=>false,'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'formular marT20'))); ?>
        <div class="post-438 page type-page status-publish hentry col span_11 first">
          <?php if(Yii::app()->user->hasFlash('list-my-villa')): echo Yii::app()->user->getFlash('list-my-villa'); endif; ?>
          <div class="clear"></div>
        </div>
        <?php echo $form->errorSummary(array($model)); ?>
        <div class="onethirdcol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'first_name'); ?> <?php echo $form->textField($model,'first_name'); ?> <?php echo $form->error($model,'first_name'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'last_name'); ?> <?php echo $form->textField($model,'last_name'); ?> <?php echo $form->error($model,'last_name'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'email'); ?> <?php echo $form->textField($model,'email'); ?> <?php echo $form->error($model,'email'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'email1'); ?> <?php echo $form->textField($model,'email1'); ?> <?php echo $form->error($model,'email1'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'phone_no'); ?><?php echo $form->textField($model,'ccode1',array('placeholder'=>'Code','maxlength'=>'6','style'=>'width:20%;')); ?> - <?php echo $form->textField($model,'phone_no',array('style'=>'width:52%;')); ?> <?php echo $form->error($model,'phone_no'); ?> </div>
          <div class="input-prepend"> <?php echo $form->labelEx($model,'phone_no2'); ?> <?php echo $form->textField($model,'ccode2',array('placeholder'=>'Code','maxlength'=>'6','style'=>'width:20%;')); ?> - <?php echo $form->textField($model,'phone_no2',array('style'=>'width:52%;')); ?> <?php echo $form->error($model,'phone_no2'); ?></div>
          <div class="input-prepend"> <?php echo $form->labelEx($model,'skype_id'); ?> <?php echo $form->textField($model,'skype_id'); ?> <?php echo $form->error($model,'skype_id'); ?></div>
        </div>
        <div class="onethirdcol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'property_name'); ?><?php echo $form->textField($model,'property_name'); ?> <?php echo $form->error($model,'property_name'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'property_type'); ?> <?php echo $form->dropDownList($model,'property_type',  Type::GetAll(),array()); ?> <?php echo $form->error($model,'property_type'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'property_location'); ?> <?php echo $form->dropDownList($model,'property_location',  Plocation::GetAll(),array()); ?> <?php echo $form->error($model,'property_location'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'pool',array('class'=>'pool','style'=>'width:auto;')); ?> <?php echo $form->dropDownList($model, 'pool', array('1'=>'Shared Pool','2'=>'Private Pool'),array('empty'=>'No Pool'));  ?> <?php echo $form->error($model,'pool'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'bed_rooms'); ?><?php echo $form->textField($model,'bed_rooms'); ?> <?php echo $form->error($model,'bed_rooms'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'bath_rooms'); ?><?php echo $form->textField($model,'bath_rooms'); ?> <?php echo $form->error($model,'bath_rooms'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'website'); ?> <?php echo $form->textField($model,'website'); ?> <?php echo $form->error($model,'website'); ?></div>
        </div>
        <div class="onethirdcol left last">
          <div class="input-prepend"> <?php echo $form->labelEx($model,'address'); ?> <?php echo $form->textField($model,'address'); ?> <?php echo $form->error($model,'address'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'town'); ?><?php echo $form->textField($model,'town'); ?> <?php echo $form->error($model,'town'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'province'); ?><?php echo $form->textField($model,'province'); ?> <?php echo $form->error($model,'province'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'region'); ?><?php echo $form->textField($model,'region'); ?> <?php echo $form->error($model,'region'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'postcode'); ?><?php echo $form->textField($model,'postcode'); ?> <?php echo $form->error($model,'postcode'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'near_shop'); ?> <?php echo $form->textField($model,'near_shop'); ?> <?php echo $form->error($model,'near_shop'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'near_restaurents'); ?> <?php echo $form->textField($model,'near_restaurents'); ?> <?php echo $form->error($model,'near_restaurents'); ?></div>
        </div>
        <div class="clear"></div>
        <div class="fourcol left last">
          <div class="input-prepend"><?php echo $form->label($model,'list_sites'); ?> <?php echo $form->textArea($model,'list_sites',array('class'=>'listothersite','placeholder'=>'Please Separate with Commas( , )')); ?> <?php echo $form->error($model,'list_sites'); ?></div>
        </div> 
        
        <div class="clear"></div>
         <div class="onethirdcol left">
          <div style="margin-left:10px; text-align:left;">
            <?php $this->widget('CCaptcha'); ?>
          </div>
          <div class="input-prepend"><?php echo $form->textField($model,'verifycode'); ?></div>
        </div>
        
        <div class="clear"></div>
        <div class="fourcol left last">
          <div class="center">
            <input id="submit" class="symple-button-inner" type="submit" value="List My Villa">
          </div>
        </div>
        <?php $this->endWidget(); ?>
      </article>
    </div>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
