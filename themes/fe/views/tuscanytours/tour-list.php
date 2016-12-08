<?php
		$menu2 = Tourtype::GetTourtypeName();
		if($menu2 && count($menu2) > 0 ){
?>

<aside class="tour-list">
  <ul>
    <?php
               foreach($menu2 as $m){
				   $seo_sub = Seo::GetPageNameByUid($m->uid);
				    ?>
    <li><a href="<?php echo Yii::app()->createUrl('tuscanytours/list',array('tlist' => $seo_sub->slug)); ?>"><?php echo $seo_sub->mainmenu; ?></a></li>
    <?php } 
        ?>
  </ul>
</aside>
<?php } ?>
