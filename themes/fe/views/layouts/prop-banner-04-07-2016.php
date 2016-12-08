<?php
			$Pgallery = Gallery::model()->findAll(array( 
							'condition'=>'prop_id = :ID',
							'params'=>array(':ID'=>$page->id),
							'order'=>'img_order ASC',
						));
?>
        <?php if ( isset($Pgallery) && count($Pgallery) ) { ?>
        <section class="slider">
          <div class="flexslider">
              <ul class="slides">
                <?php $i = 0; foreach ($Pgallery as $pg) { ?>
                
                   <?php if($i==0) { 
				   
				   $FL = '<li><img src="http://'.AWS_S3_BUCKET.'.s3.amazonaws.com/'.$page->id.'/fullsize/'.$pg->img_url.'" alt="'.$pg->name.'"></li>';
				   }
				   
				   ?>
                   
                   
                	
                    <li>
                    	<img src="http://<?php echo AWS_S3_BUCKET; ?>.s3.amazonaws.com/<?php echo $page->id; ?>/fullsize/<?php echo $pg->img_url; ?>" alt="<?php echo $pg->name; ?>"> 
					</li>	
                                        	
                    
				<?php  $i++; } 
				
				echo $FL;
				
				?>
                
                
              </ul>

            
          </div>
        </section>
<?php } ?>
<?php
  
  $new_slider = "$('.flexslider').flexslider({ animation: 'slide', controlNav: false });";
	Yii::app()->clientScript->registerScript('slider', $new_slider);	
	
?>