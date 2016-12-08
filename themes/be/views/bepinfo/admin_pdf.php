<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);

?>

<!DOCTYPE html>

<!--[if lt IE 7 ]><html class="ie ie6" lang="en-US"><![endif]-->

<!--[if IE 7 ]><html class="ie ie7" lang="en-US"><![endif]-->

<!--[if IE 8 ]><html class="ie ie8" lang="en-US"><![endif]-->

<!--[if (gte IE 9)|!(IE)]><html lang="en-US"><![endif]-->

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Ciao Italy Villas - provider of memorable vacation properties  in the Tuscan region.  We will help you to find the perfect Tuscany villa" />
<meta name="keywords" content="Travel, Tuscany" />
<title>Tuscany villa rental, Tuscany villa - CitVillas</title>

<!--[if lte IE 7]>

<link rel='stylesheet' id='ie-css'  href='/assets/cde22ce1'/css/ie.min.css?ver=4.1.2' type='text/css' media='all' />

<![endif]-->

</head>

<body>
<div id="wrapper">
  <section id="main-content">
    <div class="container thin_border">
      <h2 style="text-align:center;"><?php echo $model->tt_name;?></h2>
      <h3 style="text-align:center;"> <?php echo Town::GetName($model->town).', '.Region::GetName($model->region); ?> </h3>
      <h4 style="text-align:center;">
        <?php if($model->bedroom!=0) { ?>
        <?php echo ($model->bedroom!=0) ? $model->bedroom.' Bedrooms' : ''; ?>
        <?php } ?>
        <?php if($model->bathroom!=0) { ?>
        <?php echo ($model->bathroom!=0) ? ' | '.$model->bathroom.' Bathrooms' : ''; ?>
        <?php } ?>
        <?php if($model->sleep!=0) { ?>
        <?php echo ($model->sleep!=0) ? ' | Total Sleeps : '. $model->sleep : ''; ?>
        <?php } ?>
        <?php if($model->size!=0) { ?>
        <?php echo ($model->size!=0) ? ' | '. $model->size.' Sq Mt' : ''; ?>
        <?php } ?>
      </h4>
      
       <?php 
			$Clink = Clink::model()->findAll(array('condition'=>'status = 1'));
			
			if( isset($Clink) && count($Clink)>0 ) { 
			 
			  $Ltitle = array(); $Lanchor = array(); $Lurl = array(); 
				
			  foreach ($Clink as $c) 
			  { 
			  	$Ltitle[] = $c->title;
				$Lanchor[] = $c->anchor;
				$Lurl[] = '<a href="'.$c->url.'" title="'.$c->title.'" target="_blank" >'.$c->anchor.'</a>';
			  }
			}
		?>
        
          <p align="justify" style="text-align:justify;"><?php echo str_replace($Lanchor,$Lurl, strip_tags($model->content1,'<br><p><b>')); ?></p>
      

    </div>
    <!-- <pagebreak /> -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="58%"><?php echo t('Additional Cost'); ?> </th>
        <th width="4%">&nbsp; </th>
        <th width="38%"><?php echo t('Other Services'); ?> </th>
      </tr>
      <tr>
        <td colspan="3"><hr></td>
      </tr>
      <tr>
        <td><?php
										$Acost = Additionalcost::model()->findAll(array(
											'condition'=>'prop_id = :PID AND status = 1 AND year = :YR3',
											'params'=>array(':PID' => $model->id, ':YR3'=>2016 ),
											'order'=> 'year ASC'
										)); 
										
										if ( isset ($Acost) && count($Acost)==0 ) { 
										$Acost = Additionalcost::model()->findAll(array(
											'condition'=>'prop_id = :PID AND status = 1 AND year = :YR3',
											'params'=>array(':PID' => $model->id, ':YR3'=>2016 ),
											'order'=> 'year ASC'
										)); 
										}
										
										if ( isset ($Acost) && count($Acost)>0 ) { 
										?>
          <ul>
            <?php foreach ($Acost as $a) { 
														
														  echo '<li>';
														  
														  if (Additional::GetLangName($a->name)=='None') { echo $a->name; } else { echo $a->year.' '. Additional::GetLangName($a->name); }
														  
														  if($a->cost != '0' ) { 
														  
														     
														     echo '&nbsp;<span>'.$a->cost.' Euro </span>';
														  }
														  
														  echo '&nbsp;<span>'.$a->comment.'</span> </li>';
														}
														?>
          </ul>
          <?php } else { ?>
          <ul>
            <li> ---- </li>
          </ul>
          <?php } ?></td>
        <td>&nbsp;</td>
        <td><?php
  $Oservice = Otherservices::model()->findAll(array(
											'condition'=>'prop_id = :PID AND status = 1 AND year = :YR4',
											'params'=>array(':PID' => $model->id, ':YR4'=>2016 ),
											'order'=> 'name ASC'
										)); 
										
										if ( isset ($Oservice) && count($Oservice)==0 ) { 
										 $Oservice = Otherservices::model()->findAll(array(
											'condition'=>'prop_id = :PID AND status = 1 AND year = :YR4',
											'params'=>array(':PID' => $model->id, ':YR4'=>2016 ),
											'order'=> 'name ASC'
										)); 
										
										}
										if ( isset ($Oservice) && count($Oservice)>0 ) { 
										?>
          <ul>
            <?php foreach ($Oservice as $o) { 
														
														 // echo '<li>'.$o->name;
														  
														   echo '<li>';
														  
														  if (Additional::GetLangName($o->name)=='None') { echo $o->name; } else { echo $o->year .' '. Additional::GetLangName($o->name); }
														 
														  
														  
														  if($o->cost != '0' ) { 
														   
														     echo '&nbsp;<span>'.$o->cost.' Euro </span>';
														  } else { echo '&nbsp;<span> Included </span>'; }
														  echo '&nbsp;<span>'.$o->comment.'</span> </li>';
														}
														?>
          </ul>
          <?php } else { ?>
          <ul>
            <li> ---- </li>
          </ul>
          <?php } ?></td>
      </tr>
      <tr>
        <td colspan="3"><hr></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <!--
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="58%"><?php echo t('Bedrooms'); ?></th>
        <th width="4%">&nbsp;</th>
        <th width="38%"><?php echo t('Bathrooms'); ?></th>
      </tr>
      <tr>
        <td colspan="3"><hr></td>
      </tr>
      <tr>
        <td><ul>
            <?php if($model->sbed!=0) { ?>
            <li><?php echo t('Single Bedroom'); ?>: <strong><?php echo ($model->sbed!=0) ? $model->sbed : ''; ?> </strong></li>
            <?php } ?>
            <?php if($model->mbed!=0) { ?>
            <li><?php echo t('Matrimonial Bed'); ?>: <strong> <?php echo ($model->mbed!=0) ? $model->mbed : ''; ?> </strong></li>
            <?php } ?>
            <?php if($model->msbed!=0) { ?>
            <li><?php echo t('Matrimonial Sofa Bed'); ?>: <strong> <?php echo ($model->msbed!=0) ? $model->msbed : ''; ?> </strong></li>
            <?php } ?>
            <?php if($model->tbed!=0) { ?>
            <li><?php echo t('Twin Bed'); ?>: <strong><?php echo ($model->tbed!=0) ? $model->tbed : ''; ?> </strong></li>
            <?php } ?>
            <?php if($model->sbed!=0) { ?>
            <li><?php echo t('Single Bed'); ?>: <strong><?php echo ($model->sbed!=0) ? $model->sbed : ''; ?> </strong></li>
            <?php } ?>
            <?php if($model->ssbed!=0) { ?>
            <li><?php echo t('Single Sofa Bed'); ?>: <strong><?php echo ($model->ssbed!=0) ? $model->ssbed : ''; ?> </strong></li>
            <?php } ?>
          </ul></td>
        <td>&nbsp;</td>
        <td><ul class="propfeatures left marR30">
            <?php if($model->bathwshower!=0) { ?>
            <li><?php echo t('Bathroom with Shower'); ?>: <strong> <?php echo ($model->bathwshower!=0) ? $model->bathwshower : ''; ?> </strong></li>
            <?php } ?>
            <?php if($model->bathwtub!=0) { ?>
            <li><?php echo t('Bathroom with Tub'); ?>: <strong> <?php echo ($model->bathwtub!=0) ? $model->bathwtub : ''; ?> </strong></li>
            <?php } ?>
            <?php if($model->bathwts!=0) { ?>
            <li><?php echo t('Bathroom with Tub &amp; Shower'); ?>: <strong><?php echo ($model->bathwts!=0) ? $model->bathwts : ''; ?> </strong></li>
            <?php } ?>
            <?php if($model->bathwwc!=0) { ?>
            <li><?php echo t('Water Closet'); ?>: <strong><?php echo ($model->bathwwc!=0) ? $model->bathwwc : ''; ?> </strong></li>
            <?php } ?>
          </ul></td>
      </tr>
      <tr>
        <td colspan="3"><hr></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
   
    <pagebreak /> -->
    <div style="clear:both;"></div>
    <?php
			$Pgallery = Gallery::model()->findAll(array( 'condition'=>'prop_id = :ID', 'params'=>array(':ID'=>$model->id), 'order'=>'img_order ASC', 'limit' => 27));
	?>
    <?php if ( isset($Pgallery) && count($Pgallery) ) { ?>
    <h2 style="text-align:center;">Photo Gallery <?php echo $model->tt_name;?> </h2>
    <table>
      <?php foreach ($Pgallery as $pg) { $ima[] = $pg->img_url; } ?>
      <?php $k=0; for ($i=1; $i <= count($Pgallery)/3; $i++ ) { ?>
      <tr>
        <?php for ($j = 0; $j<3; $j++) {  ?>
        <td><img style="vertical-align: top" src="http://<?php echo AWS_S3_BUCKET; ?>.s3.amazonaws.com/<?php echo $model->id; ?>/fullsize/<?php echo $ima[$k++]; ?>" width="300" height="200" /></td>
        <?php } ?>
      </tr>
      <?php } ?>
    </table>
    <div style="clear:both;"></div>
    <?php } ?>
  </section>
</div>
</body>
</html>