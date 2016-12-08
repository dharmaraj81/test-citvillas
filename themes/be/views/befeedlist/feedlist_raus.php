<?php 
if ($fpartner == 12 ) {
	
  $hl_url = 'https://agentapi.holidaylettings.co.uk/service_avail.aspx';
	
  $Pinfos = Pinfo::model()->findAll(array('condition'=>'status = 1 AND mstatus = 1'));
  
  if($Pinfos) { 
  
    foreach ($Pinfos as $Pinfo) {
		
	$con=Yii::app()->db;
	$con->setActive(false);
	$con->setActive(true);
  
  	$Tref = Thirdpartyref::model()->find(array(
			'condition'=>'prop_id = :PID AND feed_id = 12',
			'params'=>array(':PID'=>$Pinfo->id)
	));
	
	
   if($Tref) { 
   
    $Avails = Booking::model()->findAll(array( 'condition'=>'prop_id = :PID AND fdate >= :FDATE', 'params'=>array(':PID'=>$Pinfo->id, ':FDATE'=>time() ) ));
   
   //mktime('2013-08-01');
   
   if($Avails) {
	   
	   echo $Pinfo->tt_name.'('.$Pinfo->id.').............<br>';
	   
	   foreach ($Avails as $avail ) {
		   
		   $xml_RAUS = Yii::app()->curl->get($hl_url, array(
		   
		   'act'=>'update',
		   'owner_id'=>'188433',
		   'secret'=>'FOMBCTIDFB1U2A420SC5FX9XPZPAW2',
		   'home_id' => $Tref->third_id,
		   'status' => 'b',
		   'start' => date('Y-m-d',$avail->fdate),
		   'end' => date('Y-m-d',$avail->tdate)
		 ));
		 
		 if($xml_RAUS == 'OK') { 
		 
		 echo date('Y-m-d',$avail->fdate).' to '. date('Y-m-d',$avail->tdate).' => Blocked <br>';
		 
		 $model = Thirdpartyref::model()->findByPk($Tref->id);
		 $model->raus_state = 1;
		 $model->raus_last_date = time();
		 $model->save();
		 
		 
		 }
		    
		   
		    }   
  }
  }
  }
  }
}
?>