<div id="sidebar" class="col span_3">
  <div id="sidebar-inner">
    <aside id="ct_listings-2" class="widget widget_ct_listings left">
      <h4><?php echo t('Location'); ?></h4>
      <ul class="propfeatures left marR30">
        <li><i class="icon-map-marker"></i> <?php echo Town::GetName($page->town); ?>, <?php echo Province::GetName($page->province); ?>, <?php echo Region::GetName($page->region); ?></li>
      </ul>
      <div class="clear"></div>
      <?php if($page->ntown) { ?>
      <h4><?php echo t('Location'); ?></h4>
      <ul class="propfeatures left marR30">
        <li><i class="fa fa-check-circle"></i>
          <?php if($page->ntown) { echo Town::GetName($page->ntown); if($page->town_km!=0) { echo '/'.($page->town_km+0).' km'; } } ?>
        </li>
      </ul>
      <?php } ?>
      <div class="clear"></div>
      <h4><?php echo t('Bedrooms'); ?></h4>
      <ul class="propfeatures left marR30">
        <?php if($page->sleep!=0) { ?>
        <li><i class="icon-tasks"></i><?php echo t('Total Sleeps'); ?>: <strong><?php echo ($page->sleep!=0) ? $page->sleep : ''; ?></strong></li>
        <?php } ?>
        <?php if($page->sbed!=0) { ?>
        <li><i class="icon-tasks"></i><?php echo t('Single Bedroom'); ?>: <strong><?php echo ($page->sbed!=0) ? $page->sbed : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->mbed!=0) { ?>
        <li><i class="icon-tasks"></i><?php echo t('Matrimonial Bed'); ?>: <strong> <?php echo ($page->mbed!=0) ? $page->mbed : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->msbed!=0) { ?>
        <li><i class="icon-tasks"></i><?php echo t('Matrimonial Sofa Bed'); ?>: <strong> <?php echo ($page->msbed!=0) ? $page->msbed : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->tbed!=0) { ?>
        <li><i class="icon-tasks"></i><?php echo t('Twin Bed'); ?>: <strong><?php echo ($page->tbed!=0) ? $page->tbed : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->sbed!=0) { ?>
        <li><i class="icon-tasks"></i><?php echo t('Single Bed'); ?>: <strong><?php echo ($page->sbed!=0) ? $page->sbed : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->ssbed!=0) { ?>
        <li><i class="icon-tasks"></i><?php echo t('Single Sofa Bed'); ?>: <strong><?php echo ($page->ssbed!=0) ? $page->ssbed : ''; ?> </strong></li>
        <?php } ?>
      </ul>
      <div class="clear"></div>
      <h4><?php echo t('Bathrooms'); ?></h4>
      <ul class="propfeatures left marR30">
        <?php if($page->bathroom!=0) { ?>
        <li><i class="icon-filter"></i><?php echo t('Total Bathrooms'); ?>: <strong><?php echo ($page->bathroom!=0) ? $page->bathroom : ''; ?></strong></li>
        <?php } ?>
        <?php if($page->bathwshower!=0) { ?>
        <li><i class="icon-filter"></i><?php echo t('Bathroom with Shower'); ?>: <strong> <?php echo ($page->bathwshower!=0) ? $page->bathwshower : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->bathwtub!=0) { ?>
        <li><i class="icon-filter"></i><?php echo t('Bathroom with Tub'); ?>: <strong> <?php echo ($page->bathwtub!=0) ? $page->bathwtub : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->bathwts!=0) { ?>
        <li><i class="icon-filter"></i><?php echo t('Bathroom with Tub &amp; Shower'); ?>: <strong><?php echo ($page->bathwts!=0) ? $page->bathwts : ''; ?> </strong></li>
        <?php } ?>
        <?php if($page->bathwwc!=0) { ?>
        <li><i class="icon-filter"></i><?php echo t('Water Closet'); ?>: <strong><?php echo ($page->bathwwc!=0) ? $page->bathwwc : ''; ?> </strong></li>
        <?php } ?>
      </ul>
      <div class="clear"></div>
      <?php if ($page->size!=0) { ?>
      <h4><?php echo t('Square Meters'); ?></h4>
      <ul class="propfeatures left marR30">
        <li><i class="icon-columns"></i> Sq : <strong><?php echo $page->size; ?></strong></li>
      </ul>
      <?php } ?>
      <div class="clear"></div>
      <?php if($page->nairport!=0) { ?>
      <h4><?php echo t('Nearest airport'); ?></h4>
      <ul class="propfeatures left marR30">
        <li><i class="icon-plane"></i>
          <?php if($page->nairport!=0) { echo Town::GetName($page->nairport); if($page->airport_km!=0) { echo '/'.($page->airport_km+0).' km'; } } ?>
        </li>
      </ul>
      <?php } ?>
    </aside>
    <div class="clear"></div>
  </div>
</div>
