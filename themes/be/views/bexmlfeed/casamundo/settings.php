<?php
$datas = Feedlist::model()->find(array('condition'=>"id='$id'"));
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<settings>';
$xmldata .= '<provider name="'.$datas->name.'"/>';
$xmldata .= '<api>';
$xmldata .= '<version>1.2.1</version>';
$xmldata .= '</api>';
$xmldata .= '<locales>';
$xmldata .= '<locale language="EN" currency="EUR"/>';
$xmldata .= '<locale language="EN" currency="GBP"/>';
$xmldata .= '</locales>';
$xmldata .= '<facility>';
$xmldata .= '<lodgings>MULTIPLE</lodgings>';
$xmldata .= '</facility>';
$xmldata .= '<lodging seasons="true">';
$xmldata .= '<availabilities type="DAILY" changeover="MON"/>';
$xmldata .= '</lodging>';
$xmldata .= '</settings>'; 
$folderpath = '../resources/feeds/'.toSlug($datas->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/settings.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/settings.xml"));*/ echo $folderpath.'/settings.xml file created successfully'; }	
?>