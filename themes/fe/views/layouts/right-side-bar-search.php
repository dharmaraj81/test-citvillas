<div id="sidebar3" class="col span_3">

  <div id="sidebar-inner">

    <aside id="ct_listings-2" class="widget widget_ct_listings left">

      <h4><?php echo t('Quick Search'); ?></h4>

      <br />
      
      <?php if (!isset($SearchWidget)) {
		  
		  $SearchWidget = new Searchform;
					
					$tomo_date = new DateTime('tomorrow');
					$tomo_date->modify('+1 day');
					$SearchWidget->sdate = '';
					$tomo_date->modify('+7 day');
					$SearchWidget->edate = '';
	  }

       $form=$this->beginWidget('CActiveForm', 
		array(
			'id'=>'search-listings',
			'enableAjaxValidation'=>true,
			'action' => Yii::app()->getBaseUrl(true),
			
		)); ?>
        
          <?php echo $form->errorSummary(array($SearchWidget)); ?>
      <div class="left">
        <label for="ct_state"><?php echo t('Province'); ?></label>
        <?php 

			   $Province = Province::model()->findAll(array('condition'=>"lang='2' and addtohome='1' and id!='1016'"));

			   foreach($Province as $val) {

				

			   $sub_stores[$val->id] = $val->name;

				

				

			   $town = Town::model()->findAll(array('condition'=>"source ='$val->id' and id in(1016,1314)"));

				

			   foreach($town as $town_key) {

			   

				  //$sub_stores[$town_key->name] = '--'.$town_key->name;

				  if($town_key->name=='Florence City')

				  {

				  $sub_stores[$town_key->id]='Florence City';

				  }

				   if($town_key->name=='Siena City')

				  {

				  $sub_stores[$town_key->id]='Siena City';

				  }

               } 

             }
			
		echo $form->dropDownList($SearchWidget, 'province', $sub_stores, array('empty' => 'Provinces of Tuscany','class'=>'search_villa_widget'));
				?>
      </div>
      <div class="left">
        <label for="ct_state"><?php echo t('Town'); ?></label>
        <?php echo $form->dropDownList($SearchWidget,'town', Town::GetAll(), array('empty' => 'Any','class'=>'search_villa_widget')); ?> </div>
      <div class="left">
        <label for="ct_state"><?php echo t('Property Type'); ?></label>
        <?php echo $form->dropDownList($SearchWidget,'property_type', Type::GetAll(), array('empty' => 'Any','class'=>'search_villa_widget')); ?> </div>
      <div class="left">
        <label for="ct_state"><?php echo t('Pool Type'); ?></label>
        <?php echo $form->dropDownList($SearchWidget,'pool_type', array(1=>'Shared Pool',2=>'Private Pool'), array('empty' => 'Any','class'=>'search_villa_widget')); ?> </div>
      <div class="left">
        <label for="ct_beds"><?php echo t('Guest Number'); ?></label>
        <?php echo $form->dropDownList($SearchWidget,'guest', range(1,25), array('empty' => 'Any','class'=>'search_villa_widget')); ?> </div>
      
      <div class="left">
         <?php echo $form->labelEx($SearchWidget,'sdate'); ?>
        
        
        
         <?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'model' => $SearchWidget,
				'attribute' => 'sdate',
				'options'=>array(
				 'maxDate'=>'+2Y',
				 'minDate' => '+2d',
                'changeMonth'=>false,
	            'dateFormat'=>'dd-M-yy',
                 'numberOfMonths'=>1,
	            'showButtonPanel'=>true,
	            'closeText'=>'Clear Dates',
				 'onClose' => 'js:function (selectedDate) {
		      		jQuery( "#Searchform_edate" ).datepicker( "option", "minDate", selectedDate );
			  		jQuery( "#Searchform_edate" ).val(""); jQuery("#Searchform_edate").datepicker("show");
               }',
			 ),
				
			));
			?> 
        
        
      </div>
      
      
      <div class="left">
        <?php echo $form->labelEx($SearchWidget,'edate'); ?>
       
         <?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $SearchWidget,
				'attribute' => 'edate',
				'options'=>array( 'dateFormat' => 'dd-M-yy' ),
				
			));
		?>
      </div>
      <div class="left">
        <label for="ct_price_from"><?php echo t('Price From'); ?> (&euro;) <?php echo t('Per Week'); ?> </label>
        <?php echo $form->textField( $SearchWidget, 'low_price'); ?>
        
      </div>
      <div class="left">
        <label for="ct_price_to"><?php echo t('Price To'); ?> (&euro;) <?php echo t('Per Week'); ?></label>
        <?php echo $form->textField($SearchWidget,'high_price'); ?>
        
      </div>
      <div class="left">
        <label for="ct_keyword"><?php echo t('Villa Name'); ?> </label>
        <?php echo $form->textField($SearchWidget,'name'); ?>
      </div>
       <div class="clear"></div>
      <div class="left">
      	<?php echo $form->hiddenField($SearchWidget, 'sort_by', array('value'=>'sorty_by_sleep_lowhigh')); ?>
        <input id="submit" class="btn right" type="submit" value="Search">
      </div>
      <div class="clear"></div>
      <?php $this->endWidget(); ?>

    </aside>

    <div class="clear"></div>

  </div>

</div>

