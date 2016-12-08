<section class="advanced-search">

  <div class="container">
  <h1 class="find-perfect"><?php echo t('Find The Perfect Italian Villa For Your Vacation or Holiday'); ?></h1>
    <div class="threecol left">
      
      <p class="marB0"><?php echo t('Experience the beauty, culture and passion of Italy. Find your own Italian villa for your holiday:'); ?></p>
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
								   $sub_stores[$Reg->id] = $Reg->name;
             } } } }
	?>
      <div class="left wi24p"> <?php echo $form->labelEx($SearchWidget,'region'); ?> <?php echo $form->dropDownList($SearchWidget, 'region', $sub_stores, array('class'=>'search_villa_widget')); ?></div>
      <div class="left wi24p"> <?php echo $form->labelEx($SearchWidget,'guest'); ?> <?php echo $form->dropDownList($SearchWidget,'guest', array('0'=>'Any', '1'=>'1 Pax','2'=>'2 Pax','3'=>'3 Pax','4'=>'4 Pax','5'=>'5 Pax','6'=>'6 Pax','7'=>'7 Pax','8'=>'8 Pax','9'=>'9 Pax','10'=>'10 Pax','11'=>'11 Pax','12'=>'12 Pax','13'=>'13 Pax','14'=>'14 Pax','15'=>'15 Pax','16'=>'16 Pax','17'=>'17 Pax','18'=>'18 Pax','19'=>'19 Pax','20'=>'20 Pax','21'=>'21 Pax','22'=>'22 Pax','23'=>'23 Pax','24'=>'24 Pax / Above'), array('options' => array('0'=>array('selected'=>true)),'class'=>'search_villa_widget')); ?> </div>
      
      <div class="left wi24p"> <?php echo $form->labelEx($SearchWidget,'sdate'); ?>
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
      
      <div class="left wi24p"> <?php echo $form->labelEx($SearchWidget,'edate'); ?>
        <?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $SearchWidget,
				'attribute' => 'edate',
				'options'=>array( 'dateFormat' => 'dd-M-yy' ),
				
			));
		?>
      </div> 
      <div class="clear"></div>
      
      
      <div class="left wi50p"> <?php echo $form->labelEx($SearchWidget,'name'); ?> <?php echo $form->textField($SearchWidget,'name',array('placeholder' => 'Search Region, Province, Town or Villa name','class'=>'keyword')); ?> </div>
      <div class="left"> <?php echo $form->hiddenField($SearchWidget, 'sort_by', array('value'=>'sort_by_sleep_lowhigh')); ?>
        <input id="submit" class="btn right btn-search" type="submit" value="Search">
        
      </div> 
      <div class="clear"></div>
      <?php $this->endWidget(); ?>
    </div>
    <div class="singlecol left last map">
    
     <img src="http://<?php echo AWS_S3_BUCKET; ?>.s3.amazonaws.com/site-images/italy-map.jpg" alt="map" border="0" usemap="#Map"/>
    
<map name="Map" id="Map">
    <area alt="Sardinia" title="Sardinia" href="/italian-sardinia-vacation-villas-rentals" shape="poly" coords="51,215,48,219,43,220,39,215,39,206,42,199,41,188,38,183,34,176,36,171,39,170,48,168,55,164,58,162,63,164,64,171,66,175,66,182,64,187,63,198,64,207,62,217" />
    <area alt="Sicily" title="Sicily" href="/italian-sicily-vacation-villas-rentals" shape="poly" coords="125,243,121,248,122,253,129,258,136,262,141,266,151,270,156,270,163,276,170,277,176,275,179,267,176,258,178,253,183,248,184,244,184,238" />
    <area alt="Calabria" title="Calabria(Sorry but for now we don't offer any properties in this area of Italy)" href="#" shape="poly" coords="194,225,189,230,186,238,186,242,191,244,197,237,206,222,213,215,209,209,204,204,200,198,198,194,186,196" />
    <area alt="Puglia" title="Puglia" href="/italian-puglia-vacation-villas-rentals" shape="poly" coords="227,185,232,189,236,191,238,187,233,179,224,175,204,163,192,159,186,153,188,146,183,146,173,146,172,152,171,158,175,161" />
    <area alt="Basilicata" title="Basilicata(Sorry but for now we don't offer any properties in this area of Italy)" href="#" shape="poly" coords="202,189,204,181,201,173,194,172,188,168,183,167,178,171,180,178,184,183,187,191,195,193" />
    <area alt="Amalfi Coast" title="Amalfi Coast" href="/italian-amalfi-coast-vacation-villas-rentals" shape="poly" coords="166,174,159,175,158,171,153,171,148,166,148,160,152,156,160,156,168,156,179,166,177,175,182,183,184,189,180,192,174,187,171,185" />
    <area alt="Molise" title="Molise(Sorry but for now we don't offer any properties in this area of Italy)" href="#" shape="poly" coords="159,148,163,141,168,139,170,143,170,151,162,155,154,155,150,156,151,149,155,147" />
    <area alt="Abruzzo" title="Abruzzo(Sorry but for now we don't offer any properties in this area of Italy)" href="#" shape="poly" coords="152,146,159,143,152,128,149,123,144,121,137,125,136,136,134,141,145,144" />
    <area alt="Lazio" title="Lazio" href="/italian-lazio-vacation-villas-rentals" shape="poly" coords="132,136,132,129,128,130,124,133,118,131,113,127,108,127,103,132,107,137,115,144,121,151,123,153,128,157,135,160,141,160,145,161,148,155,145,150" />
    <area alt="Marche" title="Marche(Sorry but for now we don't offer any properties in this area of Italy)" href="#" shape="poly" coords="136,121,145,116,141,105,132,98,125,94,120,95,116,99" />
    <area alt="Umbria" title="Umbria" href="/italian-umbria-vacation-villas-rentals" shape="poly" coords="128,117,124,109,116,103,114,112,111,119,119,125,123,131,131,124" />
    <area alt="Tuscany" title="Tuscany" href="/italian-tuscany-vacation-villas-rentals" shape="poly" coords="84,105,77,92,72,81,95,89,102,90,107,93,112,100,110,112,109,122,104,130,96,126,88,116,84,113" />
    <area alt="Emilia-Romagna" title="Emilia-Romagna(Sorry but for now we don't offer any properties in this area of Italy)" href="#" shape="poly" coords="100,85,82,81,73,78,65,74,62,66,68,62,76,62,91,66,100,66,110,67,118,69,119,78,120,90,117,94,111,92" />
    <area alt="Friuli-Venezia Giulia" title="Friuli-Venezia Giulia" href="#" shape="poly" coords="140,44,136,37,136,30,138,25,131,25,125,27,120,31,121,36,122,39,132,41,132,43" />
    <area alt="Veneto" title="Veneto" href="/italian-veneto-vacation-villas-rentals" shape="poly" coords="113,54,117,47,125,46,126,43,120,41,117,34,119,26,120,23,113,25,112,30,112,36,108,40,104,42,98,45,90,48,90,54,98,59,105,62,110,62,116,63" />
    <area alt="Trentino-Alto Adige" title="Trentino-Alto Adige(Sorry but for now we don't offer any properties in this area of Italy)" href="#" shape="poly" coords="98,41,105,36,110,30,113,21,114,15,111,15,104,15,94,19,88,20,86,28,86,33,86,37,91,41" />
    <area alt="Lombardy" title="Lombardy(Sorry but for now we don't offer any properties in this area of Italy)" href="#" shape="poly" coords="76,30,68,30,64,32,60,36,59,41,54,46,55,55,54,59,61,63,69,60,82,62,89,64,92,63,86,45,84,35,82,26" />
    <area alt="Liguria" title="Liguria" href="/italian-liguria-vacation-villas-rentals" shape="poly" coords="48,57,51,50,48,44,49,41,50,35,47,28,44,31,38,37,39,45,32,49,25,53,20,57,17,61,21,69,20,78,27,81,32,85,36,89,42,78,49,74,55,72,57,67" />
    <area alt="Aosta Valley" title="Aosta Valley(Sorry but for now we don't offer any properties in this area of Italy)" href="#" shape="poly" coords="27,39,20,40,21,43,25,47,33,47,35,45,36,40,32,38" />
</map>
  </div>
</section>
