<?php
$datas = Feedlist::model()->find(array('condition'=>"id='$id'"));
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<lodgings>';
foreach ($XmlFeed as $data)
{
	$xmldata .= '<lodging id="'.$data->id.'" facility_id="'.$data->amenities.'" name="'.preg_replace('/&(?!#?[a-z0-9]+;)/','&amp;',$data->name).'" type="'.preg_replace('/&(?!#?[a-z0-9]+;)/','&amp;',$data->Type->name).'" stars="4" floor="1">';
	$xmldata .= '<capacity>';
	$xmldata .= '<size>'.$data->size.'</size>';
	$xmldata .= '<persons min="" max_with_children=""> </persons>';
	$xmldata .= '<rooms sleeping="'.$data->sleep.'" bath="'.$data->bathroom.'" other="'.($data->bedroom+$data->mbed+$data->msbed+$data->tbed+$data->sbed+$data->ssbed+$data->bathwshower+$data->bathwtub+$data->bathwts+$data->bathwwc).'">'.($data->sleep+$data->bathroom+$data->bedroom+$data->mbed+$data->msbed+$data->tbed+$data->sbed+$data->ssbed+$data->bathwshower+$data->bathwtub+$data->bathwts+$data->bathwwc).'</rooms>';
	$xmldata .= '<cots>0</cots>';
	$xmldata .= '</capacity>';
	$xmldata .= '<features> ';
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
	//$xmldata .= '<description type="LODGING">'.preg_replace('/&(?!#?[a-z0-9]+;)/','&amp;',utf8_encode(html_entity_decode($data->content1))).'</description>';
	$xmldata .= '<description type="LODGING">'.xml_clear($data->content1).'</description>';
	$xmldata .= '</descriptions>';
	$xmldata .= '<images>';
	$Gallery = Gallery::model()->findAll(array('condition'=>"prop_id='$data->id'",'order'=>'img_order asc'));
	$i=0;
	foreach($Gallery as $image):
		$i=$i+1;
		$xmldata .= '<image priority="'.$i.'" time_of_year="SUMMER">';
		$xmldata .= '<url>http://tt-prop-photos.s3.amazonaws.com/'.$data->id.'/thumb/'.$image->img_url.'</url>';
		$xmldata .= '<title>'.xml_clear($image->name).'</title>';
		$xmldata .= '</image>';
	endforeach;
	$xmldata .= '</images>';
	$xmldata .= '</lodging>';
}
$xmldata .= '</lodgings>';
$folderpath = '../resources/feeds/'.toSlug($datas->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
$folderpath = '../resources/feeds/'.toSlug($datas->name).'/en';
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/lodgings.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/lodgings.xml"));*/ echo $folderpath.'/lodgings.xml file created successfully'; }
?>