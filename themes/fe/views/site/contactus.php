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
      <article class="col span_8 first">
        <?php $form=$this->beginWidget('CActiveForm', array(

	'id'=>'contactform',

	

	'enableAjaxValidation'=>false,'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'formular marT20'),

)); ?>

		<?php if (isset($propid)) { ?>
		<h1> <?php echo 'Enquiry : '.Pinfo::GetName($propid); ?> </h1>
        <?php } else { ?>
        <p><strong>Let us Find you the Dream Vacation Rental in Italy</strong></p>
        <p> Please send as much information as you can below including any preferred area if you have one and approximate budget. We will go through our listings to send you suggestions and also reconfirm availability of the properties you have enquired about.</p>
		<p>&nbsp;</p>
	   <?php } ?>
        <div class="post-438 page type-page status-publish hentry col span_11 first">
          <?php if(Yii::app()->user->hasFlash('contactus')): echo Yii::app()->user->getFlash('contactus'); endif; ?>
          <div class="clear"></div>
        </div>
        <div class="twocol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'fname'); ?> <?php echo $form->textField($model,'fname'); ?> <?php echo $form->error($model,'fname'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'email_id'); ?> <?php echo $form->textField($model,'email_id'); ?> <?php echo $form->error($model,'email_id'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'phone_no'); ?><?php echo $form->textField($model,'country_code',array('placeholder'=>'Code','maxlength'=>'6','style'=>'width:20%;')); ?> - <?php echo $form->textField($model,'phone_no',array('style'=>'width:51%;')); ?> <?php echo $form->error($model,'phone_no'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'address'); ?> <?php echo $form->textField($model,'address'); ?> <?php echo $form->error($model,'address'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'town'); ?> <?php echo $form->textField($model,'town'); ?> <?php echo $form->error($model,'town'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'country'); ?> <?php echo $form->dropDownList($model, 'country', Countrylist::GetAll(false), array()); ?> <?php echo $form->error($model,'country'); ?></div>
        </div>
        <div class="twocol left last">
          <div class="input-prepend"><?php echo $form->labelEx($model,'lname'); ?> <?php echo $form->textField($model,'lname'); ?> <?php echo $form->error($model,'lname'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'remail'); ?> <?php echo $form->textField($model,'remail'); ?> <?php echo $form->error($model,'remail'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'phone_no2'); ?><?php echo $form->textField($model,'country_code',array('placeholder'=>'Code','maxlength'=>'6','style'=>'width:20%;')); ?> - <?php echo $form->textField($model,'phone_no2',array('style'=>'width:51%;')); ?> <?php echo $form->error($model,'phone_no2'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'address2'); ?> <?php echo $form->textField($model,'address2'); ?> <?php echo $form->error($model,'address2'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'state'); ?> <?php echo $form->textField($model,'state'); ?> <?php echo $form->error($model,'state'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'zip_code'); ?> <?php echo $form->textField($model,'zip_code'); ?> <?php echo $form->error($model,'zip_code'); ?></div>
        </div>
        <div class="clear"></div>
        <div class="onethirdcol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'adults'); ?> <?php echo $form->dropDownList($model, 'adults', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14'),array('empty'=>'Select','style'=>'width:60%;')); ?> <?php echo $form->error($model,'adults'); ?></div>
        </div>
        <div class="onethirdcol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'children'); ?> <?php echo $form->dropDownList($model, 'children', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14'),array('empty'=>'Select','style'=>'width:60%;')); ?> <?php echo $form->error($model,'children'); ?></div>
        </div>
        <div class="onethirdcol left last">
          <div class="input-prepend"><?php echo $form->labelEx($model,'infants'); ?> <?php echo $form->dropDownList($model, 'infants', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14'),array('empty'=>'Select','style'=>'width:60%;')); ?> <?php echo $form->error($model,'infants'); ?></div>
        </div>
        <div class="clear"></div>
        <div class="twocol left">
          <div class="input-prepend"> <?php echo $form->labelEx($model,'arrival_date'); ?>
            <?php

						$this->widget('zii.widgets.jui.CJuiDatePicker', array(

    					'model' => $model,

    					'attribute' => 'arrival_date',

    					'htmlOptions' => array(

      						'class' => 'form-text-code',

							'placeholder' => 'Arrival Date',

    						),

						'options' => array(

 						   'minDate' => 'today', // to allow selection of dates upto today only

						),

						));

					  ?>
            <?php echo $form->error($model,'arrival_date'); ?> </div>
        </div>
        <div class="twocol left last">
          <div class="input-prepend"> <?php echo $form->labelEx($model,'depature_date'); ?>
            <?php

						$this->widget('zii.widgets.jui.CJuiDatePicker', array(

    					'model' => $model,

    					'attribute' => 'depature_date',

    					'htmlOptions' => array(

      						'class' => 'form-text-code',

							'placeholder' => 'Depature Date',

    						),

						'options' => array(

 						   'minDate' => 'today', // to allow selection of dates upto today only

						),

						));

					  ?>
            <?php echo $form->error($model,'depature_date'); ?> </div>
        </div>
        <div class="clear"></div>
        <div class="fourcol left last">
          <h4 class="border-bottom marB18"><?php echo t('Other areas of interest'); ?></h4>
          <table>
            <?php 
			$data=array('Cooking Courses'=>'Cooking Courses','Hot Air Ballooning'=>'Hot Air Ballooning','Weddings in Tuscany'=>'Weddings','Car or Van Hire with Driver'=>'Car or Van Hire with Driver','Customised Tuscany Tour'=>'Customised Tour');
			echo $form->checkBoxList($model,'interest',$data, array('template'=>'<tr><td style="width:5%">{input}</td><td>{label}</td></tr>','separator'=>''));?>
          </table>
          <div class="input-prepend"><?php echo $form->label($model,'other_details'); ?> <?php echo $form->textArea($model,'other_details'); ?> <?php echo $form->error($model,'other_details'); ?></div>
          <div class="center">
            <input id="submit" class="symple-button-inner" type="submit" value="Send My Interest">
          </div>
        </div>
        <?php $this->endWidget(); ?>
        <div class="clear"></div>
      </article>
      <div id="sidebar" class="col span_4 ">
        <div id="sidebar-inner" class="contact-details">
          <h5>Contact Details</h5>
          <ul>
            <li><i class="icon-home left"></i>
              <p class="marB0">L3, 309 George Street <br>
                Sydney, NSW 2000, Australia</p>
            </li>
            <li><i class="icon-phone left"></i>
              <p class="marB0">+61 292671255</p>
            </li>
            <li><i class="icon-skype left"></i>
              <p class="marB0">traveltuscany</p>
            </li>
            <li><i class="icon-envelope left"></i>
              <p class="marB0"><a href="mailto:citvillas@cit.com.au">citvillas@cit.com.au</a></p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
