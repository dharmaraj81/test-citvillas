<?php 
if ($fpartner == 12 ) {
	
  $Pinfos = Pinfo::model()->findAll(array('condition'=>'status = 1 AND mstatus = 1'));
  
  if($Pinfos) { 
  
  $j=0;
  $success = '';
  $failure = '';
  
    foreach ($Pinfos as $Pinfo) {
    $j++;
  	$Tref = Thirdpartyref::model()->find(array(
			'condition'=>'prop_id = :PID AND feed_id = :FID',
			'params'=>array(':PID'=>$Pinfo->id,':FID'=>12)
	));
	
	
	
	
   if($Tref) {
	   
	$hl_cur_url = 'https://agentapi.holidaylettings.co.uk/service_rates.asmx/SetCurrency';
   
   		
				  
   	$xml_cur_RTUS = Yii::app()->curl->get($hl_cur_url, array(
		   
		   'ownerId'=>'188433',
		   'key'=>'FOMBCTIDFB1U2A420SC5FX9XPZPAW2',
		   'homeId' => $Tref->third_id,
		   'currencyCode'=>'EUR'
		));
		
	$con=Yii::app()->db;
			$con->setActive(false);
			$con->setActive(true);
	
	$sql = 'SELECT
		  tt_season.name as tarrif
		  , tt_season.id
		  , tt_season.stay
		  , tt_dates_rates.people
		  , tt_dates_rates.price_day
		  , tt_dates_rates.id
		  , tt_dates_rates.from_date
		  , tt_dates_rates.to_date
		  , tt_dates_rates.price_week
	
	FROM
    
	`ciaosite_db`.tt_pinfo
    INNER JOIN `ciaosite_db`.tt_season 
        ON (tt_pinfo.id = tt_season.prop_id)
    INNER JOIN `ciaosite_db`.tt_dates_rates 
        ON (tt_season.id = tt_dates_rates.season_id)
	 where to_date >='.time().' AND tt_pinfo.id = "'.$Pinfo->id.'" ORDER BY tt_dates_rates.price_week 	ASC'; 
	$flag = 0;
	
	$hl_setone_url = 'https://agentapi.holidaylettings.co.uk/service_rates.asmx/SetOne';
	$list = Yii::app()->db->createCommand($sql)->queryAll();	
	
	$success .= $j.' '.$Pinfo->tt_name.'('.$Tref->third_id.') --------------------------------------------'."\n\r";
	
	$failure .= $j.' '.$Pinfo->tt_name.'('.$Tref->third_id.') --------------------------------------------'."\n\r";
	
	if($list) {
	   
		foreach ($list as $l)
		{   
			$comm = Payment::model()->find(array(
				  	'condition'=>'uid = :UID',
					'params'=>array(':UID'=>$Pinfo->uid),
					'order'=>'id ASC'
				  ));
			
			if($l['people'] == $Pinfo->sleep) { 
			
				$flag = $l['tt_dates_rates.id'];
				if ( ($l['stay']==0) ) { $ms = 5; } else { $ms = $l['stay']; } 			
				
				$from_date_reset = mktime(0, 0, 0, date('n'), date('j') + 1);
				
				if( $l['from_date'] > $from_date_reset ) { $from_date_reset = $l['from_date'];  } 
				
				$price_day = 0; $price_week = 0;
				
				 if ( $l['price_day'] != 0) { 
				 
				  if( ($comm) && ($comm->commission>0) ) { $price_day = (($l['price_day']/0.61)*(CommissionValue($comm->commission)));  } else { $price_day =  $l['price_day']; } } 
				  
				 if ($l['price_week'] != 0) { 
				  if( ($comm) && ($comm->commission>0) ) { $price_week = (($l['price_week']/0.61)*(CommissionValue($comm->commission)));  } else { $price_week =  $l['price_week']; } }
				
				$xml_RTUS1 = Yii::app()->curl->get($hl_setone_url, array(
		   
					 'ownerId'=>'188433',
					 'key'=>'FOMBCTIDFB1U2A420SC5FX9XPZPAW2',
					 'homeId' => $Tref->third_id,
					 'groupSize'=> $l['people'],
					 'startDate'=> date('Y-m-d',$from_date_reset),
					 'endDate'=> date('Y-m-d',$l['to_date']),
					 'tariffName'=> $l['tarrif'],
					 'weeklyRate'=> number_format($price_week,0,'.',''),
					 'minNights'=> $ms,
					 'weekdayRate'=> number_format($price_day,0,'.',''),
					 'weekendRate'=> '0'
				  )); 
				  
				 if( ($xml_RTUS1) && ($xml_RTUS1 == 'true') ) { 
				 
				 //$success .= $xml_RTUS1."\n\r";
				 $xmlcont = new SimpleXMLElement($xml_RTUS1);
				 				 
				 if( $xmlcont->Success=='true' ) {
					 
					$model = Thirdpartyref::model()->findByPk($Tref->id);
		 			$model->rtus_state = 1;
		 			$model->rtus_last_date = time();
		 			$model->save();
					 
				 }
				 
				 }

			}
		}
	} else { $failure .= $j.' '.$Pinfo->tt_name.'('.$Tref->third_id.') --------------------------------------------'."\n\r"; }
	
	if($flag != 0 ) {
		if($list) {
			
		foreach ($list as $l)
		{   
			if( $flag != $l['tt_dates_rates.id'] ) { 
			
			if ( ($l['stay']==0) ) { $ms = 5; } else { $ms = $l['stay']; } 
			
			$from_date_reset = mktime(0, 0, 0, date('n'), date('j') + 1);
			if( $l['from_date'] > $from_date_reset ) { $from_date_reset = $l['from_date'];  }
			$price_day = 0; $price_week = 0;
			
			if ( $l['price_day'] != 0) { 
				 
				  if( ($comm) && ($comm->commission>0) ) { $price_day = (($l['price_day']/0.61)*(CommissionValue($comm->commission)));  } else { $price_day =  $l['price_day']; } } 
				  
				 if ($l['price_week'] != 0) { 
				  if( ($comm) && ($comm->commission>0) ) { $price_week = (($l['price_week']/0.61)*(CommissionValue($comm->commission)));  } else { $price_week =  $l['price_week']; } }
					
			
				$xml_RTUS2 = Yii::app()->curl->get($hl_setone_url, array(
		   
					 'ownerId'=>'188433',
					 'key'=>'FOMBCTIDFB1U2A420SC5FX9XPZPAW2',
					 'homeId' => $Tref->third_id,
					 'groupSize'=> $l['people'],
					 'startDate'=> date('Y-m-d',$from_date_reset),
					 'endDate'=> date('Y-m-d',$l['to_date']),
					 'tariffName'=> $l['tarrif'],
					  'weeklyRate'=> number_format($price_week,0,'.',''),
					 'minNights'=> $ms,
					 'weekdayRate'=> number_format($price_day,0,'.',''),
					 'weekendRate'=> '0'
				  )); 
			  
			   
			   if( ($xml_RTUS2) && ($xml_RTUS2 == 'true 0') ) { 
				 
				//$success .= $xml_RTUS2."\n\r";
				 $xmlcont = new SimpleXMLElement($xml_RTUS2);
				 				 
				 if( $xmlcont->Success=='true' ) {
					 
					$model = Thirdpartyref::model()->findByPk($Tref->id);
		 			$model->rtus_state = 1;
		 			$model->rtus_last_date = time();
		 			$model->save();
					 
				 }
				 
				 }
			   
			}
		}
	}
	
	} else {
		
		if($list) {
		$i=0;
		foreach ($list as $l)
		{   
			if ( ($i==0) || ($l['people']==0) ) { $sl = $Pinfo->sleep; } else { $sl = $l['people']; } 
			if ( ($l['stay']==0) ) { $ms = 5; } else { $ms = $l['stay']; } 
			$from_date_reset = mktime(0, 0, 0, date('n'), date('j') + 1);
			if( $l['from_date'] > $from_date_reset ) { $from_date_reset = $l['from_date'];  }
			
			$price_day = 0; $price_week = 0;
			
			if ( $l['price_day'] != 0) { 
				 
				  if( ($comm) && ($comm->commission>0) ) { $price_day = (($l['price_day']/0.61)*(CommissionValue($comm->commission)));  } else { $price_day =  $l['price_day']; } } 
				  
				 if ($l['price_week'] != 0) { 
				  if( ($comm) && ($comm->commission>0) ) { $price_week = (($l['price_week']/0.61)*(CommissionValue($comm->commission)));  } else { $price_week =  $l['price_week']; } }
				
				
				 $xml_RTUS3 = Yii::app()->curl->get($hl_setone_url, array(
		   
					 'ownerId'=>'188433',
					 'key'=>'FOMBCTIDFB1U2A420SC5FX9XPZPAW2',
					 'homeId' => $Tref->third_id,
					 'groupSize'=> $sl,
					 'startDate'=> date('Y-m-d',$from_date_reset),
					 'endDate'=> date('Y-m-d',$l['to_date']),
					 'tariffName'=> $l['tarrif'],
					 'weeklyRate'=> number_format($price_week,0,'.',''),
					 'minNights'=> $ms,
					 'weekdayRate'=> number_format($price_day,0,'.',''),
					 'weekendRate'=> '0'
				  )); 
				  
				 
				 if( ($xml_RTUS3) ) { 
				 
				 //$success .= $xml_RTUS3."\n\r";
				 $xmlcont = new SimpleXMLElement($xml_RTUS3);				 
				 if( $xmlcont->Success=='true' ) {
					 
					$model = Thirdpartyref::model()->findByPk($Tref->id);
		 			$model->rtus_state = 1;
		 			$model->rtus_last_date = time();
		 			$model->save();
					 
				 }
				 
				 }
			 
			$i = $i+1; 
		}
	}
		
	}
	   }
  }
	
  }
  
}
?>