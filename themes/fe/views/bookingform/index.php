<style type="text/css">
.ui-dropdownchecklist-item{text-align:left;}
.ui-dropdownchecklist-dropcontainer{height:250px; overflow:auto;}
.filter_display{text-align:right; font-weight:bold;}
.filter_display span{cursor:pointer; color:#0066FF;}
.filter_display span:hover{text-decoration:underline;}
</style>




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
    <div class="about-contentses margin-auto margin-top">
      <div class="margin-t20 testi-details">
        <?php if($page->h3_desc!='') { ?>
        <ul>
          <li class="margin-b12 full-width clearfix"> <?php echo $page->h3_desc; ?> </li>
        </ul>
        <?php } ?>
        <div class="contact-wrapper">
          <?php if($page->content!='') { ?>
          <div class="contact-msg"> <?php echo $page->content; ?> </div>
          <?php } ?>
          <?php	
		 $form=$this->beginWidget('CActiveForm', array('id'=>'fbooking-form', 'enableAjaxValidation'=>true)); 
		
		?>
          <?php echo $form->errorSummary(array($People, $Booking)); ?>
          <h4><?php echo t('Address Info'); ?></h4>
          <div class="contact-form">
          <div class="contact-form-lefts">
            <div class="form-item"> <?php echo $form->textField($People, 'name',array('class'=>'form-text','placeholder'=>'Full Name*')); ?> </div>
            
             <div class="form-item"> <?php echo $form->textField($People, 'email', array('class'=>'form-text','placeholder'=>'Email ID*')); ?> </div>
           
            <div class="form-item"> <?php echo $form->textField($People, 'address1',array('class'=>'form-text','placeholder'=>'Address Line 1*')); ?> </div>
            
            <div class="form-item"> <?php echo $form->textField($People, 'town',array('class'=>'form-text','placeholder'=>'Town')); ?> </div>
            
             <div class="form-item"> <?php echo $form->dropDownList($People, 'country', Countrylist::GetAll(false), array('class'=>'form-text','placeholder'=>'Country Name*')); ?> </div>
             
             <div class="form-item"> <?php echo $form->textField($People, 'mobile', array('class'=>'form-text','placeholder'=>'Mobile Number')); ?> </div>
             
            </div>
            <div class="about-contents-form-right">
            
            <div class="form-item"> <?php echo $form->textField($People, 'display_name',array('class'=>'form-text','placeholder'=>'Display Name*')); ?> </div>
            
            <div class="form-item"> <?php echo $form->textField($People, 'tele', array('class'=>'form-text','placeholder'=>'Contact Number*')); ?> </div>
            
             <div class="form-item"> <?php echo $form->textField($People, 'address2',array('class'=>'form-text','placeholder'=>'Address Line 2')); ?> </div>
             
             
            <div class="form-item"> <?php echo $form->textField($People, 'province',array('class'=>'form-text','placeholder'=>'Province')); ?> </div>
            
            
            <div class="form-item"> <?php echo $form->textField($People, 'zip', array('class'=>'form-text','placeholder'=>'ZIP Code*')); ?> </div>
           
          </div>
          <div style="clear:both;"></div>
          </div>
          <div style="clear:both;"></div>
          <div style="margin-top:40px;"></div>
          <h4><?php echo t('Booking'); ?></h4>
          <div class="contact-form">
          <div class="contact-form-lefts">
            <div class="form-item">
              <?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'htmlOptions'=>array(
				'class'=>'form-text','placeholder'=>'From Date*'),
    			'model' => $Booking ,
    			'attribute' => 'fdate',
				'options'=>array(
				 'maxDate'=>'+2Y',
                'changeMonth'=>false,
	            'dateFormat'=>'dd-mm-yy',
                 'numberOfMonths'=>1,
	            'showButtonPanel'=>true,
	            'closeText'=>'Clear Dates',
				 'onClose' => 'js:function (selectedDate) {
		      jQuery( "#Booking_tdate" ).datepicker( "option", "minDate", selectedDate );
		if(jQuery("#Booking_tdate").val()=="Departure Date" || jQuery("#Booking_tdate").val()==""){ jQuery("#Booking_tdate").datepicker("show");var arrival=jQuery("#Booking_fdate").val(); jQuery( "#Booking_tdate" ).val(arrival); }
		if (jQuery(window.event.srcElement).hasClass("ui-datepicker-close")){ jQuery("#Booking_fdate").val(""); jQuery("#Booking_tdate").val(""); }
		clear_amount();jQuery( "#Booking_tdate" ).val("");jQuery("#Booking_tdate").datepicker("show");
               }',
			 ),
				
			));
			?>
            </div>
            
            
            <div class="form-item"> <?php echo $form->dropDownList($Booking,'prop_id',array(''=>'None'),array(
					
					 'class'=>'form-text',
					 'placeholder'=>'Property Name*',
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadpropinfo',
							'data'=>array('prop_id'=>'js:this.value','fdate'=> 'js:jQuery("#Booking_fdate").val()', 'tdate'=> 'js:jQuery("#Booking_tdate").val()' ),
							
							'success' => 'function(data) { 
								$("#Booking_peoples").html(data.dropDownPeople);
								$("#Booking_adults").html(data.dropDownAdult);
								$("#Booking_children").html(data.dropDownChild); 
								$("#Booking_infants").html(data.dropDownInfant);
								
								
								
							}',  
                        )
	 )); ?> </div>
     
            <div class="form-item"> <?php echo $form->dropDownList($Booking,'peoples',array(),array(
			
						'class'=>'form-text',
						'placeholder'=>'Total Peoples*',
	 				 	'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadpriceinfo',
							'data'=>array('people'=>'js:this.value','fdate'=> 'js:jQuery("#Booking_fdate").val()', 'tdate'=> 'js:jQuery("#Booking_tdate").val()', 'prop_id'=> 'js:jQuery("#Booking_prop_id").val()', 'bweek'=> 'js:jQuery("#Invoice_bweek").val()', 'bnight'=> 'js:jQuery("#Invoice_bnight").val()' ),
							'success' => 'function(data) { 
								$("#Booking_actual_price").val(data.textActualprice); 
								
							}',  
                        )
	 )); ?> </div>
     <div class="form-item"> <?php echo $form->dropDownList($Booking,'adults',range(1,10),array('class'=>'form-text','placeholder'=>'Adults')); ?> </div>
     </div>
            <div class="about-contents-form-right">
            <div class="form-item">
             <?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'htmlOptions'=>array('class'=>'form-text','placeholder'=>'To Date*'),
    			'model' => $Booking,
    			'attribute' => 'tdate',
				'options'=>array(
				 'minDate'=>1, 
	             'maxDate'=>'+2Y',
                 'changeMonth'=>false,
				 'changeYear' => false,
                 'numberOfMonths'=>1,
	            'dateFormat'=>'dd-mm-yy',
	            'showButtonPanel'=>true,
	            'closeText'=>'Clear Dates',
                'onClose' => 'js:function (selectedDate) {
		       jQuery( "#Booking_fdate" ).datepicker( "option", "maxDate", selectedDate );
		if(jQuery("#Booking_fdate").val()=="Arrival date" || jQuery("#Booking_fdate").val()==""){ jQuery("#Booking_fdate").datepicker("show"); jQuery( "#Booking_fdate" ).val(); }
		if (jQuery(window.event.srcElement).hasClass("ui-datepicker-close")){ jQuery("#Booking_fdate").val("");  }
              clear_amount();
			   }',
			    'onSelect'=> 'js: function(dateText, inst) {'.
                               CHtml::ajax(array(
							   'beforeSend' => 'function() {   
                                         image_shown();}',         
							  'type'=>'POST','url'=>Yii::app()->request->baseUrl.'/bookingform/availpropdetails',
							 'data'=>array('fdate'=>'js:this.value','tdate'=>'js:Booking_fdate.value',$csrf_token_name => $csrf_token),
				              'update'=>'#Booking_prop_id',
							   'complete' =>'function() {
									    image_hide();
                                        }',
					          )

                                ).
                '}',),
				));
			?>
            
          
            </div>
            
            <div class="form-item"> <?php echo $form->dropDownList($Booking,'children',range(1,10),array('class'=>'form-text','placeholder'=>'Children')); ?></div>
            <div class="form-item"> <?php echo $form->dropDownList($Booking,'infants',range(1,10),array('class'=>'form-text','placeholder'=>'Infants')); ?></div>
            <div class="form-item"><div style="width:71%;"><input value="Book Now" id="submit_button" class="flatbtn-submit" type="button"></div></div>
          </div>
          <?php $this->endWidget(); ?>
        </div>
      </div>
      </div>
      </div>
      <div style="clear:both;"></div>
      <div style="margin-top:40px;"></div>
    <?php $this->renderPartial('//layouts/other-activity',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('page'=>$page, 'meta'=>$meta,'layout_asset'=>$layout_asset)); ?>
</div>
</body>
