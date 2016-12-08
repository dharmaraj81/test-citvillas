<?php
$Feedlist = Feedlist::model()->findAll();
foreach($Feedlist as $datas):
	$xmldata = '';
	switch(strtoupper($datas->name))
	{
		case 'CASMUNDO':
			$char = array('0'=>'A','1'=>'B','2'=>'C','3'=>'D','4'=>'E','5'=>'F','6'=>'G','7'=>'H','8'=>'I','9'=>'J','10'=>'K','11'=>'L','12'=>'M','13'=>'N','14'=>'O','15'=>'P','17'=>'Q','18'=>'R','19'=>'S','20'=>'T','21'=>'U','22'=>'V','23'=>'W','24'=>'X','25'=>'Y','26'=>'Z');
			$get_data=Pinfo::model()->findAll(array('select'=>'id'));
			$xmldata = '<?xml version="1.0" encoding="windows-1251"?>'; 
			$xmldata .= '<availabilities type="DAILY">'; 
			foreach ($get_data as $get_values)
			{
				$xmldata .= '<availability lodging_id="'.$get_values->id.'">'; 
				$today_date = date('Y-m-d');
				$today_strtime = strtotime($today_date);
				$check = Booking::model()->count(array('condition'=>"prop_id='$get_values->id' and fdate>='$today_strtime' and tdate<='$today_strtime'"));
				if($check==0) $avail = 1; else $avail = 0;
				$minstay = Booking::model()->find(array('condition'=>"prop_id='$get_values->id' and fdate>='$today_strtime' and tdate<='$today_strtime'"));
				if($minstay->id!='')
				{
					$last_date = date('y-m-d',$minstay->tdate);
					$start = strtotime($today_date);
					$end = strtotime($last_date);
					$days_between = ceil(abs($end - $start) / 86400);
					$minstay_value = $char[$days_between];
				}
				else
					$minstay_value = '';	
				$xmldata .= '<from_date>'.$today_date.'</from_date>'; 
				$xmldata .= '<vacancy type="PER_DAY">'.$avail.'</vacancy>'; 
				$xmldata .= '<changeover type="ALL_DAYS">1</changeover>'; 
				$xmldata .= '<minstay type="ALL_DAYS">'.$minstay_value.'</minstay>'; 
				$xmldata .= '</availability>';
			}
			$xmldata .= '</availabilities>';
			break;
	}
	
	$folderpath = '../resources/feeds/'.$datas->name;
	if (!file_exists($folderpath)) 
	{
    	mkdir($folderpath,0777);
	}
	if(file_put_contents($folderpath.'/availabilties_daily.xml',$xmldata)){ echo "resourses/feeds/".$datas->name."/availabilties_daily.xml file created on project root folder..<br>"; }

endforeach;
?>