<?php
ini_set("memory_limit",-1);
$xmldata = '<?xml version="1.0" encoding="UTF-8" ?>';
$xmldata .= '<Facilities>';
	$Amenitiestype = Amenitiestype::model()->findAll(array('condition'=>"status='1'"));
	foreach($Amenitiestype as $data)
	{
		$xmldata .= '<Facility ID="'.$data->id.'">';
			$xmldata .= '<Name>'.xml_clear($data->name).'</Name>';
			$xmldata .= '<Country> </Country>';
			$xmldata .= '<Region> </Region>';
			$xmldata .= '<Subregion> </Subregion>';
			$xmldata .= '<City> </City>';
			$xmldata .= '<CityPosition>';
			$xmldata .= '<Latitude> </Latitude>';
			$xmldata .= '<Longitude> </Longitude>';
			$xmldata .= '</CityPosition>';
			$xmldata .= '<District> </District>';
			$xmldata .= '<Descriptions>';
				$xmldata .= '<Description Language="'.$data->language->lang_name.'">';
					$xmldata .= xml_clear($data->description);
				$xmldata .= '</Description>';
			$xmldata .= '</Descriptions>';
			$xmldata .= '<Objects> ';
			$Amenities = Amenities::model()->findAll(array('select'=>"id",'condition'=>"source='$data->id'"));
			$amenities_arr = array();
			foreach($Amenities as $data1):
				$amenities_arr[] = $data1->id;
			endforeach;
			if(count($amenities_arr)>0)
			{
				$Pinfo = Pinfo::model()->findAll(array('condition'=>"status='1' AND mstatus='1' AND feedlist like '%$id%'"));
				foreach($Pinfo as $data2)
				{
					if($data2->amenities!='')
					{
						$i=0;
						$features = array();
						$exist_amenities = explode('|',$data2->amenities);
						foreach($exist_amenities as $data3):
						if(in_array($data3,$amenities_arr)){ $i++; $features[] = $data3; }
						endforeach;
						if($i>0)
						{
							$apartment = '';
							$exist_type = strtolower($data2->Type->name);
							if(strpos($exist_type, "apartment")===true) $apartment = 0;
							else if(strpos($exist_type, "house")===true) $apartment = 1;
							else if(strpos($exist_type, "mobile home")===true) $apartment = 2;
							else if(strpos($exist_type, "tent")===true) $apartment = 4;
							
							$Gps = Gps::model()->find(array('condition'=>"uid='$data2->uid'"));
						
							$xmldata .= '<Object ID="'.$data->id.'/'.$data2->id.'">';
							$xmldata .= '<Type>'.$apartment.'</Type>';
							$xmldata .= '<Persons> </Persons>';
							$xmldata .= '<Children> </Children>';
							$xmldata .= '<Pets> </Pets>';
							$xmldata .= '<Rooms>'.$data2->bedroom.'</Rooms>';
							$xmldata .= '<Bedrooms>'.$data2->bedroom.'</Bedrooms>';
							$xmldata .= '<Bathrooms>'.$data2->bathroom.'</Bathrooms>';
							$xmldata .= '<Size>'.$data2->size.'</Size>';
							$xmldata .= '<Stars> </Stars>';
							$xmldata .= '<ArrivalDays>YYYYYYY</ArrivalDays>';
							$xmldata .= '<MinOccupancy> </MinOccupancy>';
							$xmldata .= '<MinStay> </MinStay>';
							$xmldata .= '<Descriptions> ';
								$xmldata .= '<Description Language="'.$data2->language->lang_name.'">';
									$xmldata .= xml_clear($data2->content1);
								$xmldata .= '</Description>';
								$xmldata .= '<Description Language="'.$data2->language->lang_name.'">';
									$xmldata .= xml_clear($data2->content2);
								$xmldata .= '</Description>';
							$xmldata .= '</Descriptions>';
							$xmldata .= '<AddInfos>';
								$xmldata .= '<AddInfo Language="'.$data2->language->lang_name.'">';
									$xmldata .= xml_clear($data2->extra_cost);
								$xmldata .= '</AddInfo>';
							$xmldata .= '</AddInfos>';
							$xmldata .= '<Position>';
								$xmldata .= '<Street> '.$data2->address1.'</Street>';
								$xmldata .= '<ZipCode> '.$data2->zip.'</ZipCode>';
								$xmldata .= '<City> '.$data2->Town->name.'</City>';
								$xmldata .= '<Longitude> '.$Gps->longitude.'</Longitude>';
								$xmldata .= '<Latitude> '.$Gps->latitude.'</Latitude>';
							$xmldata .= '</Position>';
							$xmldata .= '<Features> ';
							foreach($features as $data4)
							{
								$featuresdetail = Amenities::model()->find(array('condition'=>"id='$data4'"));
								$xmldata .= '<Feature Code="'.$featuresdetail->uid.'">';
									$xmldata .= '<Value>1</Value>';
									$xmldata .= '<Details>';
										$xmldata .= '<Detail Language="'.$featuresdetail->language->lang_name.'">';
											$xmldata .= xml_clear($featuresdetail->content);
										$xmldata .= '</Detail>';
									$xmldata .= '</Details>';
								$xmldata .= '</Feature>';
							}
							$xmldata .= '</Features>';
							$xmldata .= '<Pictures>';
							$Gallery = Gallery::model()->findAll(array('condition'=>"prop_id='$data2->id'",'order'=>'img_order asc'));
							foreach($Gallery as $image)
							{
								$xmldata .= '<Picture>';
									$xmldata .= '<URL><![CDATA[ http://tt-prop-photos.s3.amazonaws.com/'.$data2->id.'/thumb/'.$image->img_url.' ]]></URL>';
									$xmldata .= '<Descriptions>';
										$xmldata .= '<Description Language="en">';
											$xmldata .= xml_clear($image->description);
										$xmldata .= '</Description>';
									$xmldata .= '</Descriptions>';
								$xmldata .= '</Picture>';
							}
							$xmldata .= '</Pictures>';
							$xmldata .= '<DirectLink>';
								$xmldata .= '<![CDATA[ '.GetPropertyURL($data2->id).' ]]>';
							$xmldata .= '</DirectLink>';
						$xmldata .= '</Object>';
					}
				}
			}
		}
		$xmldata .= '</Objects>';
	$xmldata .= '</Facility>';
}
$xmldata .= '</Facilities>';

$FeedPartner = Feedlist::model()->findByPk($id);
$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);
if (!file_exists($folderpath)) mkdir($folderpath,0777);
if(file_put_contents($folderpath.'/features.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/features.xml"));*/ echo $folderpath.'/features.xml file created successfully'; }
?>