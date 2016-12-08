<div id="slider" class="flexslider">
  <div class="issuu-container"><a href="http://www.cit.com.au/brochure_view.aspx?id=13" title="View Brochure" target="_blank"> 
  <img src="<?php echo PROPERTY_IMAGES_URL; ?>slider/images/Villa-Pic-white-border.jpg" alt="CIT Villas Flyer Cover" draggable="false"></a> </div>
  <ul class="slides">
    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
      <div class="flex-container">
        <div class="flex-caption">
          <h1>Tuscan Brick wall with Roses</h1>
          <div class="clear"></div>
          <p>Need I say more.....</p>
        </div>
      </div>
      <img src="<?php echo PROPERTY_IMAGES_URL; ?>slider/images/flower-wal.jpg" alt="Tuscan Brick wall with Roses" draggable="false"> </li>
    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
      <div class="flex-container">
        <div class="flex-caption">
          <h1>Villa Boucquillon</h1>
          <div class="clear"></div>
          <p>An architect's amazing villa in Lucca.</p>
        </div>
      </div>
      <img src="<?php echo PROPERTY_IMAGES_URL; ?>slider/images/casa-boucquillon-opened-roof.jpg" alt="Villa Boucquillon" draggable="false"> </li>
    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
      <div class="flex-container">
        <div class="flex-caption">
          <h1>Incredible views from Positano</h1>
          <div class="clear"></div>
          <p>Hilltop, dreamlike locations for an Amalfi Coast adventure.</p>
        </div>
      </div>
      <img src="<?php echo PROPERTY_IMAGES_URL; ?>slider/images/amalfi-coast.jpg" alt="Incredible views from Positano" draggable="false"> </li>
    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
      <div class="flex-container">
        <div class="flex-caption">
          <h1>Villa Barbara</h1>
          <div class="clear"></div>
          <p>Sublime luxury in the heart of Chianti</p>
        </div>
      </div>
      <img src="<?php echo PROPERTY_IMAGES_URL; ?>slider/images/villa-barbara.jpg" alt="Villa Barbara" draggable="false"> </li>
    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
      <div class="flex-container">
        <div class="flex-caption">
          <h1>Villa Imprunetta</h1>
          <div class="clear"></div>
          <p>A glorious position close to Florence.</p>
        </div>
      </div>
      <img src="<?php echo PROPERTY_IMAGES_URL; ?>slider/images/villa-imprunetta.jpg" alt="Villa Imprunetta" draggable="false"> </li>
    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
      <div class="flex-container">
        <div class="flex-caption">
          <h1>To dream of Tuscany</h1>
          <div class="clear"></div>
          <p>Sunny days, great wine and food, laughter.</p>
        </div>
      </div>
      <img src="<?php echo PROPERTY_IMAGES_URL; ?>slider/images/3.jpg" alt="To dream of Tuscany" draggable="false"> </li>
    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
      <div class="flex-container">
        <div class="flex-caption">
          <h1>Villa Prat 2</h1>
          <div class="clear"></div>
          <p>Cooking, olive oil and wine - All here.</p>
        </div>
      </div>
      <img src="<?php echo PROPERTY_IMAGES_URL; ?>slider/images/villapandolfini.jpg" alt="Villa Prat 2" draggable="false"> </li>
    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
      <div class="flex-container">
        <div class="flex-caption">
          <h1>Villa Castel</h1>
          <div class="clear"></div>
          <p>Live like a king in Sicily.</p>
        </div>
      </div>
      <img src="<?php echo PROPERTY_IMAGES_URL; ?>slider/images/villa-castel.jpg" alt="Villa Castel" draggable="false"> </li>
  </ul>
  <ul class="flex-direction-nav">
    <li><a class="flex-prev" href="#">Previous</a></li>
    <li><a class="flex-next" href="#">Next</a></li>
  </ul>
</div>
<div class="bottom-container">
  <div id="sbar-wrap">
    <div class="container">
      <ul class="second-menu">
        <li class="login"><a href="http://tuscany-travel-guide.citvillas.com/"><i class="fa fa-play-circle-o"></i><?php echo t('Italian Travel Guide'); ?></a></li>
        <?php

					$menu2 = Tourtype::GetTourtypeName();
						if($menu2 && count($menu2) > 0 ){
               			foreach($menu2 as $m){
				   			$seo_sub = Seo::GetPageNameByUid($m->uid);
		?>
        <li><a href="<?php echo Yii::app()->createUrl('tuscanytours/list',array('tlist'=>$seo_sub->slug)); ?>"><i class="fa fa-play-circle-o"></i><?php echo $seo_sub->mainmenu; ?></a></li>
        <?php } } ?>
        <li class="login"><a href="http://blog.citvillas.com"><i class="fa fa-play-circle-o"></i><?php echo t('Food & Adventure Blog'); ?></a></li>
      </ul>
    </div>
  </div>
</div>
<?php

$slider_js = 'jQuery(window).load(function() {
            jQuery(".flexslider").flexslider({
                animation: "fade",
                slideDirection: "horizontal",
                slideshow: true, 
                slideshowSpeed: 7000,
                animationDuration: 600,  
                controlNav: false,
                directionNav: true,
                keyboardNav: true,
                randomize: false,
                pauseOnAction: true,
                pauseOnHover: false,	 				
                animationLoop: true	
            });

            

        });';
		
		Yii::app()->clientScript->registerScript('slider', $slider_js);
?>
