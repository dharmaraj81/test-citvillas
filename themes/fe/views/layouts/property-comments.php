<?php 
		$criteria = new CDbCriteria();
       	$criteria->condition = 'status = :id AND parent = :PID';
       	$criteria->order = 'date_added DESC';
       	$criteria->params = array (':id'=>1,':PID' => $page->id);
		$PropComments = Review::model()->findAll($criteria);
		if( isset($PropComments) && count($PropComments)>0 ) { 
?>

<br />
<h2 class="marB18"><?php echo t('Comments'); ?></h2>
<div id="authorinfo" class="marT30 marB20">
  <?php foreach ($PropComments as $c) { ?>
  <div class="col span_2 first"> <img alt="comments avatar" src="<?php echo $layout_asset.'/images/comments-avatar.jpg'; ?>"  class="avatar avatar-80 photo grav-hashed" height="80" width="80" id="grav-8f11ad2b25432f80bc426a5ed5eb94d4-0"> </div>
  <div class="border-bottom col span_10">
    <h4> <?php echo $c->title; ?> </h4>
    <h5 class="marB10">By: <?php echo $c->fname.' '.$c->lname; ?> on <?php echo date('d-M-Y',$c->date_added); ?> </h5>
    <p><?php echo $c->description; ?></p>
  </div>
  <div class="clear"></div>
  <?php } ?>
</div>
<?php } ?>
