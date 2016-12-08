<?php $this->widget('common.components.widgets.tlbExcelView', array(
    'id'                   => 'property-grid',
    'dataProvider'         => $model->search(),
    'grid_mode'            => $production, // Same usage as EExcelView v0.33
    //'template'           => "{summary}\n{items}\n{exportbuttons}\n{pager}",
    'title'                => $_GET['export_file_name'],
    'creator'              => 'Ciao Italy Villas',
    /*'subject'              => mb_convert_encoding('Something important with a date in French: ' . utf8_encode(strftime('%e %B %Y')), 'ISO-8859-1', 'UTF-8'),
    'description'          => mb_convert_encoding('Etat de production généré à la demande par l\'administrateur (some text in French).', 'ISO-8859-1', 'UTF-8'),*/
    'lastModifiedBy'       => 'Ciao Italy Villas',
    'sheetTitle'           => 'Report on ' . date('m-d-Y H-i'),
    'keywords'             => '',
    'category'             => '',
    'landscapeDisplay'     => true, // Default: false
    'A4'                   => true, // Default: false - ie : Letter (PHPExcel default)
    'RTL'                  => false, // Default: false - since v1.1
    'pageFooterText'       => '&RThis is page no. &P of &N pages', // Default: '&RPage &P of &N'
    //'automaticSum'         => true, // Default: false
    'decimalSeparator'     => ',', // Default: '.'
    'thousandsSeparator'   => '.', // Default: ','
    //'displayZeros'       => false,
    //'zeroPlaceholder'    => '-',
    'sumLabel'             => 'Column totals:', // Default: 'Totals'
    //'borderColor'          => '00FF00', // Default: '000000'
    //'bgColor'              => 'FFFF00', // Default: 'FFFFFF'
    //'textColor'            => 'FF0000', // Default: '000000'
    'rowHeight'            => 30, // Default: 15
    'headerBorderColor'    => 'FF0000', // Default: '000000'
    'headerBgColor'        => 'CCCCCC', // Default: 'CCCCCC'
    'headerTextColor'      => '0000FF', // Default: '000000'
    'headerHeight'         => 45, // Default: 20
    'footerBorderColor'    => '0000FF', // Default: '000000'
    'footerBgColor'        => '00FFCC', // Default: 'FFFFCC'
    'footerTextColor'      => 'FF00FF', // Default: '0000FF'
    'footerHeight'         => 30, // Default: 20
    'columns'              => array(
		array('name'=>'name',
			'type'=>'raw',
			'visible'=>($_GET['id'] =='0' || $_GET['id'] =='102' || $_GET['id'] =='100' || $_GET['id'] =='101' || $_GET['id'] =='104' || $_GET['id'] =='103')?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
						'headerHtmlOptions'=>array('style'=>'width:10%'),
'value'=>
			(Yii::app()->controller->id=='bevillaowner')? 'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))':'CHtml::link($data->name,array("bevillaowner/view","id"=>$data->id))',
		    ),
			
		array('name'=>'display_name',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='0'  || $_GET['id'] =='103')?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->display_name',
		    ),
		   
		array('name'=>'email',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='0' || $_GET['id'] =='102' || $_GET['id'] =='100' || $_GET['id'] =='101' || $_GET['id'] =='104' || $_GET['id'] =='103')?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->email',
		    ),

		array('header'=>'Telephone No','name'=>'tele','visible'=>($_GET['id'] =='0' || $_GET['id'] =='102' || $_GET['id'] =='101' || $_GET['id'] =='104' || $_GET['id'] =='103')?true:false),

		 array('header'=>'Mobile No','name'=>'mobile','visible'=>($_GET['id'] =='100' || $_GET['id'] =='102' || $_GET['id'] =='104')?true:false),

		array('header'=>'Properties','name'=>'cr_ip',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='101')?true:false,
			'value'=>'get_properties($data->id)',
		    ),
			
		 array('header'=>'User Name','name'=>'mod_ip',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='101')?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'get_username($data->id)',
		    ),
		 
		 array('header'=>'Password',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='101')?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'get_password($data->id)',
		    ),	
		 array('header'=>'Latest Login','name'=>'created',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='101')?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'get_latestlogin($data->id)',
		    ),			
         array('header'=>'Last Avail',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='101')?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'get_last_avail($data->id)',
		    ),
			    
		 array('name'=>'address1','visible'=>($_GET['id'] =='0'  || $_GET['id'] =='103')?true:false),
		 
		 array('name'=>'country','visible'=>($_GET['id'] =='0' || $_GET['id'] =='100' || $_GET['id'] =='102' || $_GET['id'] =='104' || $_GET['id'] =='103')?true:false),
		 
		 array('name'=>'zip','visible'=>($_GET['id'] =='0'  || $_GET['id'] =='103')?true:false),
		 
		 array('header'=>'Reservation Details','name'=>'status',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='100' )?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'get_reservdetails($data->id)',
		    ),
		 
		 array('header'=>'Reservations','name'=>'skype',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='102' || $_GET['id'] =='104')?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'get_reservations($data->id)',
		    ),
			
		 array('name'=>'category',
			'type'=>'raw',
            'visible'=>($_GET['id'] =='0'  || $_GET['id'] =='103')?true:false,
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Category::GetName($data->category)',
		    ),
	
		
	) // an array of your CGridColumns
)); 




function get_properties($data)
{
	$properties = Pinfo::model()->find(array('select'=>'group_concat(name) as name','condition'=>"owner='".$data."'"));
    return $properties->name;
}

 function get_username($data)
{
	$user = User::model()->find(array('condition'=>"people_id='".$data."'"));
    return $user->username;
}
 function get_password($data)
{
	$user = User::model()->find(array('condition'=>"people_id='".$data."'"));
    return $user->original_password;
}

 function get_latestlogin($data)
{
	$user = User::model()->find(array('condition'=>"people_id='".$data."'"));
    return date("d-m-Y",$user->recent_login);
}
function get_reservdetails($data)
{
	$detail = Booking::model()->findAll(array('condition'=>"customer_id='".$data."'"));
	$count=count($detail);
	foreach($detail as $data)
	{
	$datas.=$data->prop_id.',';
	}if($count!=0){$value=substr($datas,0,strlen($datas)-1);}else{$value=0;}
	
	$prop_name=Pinfo::model()->find(array('select'=>'group_concat(name) as name','condition'=>"id IN($value)"));
	return $prop_name->name;
}

function get_reservations($data)
{
  if($_GET['id'] =='102')
 {
  $detail = Booking::model()->findAll(array('condition'=>"feedlist_id='TA-".$data."'"));
  }
  if($_GET['id'] =='104')
  {
  $modela=Feedlist::model()->find(array('condition'=>"people_id='".$data."'"));
  $people_id=$modela->id;
  $detail = Booking::model()->findAll(array('condition'=>"feedlist_id='FP-".$people_id."'"));
  }
  $count=count($detail);
  foreach($detail as $data)
	{
	$datas.=$data->prop_id.',';
	}if($count!=0){$value=substr($datas,0,strlen($datas)-1);}else{$value=0;}
	
	$prop_name=Pinfo::model()->find(array('select'=>'group_concat(name) as name','condition'=>"id IN($value)"));
	return $prop_name->name;
}
function get_last_avail($data)
{
	 $detail = Pinfo::model()->findAll(array('condition'=>"owner='".$data."'"));
	 $count=count($detail);
	 foreach($detail as $data)
	 { 
	  $datas.=$data->id.',';
	 }  if($count!=0){$value=substr($datas,0,strlen($datas)-1);}else{$value=0;}
	 $entry=Booking::model()->findAll(array('condition'=>"prop_id in ($value) and modified!=0",'order'=>'modified desc'));
	 foreach($entry as $avail){ $avail_date=date('d-m-Y',$avail->modified);
	 }   	
     return $avail_date;
}
?>