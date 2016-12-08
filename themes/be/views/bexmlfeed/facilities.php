<?php
$Feedlist = Feedlist::model()->findAll();
foreach($Feedlist as $datas):
	$xmldata = '';
	switch(strtoupper($datas->name))
	{
		case 'CASMUNDO':
			$get_data=Pinfo::model()->findAll(array('select'=>'id,name,country,region,zip,town,location,nairport,cal_url,airport_km,train_km,content1,content2'));
			$xmldata = '<?xml version="1.0" encoding="windows-1251"?>'; 
			$xmldata .= '<facilities>';
			foreach ($get_data as $get_values):
				//latitude, longitude
				$Gps = Gps::model()->find(array('condition'=>"uid='$get_values->uid'"));
				
				$xmldata .= '<facility id="'.$get_values->id.'" name="'.$get_values->name.'">';
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
				$xmldata .= '<airport>'.$get_values->nairport.'</airport>';
				/*$xmldata .= '<beach>Santa Croce</beach>';*/
				$xmldata .= '</nearby>';
				$xmldata .= '</geodata>';
				$xmldata .= '<descriptions>';
				$xmldata .= '<description type="FACILITY">'.$get_values->content1.'';
				$xmldata .= '</description>';
				$xmldata .= '<description type="SURROUND">'.$get_values->content2.'';
				$xmldata .= '</description>';
				/*$xmldata .= '<description type="OTHER">Children welcome! Playground, garden and pool. Babysitter on request.';
				$xmldata .= '</description>';*/
				$xmldata .= '</descriptions>';
				$xmldata .= '<images>';
				
				$Gallery = Gallery::model()->findAll(array('condition'=>"prop_id='$get_values->id'",'order'=>'img_order asc'));
				$i=0;
				foreach($Gallery as $image):
					$i=$i+1;
					$xmldata .= '<image priority="'.$i.'" time_of_year="SUMMER">';
					$xmldata .= '<url>'.$image->img_url.'</url>';
					$xmldata .= '<title>'.$image->name.'';
					$xmldata .= '</title>';
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
			break;
	}
	
	$folderpath = '../resources/feeds/'.$datas->name;
	if (!file_exists($folderpath)) 
	{
    	mkdir($folderpath,0777);
	}
	if(file_put_contents($folderpath.'/facilities.xml',$xmldata)){ echo "resourses/feeds/".$datas->name."/facilities.xml file created on project root folder..<br>"; }

endforeach;
?>