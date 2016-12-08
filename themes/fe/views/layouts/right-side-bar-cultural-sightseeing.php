<?php
	$ttype  = Tourtype::model()->findAll(array(
							  'condition'=>'status=:ST',
							  'params'=>array(':ST'=>1)));
	if($page)
	  foreach ($ttype as $tt) {
?>


    <aside id="ct_listings-2" class="widget widget_ct_listings left">
      <h5><?php echo $tt->name; ?></h5>
      <ul class="propfeatures left marR30">
        <?php
			$tor  = Tour::model()->findAll(array('condition'=>'status=:ST AND source = :PT','params'=>array(':ST'=>1,':PT'=>$tt->id)));
			if( isset($tor) && count($tor)>0 ) {				
			foreach ($tor as $tur) { 
	    ?>
        <li><i class="fa fa-check-circle"></i><a href="<?php echo Yii::app()->createUrl('ourvillas/tags',array('tag' => $seo_sub->slug)); ?>" > <?php echo $tur->title; ?> </a></li>
        <?php } }  ?>
      </ul>
    </aside>
    <div class="clear"></div>

<?php } ?>
