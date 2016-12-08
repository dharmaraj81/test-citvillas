<?php
$datas = Feedlist::model()->find(array('condition'=>"id='$id'"));
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<availabilities> ';
foreach ($XmlFeed as $data)
{
	$xmldata .= '<lodging id="'.$data->id.'">';
	$Season = Season::model()->findAll(array('select'=>'id','condition'=>"prop_id='$data->id'"));
	foreach($Season as $data1):
		$Sdate = Sdate::model()->findAll(array('condition'=>"season_id='$data1->id'"));
		foreach($Sdate as $data2):
			$fromdate = date('Y-m-d',$data2->from_date);
			$todate = date('Y-m-d',$data2->to_date);
			$xmldata .= '<availability type="VACANT" from_date="'.$fromdate.'" to_date="'.$todate.'">';
			$Rate = Rate::model()->findAll(array('select'=>'people,price_week','condition'=>"season_id='$data1->id'"));
			foreach($Rate as $data3):
				$xmldata .= '<price persons_min="'.$data3->people.'" persons_max="'.$data3->people.'">'.$data3->price_week.'</price>';
			endforeach;
			$xmldata .= '</availability>';
		endforeach;
	endforeach;
	$xmldata .= '</lodging>';
}
$xmldata .= '</availabilities>';
$folderpath = '../resources/feeds/'.toSlug($datas->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
$folderpath = '../resources/feeds/'.toSlug($datas->name).'/en';
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/availabilties_weekly.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/availabilties_weekly.xml"));*/ echo $folderpath.'/availabilties_weekly.xml file created successfully'; }
?>
