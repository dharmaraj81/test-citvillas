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
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'tour-enquiry-form','enableAjaxValidation'=>false,'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'formular marT20'))); ?>
        <?php echo $form->hiddenField($model,'excursion_id',array( 'value' => $excursion_id )); ?>
        <?php $tour = Tour::model()->findByPk($excursion_id); ?>
        <h4 align="center"><?php echo "Enquiry About : ".$tour->title; ?></h4>
        <br>
        <br>
        <p><strong> <?php echo t('Let us Find you the Dream Excursions in Italy'); ?> </strong></p>
        <div class="post-438 page type-page status-publish hentry col span_11 first">
          <?php if(Yii::app()->user->hasFlash('tour-enquiry')): echo Yii::app()->user->getFlash('tour-enquiry'); endif; ?>
          <div class="clear"></div>
        </div>
        <div class="twocol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'first_name'); ?> <?php echo $form->textField($model,'first_name',array('tabindex'=>1)); ?> <?php echo $form->error($model,'first_name'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'email'); ?> <?php echo $form->textField($model,'email',array('tabindex'=>3)); ?> <?php echo $form->error($model,'email'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'phonenumber1'); ?><?php echo $form->textField($model,'cc1',array('placeholder'=>'Code','maxlength'=>'6','tabindex'=>'5','style'=>'width:20%;')); ?> - <?php echo $form->textField($model,'phonenumber1',array('tabindex'=>'6','style'=>'width:53%;')); ?> <?php echo $form->error($model,'phonenumber1'); ?> </div>
        </div>
        <div class="twocol left last">
          <div class="input-prepend"><?php echo $form->labelEx($model,'last_name'); ?> <?php echo $form->textField($model,'last_name',array('tabindex'=>2)); ?> <?php echo $form->error($model,'last_name'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'reenter_email'); ?> <?php echo $form->textField($model,'reenter_email',array('tabindex'=>4)); ?> <?php echo $form->error($model,'reenter_email'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'phonenumber2'); ?><?php echo $form->textField($model,'cc2',array('placeholder'=>'Code','maxlength'=>'6','tabindex'=>'7','style'=>'width:20%;')); ?> - <?php echo $form->textField($model,'phonenumber2',array('tabindex'=>'8','style'=>'width:53%;')); ?> <?php echo $form->error($model,'phonenumber2'); ?> </div>
        </div>
        <div class="fourcol left last">
          <p>&nbsp;</p>
          <h5> <?php echo t('Please select the excursions that you may be interested in. Please also be aware that we can customize anything at all for you and can also manage larger group sizes'); ?></h5>
          <p>&nbsp;</p>
        </div>
        <div class="onethirdcol left">
          <h4 class="border-bottom marB18"><?php echo t('Food & Wine excursions'); ?></h4>
          <?php echo $form->error($model,'foodwine1'); ?>
          <table>
            <?php
					 $foodwine1=CHtml::listData(Tour::model()->findAll(array(
									'condition'=>'status=:ST AND source = :PT',
									'params'=>array(':ST'=>1,':PT'=>2))),'title','title');
														 				
					echo $form->checkBoxList($model,'foodwine1',$foodwine1,array('template'=>'<tr><td>{input}</td><td>{label}</td></tr>','separator'=>''));
				?>
          </table>
        </div>
        <div class="twothirdcol left last">
          <h4 class="border-bottom marB18"><?php echo t('Cultural & Sightseeing'); ?></h4>
          <?php echo $form->error($model,'foodwine2'); ?>
          <div class="twocol left">
            <table>
              <?php
					 $foodwine2=CHtml::listData(Tour::model()->findAll(array('condition'=>'status=:ST AND source = :PT','params'=>array(':ST'=>1,':PT'=>3),'limit' => 10,'offset' => 0)),'title','title');
echo $form->checkBoxList($model,'foodwine2',$foodwine2,array('template'=>'<tr><td>{input}</td><td>{label}</td></tr>','separator'=>''));
				   
				  ?>
            </table>
          </div>
          <div class="twocol left last">
            <table>
              <?php
					 $foodwine2=CHtml::listData(Tour::model()->findAll(array('condition'=>'status=:ST AND source = :PT','params'=>array(':ST'=>1,':PT'=>3),'limit' => 10,'offset' => 10)),'title','title');
echo $form->checkBoxList($model,'foodwine2',$foodwine2,array('template'=>'<tr><td>{input}</td><td>{label}</td></tr>','separator'=>''));
			  ?>
            </table>
          </div>
        </div>
        <div class="fourcol left last">
          <div class="input-prepend"><?php echo $form->label($model,'relavant_details'); ?> <?php echo $form->textArea($model,'relavant_details'); ?> <?php echo $form->error($model,'relavant_details'); ?></div>
          <div class="center">
            <input id="submit" class="symple-button-inner" type="submit" value="Send My Request">
          </div>
        </div>
        <div class="clear"></div>
        <?php $this->endWidget(); ?>
      </article>
    </div>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
