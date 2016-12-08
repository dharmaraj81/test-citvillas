<meta charset="UTF-8" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" />
	
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php
	
	$cs=Yii::app()->clientScript;
    $cssCoreUrl = $cs->getCoreScriptUrl();
    $cs->registerCoreScript('jquery');
    $cs->registerCoreScript('jquery.ui');
	
	$cs->registerCssFile($layout_asset.'/css/style.css');
    $cs->registerCssFile($layout_asset.'/css/font-awesome.min.css');
    $cs->registerCssFile($layout_asset.'/css/flexslider.css');
    $cs->registerCssFile($layout_asset.'/css/font-awesome-ie7.min.css');
    $cs->registerCssFile($layout_asset.'/css/keyframes.css');
    $cs->registerCssFile($layout_asset.'/css/grid.css');
	$cs->registerCssFile($layout_asset.'/css/responsive-banner.css');
   
    $cs->registerScriptFile($layout_asset.'/js/jquery.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile('http://html5shim.googlecode.com/svn/trunk/html5.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($layout_asset.'/js/base.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($layout_asset.'/js/jquery.fitvids.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($layout_asset.'/js/jquery.inview.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($layout_asset.'/js/jquery.scrollParallax.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/js/jquery-1.6.3.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($layout_asset.'/js/easyResponsiveTabs.js', CClientScript::POS_HEAD);
    
    ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-30448-3', 'florencevillas.com');
  ga('send', 'pageview');

</script>
     