<?php
        $Pinfo = Pinfo::model()->findByPk($_GET['id']);
        $page_id=isset($_GET['id']) ? trim($_GET['id']) : 0; 
		
		session_start();
		$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/src';
		$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $path);
		require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/autoload.php';
		$client_id = '904622573776-joipqhtkh94nji9komcq53mbtvr1eboo.apps.googleusercontent.com'; //Client ID
		$service_account_name = '904622573776-joipqhtkh94nji9komcq53mbtvr1eboo@developer.gserviceaccount.com'; //Email Address
		$key_file_location = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/src/gCal Integration-71d955680f35.p12'; //key.p12
		
		
		/****************************************************/
		
		
			  
			 // require_once '../google-api-php-client-master/autoload.php';
			  //Google credentials
			  //$client_id = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com';
			  //$service_account_name = 'xxxxxxxxxxxxxxxxxxxxxx@developer.gserviceaccount.com';
			  //$key_file_location = '../google-api-php-client-master/API Project-xxxxxxx.p12';
			  if (!strlen($service_account_name) || !strlen($key_file_location))
				  echo missingServiceAccountDetailsWarning();
			  $client = new Google_Client();
			  $client->setApplicationName("Ciao Calendar");
			  if (isset($_SESSION['service_token'])) {
				  $client->setAccessToken($_SESSION['service_token']);
			  }
			  $key = file_get_contents($key_file_location);
			  $cred = new Google_Auth_AssertionCredentials(
				  $service_account_name,
				  array('https://www.googleapis.com/auth/calendar'),
				  $key
			  );
			  $client->setAssertionCredentials($cred);
			  if($client->getAuth()->isAccessTokenExpired()) {
				  try {
					$client->getAuth()->refreshTokenWithAssertion($cred);
				  } catch (Exception $e) {
					var_dump($e->getMessage());
				  }
			  }
			  $_SESSION['service_token'] = $client->getAccessToken();
		
		/****************************************************/
		
		
		$client = new Google_Client();
		//$client->setApplicationName("Ciao Calendar");
		$service = new Google_Service_Calendar($client);	
		
		/*
		
		if (isset($_SESSION['service_token'])) {
		  $client->setAccessToken($_SESSION['service_token']);
		}
		$key = file_get_contents($key_file_location);
		$cred = new Google_Auth_AssertionCredentials($service_account_name, array('https://www.googleapis.com/auth/calendar'),$key,'notasecret');
		$client->setAssertionCredentials($cred);	
			*/
		$Pinfo = Pinfo::model()->findByPk($page_id);
						
		if($Pinfo) {
			
		if($Pinfo->cal_url !='') {
			
			$cids = explode(',',$Pinfo->cal_url);
			
			if(is_array($cids)){
		
			foreach ($cids as $cid) {
			
			try { 			
			//echo $cid;
			$events = $service->events->listEvents($cid);
			//print_r($events);
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
		
		
		catch (Exception $e) {  $error .= '<br> error occured '; /*$e->getMessage();*/ var_dump($e->getMessage()); }
			
			
			}
		
			}
		
		
			}
		} 

?>