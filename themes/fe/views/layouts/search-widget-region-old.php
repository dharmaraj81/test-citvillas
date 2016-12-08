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
  <div class="left wi15r"> <?php echo $form->labelEx($SearchWidget,'region'); ?> <?php echo $form->dropDownList($SearchWidget, 'region', $sub_stores, array('class'=>'search_villa_widget')); ?></div>
  <div class="left wi15p"> <?php echo $form->labelEx($SearchWidget,'province'); ?> <?php echo $form->dropDownList($SearchWidget, 'province', $Plist, array('class'=>'search_villa_widget')); ?></div>
  <div class="left wi8p"> <?php echo $form->labelEx($SearchWidget,'guest'); ?> <?php echo $form->dropDownList($SearchWidget,'guest', array('0'=>'Any', '1'=>'1 Pax','2'=>'2 Pax','3'=>'3 Pax','4'=>'4 Pax','5'=>'5 Pax','6'=>'6 Pax','7'=>'7 Pax','8'=>'8 Pax','9'=>'9 Pax','10'=>'10 Pax','11'=>'11 Pax','12'=>'12 Pax','13'=>'13 Pax','14'=>'14 Pax','15'=>'15 Pax','16'=>'16 Pax','17'=>'17 Pax','18'=>'18 Pax','19'=>'19 Pax','20'=>'20 Pax','21'=>'21 Pax','22'=>'22 Pax','23'=>'23 Pax','24'=>'24 Pax / Above'), array('options' => array('0'=>array('selected'=>true)),'class'=>'search_villa_widget')); ?> </div>
  <div class="left wi8p"> <?php echo $form->labelEx($SearchWidget,'Bedrooms'); ?><select><option value="0">0</option></select></div>
  
  <div class="left wi15d"> <?php echo $form->labelEx($SearchWidget,'sdate'); ?>
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
  <div class="left wi15d"> <?php echo $form->labelEx($SearchWidget,'edate'); ?>
    <?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $SearchWidget,
				'attribute' => 'edate',
				'options'=>array( 'dateFormat' => 'dd-M-yy' ),
				
			));
		?>
  </div>
  
  <div class="left wi15k"> <?php echo $form->labelEx($SearchWidget,'name'); ?> <?php echo $form->textField($SearchWidget,'name',array('placeholder' => 'Search Region, Province, Town or Villa name')); ?> </div>
	
  <div class="left red box" style="margin:0px 0px 0px 20px;"> <label for="Searchform_name">City Stays</label>
    <input type="checkbox" name="citystay">
  </div>
  
  <div style="clear:both;"></div>
  
  <div style="width:200px!important;" class="left wi15b">
    <input style="width:200px;" id="submit" class="btn btn-search" type="submit" value="Search">
  </div>
  
  
  <div style="width:200px!important;" class="left wi15b">
    <input style="width:200px;" id="reset" class="btn btn-search" type="reset" id="configreset" value="Clear Filter">
  </div>

  
  <?php echo $form->hiddenField($SearchWidget, 'sort_by', array('value'=>'sort_by_sleep_lowhigh')); ?>
  <div class="clear"></div>
  <?php $this->endWidget(); ?>
</div>

</section>
<?php } ?>

<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="1066"){
                $(".box").not(".red").hide();
                $(".red").show();
            }
            else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>
<script type="text/javascript">
$('#Searchform_region').on('change', function(){
	
	var regid =   $("#Searchform_region").val();
	$.ajax({
		type: "GET",
        url: "/beajax/getregionurl",
        data: { regionid:regid },
        }).done(function( data ) {
			var obj = jQuery.parseJSON(data);
			window.location.href = '/'+obj.RegUrl;			
        });
});
</script>