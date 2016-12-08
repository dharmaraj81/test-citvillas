<?php
 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
		
		//Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/webplate.min.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/lightcase.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/lightcase.init.js', CClientScript::POS_HEAD);
		
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/webplate.css');
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/lightcase.css');

		
?>

<body id="single" class="single single-listings">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs-ourvillas',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'BreadCrumbs' => $BreadCrumbs )); ?>
    <div class="container">
      <article class="col span_9 first property_detail">
        <header class="listing-location detail-page-location">
          <div class="detail-info">
            <h2><?php echo $page->tt_name; ?></h2>
            <p class="location"><?php echo Town::GetName($page->town); ?>, <?php echo Province::GetName($page->province); ?></p>
          </div>
          <div class="enquiry-button"> <i class="icon-angle-right"></i><a id="various3" data-rel="lightcase:myCollection" href="<?php echo Yii::app()->createUrl('site/villaenquirypopup',array('propid'=>$page->id)); ?>"> <?php echo t('ENQUIRE NOW'); ?> </a></div>
        </header>
        <p class="propinfo marB0 detail-page-info">
          <?php if ($page->bedroom!=0) { ?>
          <span class="beds"><?php echo ($page->bedroom==1) ? $page->bedroom.' Bedroom' : $page->bedroom.' Bedrooms' ?> </span>
          <?php } ?>
          <?php if ($page->bathroom!=0) { ?>
          <span class="baths"><?php echo ($page->bathroom==1) ? $page->bathroom.' Bathroom' : $page->bathroom.' Bathrooms' ?> </span>
          <?php } ?>
          <?php if($page->size != 0 ) { ?>
          <span class="baths"><?php echo $page->size; ?> Sq Mt</span>
          <?php } ?>
          <?php if($page->nairport!=0) { ?>
          <span class="baths">
          <?php if($page->nairport!=0) { echo "Nearest Airport: ".Town::GetName($page->nairport); if($page->airport_km!=0) { echo '/'.($page->airport_km+0).' km'; } } ?>
          </span>
          <?php } ?>
          <?php if($page->sleep!=0) { ?>
          <span class="baths">
          <?php if($page->sleep!=0) { echo "Total Sleeps : ".$page->sleep;  } ?>
          </span>
          <?php } ?>
          <span class="baths">CIAO<?php echo $page->id; ?></span> 
          <!-- <a class="right" href="#">Print this Listing</a>--> <span class="item wishItem"><a style="position:relative; top:4px; float:right;" class="wishAction addToWish" data-img="<?php echo Gallery::GetPropThumbnail($page->id); ?>" data-title="<?php echo substr($page->tt_name, 0, 23); ?>" data-id="<?php echo $page->id; ?>" href="#"></a></span></p>
        <?php $this->renderPartial('//layouts/prop-banner',array('layout_asset'=>$layout_asset,'page' => $page)); ?>
        <div class="detail-price marB0 detail-page-price">
          <div class="detail-price">
            <?php if(prop_min_price($page->id)!= 0 ) { ?>
            <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($page->id); ?> <?php echo t('Per Week'); ?>
            <?php } ?>
          </div>
          <div class="detail-page-social widget_ct_social">
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style"> <a class="a2a_dd" href="https://www.addtoany.com/share_save"></a> <a class="a2a_button_facebook"></a> <a class="a2a_button_twitter"></a> <a class="a2a_button_google_plus"></a> <a class="a2a_button_pinterest"></a> <a class="a2a_button_linkedin"></a> </div>
            <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script> 
          </div>
        </div>
        <div class="post-content marT20">
          <?php 
			$Clink = Clink::model()->findAll(array('condition'=>'status = 1'));
			
			if( isset($Clink) && count($Clink)>0 ) { 
			 
			  $Ltitle = array(); $Lanchor = array(); $Lurl = array(); 
				
			  foreach ($Clink as $c) 
			  { 
			  	$Ltitle[] = $c->title;
				$Lanchor[] = $c->anchor;
				$Lurl[] = '<a href="'.$c->url.'" title="'.$c->title.'" target="_blank" >'.$c->anchor.'</a>';
			  }
			}
		?>
          <p><?php echo str_replace($Lanchor,$Lurl, strip_tags($page->content1,'<br><p><a>')); ?></p>
          
        </div>
        <div class="marT20">
        <p class="content_tag"> 
          
          <?php if ( $page->ptype != 0 ) { ?>
          <a href="#" class="symple-button gray " title="Visit Site" style="border-radius:0px">
          			<span class="symple-button-inner" style="border-radius:0px"><?php echo Type::GetName($page->ptype); ?></span></a> 
          <?php } ?>
          
          <?php if ( $page->location != 0 ) { ?>
          <a href="#" class="symple-button gray " title="Visit Site" style="border-radius:0px">
          			<span class="symple-button-inner" style="border-radius:0px"><?php echo Plocation::GetName($page->location); ?></span></a> 
          <?php } ?> 
          
          <?php if ( $page->view != 0 ) { ?>
          <a href="#" class="symple-button gray " title="Visit Site" style="border-radius:0px">
          			<span class="symple-button-inner" style="border-radius:0px"><?php echo Pview::GetName($page->view); ?></span></a> 
          <?php } ?>      
          
          
          <?php if ( $page->related != '' ) { 
		  	
			$RelatedProp = explode('|',$page->related);
			  if ( isset($RelatedProp) && count($RelatedProp)>0 ) {
				  foreach ( $RelatedProp as $r ) {
		  ?>
          <a href="#" class="symple-button gray " title="Visit Site" style="border-radius:0px">
          			<span class="symple-button-inner" style="border-radius:0px"><?php echo Pinfo::GetName($r); ?></span></a> 
          <?php } } } ?>

                    
          </p>
         </div> 
        <?php $this->renderPartial('//layouts/feature-access',array('layout_asset'=>$layout_asset,'page' => $page)); ?>
      </article>
      <div id="sidebar1" class="col span_3">
        <div id="sidebar-inner">
          <?php 
		  	if($page->online_book == 0) { 
		  		$this->renderPartial('//layouts/right-side-online-booking-button',array('layout_asset'=>$layout_asset, 'page' => $page )); 
			}
		  ?>
          <?php $this->renderPartial('//layouts/right-side-bar-request',array('layout_asset'=>$layout_asset, 'page' => $page, 'qenquiry'=>$qenquiry )); ?>
          <?php $this->renderPartial('//layouts/right-side-bar-info',array('layout_asset'=>$layout_asset,'page' => $page)); ?>
          <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>
      <?php $this->renderPartial('//layouts/property-price',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
      <?php $this->renderPartial('//layouts/additional-cost',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
      <div class="clear"></div>
      <?php $this->renderPartial('//layouts/prop-avail-calendar',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
      <?php $this->renderPartial('//layouts/property-map',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
      <?php $this->renderPartial('//layouts/property-comments',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
      <?php $this->renderPartial('//layouts/similar-prop',array('page'=>$page,'layout_asset'=>$layout_asset)); ?>
      <div class="clear"></div>
    </div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
<script type="text/javascript">var switchTo5x=true;</script> 
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script> 
<script type="text/javascript">stLight.options({publisher: "bc92edb9-f051-452a-87f4-5a4e7d9a4687", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</body>
