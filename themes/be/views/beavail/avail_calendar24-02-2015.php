<?php
        $Pinfo = Pinfo::model()->findByPk($_GET['id']);
        $page_id=isset($_GET['id']) ? trim($_GET['id']) : 0; 
		/*
		$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/ZendGdata/library';

		$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $path);

		require_once 'Zend/Loader.php';
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
		Zend_Loader::loadClass('Zend_Gdata_Calendar');

		// User whose calendars you want to access
		
		$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME; // predefined service name for calendar
		$client = Zend_Gdata_ClientLogin::getHttpClient(GCAL_ID, GCAL_PWD, $service);
		$service = new Zend_Gdata_Calendar($client);
		                             
        //List of language that should exclude not to translate       
      	*/
		
		$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/src';
		$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $path);
		require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/autoload.php';
		$client_id = '904622573776-joipqhtkh94nji9komcq53mbtvr1eboo.apps.googleusercontent.com'; //Client ID
		$service_account_name = '904622573776-joipqhtkh94nji9komcq53mbtvr1eboo@developer.gserviceaccount.com'; //Email Address
		$key_file_location = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/src/gCal Integration-71d955680f35.p12'; //key.p12
		
		$client = new Google_Client();
		$client->setApplicationName("Ciao Calendar");
		$service = new Google_Service_Calendar($client);	
		
		
		
		if (isset($_SESSION['service_token'])) {
		  $client->setAccessToken($_SESSION['service_token']);
		}
		$key = file_get_contents($key_file_location);
		$cred = new Google_Auth_AssertionCredentials($service_account_name, array('https://www.googleapis.com/auth/calendar'),$key,'notasecret');
		$client->setAssertionCredentials($cred);	
			
		$Pinfo = Pinfo::model()->findByPk($page_id);
						
		if($Pinfo) {
			
		if($Pinfo->cal_url !='') {
			
			$cids = explode(',',$Pinfo->cal_url);
			
			if(is_array($cids)){
		
			foreach ($cids as $cid) {
				
			/*	
			
			$ical_user = $cid;
			//$gpath = explode('/',$cid);
			//if(is_array($gpath)) { $gpath = array_reverse($gpath); $ical_user = $gpath[2]; }
			
				
			$query = $service->newEventQuery();
			$query->setUser($ical_user);
			$query->setVisibility('private');
			$query->setProjection('full');
			try{ $eventFeed = $service->getCalendarEventFeed($query);
			} catch (Zend_Gdata_App_Exception $e) { var_dump ( $e); }
			
			//print_r($eventFeed);	
				
			
			if( isset($eventFeed) && count($eventFeed)>0 ) { 
				$i=0; echo count($eventFeed).' Records Merged from Google Calendar';
				foreach ($eventFeed as $event) {
					
				$eid = explode('/',$event->id);
	  			$eid = array_reverse($eid);
				
				foreach ($event->when as $when) {
					
				$exist_avail = Booking::model()->find(array(
					'condition'=>'prop_id = :PID AND cal_id = :CID AND event_id = :EID',
					'params'=>array(':PID'=>$page_id, ':CID' => $cid, ':EID' => $eid[0] )
				
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
		
		}
		
			 */
			
			try { 			
echo $cid;
			$events = $service->events->listEvents($cid);
print_r($event);
			while(true) {
			  foreach ($events->getItems() as $event) {
				$event->getSummary();
			  }
			  $pageToken = $events->getNextPageToken();
			  if ($pageToken) {
				$optParams = array('pageToken' => $pageToken);
				$events = $service->events->listEvents($cid, $optParams);
			  } else {
				break;
			  }
			}
			
			$no_of_events = 0;
			foreach ($events as $event) { 
				 
				 $FDate = strtotime($event->getStart()->date);
				 $TDate = strtotime($event->getEnd()->date);
				 				 
				$exist_avail1 = Booking::model()->find(array(
					'condition'=>'prop_id = :PID AND fdate BETWEEN :FD AND :TD',
					'params'=>array(':PID'=>$page_id, ':FD' => $FDate, ':TD' => $TDate)
				));
			
				if( isset($exist_avail1) && count($exist_avail1)>0 ){
						
					$model =  GxcHelpers::loadDetailModel('Booking', $exist_avail1->id);
					$model->fdate = strtotime($event->getStart()->date);
					$model->save();
					
				} else  {
				
							$exist_avail2 = Booking::model()->find(array(
								'condition'=>'prop_id = :PID AND tdate BETWEEN :FD AND :TD',
								'params'=>array(':PID'=>$page_id, ':FD' => $FDate, ':TD' => $TDate)
							));
							
							if( isset($exist_avail2) && count($exist_avail2)>0 ){
								$model =  GxcHelpers::loadDetailModel('Booking', $exist_avail2->id);
								$model->tdate = strtotime($event->getEnd()->date);
								$model->save();
							} else {
								
								$exist_avail2 = Booking::model()->find(array(
								'condition'=>'prop_id = :PID AND fdate > :FD AND tdate < :TD',
								'params'=>array(':PID'=>$page_id, ':FD' => $FDate, ':TD' => $TDate)
							));
							
							if( isset($exist_avail2) && count($exist_avail2)>0 ){
								$model =  GxcHelpers::loadDetailModel('Booking', $exist_avail2->id);
								$model->fdate = strtotime($event->getStart()->date);
								$model->tdate = strtotime($event->getEnd()->date);
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
								$model->event_id = $event->etag;
								$model->confirm = 1;
								$model->status = 1;
								$model->feedlist_id = 0;
								$model->fdate = strtotime($event->getStart()->date);
								$model->tdate = strtotime($event->getEnd()->date);
								if ( $model->save()) { $no_of_events++; };  
				
				} 
				 
				}
				 } }
			echo '===>>> '.$no_of_events.' Dates Added';
		 } 
		
		
		catch (Exception $e) {  $error .= '<br> error occured '; /*$e->getMessage();*/ }
			
			
			}
		
			}
		
		
			}
		} 

?>