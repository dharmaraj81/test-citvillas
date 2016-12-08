
<?php
	$Properties = Pinfo::model()->findByPk($page->id); 
	
	if( isset($Properties) && count($Properties)>0 ) {
	
	 
	 	//echo $Properties->id;
		print_r($Properties->NewSeason->DatesRates);
		
		//print_r($Properties);
	 
	
	}
?>


<?php
	$PSeason = Season::model()->with(array('DatesRates'=>array('joinType'=>'INNER JOIN', 'condition'=>'DatesRates.to_date >= '.strtotime('01-01-2016').' AND status = 1', 'group'=>'DatesRates.id', 'distinct'=>true )))->findAll(array('condition'=>'prop_id = :SID','params'=>array(':SID'=>$page->id))); 

	if( isset($PSeason) && count($PSeason)==0 ) { 
		$PSeason = Season::model()->with(array('DatesRates'=>array('joinType'=>'INNER JOIN', 'condition'=>'DatesRates.to_date >= '.strtotime('01-01-2015').' AND status = 1', 'group'=>'DatesRates.id', 'distinct'=>true )))->findAll(array('condition'=>'prop_id = :SID','params'=>array(':SID'=>$page->id))); 
	}
	
	
	if( isset($PSeason) && count($PSeason)>0 ) {
	 foreach($PSeason as $ps) {
	 
	 	echo $ps->id.'   '.$ps->name.'<br>';
		print_r($ps->DatesRates);
		echo '<br>';
		//print_r($Properties);
	 }
	
	}
?>


<?php 
$sql = 'SELECT DISTINCT
	tt_season.id
	, tt_season.name
	, tt_season.stay
FROM
    `stagingc_db`.tt_season
    INNER JOIN `stagingc_db`.tt_dates_rates 
        ON (tt_season.id = tt_dates_rates.season_id) where tt_season.prop_id = "'.$page->id.'" AND tt_dates_rates.to_date > '.strtotime('01-01-2016');
		
		
		 $list = Yii::app()->db->createCommand($sql)->queryAll();

if( isset($list) && count($list)==0 ) {
$sql = 'SELECT DISTINCT
	tt_season.id
	, tt_season.name
	, tt_season.stay
FROM
    `stagingc_db`.tt_season
    INNER JOIN `stagingc_db`.tt_dates_rates 
        ON (tt_season.id = tt_dates_rates.season_id) where tt_season.prop_id = "'.$page->id.'" AND tt_dates_rates.to_date > '.strtotime('01-01-2015');
		
		
		 $list = Yii::app()->db->createCommand($sql)->queryAll();
}

		 
	 	$comm = Payment::model()->find(array(
				  	'condition'=>'uid = :UID',
					'params'=>array(':UID'=>$page->uid),
					'order'=>'id ASC'
				  ));		
		?>
<?php if($list) { ?>

<div id="dsidx-property-types">
  <h2> <?php echo t('Rental Rates in AU$ Currency for'); ?> - <?php echo $page->tt_name;?></h2>
</div>
<table class="responsive" id="dsidx-secondary-data">
  <tbody>
    <tr style="border: 0 none; margin: 0">
      <th class="table-header-bg" style="width:20%;"><?php echo t('Season Name'); ?></th>
      <th class="table-header-bg" style="width:30%;"><?php echo t('Season Dates'); ?></th>
      <th class="table-header-bg" style="width:10%;"><?php echo t('People'); ?></th>
      <th class="table-header-bg" style="width:10%;"><?php echo t('Nightly'); ?></th>
      <th class="table-header-bg" style="width:10%;"><?php echo t('Weekly'); ?></th>
      <th class="table-header-bg" style="width:10%;"><?php echo t('Minimum Stay'); ?></th>
    </tr>
    <?php $flag=0; foreach($list as $item){ ?>
    <?php if ($flag == 0 ) { ?>
    <tr>
      <td class="peak-season"><strong><?php echo $item['name']; ?></strong></td>
      <td style="padding:0px"><table style="width:100%; border: 0 none;" >
          <?php
		  	$i = 0;
		    $sds = Dates_rates::model()->findAll(array(
				'select' => 'from_date, to_date',
				'condition'=>'season_id = :SID AND status = 1',
				'params'=>array(':SID'=>$item['id']),
				'distinct'=>true,
			));
			
			
			
			if( isset($sds) && count($sds)>0 ) {
				foreach ($sds as $sd) { 
		  ?>
          <tr style="padding:0px">
            <td style="width:100%;" class="orangecolor"><?php echo date('d-M-Y',$sd->from_date); ?> - <?php echo date('d-M-Y',$sd->to_date); ?></td>
          </tr>
          <?php } } ?>
        </table></td>
      <td style="width:100%; padding:0px;" colspan="4" ><table style="border: 0 none;">
          <?php
		    $srs = Dates_rates::model()->findAll(array(
				'select'=>'t.people, t.price_week, t.price_day',
				'condition'=>'season_id = :SID AND status = 1',
				'params'=>array(':SID'=>$item['id']),
				'distinct'=>true
			
			));
			if( isset($srs) && count($srs)>0) {
				foreach ($srs as $sr) { $price = 0; $price_day=0;
		  ?>
          <tr>
            <td style="width:25%;" class="redcolor" ><?php echo ($sr->people == 0) ? '' : $sr->people; ?></td>
            <?php if ($sr->price_day!=0) { 
				  if( ($comm) && ($comm->commission>0) ) { $price_day = (($sr->price_day/Yii::app()->settings->get('currency', 'system_rate'))*(CommissionValue($comm->commission))); } else { $price_day =  $sr->price_day; } } ?>
            <td style="width:25%;" class="redcolor" ><?php if ( $price_day !=0) { echo Yii::app()->settings->get('currency', 'currency_name').' '.round($price_day,0,PHP_ROUND_HALF_UP); } $price_day = 0; ?></td>
            <?php if ($sr->price_week!=0) { 
				  if( ($comm) && ($comm->commission>0) ) { $price_week =  (($sr->price_week/Yii::app()->settings->get('currency', 'system_rate'))*(CommissionValue($comm->commission))); } else { $price_week =  $sr->price_week; } } ?>
            <td style="width:25%;" class="redcolor" ><?php if ( $price_week !=0) { echo Yii::app()->settings->get('currency', 'currency_name').' '.round($price_week,0,PHP_ROUND_HALF_UP); } ?></td>
            <td style="width:25%;" class="redcolor" ><?php echo $item['stay']; ?>&nbsp; <?php echo t('Nights'); ?></td>
          </tr>
          <?php } } ?>
        </table></td>
    </tr>
    <?php $flag=1; } else { ?>
    <tr class="secondary-row">
      <td><strong><?php echo $item['name']; ?></strong></td>
      <td style="padding:0px"><table style="width:100%; border: 0 none;">
          <?php
		  	$i = 0;
		    $sds = Dates_rates::model()->findAll(array(
				'select' => 'from_date, to_date',
				'condition'=>'season_id = :SID AND status = 1',
				'params'=>array(':SID'=>$item['id']),
				'distinct'=>true,
			));
			
			
			
			if( isset($sds) && count($sds)>0 ) {
				foreach ($sds as $sd) { 
		  ?>
          <tr style="padding:0px">
            <td style="width:100%;" class="orangecolor"><?php echo date('d-M-Y',$sd->from_date); ?> - <?php echo date('d-M-Y',$sd->to_date); ?></td>
          </tr>
          <?php } } ?>
        </table></td>
      <td style="padding:0px; width:100%;" colspan="4" ><table border="0">
          <?php
		    $srs = Dates_rates::model()->findAll(array(
				'select'=>'t.people, t.price_week, t.price_day',
				'condition'=>'season_id = :SID AND status = 1',
				'params'=>array(':SID'=>$item['id']),
				'distinct'=>true
			));
			if( isset($srs) && count($srs)>0) {
				foreach ($srs as $sr) { $price = 0;
		  ?>
          <tr>
            <td style="width:25%;" class="redcolor" ><?php echo ($sr->people == 0) ? '' : $sr->people; ?></td>
            <?php if ($sr->price_day!=0) { 
				  if( ($comm) && ($comm->commission>0) ) { $price_day =  (($sr->price_day/Yii::app()->settings->get('currency', 'system_rate'))*(CommissionValue($comm->commission))); } else { $price_day =  $sr->price_day; } } ?>
            <td style="width:25%;" class="redcolor" ><?php if ( $price_day !=0) { echo  Yii::app()->settings->get('currency', 'currency_name').' '.round($price_day,0,PHP_ROUND_HALF_UP); } $price_day = 0; ?></td>
            <?php if ($sr->price_week!=0) { 
				  if( ($comm) && ($comm->commission>0) ) { $price_week =  (($sr->price_week/Yii::app()->settings->get('currency', 'system_rate'))*(CommissionValue($comm->commission))); } else { $price_week =  $sr->price_week; } } ?>
            <td style="width:25%;" class="redcolor" ><?php if ( $price_week !=0) { echo Yii::app()->settings->get('currency', 'currency_name').' '.round($price_week,0,PHP_ROUND_HALF_UP); } ?></td>
            <td style="width:25%;" class="redcolor" ><?php echo $item['stay']; ?> &nbsp; <?php echo t('Nights'); ?></td>
          </tr>
          <?php } } ?>
        </table></td>
    </tr>
    <?php $flag=0; } ?>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
