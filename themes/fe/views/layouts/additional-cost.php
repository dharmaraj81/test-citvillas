<?php
		$CurrentYear = 0;
		$CurrentYear = date("Y");
		
		if ( Yii::app()->settings->get('general', 'price_year_setting') == 0 ) 
		{
			$Acost = Additionalcost::model()->findAll(array(
				'condition'=>'prop_id = :PID AND status = 1 AND year = :YR3',
				'params'=>array(':PID' => $page->id, ':YR3' => $CurrentYear ),
				'order' => 'year ASC'
			)); 
		}
		
		if ( Yii::app()->settings->get('general', 'price_year_setting') == 1 ) 
		{
			$CurrentYear = $CurrentYear - 1;
			$Acost = Additionalcost::model()->findAll(array(
				'condition'=>'prop_id = :PID AND status = 1 AND year >= :YR3',
				'params'=>array(':PID' => $page->id, ':YR3' => $CurrentYear ),
				'order' => 'year ASC'
			)); 
		}
		
		if ( Yii::app()->settings->get('general', 'price_year_setting') == 2 ) 
		{
			$Acost = Additionalcost::model()->findAll(array(
				'condition'=>'prop_id = :PID AND status = 1 AND year >= :YR3',
				'params'=>array(':PID' => $page->id, ':YR3' => $CurrentYear ),
				'order' => 'year ASC'
			)); 
		}
		
		if ( Yii::app()->settings->get('general', 'price_year_setting') == 3 ) 
		{
			$Acost = Additionalcost::model()->findAll(array(
				'condition'=>'prop_id = :PID AND status = 1 AND year = :YR3',
				'params'=>array(':PID' => $page->id, ':YR3' => $CurrentYear ),
				'order' => 'year ASC'
			)); 
		
			if ( isset ($Acost) && count($Acost)==0 ) 
			{ 
				$CurrentYear = $CurrentYear - 1;
				
				$Acost = Additionalcost::model()->findAll(array(
					'condition'=>'prop_id = :PID AND status = 1 AND year = :YR3',
					'params'=>array(':PID' => $page->id, ':YR3' => $CurrentYear ),
					'order' => 'year ASC'
				)); 
			}
		}
							
		if ( isset ($Acost) && count($Acost)>0 ) 
		{ 
?>

<div class="twocol left">
  <h2 class="border-bottom marB18"><?php echo t('Additional Cost'); ?></h2>
  <ul>
    <?php foreach ($Acost as $a) { 
														
														  echo '<li>';
														  
														  if (Additional::GetLangName($a->name)=='None') { echo $a->name; } else { echo $a->year.' '. Additional::GetLangName($a->name); }
														  
														  if($a->cost != '0' ) { 
														  
														     
														     echo '<span>'.$a->cost.' Euro </span>';
														  }
														  
														  echo '<span>'.$a->comment.'</span> </li>';
														}
														?>
  </ul>
</div>
<?php } ?>

<?php
										$Oservice = Otherservices::model()->findAll(array(
											'condition'=>'prop_id = :PID AND status = 1 AND year = :YR4',
											'params'=>array(':PID' => $page->id, ':YR4'=>2017 ),
											'order'=> 'name ASC'
										)); 
										
										if ( isset ($Oservice) && count($Oservice)==0 ) { 
										$Oservice = Otherservices::model()->findAll(array(
											'condition'=>'prop_id = :PID AND status = 1 AND year = :YR4',
											'params'=>array(':PID' => $page->id, ':YR4'=>2016),
											'order'=> 'year ASC'
										)); 
									
	
										
										}
										
		$CurrentYear = 0;
		$CurrentYear = date("Y");
		
		if ( Yii::app()->settings->get('general', 'price_year_setting') == 0 ) 
		{
			$Oservice = Otherservices::model()->findAll(array(
				'condition'=>'prop_id = :PID AND status = 1 AND year = :YR4',
				'params'=>array(':PID' => $page->id, ':YR4' => $CurrentYear ),
				'order'=> 'name ASC'
			)); 
		}
		
		if ( Yii::app()->settings->get('general', 'price_year_setting') == 1 ) 
		{
			$CurrentYear = $CurrentYear - 1;
			$Oservice = Otherservices::model()->findAll(array(
				'condition'=>'prop_id = :PID AND status = 1 AND year >= :YR4',
				'params'=>array(':PID' => $page->id, ':YR4' => $CurrentYear ),
				'order' => 'year ASC'
			)); 
		}
		
		if ( Yii::app()->settings->get('general', 'price_year_setting') == 2 ) 
		{
			$Oservice = Otherservices::model()->findAll(array(
				'condition'=>'prop_id = :PID AND status = 1 AND year >= :YR4',
				'params'=>array(':PID' => $page->id, ':YR4' => $CurrentYear ),
				'order' => 'year ASC'
			)); 
		}
		
		if ( Yii::app()->settings->get('general', 'price_year_setting') == 3 ) 
		{
			$Oservice = Otherservices::model()->findAll(array(
				'condition'=>'prop_id = :PID AND status = 1 AND year = :YR4',
				'params'=>array(':PID' => $page->id, ':YR4' => $CurrentYear ),
				'order'=> 'name ASC'
			));  
		
			if ( isset ($Oservice) && count($Oservice)==0 ) 
			{ 
			$CurrentYear = $CurrentYear - 1;
				
			$Oservice = Otherservices::model()->findAll(array(
				'condition'=>'prop_id = :PID AND status = 1 AND year = :YR4',
				'params'=>array(':PID' => $page->id, ':YR4' => $CurrentYear ),
				'order'=> 'name ASC'
			));
			}
		}
		
										if ( isset ($Oservice) && count($Oservice)>0 ) { 
										?>
<div class="twocol left last">
  <h2 class="border-bottom marB18"><?php echo t('Other Services'); ?></h2>
  <ul>
    <?php foreach ($Oservice as $o) { 
														
														 // echo '<li>'.$o->name;
														  
														   echo '<li>';
														  
														  if (Additional::GetLangName($o->name)=='None') { echo $o->name; } else { echo $o->year .' '. Additional::GetLangName($o->name); }
														 
														  
														  
														  if($o->cost != '0' ) { 
														   
														     echo '<span>'.$o->cost.' Euro </span>';
														  } else { echo '<span> Included </span>'; }
														  echo '<span>'.$o->comment.'</span> </li>';
														}
														?>
  </ul>
</div>
<?php } ?>
<div class="clear"></div>
