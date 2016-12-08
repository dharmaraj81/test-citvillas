
  <aside id="ct_listingscontact-2" class="widget widget_ct_listingscontact left">
    <h5><?php echo t('Quick Request Form'); ?></h5>
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'listingscontact',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype' => 'multipart/form-data' ),
	)); 
   ?>
    <?php if(Yii::app()->user->hasFlash('contactus')): echo Yii::app()->user->getFlash('contactus'); endif; ?>
    <?php echo $form->errorSummary(array($qenquiry)); ?>
    <fieldset>
      <?php echo $form->textField($qenquiry,'fname', array('placeholder'=>'First Name *')); ?> 
	  <?php echo $form->textField($qenquiry,'lname', array('placeholder'=>'Last Name *')); ?> 
	  <?php echo $form->textField($qenquiry,'email_id', array('placeholder'=>'Email*')); ?>
      <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    					'model' => $qenquiry,
    					'attribute' => 'arrival_date',
    					'htmlOptions' => array(
      						'class' => 'form-text-code',
							'placeholder' => 'Arrival Date*',
    						),
						'options' => array(
 						   'minDate' => 'today', // to allow selection of dates upto today only
						   'dateFormat' => 'dd/mm/yy',
						),
						)); ?>
      <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    					'model' => $qenquiry,
    					'attribute' => 'depature_date',
						'options' => array(
 						   'minDate' => 'today', // to allow selection of dates upto today only
						   'dateFormat' => 'dd/mm/yy',
						),
    					'htmlOptions' => array(
      						'class' => 'form-text-code',
							'placeholder' => 'Departure Date*',
    						),
						)); ?>
      <?php echo $form->textField($qenquiry,'no_of_guest', array('placeholder'=>'No. of Guests*')); ?> 
	  <?php echo $form->textArea($qenquiry,'other_details',array('placeholder'=>'Please add your questions here')); ?>
      
       <div style="text-align:left; visibility:hidden; min-height:2px !important; height:2px !important">
       <?php echo $form->textField($qenquiry,'re_email',array('class'=>'low_height')); ?> 
       </div> 
      
      <?php echo $form->hiddenField($qenquiry,'parent',array('value'=> $page->id )); ?>
      <input type="checkbox" name="signup" value="Sign up for our Tuscan News" class="quick-input" />
      <span class="quick-signup"><?php echo t('WEEKLY recipes, ideas & Italian Tales directly to your inbox'); ?></span>
      <div class="center">
        <input type="submit" name="Submit" value="Submit" id="submit" class="btn">
      </div>
    </fieldset>
    <?php $this->endWidget(); ?>
  </aside>

