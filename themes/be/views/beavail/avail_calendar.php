<?php
        $Pinfo = Pinfo::model()->findByPk($_GET['id']);
        $page_id=isset($_GET['id']) ? trim($_GET['id']) : 0; 
		$Pinfo = Pinfo::model()->findByPk($page_id);
		
		//include(RESOURCES_FOLDER."/includes/icalendar.php");
		require RESOURCES_FOLDER.'/includes/class.iCalReader.php';
						
		if($Pinfo) {
			
			$no_of_events = 0;
			$i = 1;
			
		if($Pinfo->ical_link !='') {
			$cids = explode(',',$Pinfo->ical_link);
			if(is_array($cids)){
			foreach ($cids as $cid) {		
			
			$ical   = new ICal($cid);
			$events = $ical->events();
			
			if( isset($events) && count($events)> 0 ) {
			
				$date = $events[0]['DTSTART'];
				/*echo "The ical date: ";
				echo $date;
				echo "<br/>";
				echo "The Unix timestamp: ";
				echo $ical->iCalDateToUnixTimestamp($date);
*/				echo "<br/>";
				echo "The number of Dates Blocked: ";
				echo $ical->event_count;
				
				echo "<br/>";
				echo "<hr/><hr/>";
				foreach ($events as $event) {
					
					
					$Desc = '';
					$uid = '';
					
					if( isset($event['UID']) && ($event['UID']!='')  ) { $uid = $event['UID']; } else { $uid = uniqid(); }
					
					
					echo "UID: ".$uid."<br/>";
					if(isset($event['SUMMARY'])) { 
					echo "SUMMARY: ".$event['SUMMARY']."<br/>"; $Desc .= $event['SUMMARY']; }
					echo "START DATE: ".date('d-m-Y',$ical->iCalDateToUnixTimestamp($event['DTSTART']))."<br/>";
					echo "END DATE: ".date('d-m-Y', strtotime('-1 day', $ical->iCalDateToUnixTimestamp($event['DTEND']))  )."<br/>";
					
					
					if(isset($event['CREATED'])) {
					echo "CREATED: ".$event['CREATED']."<br/>"; }
					
					if(isset($event['DESCRIPTION'])) {
					echo "DESCRIPTION: ".$event['DESCRIPTION']."<br/>"; $Desc .= '/'.$event['DESCRIPTION']; }
					
					if(isset($event['LAST-MODIFIED'])) {
					echo "LAST-MODIFIED: ".$event['LAST-MODIFIED']."<br/>"; }
					
					if(isset($event['STATUS'])) {
					echo "STATUS: ".$event['STATUS']."<br/>"; }
					echo "<hr/>";
	
	 
				 
				 $FDate = $ical->iCalDateToUnixTimestamp($event['DTSTART']);
				 $TDate = strtotime('-1 day', $ical->iCalDateToUnixTimestamp($event['DTEND']));
				 
				
				
				$exist_avail_uid = Blocking::model()->find(array(
					'condition'=>'prop_id = :PID AND cal_id = :CID',
					'params'=>array(':PID'=>$page_id, ':CID' => $uid )
				));
				
				if( isset($exist_avail_uid) && count($exist_avail_uid)>0 ){
					
					$model =  GxcHelpers::loadDetailModel('Blocking', $exist_avail_uid->id);
					$model->fdate = $FDate;
					$model->tdate = $TDate;
					$model->save();
					
				}
				 
				 				 
				$exist_avail1 = Blocking::model()->find(array(
					'condition'=>'prop_id = :PID AND fdate BETWEEN :FD AND :TD',
					'params'=>array(':PID'=>$page_id, ':FD' => $FDate, ':TD' => $TDate)
				));
			
				if( isset($exist_avail1) && count($exist_avail1)>0 ){
					
					$model =  GxcHelpers::loadDetailModel('Blocking', $exist_avail1->id);
					$model->fdate = $FDate;
					$model->save();
					
				} else  {
				
							$exist_avail2 = Blocking::model()->find(array(
								'condition'=>'prop_id = :PID AND tdate BETWEEN :FD AND :TD',
								'params'=>array(':PID'=>$page_id, ':FD' => $FDate, ':TD' => $TDate)
							));
							
							if( isset($exist_avail2) && count($exist_avail2)>0 ){
							
								$model =  GxcHelpers::loadDetailModel('Blocking', $exist_avail2->id);
								$model->tdate = $TDate;
								$model->save();
								
							} else {
								
								$exist_avail3 = Blocking::model()->find(array(
								'condition'=>'prop_id = :PID AND fdate > :FD AND tdate < :TD',
								'params'=>array(':PID'=>$page_id, ':FD' => $FDate, ':TD' => $TDate)
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
									$model->booking_id = $Desc.'-'.$page_id.'-GCAL-'.time().'-'.$i++; } 
								else {
									$model->booking_id = 'CIT-'.$page_id.'-GCAL-'.time().'-'.$i++;
								}
								
								$model->prop_id = $page_id;
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
			}
			}
			}
			} 
			
			else 
			
			{ echo "No Calendar Link"; }
		} 
?>