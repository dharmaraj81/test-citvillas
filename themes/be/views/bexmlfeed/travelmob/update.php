<?php
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<properties>';
foreach($XmlFeed as $data)
{
	if($model->status==1) $status = 'true'; else $status = 'false';
	$Gps = Gps::model()->find(array('condition'=>"uid='$data->uid'"));
	$xmldata .= '<property> ';
	$xmldata .= '<external_id> '.$data->uid.'</external_id>';
	$xmldata .= '<listing> ';
		$xmldata .= '<active> '.$status.'</active>';
		$xmldata .= '<title> '.xml_clear($data->name).'</title>';
		$xmldata .= '<description>'.xml_clear($data->content1).'</description>';
		$xmldata .= '<house_rules> </house_rules>';
		$xmldata .= '<property_type> '.xml_clear($data->Type->name).'</property_type>';
		$xmldata .= '<room_type> </room_type>';
		$xmldata .= '<accommodates> </accommodates>';
		$xmldata .= '<bedrooms> '.$data->bedroom.'</bedrooms>';
		$xmldata .= '<beds> '.($data->mbed+$data->msbed+$data->tbed+$data->sbed+$data->ssbed).'</beds>';
		$xmldata .= '<bed_type> </bed_type>';
		$xmldata .= '<bathrooms> '.$data->bathroom.'</bathrooms>';
		$xmldata .= '<room_size>';
			$xmldata .= '<units> </units>';
			$xmldata .= '<size> '.$data->size.'</size>';
		$xmldata .= '</room_size>';
		$xmldata .= '<cancellation_policy> </cancellation_policy>';
		$xmldata .= '<min_nights> </min_nights>';
		$xmldata .= '<max_nights> </max_nights>';
		$xmldata .= '<check_in_time> </check_in_time>';
		$xmldata .= '<check_out_time> </check_out_time>';
		$amenities = explode('|',$data->amenities);
		foreach($amenities as $data1):
			$Amenities = Amenities::model()->find(array('select'=>'name','condition'=>"id='$data1'"));
			$xmldata .= '<amenities>'.$Amenities->name.'</amenities>';
		endforeach;
		$tags = explode('|',$data->tags);
		foreach($tags as $data2):
			$Tag = Tag::model()->find(array('select'=>'name','condition'=>"id='$data2'"));
			$xmldata .= '<tags>'.$Tag->name.'</tags>';
		endforeach;
		$xmldata .= '<location>';
			$xmldata .= '<address>';
				$xmldata .= '<address_line1> '.$data->address1.'</address_line1>';
				$xmldata .= '<address_line2> '.$data->address2.'</address_line2>';
				$xmldata .= '<city> '.$data->Town->name.'</city>';
				$xmldata .= '<country> '.$data->Country->name.'</country>';
				$xmldata .= '<address_line2> '.$data->address2.'</address_line2>';
			$xmldata .= '</address>';
			$xmldata .= '<directions> </directions>';
			$xmldata .= '<geo_code>';
				$xmldata .= '<lat> '.$Gps->latitude.'</lat>';
				$xmldata .= '<long> '.$Gps->longitude.'</long>';
			$xmldata .= '</geo_code>';
		$xmldata .= '</location>';
		$xmldata .= '<pricing>';
			$xmldata .= '<currency> </currency>';
			$xmldata .= '<weekend_days> </weekend_days>';
			$xmldata .= '<additional_guest_fee> ';
				$xmldata .= '<guests> </guests>';
				$xmldata .= '<fee> </fee>';
			$xmldata .= '</additional_guest_fee> ';
			$xmldata .= '<cleaning_fee> ';
				$xmldata .= '<type> </type>';
				$xmldata .= '<fee> </fee>';
			$xmldata .= '</cleaning_fee>';
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
		$xmldata .= '</pricing>';
		$xmldata .= '<images>';
		$Gallery = Gallery::model()->findAll(array('condition'=>"prop_id='$data->id'",'order'=>'img_order asc'));
		foreach($Gallery as $image):
			$xmldata .= '<image>';
				$xmldata .= '<external_id> '.$image->guid.'</external_id>';
				$xmldata .= '<title> '.xml_clear($image->name).'</title>';
				$xmldata .= '<url>http://tt-prop-photos.s3.amazonaws.com/'.$data->id.'/thumb/'.$image->img_url.'</url>';
			$xmldata .= '</image>';
		endforeach;
		$xmldata .= '</images>';
		$xmldata .= '<availability> ';
		$Booking = Booking::model()->findAll(array('condition'=>"prop_id='$data->id'"));
		foreach($Booking as $data4):
			$fromdate = date('Y-m-d',$data4->fdate);
			$todate = date('Y-m-d',$data4->tdate);
			$xmldata .= '<blocked> ';
				$xmldata .= '<from> '.$fromdate.'</from>';
				$xmldata .= '<to> '.$todate.'</to>';
			$xmldata .= '</blocked>';
		endforeach;
	$xmldata .= '</availability>';
	$xmldata .= '</listing>';
	$xmldata .= '</property>';
}
$xmldata .= '</properties>';

/*$FeedPartner = Feedlist::model()->findByPk($id);
$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/update.xml',$xmldata)){ echo htmlspecialchars(file_get_contents($folderpath."/update.xml")); }*/
?>