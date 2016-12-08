<?php
ini_set("memory_limit",-1);
$datas = Feedlist::model()->find(array('condition'=>"id='$id'"));
$get_data=Season::model()->findAll(array('select'=>'name,prop_id,id','condition'=>"name!=''"));
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<seasons> '; 
foreach ($get_data as $get_values):
	$Sdate = Sdate::model()->findAll(array('condition'=>"season_id='$get_values->id' and (DATE_FORMAT(FROM_UNIXTIME(`from_date`),'%Y-%m-%d')>=now() OR DATE_FORMAT(FROM_UNIXTIME( `to_date`),'%Y-%m-%d')>=now())"));
	foreach ($Sdate as $data):
		$fromdate = date('Y-m-d',$data->from_date);
		$todate = date('Y-m-d',$data->to_date);
		$xmldata .= '<season id="'.$get_values->prop_id.'" from_date="'.$fromdate.'" to_date="'.$todate.'">'.xml_clear($get_values->name).'</season>'; 
	endforeach;
endforeach;
$xmldata .= '</seasons>'; 
$folderpath = '../resources/feeds/'.toSlug($datas->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/seasons.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/seasons.xml"));*/ echo $folderpath.'/seasons.xml file created successfully'; }
?>