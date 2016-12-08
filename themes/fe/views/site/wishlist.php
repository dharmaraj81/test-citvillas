<?php

	//session_start();
	//echo 'wishlist_IDS:'.print_r($_COOKIE);
	//header('Refresh: 3;url=http://staging.citvillas.com/wishlisted/');
	//exit;
	
	if(isset($_COOKIE["wishlist_IDS"])) {
	
	$items_ids = json_decode($_COOKIE["wishlist_IDS"]);
	$items_ids = array_unique($items_ids); }
	else 
		$items_ids = array();
?>

<?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
<?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>	

<script>
function refreshPage(){
    window.location.reload();
} 
</script>
<section class="featured-listings wishlist-page">
  <div class="container">
		<header class="masthead">
			<h2 style="padding:7px 0px 0px 0px;" class="left marT0 marB0"><?php echo t('Wishlish Items'); ?><span style="color:#000;padding:0px 0px 0px 10px;" class="wishCounter">0</span></h2>
			   <div class="right">
					<div class="WB_righSide">
						<button style="width:100%; margin:0px; font-size:12px!important;" class="btn" id="clearWish" type="button" onClick="refreshPage()">Remove Wishlist</button>
					</div>
				</div>
				
			  <div class="clear"></div>
		</header>
		<!-- <div class="no">NO WISHLIST SELECTED</div>-->
		<?php  if ( isset($items_ids) && (count($items_ids )>0) ) { ?>
		<ul id="wishList">
			  <?php 
				   $node = 0;
				 
						/*foreach ($properties  as $f) {*/
						foreach ($items_ids as $id) {
							$f = Pinfo::model()->findByPk($id);
							$meta2 = Seo::model()->find(array(
								'condition'=>'uid = :UID AND layout = :LYT',
								'params'=>array(':UID'=> $f->uid, ':LYT'=>'prop' )));
							if($node == 0 ) {
										
				?>
			<li class="feat-listing col span_3 first">
        <figure> 
			<div class="item wishItem">
				<a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>">
				<img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image"  alt="<?php echo $f->altTag; ?>"></a>
			</div> 
		</figure>
        <div class="grid-listing-info wishlisted">
          <header>
            <h5 class="marB0"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo substr($f->tt_name, 0, 23); ?></a></h5>
            <p class="location marB0"><?php echo Town::GetName($f->town); ?>, <?php echo Province::GetName($f->province); ?></p>
          </header>
          <p class="price marB0">
			<a class="view-property" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>">VIEW PROPERTY</a>
          </p>
			<!-- <div class="content"><?php echo strip_tags(substr($f->content1, 0, 100)); ?>...</div> -->
          <p class="propinfo marB0">
		<?php
								
				if( (Yii::app()->user->isAgent) ) 
					{
						echo "<button class='btn' data-clipboard-demo data-clipboard-action='copy' data-clipboard-text="."http://staging.citvillas.com".Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)). "/?a=".Yii::app()->session->get('aid'). "&s=".Yii::app()->session->get('sid').">COPY AFFILIATE URL</button>".'<a class="btn" target="_blank" href=http://staging.citvillas.com/property/agentpdf/'.$f->id.'>'.'DOWNLOAD PDF'.'</a>';
					}
			?>	
          </p>
        </div>
      </li>
		  
				<?php $node++; } else { ?>
 <li class="feat-listing col span_3">
        <figure> 
			<div class="item wishItem">
				<a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>">
				<img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image"  alt="<?php echo $f->altTag; ?>"></a> 
			</div>
		</figure>
        <div class="grid-listing-info wishlisted">
          <header>
            <h5 class="marB0"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo substr($f->tt_name, 0, 23); ?></a></h5>
            <p class="location marB0"><?php echo Town::GetName($f->town); ?>, <?php echo Province::GetName($f->province); ?></p>
          </header>
          <p class="price marB0">
           <a class="view-property" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>">VIEW PROPERTY</a>
          </p>
		  <!-- <div class="content"><?php echo strip_tags(substr($f->content1, 0, 100)); ?>...</div> -->
          <p class="propinfo marB0">
			<?php
								
				if( (Yii::app()->user->isAgent) ) 
					{
						echo "<button class='btn' data-clipboard-demo data-clipboard-action='copy' data-clipboard-text="."http://www.citvillas.com".Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)). "/?a=".Yii::app()->session->get('aid'). "&s=".Yii::app()->session->get('sid').">COPY AFFILIATE URL</button>".'<a class="btn" target="_blank" href=http://www.citvillas.com/property/agentpdf/'.$f->id.'>'.'DOWNLOAD PDF'.'</a>';
					}
			?>	
          </p>
        </div>
      </li>
				<?php $node++; } }  ?>
		</ul>
	<?php } ?>
    <div class="clear"></div>
  </div>
  </div>
</section>
<link rel="stylesheet" href="http://staging.citvillas.com/wishlist-js/primer-styles.css">
<script src="http://staging.citvillas.com/wishlist-js/highlight.pack.min.js"></script>
<script src="http://staging.citvillas.com/wishlist-js/clipboard.min.js"></script>
<script src="http://staging.citvillas.com/wishlist-js/demos.js"></script>
<script src="http://staging.citvillas.com/wishlist-js/snippets.js"></script>
<script src="http://staging.citvillas.com/wishlist-js/tooltips.js"></script>


<?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>