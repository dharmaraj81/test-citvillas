<?php
        $Pinfos = Pinfo::model()->findAll(array( 'condition'=>'status = 1 AND cal_url !=""' ));
		 
		 
		$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/src';
		$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $path);
		
		// If you've used composer to include the library, remove the following line
		// and make sure to follow the standard composer autoloading.
		// https://getcomposer.org/doc/01-basic-usage.md#autoloading
		require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/google-api-php-client/autoload.php';
		//include(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/google-api-php-client-master/autoload.php'); 
		//include(__DIR__.'/google-api-php-client-master/autoload.php'); 

		//SET THE DEFAULT TIMEZONE SO PHP DOESN'T COMPLAIN. SET TO YOUR LOCAL TIME ZONE.
		date_default_timezone_set('America/New_York');
		
		//TELL GOOGLE WHAT WE'RE DOING
		$client = new Google_Client();
		$client->setApplicationName("Ciao Italy Villas"); //DON'T THINK THIS MATTERS
		$client->setDeveloperKey('AIzaSyB3g8-wPOPoxJtJTFCOtbwRLDkU92Epqno'); //GET AT AT DEVELOPERS.GOOGLE.COM
		$service = new Google_Service_Calendar($client);
		$calendarId = 'dgv0kl789bqh1un5dm3mduokos@group.calendar.google.com';
		$params = array('singleEvents' => true, 'orderBy' => 'startTime');
		
		$calendarList = $service->calendarList->listCalendarList();

while(true) {
  foreach ($calendarList->getItems() as $calendarListEntry) {
    echo $calendarListEntry->getSummary();
  }
  $pageToken = $calendarList->getNextPageToken();
  if ($pageToken) {
    $optParams = array('pageToken' => $pageToken);
    $calendarList = $service->calendarList->listCalendarList($optParams);
  } else {
    break;
  }
}
		
		//$events = $service->events->listEvents($ical_user, $params); 
		
	/*	$calendarList = $service->calendarList->listCalendarList();

		while(true) {
		  foreach ($calendarList->getItems() as $calendarListEntry) {
			echo $calendarListEntry->getSummary();
		  }
		  $pageToken = $calendarList->getNextPageToken();
		  if ($pageToken) {
			$optParams = array('pageToken' => $pageToken);
			$calendarList = $service->calendarList->listCalendarList($optParams);
		  } else {
			break;
		  }
		}
		
		*/
		
	$calendarListEntry = $service->calendarList->get($calendarId);

	echo $calendarListEntry->getSummary();

	
?>