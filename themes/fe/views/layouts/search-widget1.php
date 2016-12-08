<style type="text/css">
.ui-dropdownchecklist-item{text-align:left;}
.ui-dropdownchecklist-dropcontainer{height:250px; overflow:auto;}
.filter_display{text-align:right; font-weight:bold;}
.filter_display span{cursor:pointer; color:#0066FF;}
.filter_display span:hover{text-decoration:underline;}
</style>
<?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294b3797e8f');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); } ?>
<?php

$str_js = "$('input#submit_button').click( function() {
	
			var URL,URL1=[],i=0 ;
			
			URL = '".Yii::app()->createUrl('search')."';
			
			var selected = new Array();
			
			jQuery('.prop_type_chkvalue:checked').each(function() {selected.push(jQuery(this).val());});
			
			if( jQuery('#Quicksearch_name').val() != '' ) { URL1[i] = 'name='+ jQuery('#Quicksearch_name').val(); i++;  }
			if( jQuery('#Quicksearch_province').val() != '' ) { URL1[i] = 'province='+ jQuery('#Quicksearch_province').val(); i++;  }
			if( $('#Quicksearch_sdate').val() != '' ) { URL1[i] = 'sdate='+$('#Quicksearch_sdate').val(); i++;  }
			if( $('#Quicksearch_edate').val() != '' ) { URL1[i] = 'edate='+$('#Quicksearch_edate').val();  i++; }
			if( $('#Quicksearch_guest').val() != '' ) { URL1[i] = 'guest='+$('#Quicksearch_guest').val();  i++; }
			if( $('#slider_range').val() != '' ) { URL1[i] = 'range='+$('#slider_range').val(); i++;  }
			if( $('#slider_range_end').val() != '' ) { URL1[i] = 'range_end='+$('#slider_range_end').val();  i++; }
			if( selected != '' ) { URL1[i] = 'type='+selected; i++; }
			if( $('#Quicksearch_prop_view').val() != '' ) { URL1[i] = 'prop_view='+$('#Quicksearch_prop_view').val(); i++;  }
			if(( $('#Quicksearch_amenities').val() != null )&&($('#Quicksearch_amenities').val() != '' )) { URL1[i] = 'amenities='+$('#Quicksearch_amenities').val(); i++;  }
			if( $('#Quicksearch_sort_by').val() != '' ) { URL1[i] = 'sort_by='+$('#Quicksearch_sort_by').val(); i++;  }
			if( $('#Quicksearch_sort').val() != '' ) { URL1[i] = 'sort='+$('#Quicksearch_sort').val(); i++;  }
			var URL2 = URL1.join('&');
			window.location.replace( URL+'?'+URL2 );
			
    });";

Yii::app()->clientScript->registerScript('form_submit', $str_js);

?>

<aside>
  <h2><?php echo t('Quick search'); ?></h2>
  <?php
		$menu1 = Page::GetPageNameByGuidWithLang('54294b3797e8f');		
		if($menu1!=null) { $seo = Propseo::GetPageNameByUid($menu1->uid); } ?>
  <div id="searchfield">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'search-form', 
		'action'=>Yii::app()->createUrl('search'),
        'enableAjaxValidation'=>false,    
		'method'=>'GET'   
        )); 
		
		$q = new Quicksearch;
		
?>
    <p> <?php echo $form->textField($q, 'name', array('class' => 'biginput', 'placeholder'=>t('Search Keywords'))); ?> </p>
    <p> <?php //echo $form->dropDownList($q, 'province', Province::GetAllPr(), array('class' => 'bigselect')); ?>
    <?php 

$province = Province::GetAllPr();
foreach($province as $key=>$val) {

	$sub_stores[$key] = $val;
    $town = Town::model()->findAll(array('condition'=>"source ='$key' and id in(1016,1314)"));
   foreach($town as $town_key) {
  	$sub_stores[$town_key->id] = '--'.$town_key->name;
    }
}
 echo $form->dropDownList($q, 'province', $sub_stores, array('class' => 'bigselect')); 


?>

 
 </p>
 
    <p>
      <?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $q,
    'attribute' => 'sdate',
	'options' => array(
		'showAnim' => 'fold',
		'dateFormat'=>'dd-M-yy',
	),
    'htmlOptions' => array(
      		'class' => 'biginput',
			'placeholder' => 'Check In',
			'style' => 'display: none'
    ),
));
?>
      <?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model' => $q,
    'attribute' => 'edate',
	'options' => array(
		'showAnim' => 'fold',
		'dateFormat'=>'dd-M-yy',
	),
    'htmlOptions' => array(
      		'class' => 'biginput',
			'placeholder' => 'Check out',
			'style' => 'display: none'
    ),
));
?>
    </p> 
    <p>
      <?php $SleepMax = Yii::app()->db->createCommand("SELECT MAX(sleep) FROM tt_pinfo")->queryScalar();
		
		$data=array(''=>t("None"));
		$data1 = array(''=>t('Guest'));  
		  
		  for($i=0; $i<=$SleepMax; $i++) {
			  
			  $data1[] = $i.' Guest';
			  
		  }
		  unset($data1[0]);
	  ?>
      <?php echo $form->dropDownList($q, 'guest', $data1, array('class' => 'bigselect')); ?> </p>
    <h2> Price Range </h2>
    <p>
      <input type="text" id="amount-range" class = 'biginput' value="Not Set" readonly="readonly" />
    </p>
    <p>
      <?php
$this->widget('zii.widgets.jui.CJuiSliderInput', array(
    'name'=>'slider_range',
    'model'=>$q,
    'attribute'=>'low_price',
    'maxAttribute'=>'high_price',
    'event'=>'change',
    'options'=>array(  
        'min'=>200, //minimum value for slider input
        'max'=>25000, // maximum value for slider input
		'range'=>true,
		//'values'=>500,2000,// default selection
        // on slider change event 
        'slide'=>'js:function(event,ui){$("#amount-range").val(ui.values[0]+\' Euro \'+\'- \'+ui.values[1]+\' Euro \');}',
    ),
));
?>
    </p>
    <div class="filter_display"><span class="filter_more">MORE SEARCH OPTIONS</span><span class="filter_less" style="display:none;">Less</span></div>
    <div class="hide_filter">
    <p></p>
    <h2> Property Type </h2>
    <?php 
	$prop_type =CHtml::listData(Type::model()->findAll(array('condition'=>"status=1")), 'id', 'name');
    echo "<table width='80%' style='margin-top:-250px'>";
	echo $form->checkBoxList($q,'prop_type',$prop_type, array(
    'template'=>'<tr><td style="width:15%">{input}</td><td style="text-align:left">{label}</td></tr>','class'=>'prop_type_chkvalue'));
	echo "</table>";?>
     
<?php echo $form->hiddenField($q,'prop_view',array('value'=>'')); ?> <?php echo $form->hiddenField($q,'sort_by',array('value'=>'pax')); ?> <?php echo $form->hiddenField($q,'sort',array('value'=>'ASC')); ?> 
     <h2> Amenities </h2>
    	<?php
		 $massageparts= CHtml::listData(Amenities::model()->findAll(array('condition'=>"status=1")), 'id', 'name');
		echo $form->dropDownList($q,'amenities',$massageparts,array( 'multiple'=>"multiple"));
		?>
        </div>
    <input type="button" value="Search" id="submit_button" class="flatbtn"/>
    <?php $this->endWidget(); ?>
  </div>
 
</aside>
<script type="text/javascript" src="ui.dropdownchecklist-1.4-min.js"></script>
<script type="text/javascript">
$("#Quicksearch_amenities").dropdownchecklist();
jQuery('.filter_more').click(function(){ jQuery(this).hide(); jQuery('.hide_filter').show(); jQuery('.filter_less').show();  });
jQuery('.filter_less').click(function(){ jQuery(this).hide(); jQuery('.hide_filter').hide(); jQuery('.filter_more').show(); });
jQuery('.hide_filter').hide();
</script>