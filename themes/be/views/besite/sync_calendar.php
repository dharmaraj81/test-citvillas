<?php
 
		/*$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/src';
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
		
		$service = new Google_Service_Calendar($client);*/	
		
		$Pinfos = Pinfo::model()->findAll(array( 'condition'=>'status = 1 AND ical_link !=""' ));	
		if( isset($Pinfos) && count($Pinfos)>0 ) {
		
		require RESOURCES_FOLDER.'/includes/class.iCalReader.php';
			
		echo "There are ".count($Pinfos)." properties have .ICS link<br>";
			
		foreach ($Pinfos as $Pinfo ) {
		
			$cids = explode(',',$Pinfo->ical_link);
			
			if(is_array($cids)){
		
			foreach ($cids as $cid) {
			
			$ical_link = trim($cid);
			
			$CalList[] = array('cal_link'=>$ical_link, 'name'=>$Pinfo->tt_name,'prop_id'=>$Pinfo->id);
			
			
		} } }
			

			
		if( isset($CalList) && count($CalList)>0 ) {
			foreach ($CalList as $CalProp) {
	
			echo '<br>'.$CalProp['name'];
			echo '<br>'.$CalProp['cal_link'];
			
				$ical   = new ICal($CalProp['cal_link']);
				
				$events = $ical->events();
				if(isset($events)) {
				$date = $events[0]['DTSTART'];
				echo "<br/>";
				echo "The number of Dates Blocked: ";
				echo $ical->event_count;
				echo "<br/>";
				echo "<hr/><hr/>";
				
				
				foreach ($events as $event) {
					
					
					$Desc = '';
					$uid = '';
					
					if( isset($event['UID']) && ($event['UID']!='')  ) { $uid = $event['UID']; } else { $uid = uniqid(); }
					
					echo '<PRE>';
					echo "UID: ".$uid."<br/>";
					if(isset($event['SUMMARY'])) { 
					echo "SUMMARY: ".$event['SUMMARY']."<br/>"; $Desc .= $event['SUMMARY']; }
					
					echo "BLOCKED DATE: ".date('d/m/Y',$ical->iCalDateToUnixTimestamp($event['DTSTART']))."-".date('d/m/Y',$ical->iCalDateToUnixTimestamp($event['DTEND']))."<br/>";
					/*if(isset($event['CREATED'])) {
					echo "CREATED: ".$event['CREATED']."<br/>"; }*/
					
					if(isset($event['DESCRIPTION'])) {
					echo "DESCRIPTION: ".$event['DESCRIPTION']."<br/>"; $Desc .= '/'.$event['DESCRIPTION']; }
					
					/*if(isset($event['LAST-MODIFIED'])) {
					echo "LAST-MODIFIED: ".$event['LAST-MODIFIED']."<br/>"; }
					
					if(isset($event['STATUS'])) {
					echo "STATUS: ".$event['STATUS']."<br/>"; }*/
					echo '</PRE>';
					echo "<hr/>";
	
	 
				 
				 $FDate = $ical->iCalDateToUnixTimestamp($event['DTSTART']);
				 $TDate = $ical->iCalDateToUnixTimestamp($event['DTEND']);
				 				 
				$exist_avail1 = Blocking::model()->find(array(
					'condition'=>'prop_id = :PID AND fdate BETWEEN :FD AND :TD',
					'params'=>array(':PID'=>$CalProp['prop_id'], ':FD' => $FDate, ':TD' => $TDate)
				));
			
				if( isset($exist_avail1) && count($exist_avail1)>0 ){
					
					$model =  GxcHelpers::loadDetailModel('Blocking', $exist_avail1->id);
					$model->fdate = $FDate;
					$model->save();
					
				} else  {
				
							$exist_avail2 = Blocking::model()->find(array(
								'condition'=>'prop_id = :PID AND tdate BETWEEN :FD AND :TD',
								'params'=>array(':PID'=>$CalProp['prop_id'], ':FD' => $FDate, ':TD' => $TDate)
							));
							
							if( isset($exist_avail2) && count($exist_avail2)>0 ){
							
								$model =  GxcHelpers::loadDetailModel('Blocking', $exist_avail2->id);
								$model->tdate = $TDate;
								$model->save();
								
							} else {
								
								$exist_avail3 = Blocking::model()->find(array(
								'condition'=>'prop_id = :PID AND fdate > :FD AND tdate < :TD',
								'params'=>array(':PID'=>$CalProp['prop_id'], ':FD' => $FDate, ':TD' => $TDate)
							));
							
							if( isset($exist_avail3) && count($exist_avail3)>0 ){
								
								$model =  GxcHelpers::loadDetailModel('Blocking', $exist_avail2->id);
								$model->fdate = $FDate;
								$model->tdate = $TDate;
								$model->save();
								
							} else {
					
								$model = new Blocking;
								$current_time=time();
								$model->created = $current_time;
								$model->crby = Yii::app()->user->getId();
								$model->cr_ip = ip();
								if($Desc != '') { 
									$model->booking_id = $Desc.'-'.$CalProp['prop_id'].'-GCAL-'.time().'-'.$i++; } 
								else {
									$model->booking_id = 'CIT-'.$CalProp['prop_id'].'-GCAL-'.time().'-'.$i++;
								}
								$model->prop_id = $CalProp['prop_id'];
								$model->customer_id = 1;
								$model->bsource = 6;
								$model->cal_id = $uid;
								$model->event_id = $uid;
								$model->confirm = 1;
								$model->status = 1;
								$model->feedlist_id = 0;
								$model->fdate = $FDate;
								$model->tdate = $TDate;
								$valid = $model->validate();
								echo CActiveForm::validate($model);
								 if($valid)
        							{ $model->save(); }  
				} 
				 
				}
				 } 
				}
				
				 } else { echo "<br/>"; echo "No Blocked Dates"; }
				 
				 echo "<br/>";

			 } } }
?>