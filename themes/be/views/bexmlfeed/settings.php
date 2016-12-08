<?php
$Feedlist = Feedlist::model()->findAll();
foreach($Feedlist as $datas):
	$xmldata = '';
	switch(strtoupper($datas->name))
	{
		case 'CASMUNDO':
			$xmldata = '<?xml version="1.0" encoding="windows-1251"?>'; 
			$xmldata .= '<settings>';
			$xmldata .= '<provider name="'.$datas->name.'">';
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
			break;
	}
	
	$folderpath = '../resources/feeds/'.$datas->name;
	if (!file_exists($folderpath)) 
	{
    	mkdir($folderpath,0777);
	}
	if(file_put_contents($folderpath.'/settings.xml',$xmldata)){ echo "resourses/feeds/".$datas->name."/settings.xml file created on project root folder..<br>"; }

endforeach;
?>