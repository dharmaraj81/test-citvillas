<?php
if($start_date!='' && $end_date!='')
{
	$start = strtotime($start_date);
	$end = strtotime($end_date);
	$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
	$xmldata .= '<Reservations>';
	$Booking = Booking::model()->findAll(array('select'=>'t.id,t.fdate,t.tdate,t.prop_id,t.status','join'=>'join tt_pinfo a on t.prop_id=a.id','condition'=>"fdate>='$start' and tdate<='$end' and a.feedlist like '%$id%'",'group'=>'t.id'));
	foreach($Booking as $data):
		$fromdate = date('Y-m-d',$data->fdate);
		$todate = date('Y-m-d',$data->tdate);
		$status = '';
		if($data->status==1) $status = 'reserved'; else if($data->status) $status = 'cancelled';
		$xmldata .= '<Reservation property_id="'.$data->prop_id.'" reservation_id="'.$data->id.'">';
		$xmldata .= '<EmailAddress> </EmailAddress>';
		$xmldata .= '<ArrivalDate>'.$fromdate.'</ArrivalDate>';
		$xmldata .= '<DepartureDate>'.$todate.'</DepartureDate>';
		$xmldata .= '<Status value="'.$status.'" />';
		$xmldata .= '</Reservation>';
	endforeach;
	$xmldata .= '</Reservations>';
	$FeedPartner = Feedlist::model()->findByPk($id);
	$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);
	if (!file_exists($folderpath)) mkdir($folderpath,0777);
	if(file_put_contents($folderpath.'/reservations.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/reservations.xml"));*/ header('Location: '.Yii::app()->baseUrl.'/'.$folderpath.'/reservations.xml'); }
}
else if($start_date=='')
	echo 'Start date can not be empty';
else if($end_date=='')
	echo 'End date can not be empty';