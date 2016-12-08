<?php
$Feedlist = Feedlist::model()->findAll();
foreach($Feedlist as $datas):
	$xmldata = '';
	switch(strtoupper($datas->name))
	{
		case 'CASMUNDO':
			$get_data=Season::model()->findAll(array('select'=>'name,prop_id,id'));
			$xmldata = '<?xml version="1.0" encoding="windows-1251"?>'; 
			$xmldata .= '<seasons>'; 
			foreach ($get_data as $get_values):
				$Sdate = Sdate::model()->findAll(array('condition'=>"season_id='$get_values->id'"));
				foreach ($Sdate as $data):
					$fromdate = date('Y-m-d',$data->from_date);
					$todate = date('Y-m-d',$data->to_date);
					$xmldata .= '<season id="'.$get_values->prop_id.'" from_date="'.$fromdate.'" to_date="'.$todate.'">'.$get_values->name.'</season>'; 
				endforeach;
			endforeach;
			$xmldata .= '</seasons>'; 
			break;
	}
	
	$folderpath = '../resources/feeds/'.$datas->name;
	if (!file_exists($folderpath)) 
	{
    	mkdir($folderpath,0777);
	}
	if(file_put_contents($folderpath.'/seasons.xml',$xmldata)){ echo "resourses/feeds/".$datas->name."/seasons.xml file created on project root folder..<br>"; }

endforeach;
?>