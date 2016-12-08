<?php
$Feedlist = Feedlist::model()->findAll();
foreach($Feedlist as $datas):
	$xmldata = '';
	switch(strtoupper($datas->name))
	{
		case 'CASMUNDO':
			$get_data=Pinfo::model()->findAll(array('select'=>'id,amenities,name,size,cal_url,content1,sleep,bathroom'));
			$xmldata = '<?xml version="1.0" encoding="windows-1251"?>'; 
			$xmldata .= '<lodgings>';
			foreach ($get_data as $data)
			{
				$xmldata .= '<lodging id="'.$data->id.'" facility_id="'.$data->amenities.'" name="'.$data->name.'" type="'.$data->Type->name.'" stars="4" floor="1">';
				$xmldata .= '<capacity>';
				$xmldata .= '<size>'.$data->size.'</size>';
				//$xmldata .= '<persons min="2" max_with_children="8">6</persons>';
				$xmldata .= '<rooms sleeping="'.$data->sleep.'" bath="'.$data->bathroom.'" other="'.($data->bedroom+$data->mbed+$data->msbed+$data->tbed+$data->sbed+$data->ssbed+$data->bathwshower+$data->bathwtub+$data->bathwts+$data->bathwwc).'">'.($data->sleep+$data->bathroom+$data->bedroom+$data->mbed+$data->msbed+$data->tbed+$data->sbed+$data->ssbed+$data->bathwshower+$data->bathwtub+$data->bathwts+$data->bathwwc).'</rooms>';
				$xmldata .= '<cots>0</cots>';
				$xmldata .= '</capacity>';
				$xmldata .= '<features>';
				
				$amenities = str_replace('|',',',$data->amenities);
				if($amenities!='')
				{
					$Amenities = Amenities::model()->findAll(array('select'=>'name','condition'=>"id in ($amenities)"));
					foreach($Amenities as $data1):
						$xmldata .= '<feature type="'.$data1->name.'"></feature>';
					endforeach;
				}
				
				$xmldata .= '</features>';
				$xmldata .= '<descriptions>';
				$xmldata .= '<description type="LODGING">'.$data->content1.'';
				$xmldata .= '</description>';
				$xmldata .= '</descriptions>';
				$xmldata .= '<images>';
				
				$Gallery = Gallery::model()->findAll(array('condition'=>"prop_id='$data->id'",'order'=>'img_order asc'));
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
				$xmldata .= '</lodging>';
			}
			$xmldata .= '</lodgings>';
			break;
	}
	
	$folderpath = '../resources/feeds/'.$datas->name;
	if (!file_exists($folderpath)) 
	{
    	mkdir($folderpath,0777);
	}
	if(file_put_contents($folderpath.'/lodgings.xml',$xmldata)){ echo "resourses/feeds/".$datas->name."/lodgings.xml file created on project root folder..<br>"; }

endforeach;
?>