<?php
										$Acost = Tprice::model()->findAll(array(
											'condition'=>'source = :SID AND status = 1',
											'params'=>array(':SID' => $page->id),
											'order'=> 'id ASC'
										)); 
										
										
										
										if ( isset ($Acost) && count($Acost)>0 ) { 
										?>

<div class="twocol left">
  <h2 class="border-bottom marB18"><?php echo t('Tour Cost'); ?></h2>
  <ul>
    <?php foreach ($Acost as $a) { 
														
														  echo '<li>';
														  echo ($a->pax==1)? $a->pax.' Pax' : $a->pax.' Paxs'; 
														  
														  if($a->price != '0' ) { 
														  
														     
														     echo '<span>'.$a->price.' Euro </span>';
														  }
														  
														  echo '<span>'.$a->comment.'</span> </li>';
														}
														?>
  </ul>
</div>
<?php } ?>
<?php
 
										if ( isset ($page->incl) && ($page->incl != '') ) { 
										?>
<div class="twocol left last">
  <h2 class="border-bottom marB18"><?php echo t('Whats Included'); ?></h2>
  
  <?php echo $page->incl; ?>
  
</div>
<?php } ?>
<div class="clear"></div>
