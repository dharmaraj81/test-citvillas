<?php
ini_set("memory_limit",-1);
$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
$xmldata .= '<Objects>';
foreach($XmlFeed as $data)
{
	$xmldata .= '<Object ID="'.$data->id.'">';
		$xmldata .= '<Vacancy>';
			$xmldata .= '<StartDate>'.date('Y-m-').'01</StartDate>';
			$xmldata .= '<Vacancy>'.vacancy($data->id).'</Vacancy>';
		$xmldata .= '</Vacancy>';
		$xmldata .= '<Prices> ';
		$Season = Season::model()->findAll(array('select'=>'id','condition'=>"prop_id='$data->id'"));
		foreach($Season as $data1):
			$Sdate = Sdate::model()->findAll(array('condition'=>"season_id='$data1->id'"));
			foreach($Sdate as $data2):
				$fromdate = date('Y-m-d',$data2->from_date);
				$todate = date('Y-m-d',$data2->to_date);
				$Rate=Rate::model()->findAll(array('condition'=>"season_id='$data1->id'"));
				foreach($Rate as $data3):
					$xmldata .= '<Price Type="ta" DateFrom="'.$fromdate.'" DateTo="'.$todate.'" Persons="'.$data3->people.'">';
						$xmldata .= '<Price>'.$data3->price_day.'</Price>';
						$xmldata .= '<AddPersonPrice> </AddPersonPrice>';
						$xmldata .= '<PerPerson>'.$data3->people.'</PerPerson>';
						$xmldata .= '<Reduction2ndWeek> </Reduction2ndWeek>';
					$xmldata .= '</Price>';
				endforeach;
			endforeach;
		endforeach;
		$Season = Season::model()->findAll(array('select'=>'id','condition'=>"prop_id='$data->id'"));
		foreach($Season as $data4):
			$Sdate = Sdate::model()->findAll(array('condition'=>"season_id='$data4->id'"));
			foreach($Sdate as $data5):
				$fromdate = date('Y-m-d',$data5->from_date);
				$todate = date('Y-m-d',$data5->to_date);
				$Rate=Rate::model()->findAll(array('condition'=>"season_id='$data4->id'"));
				foreach($Rate as $data6):
					$xmldata .= '<Price Type="wo" DateFrom="'.$fromdate.'" DateTo="'.$todate.'" Persons="'.$data6->people.'">';
						$xmldata .= '<Price>'.$data6->price_week.'</Price>';
						$xmldata .= '<AddPersonPrice> </AddPersonPrice>';
						$xmldata .= '<PerPerson>'.$data6->people.'</PerPerson>';
						$xmldata .= '<Reduction2ndWeek> </Reduction2ndWeek>';
					$xmldata .= '</Price>';
				endforeach;
			endforeach;
		endforeach;
		$xmldata .= '</Prices>';
		$xmldata .= '<SpecialPeriods> ';
		$xmldata .= '</SpecialPeriods>';
		$xmldata .= '<SpecialOffers> ';
		$Soffer=Soffer::model()->findAll(array('condition'=>"prop_id='$data->id'"));
		foreach($Soffer as $data7):
			$fromdate = date('Y-m-d',$data7->from_date);
			$todate = date('Y-m-d',$data7->to_date);
			$xmldata .= '<SpecialOffer Type="lm" ValidFrom="'.$fromdate.'" ValidTo="'.$todate.'">';
				$xmldata .= '<DateFrom> </DateFrom>';
				$xmldata .= '<DateTo> </DateTo>';
				$xmldata .= '<FromDays> </FromDays>';
				$xmldata .= '<ToDays> </ToDays>';
				$xmldata .= '<xDays> </xDays>';
				$xmldata .= '<yDays> </yDays>';
				$xmldata .= '<DurationType>ko</DurationType>';
				$xmldata .= '<MinStay> </MinStay>';
				$xmldata .= '<MaxStay> </MaxStay>';
				$xmldata .= '<PerPerson> </PerPerson>';
				$xmldata .= '<Price> </Price>';
				$xmldata .= '<Discount> </Discount>';
				$xmldata .= '<Percent> </Percent>';
			$xmldata .= '</SpecialOffer>';
		endforeach;
		$xmldata .= '</SpecialOffers>';
		$xmldata .= '<ObjInfos> ';
		$xmldata .= '</ObjInfos>';
		$xmldata .= '<SideCosts> ';
		$xmldata .= '</SideCosts>';
	$xmldata .= '</Object>';
}
$xmldata .= '</Objects>';

$FeedPartner = Feedlist::model()->findByPk($id);
$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/price.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/price.xml"));*/ echo $folderpath.'/price.xml file created successfully'; }

function vacancy($id)
{
	$vacancy = '';
	$num_of_days = date('t');    
	for( $i=1; $i<= $num_of_days; $i++)
	{
	 	$dates= date('Y') . "-". date('m'). "-". str_pad($i,2,'0', STR_PAD_LEFT); 
		$Booking = Booking::model()->count(array('condition'=>"prop_id='$id' and DATE_FORMAT(FROM_UNIXTIME(fdate),'%d-%m-%Y')<='$dates' and DATE_FORMAT(FROM_UNIXTIME(tdate),'%d-%m-%Y')>='$dates'"));
		if($Booking>0) $vacancy.='N'; else $vacancy.='Y';
	}
	return $vacancy;
}
?>