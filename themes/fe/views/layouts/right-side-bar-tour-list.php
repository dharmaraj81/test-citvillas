<?php

	$ttype  = Tourtype::model()->findAll(array('condition'=>'status=:ST','params'=>array(':ST'=>1),'order'=>'id ASC'));

	if ( isset($ttype) && count($ttype)>0 ) {

	  foreach ($ttype as $tt) {

		  $meta = Seo::GetPageNameByUid($tt->uid);
		  
		  if( $tt->id != $tourid ) {

?>

<h4><?php echo $tt->name; ?></h4>
<aside class="widget widget_ct_listings left">
  <ul class="propfeatures left marR30">
    <?php

			$tor  = Tour::model()->findAll(array('condition'=>'status=:ST AND source = :PT','params'=>array(':ST'=>1,':PT'=>$tt->id)));

			if( isset($tor) && count($tor)>0 ) {				

			foreach ($tor as $tur) { 

				$meta1 = Seo::GetPageNameByUid($tur->uid);

	    ?>
    <li><i class="fa fa-check-circle"></i><a href="<?php echo Yii::app()->createUrl('tuscanytours/detail',array('tlist'=>$meta->slug,'tdetail'=>$meta1->slug)); ?>" > <?php echo $tur->title; ?> </a></li>
    <?php } }  ?>
  </ul>
</aside>
<div class="clear"></div>
<?php } } } ?>
