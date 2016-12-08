<?php
$Feedlist = Feedlist::model()->findAll();
foreach($Feedlist as $datas):
	$xmldata = '';
	switch(strtoupper($datas->name))
	{
		case 'CASMUNDO':
			$Pinfo=Pinfo::model()->findAll(array('select'=>'id,extra_cost'));
			$xmldata = '<?xml version="1.0" encoding="windows-1251"?>'; 
			$xmldata .= '<extras>';
			foreach ($Pinfo as $data)
			{
				$xmldata .= '<lodging id="'.$data->id.'">';
				$xmldata .= '<extra name="Final cleaning" type="CLEANING" mandatory="true" inclusive="false">';
				$xmldata .= '<restrictions>';
				$xmldata .= '<persons min="2" max="5"/>';
				$xmldata .= '</restrictions>';
				$xmldata .= '<price paid_on_spot="true">';
				$xmldata .= '<interval>NONE</interval>';
				$xmldata .= '<unit>PERSON</unit>';
				$xmldata .= '<amount min_total="80">'.$data->extra_cost.'</amount>';
				$xmldata .= '</price>';
				$xmldata .= '<descriptions>';
				$xmldata .= '<summary>Final cleaning: C20.00 per person, with C80.00 minimum for all.';
				$xmldata .= '</summary>';
				$xmldata .= '</descriptions>';
				$xmldata .= '</extra>';
				$xmldata .= '</lodging>';
			}
			$xmldata .= '</extras>';
			break;
	}

	$folderpath = '../resources/feeds/'.$datas->name;
	if (!file_exists($folderpath)) 
	{
    	mkdir($folderpath,0777);
	}
	if(file_put_contents($folderpath.'/extras.xml',$xmldata)){ echo "resourses/feeds/".$datas->name."/extras.xml file created on project root folder..<br>"; }

endforeach;
?>