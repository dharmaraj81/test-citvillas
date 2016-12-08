<?php
$Feedlist = Feedlist::model()->findAll();
foreach($Feedlist as $datas):
	$xmldata = '';
	switch(strtoupper($datas->name))
	{
		case 'CASMUNDO':
			$Pinfo=Pinfo::model()->findAll(array('select'=>'id'));
			$xmldata = '<?xml version="1.0" encoding="windows-1251"?>'; 
			$xmldata .= '<prices>'; 
			foreach ($Pinfo as $data)
			{
				$xmldata .= '<lodging id="'.$data->id.'">'; 
				$Season = Season::model()->findAll(array('select'=>'id','condition'=>"prop_id='$data->id'"));
				foreach($Season as $data1):
					$Sdate = Sdate::model()->findAll(array('condition'=>"season_id='$data1->id'"));
					foreach($Sdate as $data2):
						$fromdate = date('Y-m-d',$data2->from_date);
						$todate = date('Y-m-d',$data2->to_date);
						$xmldata .= '<period date_from="'.$fromdate.'" date_to="'.$todate.'">'; 
						$Rate=Rate::model()->findAll(array('condition'=>"season_id='$data1->id'"));
						foreach($Rate as $data3):
							$xmldata .= '<price persons="'.$data3->people.'">'.$data3->price_week.'</price>'; 
						endforeach;
						$xmldata .= '</period>'; 
					endforeach;
				endforeach;
				$xmldata .= '</lodging>'; 
			}
			$xmldata .= '</prices>'; 
			break;
	}
	
	$folderpath = '../resources/feeds/'.$datas->name;
	if (!file_exists($folderpath)) 
	{
    	mkdir($folderpath,0777);
	}
	if(file_put_contents($folderpath.'/prices_weekly.xml',$xmldata)){ echo "resourses/feeds/".$datas->name."/prices_weekly.xml file created on project root folder..<br>"; }

endforeach;
?>