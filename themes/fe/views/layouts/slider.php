<script type="text/javascript" src="http://staging.citvillas.com/assets/5b3d38bf/js/jquery.flexslider-min.js"></script>
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
