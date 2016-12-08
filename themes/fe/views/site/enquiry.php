<?php

 	if(YII_DEBUG)

    	$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, true);

	else 

		$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, false);

?>

<body class="inner-page">
<?php $this->renderPartial('//layouts/ga-code'); ?>
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
    <h2> <?php echo isset($_GET['propid']) ? Pinfo::GetPageName($_GET['propid']) :''; ?> </h2>
    <div class="about-content margin-auto margin-top">
      <div class="margin-t20 testi-details">
        <div class="contact-wrapper">
          <?php if($page->content!='') { ?>
          <div class="contact-msg"> <?php echo $page->content; ?> </div>
          <?php } ?>
          <?php	

		// notification end

		

		$form=$this->beginWidget('CActiveForm', array(

        			'id'=>'villa-form', 

       				 'enableAjaxValidation'=>true,       

       				 )); 

					 

		

		?>
          <?php echo $form->errorSummary(array($model)); ?>
          <div id="contact-form">
            <div class="form-item"> <?php echo $form->textField($model, 'fname',array('class'=>'form-text','placeholder'=>'Full Name*')); ?> </div>
            <div class="form-item"> <?php echo $form->textField($model, 'email',array('class'=>'form-text','placeholder'=>'eMail*')); ?> </div>
            <div class="form-item-coder"> <?php echo $form->textField($model, 'ccode',array('class'=>'form-text-code','placeholder'=>'Code')); ?> <?php echo $form->textField($model, 'phone',array('class'=>'form-text-mobile','placeholder'=>'Contact Number')); ?> </div>
            <div class="form-item-coder">
              <?php

$this->widget('zii.widgets.jui.CJuiDatePicker', array(

    'model' => $model,

    'attribute' => 'from_date',

    'htmlOptions' => array(

      		'class' => 'form-text-code',

			'placeholder' => 'Check In',

			

    ),

));

?>
              <?php

$this->widget('zii.widgets.jui.CJuiDatePicker', array(

    'model' => $model,

    'attribute' => 'to_date',

    'htmlOptions' => array(

      		'class' => 'form-text-code',

			'placeholder' => 'Check out',

			

    ),

));

?>
            </div>
            <div class="form-textarea"> <?php echo $form->textArea($model, 'description',array('row'=>10,'placeholder'=>'Write to us')); ?> <?php echo $form->hiddenField($model,'parent',array('value'=>$prop->id )); ?> </div>
            <label>Type the characters you see in the picture below:</label>
            <?php echo $form->labelEx($model,'verifycode'); ?>
            <?php $this->widget('CCaptcha'); ?>
            <?php echo $form->error($model,'verifycode'); ?>
            <label>The letters are not case-sensitive. <br />
              Do not type spaces between the numbers and letters.</label>
            <div class="form-item"> <?php echo $form->textField($model,'verifycode'); ?> </div>
            <div class="text-right">
              <p> <?php echo $form->hiddenField($model, 'parent',array('value' => $_GET['propid'],'class'=>'form-text','placeholder'=>'Full Name*')); ?>
                <input type="submit" value="Send Enquiry" onClick="_gaq.push(['_trackEvent', 'Enquiry-page-submit-button', 'clicked', 'Enquiry','', 'true'])" class="flatbtn" />
              </p>
            </div>
          </div>
          <?php $this->endWidget(); ?>
        </div>
      </div>
    </div>
    <div style="clear:both;"></div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('page'=>$page, 'meta'=>$meta,'layout_asset'=>$layout_asset)); ?>
</div>
</body>
