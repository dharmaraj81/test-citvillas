<?php $this->widget('common.components.widgets.tlbExcelView', array(
    'id'                   => 'property-grid',
    'dataProvider'         => $model->PropertySearch(),
    'grid_mode'            => $production, // Same usage as EExcelView v0.33
    //'template'           => "{summary}\n{items}\n{exportbuttons}\n{pager}",
    'title'                => $_GET['export_file_name'],
    'creator'              => 'CIT Villas',
    'subject'              => mb_convert_encoding('Something important with a date in French: ' . utf8_encode(strftime('%e %B %Y')), 'ISO-8859-1', 'UTF-8'),
    'description'          => mb_convert_encoding('Etat de production généré à la demande par l\'administrateur (some text in French).', 'ISO-8859-1', 'UTF-8'),
    'lastModifiedBy'       => 'CIT Villas',
    'sheetTitle'           => 'Report on ' . date('m-d-Y H-i'),
    'keywords'             => '',
    'category'             => '',
    'landscapeDisplay'     => true, // Default: false
    'A4'                   => true, // Default: false - ie : Letter (PHPExcel default)
    'RTL'                  => false, // Default: false - since v1.1
    'pageFooterText'       => '&RThis is page no. &P of &N pages', // Default: '&RPage &P of &N'
    'automaticSum'         => true, // Default: false
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

		array(
			'name'=>'id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->id',
		    ),
		
        array(
			'name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'CHtml::link($data->name,array("bepinfo/view","id"=>$data->id))',
		    ),
			
		array(
			'header'=>'URL',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->weburl',
		    ),
			
		array(
			'name'=>'tt_name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->tt_name',
		    ),
		
		array(
			'name'=>'town',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->townname->name',
		    ),
		
		array(
			'name'=>'province',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->provincename->name',
		    ), 
		
		array(
			'name'=>'region',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->regionname->name',
		    ), 
			
        array(
            'name'=>'sleep',
			'type'=>'raw',			
			'value'=>'$data->sleep',                   
             ),
		
		array(
            'name'=>'owner',
			'type'=>'raw',			
			'value'=>'Villaowner::model()->findByPk($data->owner)->name',                   
             ),
		
		array(
            'header'=>t('Email ID'),
			'type'=>'raw',			
			'value'=>'Villaowner::model()->findByPk($data->owner)->email',                   
             ),	

		) // an array of your CGridColumns
)); ?>