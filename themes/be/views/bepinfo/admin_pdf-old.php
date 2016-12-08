<?php
 	if(YII_DEBUG)
    	$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
	else 
		$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php  echo $layout_asset; ?>/pdf/default-styles.css" type="text/css" rel="stylesheet" />
<title>CIT Europe Pty Ltd</title>
</head>

<body>
<div id="tt_wrapper-content" style="height:850px!important; overflow:hidden!important;">
  
  <h1 class="tt_intro-heading"><?php echo $model->tt_name;?></h1>
  <div class="tt_intro" style=" height:170px; overflow:hidden; margin-left:15px; margin-right:15px;"> <?php echo substr($model->content1,0,500);?> </div>
</div>


<div id="tt_wrapper-content" style="height:850px!important; overflow:hidden!important;">
  <div id="tt_p2-left-column">
    <h1>Information</h1>
    <h3>Location</h3>
    <div style="padding-top:-15px">
      <div style="background-color:#E7CF92;" >
        <ul>
          <li><?php echo Plocation::GetName($model->location); ?></li>
        </ul>
      </div>
    </div>
    <h3>Bedrooms</h3>
    <div style="padding-top:-15px">
      <div style="background-color:#E7CF92;" >
        <ul>
          <?php if($model->sleep>0){?>
          <li>Sleeps: <?php echo $model->sleep;?></li>
          <?php } ?>
          <?php if($model->bedroom>0){?>
          <li>Bedrooms: <?php echo $model->bedroom;?></li>
          <?php } ?>
          <?php if($model->mbed>0){?>
          <!--<li>Double Rooms: <?php //echo $model->mbed;?></li>-->
          <?php } ?>
          <?php if($model->tbed>0){?>
          <li>Twin Rooms: <?php echo $model->tbed;?></li>
          <?php } ?>
          <?php if($model->msbed>0){?>
          <li>Single Rooms: <?php echo $model->msbed;?></li>
          <?php } ?>
          <?php if($model->ssbed>0){?>
          <li>Sofa Beds: <?php echo $model->ssbed;?></li>
          <?php } ?>
          <?php if($model->sleep>0){?>
          <!--<li>Extra Beds: <?php //echo $model->sleep;?></li>-->
          <?php } ?>
        </ul>
      </div>
    </div>
    <h3>Bathrooms</h3>
    <div style="padding-top:-15px">
      <div style="background-color:#E7CF92;" >
        <ul>
          <?php if($model->bathroom>0){?>
          <li>Total Bathrooms: <?php echo $model->bathroom;?></li>
          <?php } ?>
          <?php if($model->bathwtub>0){?>
          <li>Bathrooms with Tub: <?php echo $model->bathwtub;?></li>
          <?php } ?>
          <?php if($model->bathwts>0){?>
          <li>Bathrooms with Shower: <?php echo $model->bathwts;?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <h3>Location and Facilities</h3>
    <div style="padding-top:-15px">
      <div style="background-color:#E7CF92;" >
        <ul>
          <?php if(Town::GetName($model->town)!=''){?>
          <li>Town Places: <?php echo Town::GetName($model->town);?></li>
          <?php } ?>
          <?php if($model->address1!=''){?>
          <li>Area: <?php echo $model->address1;?></li>
          <?php } ?>
          <?php if(Countrylist::GetName(Country::GetName($model->country))!=''){?>
          <li>Country: <?php echo Countrylist::GetName(Country::GetName($model->country));?></li>
          <?php } ?>
          <?php if(Type::GetName($model->ptype)!=''){?>
          <li>Property Type: <?php echo Type::GetName($model->ptype); ?></li>
          <?php } ?>
          <?php if(Province::GetName($model->province)!=''){?>
          <li>Surface Area: <?php echo Province::GetName($model->province);?></li>
          <?php } ?>
          <?php if($model->view>0){?>
          <li>Property View: <?php echo $model->view;?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <div id="tt_p2-right-column">
    <div class="tt_p2-feature-image">
      <?php 	$model2=Gallery::model()->findBySql("SELECT * FROM  `tt_gallery` WHERE  `prop_id` =  '$model->id' LIMIT 1,1");?>
      <img src="http://tt-prop-photos.s3.amazonaws.com/<?php echo $model->id;?>/fullsize/<?php echo $model2->img_url;?>" width="554px" height="390px"/></div>
    <h3>Features &amp; Accessories</h3>
    <table>
      <tr>
        <?php $ammenties_array=explode('|',$model->amenities); 
		  $amtt_array=array('1001','1007','1012','1017','1024','1029','1035','1042','1048','1055','1065','1070','1075','1092','1097','1103','1109','1114','1119','1125','1132','1137','1142','1147','1152','1157','1162','1167','1172','1177','1182','1187','1192','1197','1202','1207','1212','1217','1222','1242','1247','1252','1257','1262','1267','1272','1277','1282','1287','1292','1297','1302','1307','1312','1317','1322','1327','1332','1337','1342','1347','1352','1357','1362','1367','1372','1377','1382','1387','1392','1397','1402','1407','1412','1413','1414','1415');
		  $i=0; $count=count($ammenties_array);if($count>36){$inc=3;}else{$inc=2;}
		 if(!empty($ammenties_array))
		 {
			 foreach($amtt_array as $amant_value)
			 {
				 if(in_array($amant_value, $ammenties_array)) 
				 {$i=$i+1;
				 $amenities = Amenities::model()->find(array('condition'=>"id='$amant_value'"));
				 ?>
        <td><ul>
            <li><?php echo $amenities->name;?></li>
          </ul></td>
        <?php }  if($i==$inc){ echo '</tr><tr>'; $i=0;} } 
		 } 
?>
      </tr>
    </table>
  </div>
</div>
<?php 
	$sql = 'SELECT DISTINCT
	tt_season.id
	, tt_season.name
	, tt_season.stay
FROM
    `ciaosite_db`.tt_season
    INNER JOIN `ciaosite_db`.tt_dates_rates 
        ON (tt_season.id = tt_dates_rates.season_id) where tt_season.prop_id = "'.$model->id.'" AND tt_dates_rates.to_date > '.time();
		
		
		 $list= Yii::app()->db->createCommand($sql)->queryAll();
		 $comm = Payment::model()->find(array(
				  	'condition'=>'uid = :UID',
					'params'=>array(':UID'=>$model->uid),
					'order'=>'id ASC'
				  ));	
				  
		$Acost = Additionalcost::model()->findAll(array(
			'condition'=>'prop_id = :PID AND status = 1 AND year = :YR',
			'params'=>array(':PID' => $model->id, ':YR'=>date('Y',time()) ),
			'order'=> 'name ASC'
		));	
		
		 $Oservice = Otherservices::model()->findAll(array(
											'condition'=>'prop_id = :PID AND status = 1 AND year = :YR',
											'params'=>array(':PID' => $model->id, ':YR'=>date('Y',time()) ),
											'order'=> 'name ASC'
										));
       $Acost = Additionalcost::model()->findAll(array(
											'condition'=>'prop_id = :PID AND status = 1 AND year = :YR',
											'params'=>array(':PID' => $model->id, ':YR'=>date('Y',time()) ),
											'order'=> 'name ASC'
										));
																	 	  
		 ?>
<?php 
		 if(!(user()->isAgent)){
		 if(count($list)>0 || count($Acost)>0 || count($Oservice)>0 )
		 { ?>
<div id="tt_wrapper-content" style="height:850px!important; overflow:hidden!important;">
  <div id="tt_p2-center-column">
    <?php if($list) { ?>
    <h3>Rates</h3>
    <table width="95%" align="center">
      <tr class="tr_bg">
        <td align="center">Season Name</td>
        <td align="center">Season Dates</td>
        <td align="center">People</td>
        <td align="center">Nightly</td>
        <td align="center">Weekly</td>
        <td align="center">Minimum Stay</td>
      </tr>
      <?php foreach($list as $item){ ?>
      <tr>
        <td  width="145" align="center"><strong><?php echo $item['name']; ?></strong></td>
        <td style="padding:0px"><table width="345" border="0">
            <?php
		  	$i = 0;
		    $sds = Dates_rates::model()->findAll(array(
				'condition'=>'season_id = :SID AND status = 1',
				'params'=>array(':SID'=>$item['id'])
			
			));
			if( isset($sds) && count($sds)>0 ) {
				foreach ($sds as $sd) { 
		  ?>
            <tr style="padding:0px">
              <td width="80" align="center"><?php echo date('d-M-Y',$sd->from_date); ?> - <?php echo date('d-M-Y',$sd->to_date); ?></td>
            </tr>
            <?php } } ?>
          </table></td>
        <td style="padding:0px" colspan="4"><table border="0">
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
              <td width="17" align="center"><?php echo ($sr->people == 0) ? '' : $sr->people; ?></td>
              <?php if ($sr->price_day!=0) { 
				  if( ($comm) && ($comm->commission>0) ) { $price_day =  $sr->price_day + ($sr->price_day*($comm->commission/100)); } else { $price_day =  $sr->price_day; } } ?>
              <td width="104" align="center"><?php if ( $price_day !=0) { echo '&euro; '.round($price_day,0,PHP_ROUND_HALF_UP); } $price_day = 0; ?></td>
              <?php if ($sr->price_week!=0) { 
				  if( ($comm) && ($comm->commission>0) ) { $price_week =  $sr->price_week + ($sr->price_week*($comm->commission/100)); } else { $price_week =  $sr->price_week; } } ?>
              <td width="68" align="center"><?php if ( $price_week !=0) { echo '&euro; '.round($price_week,0,PHP_ROUND_HALF_UP); } ?></td>
              <td width="120" align="center"><?php echo $item['stay']; ?></td>
            </tr>
            <?php } } ?>
          </table></td>
      </tr>
      <?php } ?>
    </table>
    <?php } ?>
    <?php
   if ( isset ($Acost) && count($Acost)>0 ) { 
		?>
    <h3>Additional Costs</h3>
    <ul>
      <?php foreach ($Acost as $a) { 
														
														  echo '<li>';
														  
														  if (Additional::GetLangName($a->name)=='None') { echo $a->name; } else { echo Additional::GetLangName($a->name); }
														  
														  if($a->cost != '0' ) { 
														  
														     
														     echo '&nbsp;'.'<span>'.$a->cost.' Euro </span>';
														  }
														  
														  echo '<span>'.$a->comment.'</span> </li>';
														}
														?>
    </ul>
    <?php } ?>
    <?php
 
										
										if ( isset ($Oservice) && count($Oservice)>0 ) { 
										?>
    <h3>Other services</h3>
    <ul>
      <?php foreach ($Oservice as $o) { 
														
														 // echo '<li>'.$o->name;
														  
														   echo '<li>';
														  
														  if (Additional::GetLangName($o->name)=='None') { echo '<span style="font-size:14px">'.$o->name.'</span>'; } else { echo '<span style="font-size:14px">'.Additional::GetLangName($o->name).'</span>'; }
														 
														  
														  
														  if($o->cost != '0' ) { 
														   
														     echo '&nbsp;'.'<span style="font-size:14px">'.$o->cost.' Euro </span>';
														  } else { echo '&nbsp;'.'<span style="font-size:14px"> Included </span>'; }
														  echo '&nbsp;'.'<span style="font-size:14px">'.$o->comment.'</span> </li>';
														}
														?>
    </ul>
    <?php }?>
  </div>
</div>
<?php } }?>
<?php 
  $photos = Gallery::model()->findAll(array(
  	'condition'=>'prop_id='.$model->id,
  	'order' => 'img_order ASC','limit'=>12
  ));
  if($photos) {
  ?>
<div id="tt_wrapper-content" align="center" style="height:850px!important; overflow:hidden!important;">
  <table width="85%" align="center">
    <tr>
      <?php $i=0;foreach ($photos as $ph) { $i=$i+1; ?>
      <td><img src="<?php echo Gallery::GetThumbnail($ph); ?>"/></td>
      <?php if($i==3){ $i=0; echo '</tr><tr>'; } } ?>
    </tr>
  </table>
  <?php } ?>
</div>
<script>function date() {
alert();}

this.zoom=100;

</script>