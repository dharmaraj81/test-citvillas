<?php
 
		$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/src';
		$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $path);
		require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/autoload.php';
		$client_id = '904622573776-joipqhtkh94nji9komcq53mbtvr1eboo.apps.googleusercontent.com'; //Client ID
		$service_account_name = '904622573776-joipqhtkh94nji9komcq53mbtvr1eboo@developer.gserviceaccount.com'; //Email Address
		$key_file_location = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/src/gCal Integration-71d955680f35.p12'; //key.p12
		
		$client = new Google_Client();
		$client->setApplicationName("Ciao Calendar");
		//$service = new Google_Service_Calendar($client);	
		
		
		
		if (isset($_SESSION['service_token'])) {
		  $client->setAccessToken($_SESSION['service_token']);
		}
		$key = file_get_contents($key_file_location);
		$cred = new Google_Auth_AssertionCredentials($service_account_name, array('https://www.googleapis.com/auth/calendar'),$key,'notasecret');
		$client->setAssertionCredentials($cred);			
		
		$service = new Google_Service_Calendar($client);	
		
		$Pinfos = Pinfo::model()->findAll(array( 'condition'=>'status = 1 AND cal_url !=""' ));	
		if( isset($Pinfos) && count($Pinfos)>0 ) {
			
		echo "There are ".count($Pinfos)." properties have ical link<br>";
			
		foreach ($Pinfos as $Pinfo ) {
		
			$cids = explode(',',$Pinfo->cal_url);
			
			if(is_array($cids)){
		
			foreach ($cids as $cid) {
			
			$ical_user = trim($cid);
			
			$CalList[] = array('calid'=>$ical_user, 'name'=>$Pinfo->tt_name,'prop_id'=>$Pinfo->id);
			
			
		} } }
			

			
		if( isset($CalList) && count($CalList)>0 ) {
			foreach ($CalList as $CalProp) {
				
			
		try { 			

			$events = $service->events->listEvents($CalProp['calid']);

			while(true) {
			  foreach ($events->getItems() as $event) {
				$event->getSummary();
			  }
			  $pageToken = $events->getNextPageToken();
			  if ($pageToken) {
				$optParams = array('pageToken' => $pageToken);
				$events = $service->events->listEvents($CalProp['calid'], $optParams);
			  } else {
				break;
			  }
			}
			//print_r($events);
			//$events = $service->events->listEvents($ical_user);
			//echo count( $events );
			echo '<br>'.$CalProp['name'];
			//echo '<br>'.$CalProp['calid'];
			//echo '<br>'.$events->getOrganizer()->email;
			$no_of_events = 0;
			foreach ($events as $event) { 
				 //echo '<br>'.$event->etag;
				 //echo '<br>'.$event->getOrganizer()->email;
				 //echo '<br>'.$event->getStart()->date.'---'.$event->getEnd()->date;
				 //echo '<br>'.$CalProp['prop_id'];
				 
				// echo $FDate = strtotime($event->getStart()->date);
				// echo $TDate = strtotime($event->getEnd()->date);
				// echo date('d-m-Y',$FDate);
				// echo date('d-m-Y',$TDate);
				$uptd = 0;
				 
				$exist_avail1 = Booking::model()->find(array(
					'condition'=>'prop_id = :PID AND fdate BETWEEN :FD AND :TD',
					'params'=>array(':PID'=>$CalProp['prop_id'], ':FD' => $FDate, ':TD' => $TDate)
				));
			
				if( isset($exist_avail1) && count($exist_avail1)>0 ){
						
					$model =  GxcHelpers::loadDetailModel('Booking', $exist_avail1->id);
					$model->fdate = $FDate;
					$model->save();
					$uptd = 1; 
					
				} 
				
				$exist_avail2 = Booking::model()->find(array(
					'condition'=>'prop_id = :PID AND tdate BETWEEN :FD AND :TD',
					'params'=>array(':PID' => $CalProp['prop_id'], ':FD' => $FDate, ':TD' => $TDate)
				));
							
				if( isset($exist_avail2) && count($exist_avail2)>0 ){
					$model =  GxcHelpers::loadDetailModel('Booking', $exist_avail2->id);
					$model->tdate = $TDate;
					$model->save();
					$uptd = 1; 
				} 
								
				$exist_avail3 = Booking::model()->find(array(
					'condition'=>'prop_id = :PID AND fdate > :FD AND tdate < :TD',
					'params'=>array(':PID'=>$CalProp['prop_id'], ':FD' => $FDate, ':TD' => $TDate)
				));
							
				if( isset($exist_avail3) && count($exist_avail3)>0 ){
					$model =  GxcHelpers::loadDetailModel('Booking', $exist_avail3->id);
					$model->fdate = strtotime($event->getStart()->date);
					$model->tdate = strtotime($event->getEnd()->date);
					$model->save();
					$uptd = 1;
				}
				
				if($uptd==0) {
					
								$model = new Booking;
								$current_time=time();
								$model->created = $current_time;
								$model->crby = Yii::app()->user->getId();
								$model->booking_slug = uniqid();
								$model->actual_price = 0;
								$model->price_per = 0;
								$model->cr_ip = ip();
								$model->booking_id = time().'-'.$i++;
								$model->prop_id = $CalProp['prop_id'];
								$model->customer_id = 1;
								$model->bsource = 6;
								$model->cal_id = $CalProp['calid'];
								$model->event_id = $event->etag;
								$model->confirm = 1;
								$model->status = 1;
								$model->feedlist_id = 0;
								$model->fdate = strtotime($event->getStart()->date);
								$model->tdate = strtotime($event->getEnd()->date);
								//echo "<br>Entered";
								if ( $model->save()) { $no_of_events++; };  
				
				} else { $no_of_events++; }
				 
				}
				  
			echo '===>>> '.$no_of_events.' Dates Added';
		 } 
		
		
		catch (Exception $e) {  $error .= '<br>'.$CalProp['name'].' - Not Public'; /*$e->getMessage();*/ var_dump($e->getMessage()); }
			
			
			 } } }
		echo  $error;	
?>