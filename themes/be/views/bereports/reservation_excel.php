<?php $this->widget('common.components.widgets.tlbExcelView', array(
    'id'                   => 'booking-grid',
    'dataProvider'         => $model->BookingSearch(),
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
    //'pageFooterText'       => '&RThis is page no. &P of &N pages', // Default: '&RPage &P of &N'
    'automaticSum'         => true, // Default: false
    'decimalSeparator'     => ',', // Default: '.'
    'thousandsSeparator'   => '.', // Default: ','
    //'displayZeros'       => false,
    //'zeroPlaceholder'    => '-',
    //'sumLabel'             => 'Column totals:', // Default: 'Totals'
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

		array(
			'name'=>'id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->id',
		    ),

		array(
			'name'=>'booking_id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->booking_id',
		    ),

		array(
			'name'=>'prop_id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->Pinfo->tt_name',
		    ),

		array(
			'name'=>'customer_id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->Villaowner->name',
		    ),

		array(
			'name'=>'fdate',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'date("d-m-Y",$data->fdate)',
		    ),

		array(
			'name'=>'tdate',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'date("d-m-Y",$data->tdate)',
		    ),

		array(
			'name'=>'peoples',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->peoples',
		    ),

		/*array(
			'name'=>'adults',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->adults',
		    ),

		array(
			'name'=>'children',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->children',
		    ),

		array(
			'name'=>'infants',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->infants',
		    ),*/

		array(
			'name'=>'bsource',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'($data->bsource==3)?"Blocked":(($data->bsource==4)?"Not Available":(($data->bsource==5)?"Unblock / Available":""))',
		    ),

		array(
			'name'=>'confirm',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'($data->confirm==1)?"Confirmed":"not Confirmed"',
		    ),

		) // an array of your CGridColumns
)); ?>