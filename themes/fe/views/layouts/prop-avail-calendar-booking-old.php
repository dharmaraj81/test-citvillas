<?php

$gal_js = "jQuery(window).load(function() {

			

			jQuery('#carousel').flexslider({

				animation: 'slide',

				controlNav: false,

				animateHeight: true,

				directionNav: true,

				animationLoop: false,

				slideshow: true,

				slideshowSpeed: 7000,

				animationDuration: 600,

				itemWidth: 120,

				itemMargin: 0,

				asNavFor: '#slider'

			});

					   

			jQuery('#slider').flexslider({

				animation: 'slide',

				controlNav: false,

				animationLoop: false,

				slideshow: false,

				sync: '#carousel'

			});

		});";

		

	Yii::app()->clientScript->registerScript('gallery', $gal_js);	
?>
<br />

  <div id="slider" class="flexslider">
    <div class="flex-viewport" style="overflow: hidden; position: relative;">
      <ul class="slides" style=" -webkit-transition-duration: 0s; transition-duration: 0s; -webkit-transform: translate3d(0px, 0px, 0px); transform: translate3d(0px, 0px, 0px);">
        <?php $bDates = Booking::model()->find(array( 'condition'=>'prop_id = :PID AND status = 1', 'params'=>array(':PID'=>$page->id), 'order'=>'fdate ASC' )); 
			  
			  if ( $bDates ) { $cal_start = date('Y', $bDates->fdate); $cal_start = date('Y',time()); } else {  $cal_start = date('Y',time());  }		 
			  for ( $year = $cal_start; $year <= date('Y',time())+3; $year++ ) { 
			  ?>
        <li class="flex-active-slide" style="width: 820px; float: left; display: block;">
          <h2 class="cal-year marT0 marB0"><?php echo t('Availability Calendar'); ?> - <?php echo $year.' ('.$page->tt_name.')'; ?></h2>
          <div id="calendar">
            <?php for( $mon = 1; $mon <= 12; $mon++ ) { ?>
            <div class="monthanddate">
              <div class="monthname"><?php echo date('M', strtotime("$year-$mon-01")); ?></div>
              <div class="monthdays">
              <?php 
					
					$total_days = cal_days_in_month(CAL_GREGORIAN, $mon, $year); 
					
					for ( $days = 1; $days <= $total_days; $days++ ) {
						
						$bState = Booking::model()->findAll(array(
							'condition'=>'status = 1 AND prop_id = :PID AND :BDATE BETWEEN fdate AND tdate',
							'params'=>array( ':PID'=>$page->id, ':BDATE'=> mktime(0, 0, 0, $mon, $days, $year) )
						))
					?>
              <?php if( count($bState) >= 1 ) { echo '<span title="Booked" class="active">'.$days.'</span>'; } else { echo '<span>'.$days.'</span>'; } ?>
              <?php  } ?>
              </div>
            </div>
            <?php } ?>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
    <ul class="flex-direction-nav">
      <li><a class="flex-prev flex-disabled" href="#" tabindex="-1">Previous</a></li>
      <li><a class="flex-next" href="#">Next</a></li>
    </ul>
  </div>