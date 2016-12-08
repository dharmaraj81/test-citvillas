<script type="text/javascript" src="http://staging.citvillas.com/assets/5b3d38bf/js/jquery.flexslider-min.js"></script>
<?php
			$Pgallery = Gallery::model()->findAll(array('condition'=>'prop_id = :ID','params'=>array(':ID'=>$propid),'order'=>'img_order DESC'));
?>
        <?php if ( isset($Pgallery) && count($Pgallery) ) { ?>
        <section class="slider">
          <div class="flexslider">
              <ul class="slides">
                <?php $i = 0; foreach ($Pgallery as $pg) { ?>
                
                   <?php if($i==0) { ?>
                	
                    <li>
                    	<img src="http://<?php echo AWS_S3_BUCKET; ?>.s3.amazonaws.com/<?php echo $propid; ?>/fullsize/<?php echo $pg->img_url; ?>" alt="<?php echo $pg->name; ?>"> 
					</li>	
                    <?php } else { ?>
                    <li>
                    	<img src="http://<?php echo AWS_S3_BUCKET; ?>.s3.amazonaws.com/<?php echo $propid; ?>/fullsize/<?php echo $pg->img_url; ?>" alt="<?php echo $pg->name; ?>"> 
					</li>
                    <?php  } ?>                    	
				<?php  $i++; } ?>
              </ul>
          </div>
        </section>
<?php } ?>
<?php
  
  $new_slider = "$('.flexslider').flexslider({ animation: 'slide', controlNav: false });";
	Yii::app()->clientScript->registerScript('slider', $new_slider);	
	
?>