
<div class="slideshow-wrapper">
  <div id="featured_slide">
    <section class="flexslider">
      <ul class="slides">
        <?php $banner = Slider::model()->findAll(array('order'=>'img_order ASC'));
	  ?>
        <?php if( isset($banner) && (count($banner)>0) ) {
			  foreach ($banner as $b) {
				  $astate = Pinfo::model()->findByPk($b->prop_id);
				  if($astate->status == 1) {
		?>
        <li>
          <figure><a href="#"><img src="<?php echo Slider::GetLargeImage($b); ?>" alt="<?php echo Pinfo::getPageName($b->prop_id); ?>"></a>
            <figcaption class="flex-caption"><?php echo Pinfo::getPageName($b->prop_id).' : '; ?><?php echo $b->name; ?><a href="#"> Click here to view this Property !! </a></figcaption>
          </figure>
        </li>
        <?php } } } ?>
      </ul>
    </section>
  </div>
</div>
