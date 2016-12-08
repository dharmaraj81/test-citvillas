<?php
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<properties>';
foreach($XmlFeed as $data)
{
	$xmldata .= '<property> ';
	$xmldata .= '<external_id> '.$data->uid.'</external_id>';
	$xmldata .= '<rates> ';
		$xmldata .= '<base_rate> ';
			$xmldata .= '<nightly> </nightly>';
			$xmldata .= '<weekend> </weekend>';
			$xmldata .= '<weekly> </weekly>';
			$xmldata .= '<monthly> </monthly>';
		$xmldata .= '</base_rate>';
		$Season = Season::model()->findAll(array('select'=>'id','condition'=>"prop_id='$data->id'"));
		foreach($Season as $data1):
			$Sdate = Sdate::model()->findAll(array('condition'=>"season_id='$data1->id'"));
			foreach($Sdate as $data2):
				$fromdate = date('Y-m-d',$data2->from_date);
				$todate = date('Y-m-d',$data2->to_date);
				$xmldata .= '<rate>' ;
					$xmldata .= '<from> '.$fromdate.'</from>'; 
					$xmldata .= '<to> '.$fromdate.'</to>'; 
				$Rate=Rate::model()->findAll(array('condition'=>"season_id='$data1->id'"));
				foreach($Rate as $data3):
					$xmldata .= '<daily> '.$data3->price_day.'</daily>'; 
					$xmldata .= '<weekly> '.$data3->price_week.'</weekly>'; 
				endforeach;
				$xmldata .= '</rate>';
			endforeach;
		endforeach;
	$xmldata .= '</rates>';
	$xmldata .= '</property>';
}
$xmldata .= '</properties>';

/*$FeedPartner = Feedlist::model()->findByPk($id);
$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/rates.xml',$xmldata)){ echo htmlspecialchars(file_get_contents($folderpath."/rates.xml")); }*/
?>