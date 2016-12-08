
<?php

$php_array = array();

$PrCal = Pinfo::model()->findAll(array('select'=>'id','condition'=>'status = 1'));
if(isset($PrCal) && count($PrCal)>0 ) {
	foreach ($PrCal as $p) {
		$php_array[] = $p->id;		
	}
}


$Sync = "
var PropCalIds = [". implode(',', $php_array)."];
var multipledeleteUrl = 'sync';
$(document).ready(function(){
	$.each(PropCalIds , function(i, val) { 
	$.ajax({
        type: 'GET',
        url: multipledeleteUrl,
        data: { id : PropCalIds [i] },
		success: function(){ console.log('success'); },
        error: function(){ console.log('failure'); }
    });
  });
  
  console.log('Finished'); 
})";

Yii::app()->clientScript->registerScript('Sync',$Sync);
?>