<?php
        $Pinfos = Pinfo::model()->findAll(array( 
			'condition'=>'status = 1 AND cal_url !=""'
		 ));
		 
		 
		$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/ZendGdata/library';

		$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $path);

		require_once 'Zend/Loader.php';
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
		Zend_Loader::loadClass('Zend_Gdata_Calendar');

		// User whose calendars you want to access
		
		$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME; // predefined service name for calendar
		$httpClient = Zend_Gdata_ClientLogin::getHttpClient(GCAL_ID, GCAL_PWD, $service);
		
		$AuthToken = $httpClient->getClientLoginToken();
		$client = new Zend_Gdata_HttpClient();
		$httpClient = $client->setClientLoginToken($AuthToken);
		
		$service = new Zend_Gdata_Calendar($httpClient);
		 
		
		if( isset($Pinfos) && count($Pinfos)>0 ) {
			
			echo "There are ".count($Pinfos)." properties have ical link<br>";
			
		foreach ($Pinfos as $Pinfo ) {
			
			$con=Yii::app()->db;
			$con->setActive(false);
			$con->setActive(true);
		
			$cids = explode(',',$Pinfo->cal_url);
			
			if(is_array($cids)){
		
			foreach ($cids as $cid) {
			
			$ical_user = trim($cid);
			//$gpath = explode('/',$cid);
			//if(is_array($gpath)) { $gpath = array_reverse($gpath); $ical_user = $gpath[2]; }
			
				
			$query = $service->newEventQuery();
			$query->setUser($ical_user);
			$query->setVisibility('private');
			$query->setProjection('full');
			
			try{ $eventFeed = $service->getCalendarEventFeed($query);
			
			
			//print_r($eventFeed);	
			
	
			
			if( isset($eventFeed) && count($eventFeed)>0 ) { 
				$i=0; 
				foreach ($eventFeed as $event) {
				//echo $event->id.'('.count($eventFeed).')';	
				$eid = explode('/',$event->id);
	  			$eid = array_reverse($eid);

				foreach ($event->when as $when) {
	
				$exist_avail = Booking::model()->find(array(
					'condition'=>'prop_id = :PID AND cal_id = :CID AND event_id = :EID',
					'params'=>array(':PID'=>$Pinfo->id, ':CID' => $cid, ':EID' => $eid[0] )
				));
				
				if( isset($exist_avail) && count($exist_avail)>0 ){
						
					$model=  GxcHelpers::loadDetailModel('Booking', $exist_avail->id);
					$model->fdate = strtotime($when->startTime);
					$model->tdate = strtotime($when->endTime);
					$model->save();
					
				} else {
				$model = new Booking;
				$current_time=time();
				$model->created = $current_time;
				$model->crby = Yii::app()->user->getId();
				$model->cr_ip = ip();
				$model->booking_id = 'CIAO-'.$page_id.'-GCAL-'.time().'-'.$i++;
				$model->prop_id = $page_id;
				$model->customer_id = 1;
				$model->bsource = 6;
				$model->cal_id = $cid;
				$model->event_id = $eid[0];
				$model->confirm = 1;
				$model->status = 1;
				$model->feedlist_id = 0;
				$model->fdate = strtotime($when->startTime);
				$model->tdate = strtotime($when->endTime);
                $model->save();  
				
				}
				}
				
			 }
			 
			 echo count($eventFeed).' Records Merged from Google Calendar - '.$Pinfo->tt_name.'<br>';
		
		}
		
			} catch (Zend_Gdata_App_Exception $e) { /*echo $Pinfo->tt_name. "- Something Went Wrong<br>";*/ var_dump ( $e); }
		
			}
		
			}
			} }
			
			//print_r($data);
?>