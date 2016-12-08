
	<div class="wishlist-sidebar wishlist-page">
			<?php
								
				if( (Yii::app()->user->isAgent) ) 
					{
						echo "<button class='btn' data-clipboard-demo data-clipboard-action='copy' data-clipboard-text=".FRONT_SITE_URL.$page->affiliateurl.">COPY AFFILIATE URL</button>".'<a class="btn" target="_blank" href=http://staging.citvillas.com/property/agentpdf/'.$page->id.'>'.'DOWNLOAD PDF'.'</a>';
					}
			?>	
	</div>

	<a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($page->region),'province'=>GetProvinceNURL($page->province),'town'=>GetTownNURL($page->town),'property' => $meta2->slug)); ?><?php echo $page->tt_name; ?>"></a>
    
	<aside id="ct_listings-2" class="widget widget_ct_listings left">
      <h4><?php echo t('Location'); ?></h4>
      <ul class="propfeatures left marR30">
        <li> <?php echo Town::GetName($page->town); ?>, <?php echo Province::GetName($page->province); ?>, <?php echo Region::GetName($page->region); ?></li>
      </ul>
      <div class="clear"></div>
      <?php if($page->ntown) { ?>
      <h4><?php echo t('Nearest Town'); ?></h4>
      <ul class="propfeatures left marR30">
        <li>
          <?php if($page->ntown) { echo Town::GetName($page->ntown); if($page->town_km!=0) { echo '/'.($page->town_km+0).' km'; } } ?>
        </li>
      </ul>
      <?php } ?>
      <div class="clear"></div>
      <h4><?php echo t('Sleeps'); ?></h4>
      <ul class="propfeatures left marR30">
        <?php if($page->sleep!=0) { ?>
        <li><?php echo t('Total Sleeps'); ?>: <strong><?php echo ($page->sleep!=0) ? $page->sleep : ''; ?></strong></li>
        <?php } ?>
        <?php if($page->extra_sleep!=0) { ?>
        <li><?php echo t('Extras'); ?>: <strong><?php echo ($page->extra_sleep!=0) ? $page->extra_sleep : ''; ?> </strong></li>
        <?php } ?>
      </ul>
      <div class="clear"></div>
      
      <h4><?php echo t('Bedrooms'); ?></h4>
      <ul class="propfeatures left marR30">
        <?php if($page->bedroom!=0) { ?>
        <li><?php echo t('Total Bedrooms'); ?>: <strong><?php echo ($page->bedroom!=0) ? $page->bedroom : ''; ?></strong></li>
        <?php } ?>
        <?php if($page->sbed!=0) { ?>
        <li><?php echo t('Single Bedroom'); ?>: <strong><?php echo ($page->sbed!=0) ? $page->sbed : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->mbed!=0) { ?>
        <li><?php echo t('Matrimonial Bed'); ?>: <strong> <?php echo ($page->mbed!=0) ? $page->mbed : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->msbed!=0) { ?>
        <li><?php echo t('Matrimonial Sofa Bed'); ?>: <strong> <?php echo ($page->msbed!=0) ? $page->msbed : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->tbed!=0) { ?>
        <li><?php echo t('Twin Bed'); ?>: <strong><?php echo ($page->tbed!=0) ? $page->tbed : ''; ?> </strong></li>
        <?php } ?>
        
        <?php if($page->ssbed!=0) { ?>
        <li><?php echo t('Single Sofa Bed'); ?>: <strong><?php echo ($page->ssbed!=0) ? $page->ssbed : ''; ?> </strong></li>
        <?php } ?>
      </ul>
      <div class="clear"></div>
      
      <h4><?php echo t('Bathrooms'); ?></h4>
      <ul class="propfeatures left marR30">
        <?php if($page->bathroom!=0) { ?>
        <li><?php echo t('Total Bathrooms'); ?>: <strong><?php echo ($page->bathroom!=0) ? $page->bathroom : ''; ?></strong></li>
        <?php } ?>
        <?php if($page->bathwshower!=0) { ?>
        <li><?php echo t('Bathroom with Shower'); ?>: <strong> <?php echo ($page->bathwshower!=0) ? $page->bathwshower : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->bathwtub!=0) { ?>
        <li><?php echo t('Bathroom with Tub'); ?>: <strong> <?php echo ($page->bathwtub!=0) ? $page->bathwtub : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->bathwts!=0) { ?>
        <li><?php echo t('Bathroom with Tub &amp; Shower'); ?>: <strong><?php echo ($page->bathwts!=0) ? $page->bathwts : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->bathwwc!=0) { ?>
        <li><?php echo t('Water Closet'); ?>: <strong><?php echo ($page->bathwwc!=0) ? $page->bathwwc : ''; ?> </strong></li>
        <?php } ?>
      </ul>
      <div class="clear"></div>
      <?php if ($page->size!=0) { ?>
      <h4><?php echo t('Square Metres'); ?></h4>
      <ul class="propfeatures left marR30">
        <li> Sq Mt : <strong><?php echo $page->size; ?></strong></li>
      </ul>
      <?php } ?>
      <div class="clear"></div>
      <?php if($page->nairport!=0) { ?>
      <h4><?php echo t('Nearest airport'); ?></h4>
      <ul class="propfeatures left marR30">
        <li>
          <?php if($page->nairport!=0) { echo Town::GetName($page->nairport); if($page->airport_km!=0) { echo '/'.($page->airport_km+0).' km'; } } ?>
        </li>
      </ul>
      <?php } ?>
    </aside>
	
	
	 <div id="sidebar" class="col span_3">
        <div id="sidebar-inner about-us" class="about-us">
          <aside id="ct_listings-1" class="widget widget_ct_listings left">
            <h4><?php echo t('Property'); ?></h4>
            <ul>
              <?php 

	   	   $page = Pinfo::model()->findByPk($prop_id);
		   
		   if ( isset($page) && (count($page)>0) ) {
			   $meta2 = Seo::model()->find(array(
						'condition'=>'uid = :UID AND layout = :LYT',
						'params'=>array(':UID'=> $page->uid, ':LYT'=>'prop' )));
	    ?>
              <li>
                <figure> <a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image" width="259" height="171" alt="<?php echo $f->tt_name; ?>"></a> </figure>
                <div class="grid-listing-info">
                  <header>
                    <h5 class="marB0"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($page->region),'province'=>GetProvinceNURL($page->province),'town'=>GetTownNURL($page->town),'property' => $meta2->slug)); ?>"><?php echo $page->tt_name; ?></a></h5>
                    <p class="location marB0"><?php echo Province::GetName($f->province); ?> , <?php echo Town::GetName($f->town); ?></p>
                  </header>
                  <?php if(prop_min_price($f->id)!= 0 ) { ?>
                  <p class="price marB0">
                    <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?> 
                  </p>
                   <?php }  ?>
                  <p class="propinfo marB0"> <span class="beds"><?php echo $f->bedroom; ?> Bed</span><span class="baths"><?php echo $f->bathroom; ?> Bath</span>
                    <?php if($f->size != 0 ) { ?>
                    <span class="sqft"><?php echo $f->size; ?></span> Sq Ft
                    <?php } ?>
                  </p>
                  <div class="clear"></div>
                </div>
              </li>
              <?php }  ?>
            </ul>
          </aside>
        </div>
      </div>
   
<link rel="stylesheet" href="http://staging.citvillas.com/wishlist-js/primer-styles.css">
<script src="http://staging.citvillas.com/wishlist-js/highlight.pack.min.js"></script>
<script src="http://staging.citvillas.com/wishlist-js/clipboard.min.js"></script>
<script src="http://staging.citvillas.com/wishlist-js/demos.js"></script>
<script src="http://staging.citvillas.com/wishlist-js/snippets.js"></script>
<script src="http://staging.citvillas.com/wishlist-js/tooltips.js"></script>
