<?php
$XmlFeed = Pinfo::model()->findByPk($viewid);
if($XmlFeed->id!='')
{
$Payment = Payment::model()->find(array('condition'=>"uid='$XmlFeed->uid'"));
if($Payment->id=='') $fees = 'no'; else $fees = 'yes';
if($Payment->tax!='0') $feestype = 'tax'; elseif($Payment->deposit!='0') $feestype = 'security-deposit'; else $feestype = 'other';
$last_update = date('Y-m-d H:i:s',$XmlFeed->modified);
$Gps = Gps::model()->find(array('condition'=>"uid='$data->uid'"));

$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<Property property_id="'.$XmlFeed->id.'" last_update="'.$last_update.'">'; 
	$xmldata .= '<PropertyName>'.xml_clear($XmlFeed->name).'</PropertyName>'; 
	$xmldata .= '<Address>'; 
		$xmldata .= '<Address1> '.$XmlFeed->address1.'</Address1>'; 
		$xmldata .= '<Address2> '.$XmlFeed->address2.'</Address2>'; 
		$xmldata .= '<City> '.$XmlFeed->Town->name.'</City>'; 
		$xmldata .= '<State> '.$XmlFeed->regionname->name.'</State>'; 
		$xmldata .= '<ZipCode> '.$XmlFeed->zip.'</ZipCode>'; 
		$xmldata .= '<Country> '.$XmlFeed->Country->name.'</Country>'; 
		$xmldata .= '<Latitude> '.$Gps->latitude.'</Latitude>'; 
		$xmldata .= '<Longitude> '.$Gps->longitude.'</Longitude>'; 
	$xmldata .= '</Address>'; 
	$xmldata .= '<Details>'; 
		$xmldata .= '<MaximumOccupancy> </MaximumOccupancy>'; 
		$xmldata .= '<PropertyType type="'.$XmlFeed->Type->name.'"></PropertyType>'; 
		$xmldata .= '<Bedrooms count="'.$XmlFeed->bedroom.'">'; 
			$xmldata .= '<Bedroom king="0" queen="0" full="0" twin="0" bunk="0" other="0"></Bedroom>'; 
		$xmldata .= '</Bedrooms>'; 
		$xmldata .= '<Bathrooms count="'.$XmlFeed->bathroom.'">'; 
			if($XmlFeed->bathwts>0)
			$xmldata .= '<Bathroom type="full"> </Bathroom>'; 
			if($XmlFeed->bathwtub>0)
			$xmldata .= '<Bathroom type="half"> </Bathroom>'; 
			if($XmlFeed->bathwshower>0)
			$xmldata .= '<Bathroom type="shower"> </Bathroom>'; 
		$xmldata .= '</Bathrooms>'; 
		$xmldata .= '<MinimumStayLength> </MinimumStayLength>'; 
		$xmldata .= '<CheckIn> </CheckIn>'; 
		$xmldata .= '<CheckOut> </CheckOut>'; 
		$xmldata .= '<Currency> </Currency>'; 
		$xmldata .= '<UnitSize units=""> </UnitSize>'; 
	$xmldata .= '</Details>'; 
	$xmldata .= '<Descriptions>'; 
		$xmldata .= '<PropertyDescription>'.xml_clear($XmlFeed->content1).'</PropertyDescription>'; 
		$xmldata .= '<RateDescription> </RateDescription>'; 
		$xmldata .= '<LocationDescription> </LocationDescription>'; 
	$xmldata .= '</Descriptions>'; 
	$xmldata .= '<Suitability>'; 
		$xmldata .= '<Pets value="'.$this->amenities1($XmlFeed->amenities,'Pets').'" />'; 
		$xmldata .= '<Smoking value="'.$this->amenities1($XmlFeed->amenities,'Smoking').'" />'; 
		$xmldata .= '<HandicapAccessible value="'.$this->amenities1($XmlFeed->amenities,'Handicap Accessible').'" />'; 
		$xmldata .= '<ElderlyAccessible value="'.$this->amenities1($XmlFeed->amenities,'Elderly Accessible').'" />'; 
		$xmldata .= '<Children value="'.$this->amenities1($XmlFeed->amenities,'Children').'" />'; 
	$xmldata .= '</Suitability>'; 
	$xmldata .= '<Amenities> '; 
		$amenities = explode('|',$XmlFeed->amenities);
		$i=0;
		foreach($amenities as $data):
			$i=$i+1;
			$xmldata .= '<Amenity order="'.$i.'"></Amenity>'; 
		endforeach;
	$xmldata .= '</Amenities>'; 
	$xmldata .= '<Photos src_base="http://tt-prop-photos.s3.amazonaws.com/'.$XmlFeed->id.'/thumb/"> '; 
		$Gallery = Gallery::model()->findAll(array('condition'=>"prop_id='$get_values->id'",'order'=>'img_order asc'));
		$i=0;
		foreach($Gallery as $image):
			$i=$i+1;
			$xmldata .= '<Photo order="'.$i.'">'; 
				$xmldata .= '<URL>http://tt-prop-photos.s3.amazonaws.com/'.$XmlFeed->id.'/thumb/'.$image->img_url.'</URL>'; 
				$xmldata .= '<Description>'.xml_clear($image->description).'</Description>'; 
			$xmldata .= '</Photo>'; 
		endforeach;
	$xmldata .= '</Photos>'; 
	$xmldata .= '<Videos>'; 
		$xmldata .= '<Video type="youtube">'; 
			$xmldata .= '<URL> '.$XmlFeed->youtube.'</URL>'; 
			$xmldata .= '<Description> </Description>'; 
		$xmldata .= '</Video>'; 
	$xmldata .= '</Videos>'; 
	$xmldata .= '<Rates>'; 
		$xmldata .= '<DefaultRate>'; 
			$xmldata .= '<DailyRate> </DailyRate>'; 
			$xmldata .= '<WeeklyRate> </WeeklyRate>'; 
			$xmldata .= '<MonthlyRate> </MonthlyRate>'; 
			$xmldata .= '<MinimumStayLength> </MinimumStayLength>'; 
		$xmldata .= '</DefaultRate>'; 
		$Season = Season::model()->findAll(array('condition'=>"prop_id='$XmlFeed->id'"));
		foreach($Season as $data1):
			$Sdate = Sdate::model()->findAll(array('condition'=>"season_id='$data1->id'"));
			foreach($Sdate as $data2):
				$fromdate = date('Y-m-d',$data2->from_date);
				$todate = date('Y-m-d',$data2->to_date);
				$xmldata .= '<Rate>'; 
					$xmldata .= '<Label> '.$data1->name.'</Label>'; 
					$xmldata .= '<StartDate>'.$fromdate.'</StartDate>'; 
					$xmldata .= '<EndDate>'.$todate.'</EndDate>'; 
					$MinRate=Rate::model()->find(array('condition'=>"season_id='$data1->id'",'select'=>"min(price_day) as price_day,min(price_week) as price_week"));
					$MaxRate=Rate::model()->find(array('condition'=>"season_id='$data1->id'",'select'=>"max(price_day) as price_day,max(price_week) as price_week"));
					$xmldata .= '<DailyMinRate>'.$MinRate->price_day.'</DailyMinRate>'; 
					$xmldata .= '<DailyMaxRate>'.$MaxRate->price_day.'</DailyMaxRate>'; 
					$xmldata .= '<DailyWeeknightRate> </DailyWeeknightRate>'; 
					$xmldata .= '<DailyWeekendRate> </DailyWeekendRate>'; 
					$xmldata .= '<WeeknightMinRate>'.$MinRate->price_week.'</WeeknightMinRate>'; 
					$xmldata .= '<WeeknightMaxRate>'.$MaxRate->price_week.'</WeeknightMaxRate>'; 
					$xmldata .= '<WeekendMinRate> </WeekendMinRate>'; 
					$xmldata .= '<WeekendMaxRate> </WeekendMaxRate>'; 
					$xmldata .= '<WeeklyMinRate> </WeeklyMinRate>'; 
					$xmldata .= '<WeeklyMaxRate> </WeeklyMaxRate>'; 
					$xmldata .= '<MonthlyMinRate> </MonthlyMinRate>'; 
					$xmldata .= '<MonthlyMaxRate> </MonthlyMaxRate>'; 
					$xmldata .= '<MinimumStayLength> </MinimumStayLength>'; 
					$xmldata .= '<TurnDay> </TurnDay>'; 
				$xmldata .= '</Rate>'; 
			endforeach;
		endforeach;
	$xmldata .= '</Rates>'; 
	$xmldata .= '<Fees>'; 
		$xmldata .= '<Fee required="'.$fees.'">'; 
			$xmldata .= '<Name> </Name>'; 
			$xmldata .= '<Description> </Description>'; 
			$xmldata .= '<Cost type=""> </Cost>'; 
			$xmldata .= '<FeeType type="'.$feestype.'" />'; 
		$xmldata .= '</Fee>'; 
	$xmldata .= '</Fees>'; 
$xmldata .= '</Property>'; 
}
else
{
	echo 'There is no property.';
}

$FeedPartner = Feedlist::model()->findByPk($id);
$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/property.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/property.xml"));*/ header('Location: '.Yii::app()->baseUrl.'/'.$folderpath.'/property.xml'); }
?>