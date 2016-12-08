<?php
if($_GET['viewid']=='')
{
	$XmlFeeds = Pinfo::model()->findAll(array('condition'=>"status='1' AND mstatus='1' AND feedlist like '%$id%'"));
	$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
	$xmldata .= '<Availability>';
	foreach($XmlFeeds as $XmlFeed):
		$Booking = Booking::model()->findAll(array('select'=>'fdate,tdate','condition'=>"prop_id='$XmlFeed->id'"));
		if(count($Booking)>0)
		{
			$xmldata .= '<BookedStays property_id="'.$XmlFeed->id.'">';
			foreach($Booking as $data):
				$fromdate = date('Y-m-d',$data->fdate);
				$todate = date('Y-m-d',$data->tdate);
				$xmldata .= '<BookedStay>';
				$xmldata .= '<ArrivalDate>'.$fromdate.'</ArrivalDate>';
				$xmldata .= '<DepartureDate>'.$todate.'</DepartureDate>';
				$xmldata .= '</BookedStay>';
			endforeach;
			$xmldata .= '</BookedStays>';
		}
	endforeach;
	$xmldata .= '</Availability>';
}
else 
{
	$XmlFeed = Pinfo::model()->find(array('select'=>'id','condition'=>"id='".$_GET['viewid']."'"));
	$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
	$xmldata .= '<Availability>';
	$Booking = Booking::model()->findAll(array('select'=>'fdate,tdate','condition'=>"prop_id='$XmlFeed->id'"));
	if(count($Booking)>0)
	{
		$xmldata .= '<BookedStays property_id="'.$XmlFeed->id.'">';
		foreach($Booking as $data):
			$fromdate = date('Y-m-d',$data->fdate);
			$todate = date('Y-m-d',$data->tdate);
			$xmldata .= '<BookedStay>';
			$xmldata .= '<ArrivalDate>'.$fromdate.'</ArrivalDate>';
			$xmldata .= '<DepartureDate>'.$todate.'</DepartureDate>';
			$xmldata .= '</BookedStay>';
		endforeach;
		$xmldata .= '</BookedStays>';
	}
	$xmldata .= '</Availability>';
}

$FeedPartner = Feedlist::model()->findByPk($id);
$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/getavailability.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/getavailability.xml"));*/ header('Location: '.Yii::app()->baseUrl.'/'.$folderpath.'/getavailability.xml'); }
?>