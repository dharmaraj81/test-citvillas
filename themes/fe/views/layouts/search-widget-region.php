<?php
if(isset($RegId)) { 
	$SearchWidget->region = $RegId;
	
	 		   $Plist = array(0 => 'Any');
					$ProvinceMenu = Province::model()->findAll (array('condition' => 'status = 1 AND source = "'.$RegId.'"','order'=>'name ASC'));
 					if( isset($ProvinceMenu) && count($ProvinceMenu)>0 ) {
						foreach ($ProvinceMenu as $Pro ) {
							
								$noofprop = Pinfo::model()->findAll(array('condition'=>'province = :PRO AND status = 1', 'params'=>array(':PRO'=>$Pro->id)));
								if( isset($noofprop) && count($noofprop)>0 ) { 
								   $Plist[$Pro->id] = $Pro->name;
             } } } 
	
	
 }
 
if(isset($Plist)) {
?>
<style>
#advanced_search{
	padding:12px 14px;	
}
.option-select{
	width:15%;
}
.option-select-small{
	width:8%;
}
span.customSelectInner{
	width:100%!important;
}
.label-date-field{
	width: 12%;
}
.label-field{
	width:15%;
    padding-right:0px!important;
}
#city-stay label{
	float:left;
	margin-right:10px;
}
/*IE COMPATIBILITY INPUT TEXT*/
#property-search input{
	text-indent:9999999px!important;
}
</style>
<section class="advanced-search">

<div class="fourcol left last">
  <p class="marB0"><?php // echo t('Redefine Your Search:'); ?></p>
  <?php $form=$this->beginWidget('CActiveForm', 
		array(
			'id'=>'advanced_search',
			'enableAjaxValidation'=>true,
			/*'action' => $this->createUrl('search/index'),
			'method' => 'GET'*/
		)); ?>
  <?php echo $form->errorSummary(array($SearchWidget)); ?>
  <?php 
	 		   $sub_stores = array(0 => 'Any');
					$RegionMenu = Region::model()->findAll (array('condition' => 'status = 1','order'=>'name ASC'));
 					if( isset($RegionMenu) && count($RegionMenu)>0 ) {
						foreach ($RegionMenu as $Reg ) {
							$RegSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$Reg->uid)));
						    if( isset($RegSeo) && count($RegSeo)>0 ) {
								$noofprop = Pinfo::model()->findAll(array('condition'=>'region = :REG AND status = 1', 'params'=>array(':REG'=>$Reg->id)));
								if( isset($noofprop) && count($noofprop)>0 ) { 
								   $sub_stores[$Reg->id] = $RegSeo->mainmenu;
             } } } }
	?>
  <div class="left option-select"> <?php echo $form->labelEx($SearchWidget,'region'); ?> <?php echo $form->dropDownList($SearchWidget, 'region', $sub_stores, array('class'=>'search_villa_widget')); ?></div>
  <div class="left option-select"> <?php echo $form->labelEx($SearchWidget,'province'); ?> <?php echo $form->dropDownList($SearchWidget, 'province', $Plist, array('class'=>'search_villa_widget')); ?></div>
  <div class="left option-select-small"> <?php echo $form->labelEx($SearchWidget,'guest'); ?> <?php echo $form->dropDownList($SearchWidget,'guest', array('0'=>'Any', '1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22','23'=>'23','24'=>'24+'), array('options' => array('0'=>array('selected'=>true)),'class'=>'search_villa_widget')); ?> </div>
  <div class="left option-select-small"> <?php echo $form->labelEx($SearchWidget,'bedrooms'); ?> <?php echo $form->dropDownList($SearchWidget,'bedrooms', array('0'=>'Any', '1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12+'), array('options' => array('0'=>array('selected'=>true)),'class'=>'search_villa_widget')); ?> </div>
  <div class="left option-select"> <?php echo $form->labelEx($SearchWidget,'property_type'); ?> <?php echo $form->dropDownList($SearchWidget, 'property_type', array('2'=>'All','0'=>'Saturday-Saturday','1'=>'Flexible'), array('class'=>'search_villa_widget')); ?>  </div>
  
  <div class="left label-date-field"> <?php echo $form->labelEx($SearchWidget,'sdate'); ?>
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
					var date2 = jQuery( "#Searchform_sdate" ).datepicker("getDate");
					date2.setDate(date2.getDate());
		      		jQuery( "#Searchform_edate" ).datepicker( "option", "minDate", date2 );
			  		jQuery( "#Searchform_edate" ).val(""); 
					jQuery("#Searchform_edate").datepicker("show");
               }',
			 ),
				
			));
			?>
  </div>
  
  <div class="left label-date-field"> <?php echo $form->labelEx($SearchWidget,'edate'); ?>
    <?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $SearchWidget,
				'attribute' => 'edate',
				'options'=>array( 'dateFormat' => 'dd-M-yy' ),
				
			));
		?>
  </div>
  
  
  <div class="left label-field"> <?php echo $form->labelEx($SearchWidget,'name'); ?> <?php echo $form->textField($SearchWidget,'name',array('placeholder' => '')); ?> </div>
	
<div class="clear"></div>
<div style="margin:auto; width:72%;">
	<div id="city-stay" class="left red box" style="margin:0px 0px 0px 20px;"> <label for="Searchform_name">City Stays</label>
	<?php echo $form->checkBox($SearchWidget,'citystay',array()); ?>
  </div> 
</div>
<div style="margin:auto; width:50%; margin-right:132px;">  
  <div class="left wi15b" id="property-search">
    <input id="submit" class="btn btn-search" type="submit" value="Search">
  </div>
  
 
  <div style="width:200px!important;" class="left wi15b" id="property-search">
    <input id="btn" class="btn btn-search" type="reset" value="Clear Filter">

  </div>

</div>
  
  <?php echo $form->hiddenField($SearchWidget, 'sort_by', array('value'=>'sort_by_sleep_lowhigh')); ?>
  <div class="clear"></div>
  <?php $this->endWidget(); ?>
</div>

</section>
<?php } ?>

<script>
$(document).ready(function(){
$("#btn").click(function(){
/* Single line Reset function executes on click of Reset Button */
$("#advanced_search")[0].reset();
});});
</script>
<?php

$JsScript = '$(".box").hide();
$("#Searchform_region").on("change", function(){
	var regid =   $("#Searchform_region").val();
	$.ajax({
		type: "GET",
        url: "/beajax/getregionurl",
        data: { regionid:regid },
        }).done(function( data ) {
			var obj = jQuery.parseJSON(data);
			window.location.href = "/"+obj.RegUrl;			
        });
});

$("#Searchform_province").on("change", function(){
	var ProvinceId =   $("#Searchform_province").val();
	
	if(ProvinceId != 0)
	{
        $(".box").not(".red").hide();
        $(".red").show();
    } else {
        $(".box").hide();
    }
});';

Yii::app()->clientScript->registerScript('SearchWidgetJs', $JsScript);

?>