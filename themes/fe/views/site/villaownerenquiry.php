<?php

 	if(YII_DEBUG)

    	$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, true);

	else 

		$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('common.front_layouts.default.assets'), false, -1, false);

?>

<body class="inner-page">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="branding" class="site-header" role="banner">
  <div id="sticky_navigation" style="opacity: 0.99; padding-top: 5px; padding-bottom: 5px; min-height: 60px; position: fixed; top: 0px; left: 0px;">
    <header id="header">
      <?php $this->renderPartial('//layouts/headerlogo',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
    </header>
    <div class="menu-item full-width clearfix">
      <?php $this->renderPartial('//layouts/top-menu',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
    </div>
    <div style="clear:both;"></div>
  </div>
</div>
<div class="wrapper">
  <div id="main" class="page-width">
    <h1> <?php echo $meta->h1; ?> </h1>
    <h2> <?php echo $meta->h2; ?> </h2>
    <div class="contact-msg"> <?php echo $page->content; ?> </div>
    <div class="about-contentses margin-auto margin-top">
      <div class="margin-t20 testi-details">
        <?php if($page->h3_desc!='') { ?>
        <ul>
          <li class="margin-b12 full-width clearfix"> <?php echo $page->h3_desc; ?> </li>
        </ul>
        <?php } ?>
        <div class="contact-wrapper">
          <?php if($page->content!='') { ?>
          <?php } ?>
          <?php 

		$form=$this->beginWidget('CActiveForm', array(

        			'id'=>'Villaowners-enquiry-form', 

       				 'enableAjaxValidation'=>true,       

       				 )); 

					 

		

		?>
          <?php echo $form->errorSummary(array($model)); ?>
          <h4><?php echo t('My Personal Info'); ?></h4>
          <div class="contact-form confrom-bg">
            <div class="contact-form-lefts">
              <div class="form-item"> <?php echo $form->textField($model, 'name',array('class'=>'form-text','placeholder'=>'First Name*')); ?> </div>
              <div class="form-item"> <?php echo $form->textField($model, 'email',array('class'=>'form-text','placeholder'=>'E-Mail*')); ?> </div>
              <div class="form-item"> <?php echo $form->textField($model, 'fax',array('class'=>'form-text','placeholder'=>'Fax')); ?> </div>
            </div>
            <div class="about-contents-form-right">
              <div class="form-item"> <?php echo $form->textField($model, 'display_name',array('class'=>'form-text','placeholder'=>'Last Name')); ?> </div>
              <div class="form-item"> <?php echo $form->textField($model, 'mobile',array('class'=>'form-text','placeholder'=>'Phone No')); ?> </div>
              <div class="form-item">
                <div style="width:71%;">
                  <input value="Generate My Access" id="submit_button" class="flatbtn-submit-villa" type="button">
                </div>
              </div>
            </div>
            <div style="clear:both;"></div>
          </div>
          <h4><?php echo t('My Property Info'); ?></h4>
          <div class="contact-form confrom-bg">
            <div class="contact-form-lefts">
              <div class="form-item"> <?php echo $form->textField($pinfo, 'name',array('class'=>'form-text','placeholder'=>'Property Name*')); ?> </div>
              <div class="form-item"> <?php echo $form->textField($pinfo, 'address1',array('class'=>'form-text','placeholder'=>'Address Line 1*')); ?> </div>
              <div class="form-item"> <?php echo $form->textField($pinfo, 'address2',array('class'=>'form-text','placeholder'=>'Address Line 2')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'town', Town::GetAll(false),array('class'=>'form-text','placeholder'=>'Town')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'province', Province::GetAll(false), array('class'=>'form-text','placeholder'=>'Province')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'region', Region::GetAll(false), array('class'=>'form-text','placeholder'=>'Region')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'country', Country::GetAll(false), array('class'=>'form-text','placeholder'=>'Contry')); ?> </div>
              <div class="form-item"> <?php echo $form->textField($pinfo, 'zip',array('class'=>'form-text','placeholder'=>'ZIP*')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'location', Plocation::GetAll(false), array('class'=>'form-text','placeholder'=>'Property Location')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'view', Pview::GetAll(false), array('class'=>'form-text','placeholder'=>'Property View')); ?> </div>
            </div>
            <div class="about-contents-form-right">
              <div class="form-item"> <?php echo $form->textField($pinfo, 'size',array('class'=>'form-text','placeholder'=>'Property Size')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'ptype', Type::GetAll(false), array('class'=>'form-text','placeholder'=>'Property Type')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'bedroom', ConstantDefine::getValue(false), array('class'=>'form-text','placeholder'=>'No of Bed Rooms*')); ?> </div>
              <div class="form-item"> <?php echo $form->textField($pinfo, 'sleep',array('class'=>'form-text','placeholder'=>'No of Sleeps')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'bathroom',ConstantDefine::getValue(false),array('class'=>'form-text','placeholder'=>'No of Bath Rooms*')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'nairport', Town::GetAll(false), array('class'=>'form-text','placeholder'=>'Nearest Airport')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'ntrain', Town::GetAll(false), array('class'=>'form-text','placeholder'=>'Nearest Train Station')); ?> </div>
              <div class="form-item"> <?php echo $form->dropDownList($pinfo, 'ntown', Town::GetAll(false), array('class'=>'form-text','placeholder'=>'Nearest Town')); ?> </div>
              <div class="form-item"> <?php echo $form->textField($pinfo, 'other_sites',array('class'=>'form-text','placeholder'=>'List Sites')); ?></div>
            </div>
            <div style="clear:both;"></div>
          </div>
          <h4><?php echo t('Description About My Property'); ?></h4>
          <div class="contact-form confrom-bg">
            <div class="form-item"> <?php echo $form->textArea($pinfo, 'content1',array('class'=>'form-text','placeholder'=>'Enter Here....')); ?> </div>
            <div style="clear:both;"></div>
          </div>
          <h4><?php echo t('My Temporary Access'); ?></h4>
          <div class="contact-form confrom-bg">
            <div class="contact-form-lefts">
              <div class="form-item"> <?php echo $form->textField($LoginForm, 'username',array('class'=>'form-text','placeholder'=>'E-mail ID*')); ?> </div>
            </div>
            <div class="about-contents-form-right">
              <div class="form-item"> <?php echo $form->textField($LoginForm, 'password',array('class'=>'form-text','placeholder'=>'Password')); ?> </div>
            </div>
            <div style="clear:both;"></div>
          </div>
          <div class="form-item">
            <div class="villa-submit-bu">
              <input value="Submit" id="submit_button" class="flatbtn-submit" type="button">
            </div>
          </div>
          <div style="clear:both;"></div>
        </div>
        <?php $this->endWidget(); ?>
      </div>
    </div>
  </div>
  <div style="clear:both;"></div>
  <?php $this->renderPartial('//layouts/footer',array('page'=>$page, 'meta'=>$meta,'layout_asset'=>$layout_asset)); ?>
</div>
</body>
