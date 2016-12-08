<?php
if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
?>
<?php $this->pageTitle= t('Ciao Italy Villas'); ?>

<div class="row-fluid">
  <div class="span12" style="text-align:center">
    <?php
  $count = 0;
$user = User::model()->find(array('condition'=>"user_id='".user()->id."'"));
if( isset($user) && count($user)>0 ) {
	$Props = Pinfo::model()->findAll(array('condition' => 'owner = :PID AND status = 1', 'params' => array(':PID' => $user->people_id)));
	$count = count($Props);
}
?>
    <?php if($count>0) { ?> <a href="<?php echo Yii::app()->createUrl('owners/activeprop'); ?>"> <?php } ?>
    <div class="wBlock green auto">
      <div class="dSpace">
        <h3><?php echo t('Active Properties'); ?></h3>
        <span class="number"><?php echo $count; ?></span> </div>
    </div>
    <?php if($count>0) { ?> </a> <?php } ?>
    <?php
  $count = 0;
$user = User::model()->find(array('condition'=>"user_id='".user()->id."'"));
if( isset($user) && count($user)>0 ) {
	$Props = Pinfo::model()->findAll(array('condition' => 'owner = :PID AND status = 2', 'params' => array(':PID' => $user->people_id)));
	$count = count($Props);
}
?>
    <?php if($count>0) { ?> <a href="<?php echo Yii::app()->createUrl('owners/inactiveprop'); ?>"> <?php } ?>
    <div class="wBlock red auto">
      <div class="dSpace">
        <h3><?php echo t('In-Active Properties'); ?></h3>
        <span class="number"><?php echo $count; ?></span> </div>
    </div>
    <?php if($count>0) { ?> </a> <?php } ?>
    
    <div class="wBlock auto">
      <div class="dSpace">
        <h3><?php echo t('Paid Amount'); ?></h3>
        <span class="number">$0</span> </div>
    </div>
    <div class="wBlock red auto">
      <div class="dSpace">
        <h3><?php echo t('Pending Amount'); ?></h3>
        <span class="number">$0</span> </div>
    </div>
    <?php
  $count = 0;
$user = User::model()->find(array('condition'=>"user_id='".user()->id."'"));
if( isset($user) && count($user)>0 ) {
	
	$Props = Pinfo::model()->findAll(array('condition' => 'owner = :PID', 'params' => array(':PID' => $user->people_id)));
	if( isset($Props) && count($Props)>0 ) {
		
		foreach ( $Props as $Prop ) {
	
	$Books = Booking::model()->findAll(array('condition' => 'bsource = 1 AND customer_id != 1 AND prop_id = :PID','params' => array(':PID'=>$Prop->id)));
	$count = $count + count($Books);
	
} } } 
?>

<?php if($count>0) { ?> <a href="<?php echo Yii::app()->createUrl('bebooking/reserve'); ?>"> <?php } ?>
    
    <div class="wBlock yellow auto">
      <div class="dSpace">
        <h3><?php echo t('Booking'); ?></h3>
        <span class="number"><?php echo $count; ?></span> </div>
    </div>
   <?php if($count>0) { ?> </a> <?php } ?>
   
    <a href="#">
    <div class="wBlock blue auto">
      <div class="dSpace">
        <h3><?php echo t('My Messages'); ?></h3>
        <span class="number">0</span> </div>
    </div>
    </a> <a href="#">
    <div class="wBlock gray auto">
      <div class="dSpace">
        <h3><?php echo t('My Tickets'); ?></h3>
        <span class="number">0</span> </div>
    </div>
    </a>
    <div class="clear"></div>
  </div>
</div>
<?php
$user = User::model()->find(array('condition'=>"user_id='".user()->id."'"));
if( isset($user) && count($user)>0 ) {
	
	
	$Props = Pinfo::model()->findAll(array('condition' => 'owner = :PID', 'params' => array(':PID' => $user->people_id)));
	
	if ( isset($prop_state) && $prop_state >= 0 ) {
		
		$Props = Pinfo::model()->findAll(array('condition' => 'owner = :PID AND status = :ST', 'params' => array(':PID' => $user->people_id,':ST' => $prop_state)));	
		
	}
	
	if( isset($Props) && count($Props)>0 ) {
?>
<div class="dr"><span></span></div>
<div class="row-fluid">
  <div class="span12">
    <div class="head">
      <div class="isw-picture"></div>
      <h1><?php echo $label; ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block-fluid">
      <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
        <tbody>
          <?php foreach ( $Props as $Prop ) { ?> 
          <tr>
            <td width="60"><a href="<?php echo Yii::app()->createUrl('begallery/create', array('page_id'=>$Prop->id)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($Prop->id); ?>" class="img-polaroid"/></a></td>
            <td><a href="<?php echo Yii::app()->createUrl('bepinfo/view', array('id'=>$Prop->id)); ?>" class="user"><?php echo $Prop->name.'('.$Prop->id.')'; ?></a>
              <div class="info">
                
                <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
                  <tbody>
                    <tr>
                      <td><p class="about"> <span class="label label-success"><?php echo t('Sleeps'); ?></span> : <?php echo $Prop->sleep; ?> <br/>
                          <span class="label label-success"><?php echo t('Size'); ?></span> : <?php echo $Prop->size; ?> M<sup>2</sup> <br/>
                          <span class="label label-success"><?php echo t('Location'); ?></span> : <?php echo Plocation::GetName($Prop->location); ?> <br/>
                        </p></td>
                      <td><p class="about"> <span class="label label-success"><?php echo t('View'); ?></span> : <?php echo Pview::GetName($Prop->view); ?> <br/>
                          <span class="label label-success"><?php echo t('Type'); ?></span> : <?php echo Type::GetName($Prop->ptype); ?></p></td>
                    </tr>
                  </tbody>
                </table>
              </div></td>
              
              <?php 
			    $Last_update = 0;
			  	$Season = Season::model()->findAll(array('condition'=>'prop_id='.$Prop->id,'order' => 'created ASC'));
				if( isset($Season) && count($Season)>0 ) {
					foreach($Season as $s){
						$sdates = Dates_rates::model()->findAll(array('condition'=>'season_id = '.$s->id.' AND to_date >= '.time()));
						$srates = Rate::model()->findAll(array('condition'=>'season_id = '.$s->id));
						$Last_update = $s->created;
					}
				}			  
			  ?>
              
            <td width="220"><?php if( isset($sdates) && count($sdates) > 0 && isset($srates) && count($srates)>0 ) { echo '<div class="wBlock green">'; } else { echo '<div class="wBlock red">'; } ?>
                <div class="dSpace">
                  <h3><?php echo t('Season & Prices'); ?></h3>
                  <span class="number"><?php echo count($Season); ?></span>
                  <h3><?php echo t('Entries'); ?></h3>
                </div>
                <div class="rSpace"> <span><?php echo t('Last Updated'); ?></span> <span><b><?php echo ($Last_update!=0) ? date('d-M-Y',$Last_update):''; ?></b></span> <span><a href="<?php echo Yii::app()->createUrl('beseason/createseason', array('page_id'=>$Prop->id)); ?>"> Update </a></span> </div>
              </div></td>
              
             <?php 
			    $Last_update = 0;
			  	$Books = Booking::model()->findAll(array('condition' => 'prop_id = :PID','params' => array(':PID'=>$Prop->id),'order'=>'created ASC'));
				if( isset($Books) && count($Books)>0 ) {
					foreach($Books as $b){
						
						$Last_update = $b->created;
					}
				}			  
			  ?>
             
            <td width="220">
            	<?php if($Last_update >= time()) { echo '<div class="wBlock green">'; } else { echo '<div class="wBlock red">'; } ?>
                
                <div class="dSpace">
                  <h3> <?php echo t('Availability Update'); ?></h3>
                  <span class="number"><?php echo count($Books); ?></span>
                  <h3><?php echo t('Entries'); ?></h3>
                </div>
                <div class="rSpace"> <span><?php echo t('Last Updated'); ?></span> <span><b><?php echo ($Last_update!=0) ? date('d-M-Y',$Last_update):''; ?></b></span> <span><a href="<?php echo Yii::app()->createUrl('beavail/create', array('page_id'=>$Prop->id)); ?>"> Update </a></span> </div>
              </div><br />
             
              </td>
            <td width="20"> <?php echo Pinfo::get_actionchanges($Prop); ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  
  <!-- <div class="span6">
    <?php //$this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Pinfo')); ?>
  </div> 
  <div class="span6">
    <?php //$this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Booking')); ?>
  </div> --> 
</div>
<?php } } ?>
