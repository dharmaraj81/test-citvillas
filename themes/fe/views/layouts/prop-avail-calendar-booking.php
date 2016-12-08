<?php
Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/bootstrap-year-calendar.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCssFile($layout_asset.'/css/bootstrap-year-calendar.css');

$gcal = Availcalendar::model()->findAll(array('condition'=>'prop_id = :PID','params'=>array(':PID'=>$page->id)));
		$items = array();
		$items[] = array(
        			'id'=>'0001',
					'name'=>'Booked',
        			'startDate'=>date('D M j Y G:i:s',1451611929), 
					'endDate'=>date('D M j Y G:i:s',time()),
					'color' => '#b5975b'
    			);
if( isset($gcal) && count($gcal)>0 ) {
			foreach ($gcal as $event) {	
			$items[] = array(
        			'id'=>$event->id,
					'name'=>$event->description,
        			'startDate'=>date('D M j Y G:i:s',$event->fdate), 
					'endDate'=>date('D M j Y G:i:s', $event->tdate),
					'color' => '#b5975b'
    			);
		} }
		
$criteria=new CDbCriteria;
$criteria->select='max(syncon) AS LastUpdate';
$criteria->condition = 'prop_id = '.$page->id;
$row = Propcal::model()->find($criteria);
$Lupdate = $row['LastUpdate'];		
/*		
$PropCal = Propcal::model()->findAll(array(
	'condition'=>'prop_id = :PID', 
	'params'=>array(':PID'=>$page->id),
	'order'=>'syncon ASC'
)); */

?>



<div class='legend'>
<div class="leg-booked"></div> <span class="lable-booked"> Booked </span>
<div class="leg-available"></div> <span class="lable-available"> Available </span>
</div>	


<div class="calendar-booking"> </div>
<?php if( isset($Lupdate) && ( $Lupdate != 0 ) ) { ?>
<h6 style="text-align:right;"> Last Updated on : <?php echo date('d-m-Y',$Lupdate); ?> </h6>
<?php } ?>
<script>
	var currentYear = new Date().getFullYear();
	var data = <?php echo json_encode($items, JSON_PRETTY_PRINT); ?>;
	
   for (var i in data) { 
   		data[i].startDate = new Date(data[i].startDate);
		data[i].endDate = new Date(data[i].endDate);
   }
	
	 $('.calendar-booking').calendar({
		  enableContextMenu: false,
		  minDate: new Date(currentYear-1, 12, 1),
		  alwaysHalfDay: true,
		  allowOverlap: false,
		  style:'background',
		  dataSource: data
		  });
    </script> 
