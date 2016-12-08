<?php
$Pinfo = Pinfo::model()->findByPk($_GET['id']);


$path = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/common/ZendGdata/library';

$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Calendar');

// User whose calendars you want to access
$user = 'traveltuscanyvillas@gmail.com';
$pass = 'ciaocal2013';
$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME; // predefined service name for calendar
$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
$service = new Zend_Gdata_Calendar($client);

Yii::import('application.extensions.EGCal.EGCal');
$cal = new EGCal($user , $pass);
//$cal = new EGCal('ask4test@gmail.com', '987qwerty');
/*
$ListFeed = $service->getCalendarListFeed();

if( isset($ListFeed) && count($ListFeed)>0 ) { 

echo "<h1>Calendar List Feed</h1>";

echo "<ol>";
foreach ($ListFeed as $calendar) {
	//print_r($calendar);
    echo "<li>" . $calendar->title->text ." (Event Feed: " . $calendar->id . ")</li>";
}
echo "</ol>";

}

$EventFeed = $service->getCalendarEventFeed();


if( isset($EventFeed) && count($EventFeed)>0 ) { 




 echo "<h1>Calendar Event Feed</h1>";
 
 
 
 echo "<ul>\n";
  foreach ($EventFeed as $event) {
    echo "\t<li>" . $event->title->text .  " (" . $event->id . ")\n";
    echo "\t\t<ul>\n";
    foreach ($event->when as $when) {
      echo "\t\t\t<li>Starts: " . $when->startTime ."-".$when->endTime. "</li>\n";
    }
    echo "\t\t</ul>\n";
    echo "\t</li>\n";
  }
  echo "</ul>\n";
  
  

 
  
 /*
echo "<ol>";
foreach ($listFeed as $calendar) {
	//print_r($calendar);
    echo "<li>" . $calendar->title->text ." (Event Feed: " . $calendar->id . ")</li>";
}
echo "</ol>";

} 
*/
$query = $service->newEventQuery();
$query->setUser('quqkrdtdqj9a7ih9rrf4jobto0@group.calendar.google.com');
$query->setVisibility('private');
$query->setProjection('full');
$eventFeed = $service->getCalendarEventFeed($query);


if( isset($eventFeed) && count($eventFeed)>0 ) { 
foreach ($eventFeed as $event) {
   echo "\t<li>" . $event->title->text .  " (" . $event->id . ")\n";
    echo "\t\t<ul>\n";
    foreach ($event->when as $when) {
      echo "\t\t\t<li>Starts: " . $when->startTime ."-".$when->endTime. "</li>\n";
	  
	  $eid = explode('/',$event->id);
	  $eid = array_reverse($eid);
	  
	  echo $eid[0];
    }
    echo "\t\t</ul>\n";
    echo "\t</li>\n";
}
}

/*
$calendarName = 'Moro';

foreach ($listFeed as $calendar) {
if($calendar->title == $calendarName)
 $useCalendarFeed = $calendar->content->src;
}
*/


?>