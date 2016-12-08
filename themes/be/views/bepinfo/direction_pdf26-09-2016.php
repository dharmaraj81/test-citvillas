<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);

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
    <br>
      <div style="text-align:center; font-size:18px;"><?php echo $model->tt_name;?> <span style="font-style:italic;font-size:14px;"> also known as </span> <?php echo $model->name;?></div>
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
      <p> <strong> Address : </strong><?php echo trim($model->address); ?><br>
      </p>
      
      
      
      <?php if($model1->mpoint!='') { ?>
      <p> <strong> Meeting Point :</strong> <?php echo $model1->mpoint; ?> </p>
      <?php } ?>
      <?php if($model1->name!='') { ?>
      <p> <strong> Check in Contact : </strong><?php echo $model1->name; ?> </p>
      <?php } ?>
      <?php if($model1->phone!='') { ?>
      <p> <strong> Phone :</strong><?php echo $model1->phone; ?> </p>
      <?php } ?>
      <?php if($model1->mobile!='') { ?>
      <p> <strong> Mobile :</strong><?php echo $model1->mobile; ?> </p>
      <?php } ?>
      <?php if($model1->email!='') { ?>
      <p> <strong> eMail ID :</strong><?php echo $model1->email; ?> </p>
      <?php } ?>
      <?php if($model->People->name!='') { ?>
      <p> <strong> Owner's Name : </strong><?php echo $model->People->name.' '.$model->People->surname; ?> </p>
      <?php } ?>
      <?php if($model->People->email!='') { ?>
      <p> <strong> Owner's eMail ID : </strong><?php echo $model->People->email; ?> </p>
      <?php } ?>
      <?php if($model->People->tele!='') { ?>
      <p> <strong> Owner's Contact Number : </strong><?php echo $model->People->tele.' '.$model->People->mobile; ?> </p>
      <?php } ?>
      <?php if($model1->checkin!='') { ?>
      <p> <strong> Check in Time : </strong><?php echo $model1->checkin; ?> </p>
      <?php } ?>
      <?php if($model1->checkout!='') { ?>
      <p> <strong> Check out Time : </strong><?php echo $model1->checkout; ?> </p>
      <?php } ?>
      
      <?php if($model1->arrival!='') { ?>
      <p> <strong> Arrival Instructions :</strong> <br>
        <?php echo strip_tags($model1->arrival,'<p>'); ?> </p>
      <?php } ?>
	  
	  <?php if($model1->important!='') { ?>
      <p> <strong> IMPORTANT :</strong> <br>
        <?php echo $model1->important; ?> </p>
      <?php } ?>
      
      <?php if($model1->notes!='') { ?>
      <p> <strong> HOW TO GET THERE :</strong> <br>
        <?php echo $model1->notes; ?> </p>
      <?php } ?>
	  
	  
    </div>
    <!-- <pagebreak /> -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="58%"><?php echo t('Extra Charges'); ?> </th>
        <th width="4%">&nbsp; </th>
        <th width="38%"><?php echo t('Rental Cost Includes'); ?> </th>
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
    <div id="location">
      <h2 class="border-bottom marB18"><?php echo t('Location'); ?></h2>
     <iframe style="width:100%; height:350px;" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo Town::GetName($model->town).', '.Province::GetName($model->province).','; ?>+Italy&amp;aq=0&amp;oq=<?php echo Province::GetName($model->province); ?>&amp;ie=UTF8&amp;z=10&amp;output=embed"></iframe>     <img src="<?php echo $layout_asset; ?>/images/map.jpg" width="100%" />
    
    </div>
    -->
	
	
    
        <div style="clear:both;"></div>
		
	<?php if($model1->description!='') { ?>
	<p> <strong> DESCRIPTION : </strong> </p>
	<h4><?php echo strip_tags($model1->description,'<p>'); ?> </h4>
      
      <?php } ?>	
    <?php
			$Pgallery = Gallery::model()->findAll(array( 'condition'=>'prop_id = :ID', 'params'=>array(':ID'=>$model->id), 'order'=>'img_order ASC', 'limit' => 2));
	?>
    <?php if ( isset($Pgallery) && count($Pgallery) ) { ?>
    <!-- <h2 style="text-align:center;">Photos - <?php echo $model->tt_name;?> </h2> -->
	
    <table>
      <?php foreach ($Pgallery as $pg) { $ima[] = $pg->img_url; } ?>
      <?php $k=0; for ($i=1; $i <= count($Pgallery)/2; $i++ ) { ?>
      <tr>
        <?php for ($j = 0; $j<2; $j++) {  ?>
        <td><img style="vertical-align: top" src="<?php echo PROPERTY_IMAGES_URL.$model->id; ?>/fullsize/<?php echo $ima[$k++]; ?>" width="450" height="300" /></td>
        <?php } ?>
      </tr>
      <?php } ?>
    </table>
    <div style="clear:both;"></div>
    <?php } ?>
	<hr>
	<p> PLEASE NOTE THAT THIS IS NOT HOTEL, IT IS A PRIVATELY OWNED RESIDENCE MANAGED BY THE OWNER OR A LOCAL AGENCY. IN BOTH CASES THE CHECK-IN TIME MUST BE ARRANGED IN ADVANCE (no less than 3-7 days prior to the arrival). THIS IS TO ENSURE THAT YOUR ARRIVAL IS SMOOTH AND THERE IS SOMEONE THERE TO MEET YOU WITH THE KEY AND TO DO THE CHECK IN.</p> 
	<p> In Italy by law hotel and most private property owners are obliged to their local police of any guests residing in their property regardless of the length of time.<p>
	<p> For this reason the owner must provide a copy of each guest's passport, So please bring a photocopy of the first page of each of your Passports. </p>
  </section>
</div>
</body>
</html>