<?php
	$PSeason = Season::model()->with(array(
		'DatesRates'=>array('select'=>'from_date, to_date', 'joinType'=>'INNER JOIN', 'condition'=>'DatesRates.to_date >= '.strtotime('01-01-2016').' AND DatesRates.status = 1', 'group'=>'DatesRates.id', 'distinct'=>true),
		'DatesRates1'=>array('select'=>'*', 'joinType'=>'INNER JOIN', 'condition'=>'DatesRates1.to_date >= '.strtotime('01-01-2016').' AND DatesRates1.status = 1', 'group'=>'DatesRates1.id', 'distinct'=>true)
		))->findAll(array('condition'=>'prop_id = :SID AND t.status = 1','params'=>array(':SID'=>$page->id))); 

	if( isset($PSeason) && count($PSeason)==0 ) { 
		$PSeason = Season::model()->with(array('DatesRates'=>array('joinType'=>'INNER JOIN', 'condition'=>'DatesRates.to_date >= '.strtotime('01-01-2015').' AND DatesRates.status = 1', 'group'=>'DatesRates.id', 'distinct'=>true )))->findAll(array('condition'=>'prop_id = :SID','params'=>array(':SID'=>$page->id))); 
	}
?>

<?php
	 	$comm = Payment::model()->find(array(
				  	'condition'=>'uid = :UID',
					'params'=>array(':UID'=>$page->uid),
					'order'=>'id ASC'
				  ));		
		?>
<?php if( isset($PSeason) && count($PSeason)>0 ) { ?>

<div id="dsidx-property-types">
  <h2> <?php echo t('Rental Rates in '.Yii::app()->session['currency'].' Currency for'); ?> - <?php echo $page->tt_name;?></h2>
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
    <?php $flag=1; foreach($PSeason as $ps){ ?>
   
    <tr <?php echo ($flag == 1 )?"":"class=secondary-row"; ?> >
      <td class="peak-season"><strong><?php echo $ps->name; ?></strong></td>
      <td style="padding:0px"><table style="width:100%; border: 0 none;" >
         <?php
			if( isset($ps->DatesRates) && count($ps->DatesRates)>0 ) {
				foreach ($ps->DatesRates as $sd) { 
		  ?>
          <tr style="padding:0px">
            <td style="width:100%;" class="orangecolor"><?php echo date('d-M-Y',$sd->from_date); ?> - <?php echo date('d-M-Y',$sd->to_date); ?></td>
          </tr>
          <?php } } ?>
        </table></td>
      <td style="width:100%; padding:0px;" colspan="4" ><table style="border: 0 none;">
          <?php
		   
			if( isset($ps->DatesRates1) && count($ps->DatesRates1)>0 ) {
				foreach ($ps->DatesRates1 as $sr) {  $price = 0; $price_day=0; $SiteComm = 0;
					if( $ps->commission != 0 ) 
					  { $SiteComm = $ps->commission; } else if( ($comm) && ($comm->commission>0) ) { $SiteComm = $comm->commission;  }
		  ?>
          <tr>
            <td style="width:25%;" class="redcolor" ><?php echo ($sr->people == 0) ? '' : $sr->people; ?></td>
            <td style="width:25%;" class="redcolor" ><?php if ( $sr->nightlyprice !=0) { echo Yii::app()->session['currency'].' '.round($sr->nightlyprice,0,PHP_ROUND_HALF_UP); } ?></td>
            <td style="width:25%;" class="redcolor" ><?php if ( $sr->weeklyprice !=0) { echo Yii::app()->session['currency'].' '.round($sr->weeklyprice,0,PHP_ROUND_HALF_UP); } ?></td>
            <td style="width:25%;" class="redcolor" ><?php echo $ps->stay; ?>&nbsp; <?php echo t('Nights'); ?></td>
          </tr>
          <?php } } ?>
        </table></td>
    </tr>
    <?php $flag = $flag*(-1); } ?>
  </tbody>
</table>
<?php } ?>
