<?php
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<properties>';
foreach($XmlFeed as $data)
{
	$xmldata .= '<property> ';
	$xmldata .= '<external_id> '.$data->uid.'</external_id>';
		$xmldata .= '<availability> ';
		$Booking = Booking::model()->findAll(array('condition'=>"prop_id='$data->id'"));
		foreach($Booking as $data4):
			$fromdate = date('Y-m-d',$data4->fdate);
			$todate = date('Y-m-d',$data4->tdate);
			$xmldata .= '<blocked> ';
				$xmldata .= '<from> '.$fromdate.'</from>';
				$xmldata .= '<to> '.$todate.'</to>';
			$xmldata .= '</blocked>';
		endforeach;
		$xmldata .= '</availability>';
	$xmldata .= '</property>';
}
$xmldata .= '</properties>';

/*$FeedPartner = Feedlist::model()->findByPk($id);
$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/availability.xml',$xmldata)){ echo htmlspecialchars(file_get_contents($folderpath."/availability.xml")); }*/
?>