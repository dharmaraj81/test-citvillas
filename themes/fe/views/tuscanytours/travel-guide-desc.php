<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);

			

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

<body id="page" class="page page-id-173 page-template-default">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
        <?php $this->renderPartial('//layouts/breadcrumbs-ourvillas',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'BreadCrumbs' => $BreadCrumbs )); ?>
    <div class="container marT30">
      <?php

		

				  $img = Tgallery::model()->find(array(

					  'condition'=>'source=:id',

					  'params'=>array(':id'=>$page->id),

					  'order' => 'img_order ASC',

					  'limit'=>1

				  ));

				  $items = PROPERTY_IMAGES_URL.$page->id.'/fullsize/'.$img->img_url;  

				  

			?>
      <article class="col span_9 first tour_desc">
        <div class="page hentry col span_12 first">
          <h2 class="entry-title"> <?php echo $page->title; ?> </h2>
          <h4 class="marB20"><?php echo $page->subtitle; ?></h4>
          <?php $Pgallery = Tgallery::model()->findAll(array('condition'=>'source = :ID','params'=>array(':ID'=>$page->id),'order'=>'img_order ASC')); ?>
          <?php if ( isset($Pgallery) && count($Pgallery) ) { ?>
          
         <section class="slider">
  			<div class="flexslider">
    			<ul class="slides">
        <?php $i = 0; foreach ($Pgallery as $pg) { ?>
                  <?php if($i==0) { 
				   
				   $FL = '<li><img src="'.PROPERTY_IMAGES_URL.$page->id.'/fullsize/'.$pg->img_url.'" alt="'.$pg->name.'"></li>';
				   }
				   
				   ?>
      <li> <img src="<?php echo PROPERTY_IMAGES_URL; ?><?php echo $page->id; ?>/fullsize/<?php echo $pg->img_url; ?>" alt="<?php echo $pg->name; ?>"> </li>
      <?php  $i++; } 
				
				echo $FL;
				
				?>
                
                </ul>
              </div>
            </section>
          
          
          <?php } ?>
          <div class="post-content marT20"> <?php echo $page->content; ?></div> 
         </div>
         
         <?php
  
  $tour_slider = "$('.flexslider').flexslider({ animation: 'slide', controlNav: false });";
	Yii::app()->clientScript->registerScript('tourslider', $tour_slider);	
	
?>
         
         <?php $this->renderPartial('//layouts/tour-cost',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
         
        <div class="page tourlist hentry col span_12 first">
          <p class="right"> <a class="view-all right"  title="Send an Enquiry" href="<?php echo Yii::app()->createUrl('site/excursionenquiry',array('id' => $page->id)); ?>"> <span class="symple-button-inner"><?php echo t('Send an Enquiry'); ?><i class="icon-angle-right"></i></span> </a> </p>
          <div class="clear"></div>
        </div>
        <hr>
        <div class="clear"></div>
      </article>
      <div id="sidebar" class="col span_3 tour">
        <div id="sidebar-inner">
          <?php $this->renderPartial('//layouts/right-side-bar-tour-list',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
