 <?php

			$Pgallery = Gallery::model()->findAll(array( 

							'condition'=>'prop_id = :ID',

							'params'=>array(':ID'=>$page->id),

							'order'=>'img_order ASC',

						));

						

			

		?>
        <?php if ( isset($Pgallery) && count($Pgallery) ) { ?>
        <figure>
          <div id="slider" class="flexslider">
            <div class="flex-viewport" style="overflow: hidden; position: relative;">
              <ul class="slides" style=" -webkit-transition-duration: 0s; transition-duration: 0s; -webkit-transform: translate3d(0px, 0px, 0px); transform: translate3d(0px, 0px, 0px);">
                <?php $i = 0; foreach ($Pgallery as $pg) { ?>
                <li data-thumb="http://<?php echo AWS_S3_BUCKET; ?>.s3.amazonaws.com/<?php echo $page->id; ?>/fullsize/<?php echo $pg->img_url; ?>" class="flex-active-slide" style="width: 820px; float: left; display: block;"> <a href="http://<?php echo AWS_S3_BUCKET; ?>.s3.amazonaws.com/<?php echo $page->id; ?>/fullsize/<?php echo $pg->img_url; ?>" rel="prettyphoto"> <img src="http://<?php echo AWS_S3_BUCKET; ?>.s3.amazonaws.com/<?php echo $page->id; ?>/fullsize/<?php echo $pg->img_url; ?>" title="<?php echo $pg->description; ?>" alt="<?php echo $pg->description; ?>" draggable="false" style="opacity: 1;"> </a> </li>
                <?php  } ?>
              </ul>
            </div>
            <ul class="flex-direction-nav">
              <li><a class="flex-prev flex-disabled" href="#" tabindex="-1">Previous</a></li>
              <li><a class="flex-next" href="#">Next</a></li>
            </ul>
          </div>
        </figure>
        <?php } ?>