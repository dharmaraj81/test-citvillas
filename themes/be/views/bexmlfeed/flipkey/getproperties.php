<?php
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<PropertySummary>';
foreach($XmlFeed as $data)
{
	$i=$i+1;
$last_update = date('Y-m-d H:i:s',$data->modified);
$xmldata .= '<Property property_id="'.$data->id.'" last_update="'.$last_update.'" />';
}
$xmldata .= '</PropertySummary>';

$FeedPartner = Feedlist::model()->findByPk($id);
$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/getproperties.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/getproperties.xml"));*/ header('Location: '.Yii::app()->baseUrl.'/'.$folderpath.'/getproperties.xml'); }
?>