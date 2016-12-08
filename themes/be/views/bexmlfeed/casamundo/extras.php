<?php
$datas = Feedlist::model()->find(array('condition'=>"id='$id'"));
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<extras>';
foreach($XmlFeed as $data)
{
	$xmldata .= '<lodging id="'.$data->id.'">';
	$xmldata .= '<extra name="Final cleaning" type="CLEANING" mandatory="true" inclusive="false">';
	$xmldata .= '<restrictions>';
	$xmldata .= '<persons min="2" max="5"/>';
	$xmldata .= '</restrictions>';
	$xmldata .= '<price paid_on_spot="true">';
	$xmldata .= '<interval>NONE</interval>';
	$xmldata .= '<unit>PERSON</unit>';
	$xmldata .= '<amount min_total="80">'.xml_clear($data->extra_cost).'</amount>';
	$xmldata .= '</price>';
	$xmldata .= '<descriptions>';
	$xmldata .= '<summary>Final cleaning: C20.00 per person, with C80.00 minimum for all.';
	$xmldata .= '</summary>';
	$xmldata .= '</descriptions>';
	$xmldata .= '</extra>';
	$xmldata .= '</lodging>';
}
$xmldata .= '</extras>';
$folderpath = '../resources/feeds/'.toSlug($datas->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
$folderpath = '../resources/feeds/'.toSlug($datas->name).'/en';
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/extras.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/extras.xml"));*/ echo $folderpath.'/extras.xml file created successfully'; }
?>