<div id="archive-header" class="marB40">
  <div class="container">
  
  <?php if (isset($BreadCrumbs) && count($BreadCrumbs)>0 ) { ?>
  <div class="breadcrumb breadcrumbs ct-breadcrumbs">
  	<div class="breadcrumb-trail"><span class="trail-before"><span class="breadcrumb-title"></span></span> 
    
    <?php 
		$bcount = count($BreadCrumbs); 
		$j = 1;
	    for($i = 0; $i<$bcount; $i++ ) {		
			if($j != $bcount ) {
	?>
            <a id="bread-home" href="<?php echo $BreadCrumbs[$i]['url']; ?>" title="<?php echo $BreadCrumbs[$i]['label']; ?>" rel="home" class="trail-begin"><?php echo $BreadCrumbs[$i]['label']; ?></a> 
            <span class="sep"><i class="fa fa-angle-right"></i></span> 
            
    <?php } else { ?>
            <span class="trail-end"><?php echo $BreadCrumbs[$i]['label']; ?></span>
    <?php } $j++; } ?>    
        
    </div>
   </div>
 <?php } ?>
  
    
    <div class="clear"></div>
     
   
  </div>
</div>
