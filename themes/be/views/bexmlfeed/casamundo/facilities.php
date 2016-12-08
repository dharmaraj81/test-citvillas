<?php
$datas = Feedlist::model()->find(array('condition'=>"id='$id'"));
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<facilities> ';
foreach ($XmlFeed as $get_values):
	$Gps = Gps::model()->find(array('condition'=>"uid='$get_values->uid'"));
	$xmldata .= '<facility id="'.$get_values->id.'" name="'.preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $get_values->name).'">';
	$xmldata .= '<geodata>';
	$xmldata .= '<location>';
	$xmldata .= '<country>'.$get_values->country.'</country>';
	$xmldata .= '<region>'.$get_values->regionname->name.'</region>';
	$xmldata .= '<area>'.$get_values->locationname->name.'</area>';
	$xmldata .= '<zip>'.$get_values->zip.'</zip>';
	$xmldata .= '<place>'.$get_values->town.'</place>';
	$xmldata .= '</location>';
	$xmldata .= '<position>';
	$xmldata .= '<latitude>'.$Gps->latitude.'</latitude>';
	$xmldata .= '<longitude>'.$Gps->longitude.'</longitude>';
	$xmldata .= '</position>';
	$xmldata .= '<distances>';
	$xmldata .= '<distance type="AIRPORT">'.($get_values->airport_km*1000).'</distance>';
	$xmldata .= '<distance type="TRAIN">'.($get_values->train_km*1000).'</distance>';
	$xmldata .= '<distance type="CITY">'.($get_values->town_km*1000).'</distance>';
	$xmldata .= '<distance type="CAR">'.($get_values->car*1000).'</distance>';
	$xmldata .= '</distances>';
	$xmldata .= '<nearby>';
	$xmldata .= '<airport>'.$get_values->nairport->name.'</airport>';
	$xmldata .= '<beach> </beach>';
	$xmldata .= '</nearby>';
	$xmldata .= '</geodata>';
	$xmldata .= '<descriptions>';
	$xmldata .= '<description type="FACILITY">'.xml_clear($get_values->content1).'</description>';
	$xmldata .= '<description type="SURROUND">'.xml_clear($get_values->content2).'</description>';
	$xmldata .= '<description type="OTHER"> </description>';
	$xmldata .= '</descriptions>';
	$xmldata .= '<images>';
	$Gallery = Gallery::model()->findAll(array('condition'=>"prop_id='$get_values->id'",'order'=>'img_order asc'));
	$i=0;
	foreach($Gallery as $image):
		$i=$i+1;
		$xmldata .= '<image priority="'.$i.'" time_of_year="SUMMER">';
		$xmldata .= '<url>http://tt-prop-photos.s3.amazonaws.com/'.$get_values->id.'/thumb/'.$image->img_url.'</url>';
		$xmldata .= '<title>'.xml_clear($image->name).'</title>';
		$xmldata .= '</image>';
	endforeach;
	$xmldata .= '</images>';
	$xmldata .= '<lodgings>';
	$xmldata .= '<unit id="'.$get_values->id.'">';
	$amenities = explode('|',$get_values->amenities);
	foreach($amenities as $data):
		$xmldata .= '<lodging season_id="'.date('Y').'" id="'.$data.'"></lodging>';
	endforeach;
	$xmldata .= '</unit>';
	$xmldata .= '</lodgings>';
	$xmldata .= '</facility>';
endforeach;
$xmldata .= '</facilities>';
$folderpath = '../resources/feeds/'.toSlug($datas->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
$folderpath = '../resources/feeds/'.toSlug($datas->name).'/en';
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/facilities.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/facilities.xml"));*/ echo $folderpath.'/facilities.xml file created successfully'; }
?>