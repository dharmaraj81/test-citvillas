<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);

?>

<!DOCTYPE html>

<!--[if lt IE 7 ]><html class="ie ie6" lang="en-US"><![endif]-->

<!--[if IE 7 ]><html class="ie ie7" lang="en-US"><![endif]-->

<!--[if IE 8 ]><html class="ie ie8" lang="en-US"><![endif]-->

<!--[if (gte IE 9)|!(IE)]><html lang="en-US"><![endif]-->

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="icon" href="<?php echo $layout_asset.'/images/favicons/favicon.ico'; ?>" type="image/png" sizes="16x16">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $layout_asset.'/images/favicons/apple-icon-57x57.png'; ?>" >
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $layout_asset.'/images/favicons/apple-icon-60x60.png'; ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $layout_asset.'/images/favicons/apple-icon-72x72.png'; ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $layout_asset.'/images/favicons/apple-icon-76x76.png'; ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $layout_asset.'/images/favicons/apple-icon-114x114.png'; ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $layout_asset.'/images/favicons/apple-icon-120x120.png'; ?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $layout_asset.'/images/favicons/apple-icon-144x144.png'; ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $layout_asset.'/images/favicons/apple-icon-152x152.png'; ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $layout_asset.'/images/favicons/apple-icon-180x180.png'; ?>">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $layout_asset.'/images/favicons/android-icon-192x192.png'; ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $layout_asset.'/images/favicons/favicon-32x32.png'; ?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $layout_asset.'/images/favicons/favicon-96x96.png'; ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $layout_asset.'/images/favicons/favicon-16x16.png'; ?>">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo $layout_asset.'/images/favicons/ms-icon-144x144.png'; ?>">
<meta name="theme-color" content="#ffffff">

<meta name="p:domain_verify" content="e0ea997363cdcc5628ab9f09f088c493"/>

<?php if(isset($meta)) { ?>

<meta name="robots" content="<?php echo ($meta->allow_index) ? 'index' : 'noindex' ;?>, <?php echo ($meta->allow_follow) ? 'follow' : 'nofollow' ;?>" />

<?php } ?>

<?php

	

	$cs=Yii::app()->clientScript;

	$cssCoreUrl = $cs->getCoreScriptUrl();

   // $cs->registerCoreScript('jquery');

   // $cs->registerCoreScript('jquery.ui');

	

	$cs->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700');

	$cs->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700');

	$cs->registerCssFile('http://fonts.googleapis.com/css?family=Oswald');
	
	$cs->registerCssFile('http://fonts.googleapis.com/css?family=Marcellus');
	
	$cs->registerCssFile('http://fonts.googleapis.com/css?family=Homemade+Apple|Quattrocento+Sans:400,700|Cinzel');

	$cs->registerCssFile($layout_asset.'/css/style.css?ver=1.0','all');

	$cs->registerCssFile($layout_asset.'/css/base.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/responsive-gs-12col.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/layout.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/ct-dropdowns.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/prettyPhoto.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/flexslider.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/shortcodes/css/shortcodes.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/shortcodes/css/symple_shortcodes_styles.css?ver=4.1.3','all');

	$cs->registerCssFile($layout_asset.'/css/page-builder-blocks.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/font-awesome.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/flexslider-direction-nav.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/jquery.bxslider.css?ver=4.1.5','screen');

	$cs->registerCssFile($layout_asset.'/css/animate.min.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/jquery.bxslider.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/dsidxpress.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/listing-print.css?ver=4.1.2','print');

	$cs->registerCssFile($layout_asset.'/css/comments.css?ver=4.1.2','screen');

	$cs->registerCssFile($layout_asset.'/css/ct-social/assets/font-awesome.css?ver=1.0','all');

	$cs->registerCssFile($layout_asset.'/css/ct-social/assets/style.css?ver=1.0','all');
	


	

	

	//$cs->registerCssFile('http://s.gravatar.com/css/hovercard.css?ver=2015Apraa');

	//$cs->registerCssFile('http://s.gravatar.com/css/services.css?ver=2015Apraa');

    ?>

<title><?php echo $this->pageTitle; ?></title>

<!--[if lte IE 7]>

<link rel='stylesheet' id='ie-css'  href='<?php echo $layout_asset; ?>'/css/ie.min.css?ver=4.1.2' type='text/css' media='all' />

<![endif]-->

<?php $cs=Yii::app()->clientScript; ?>

</head>

<?php echo $content; ?>

<?php 



	$cs->registerScriptFile($layout_asset.'/js/jquery-1.11.1.js', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/ct.tooltipmenu.min.js', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/jquery.customSelect.min.js?ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/ct.select.js?ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/jquery.transit.min.js?ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile('http://maps.gstatic.com/maps-api-v3/api/js/20/9/common.js', CClientScript::POS_HEAD);

	$cs->registerScriptFile('http://maps.gstatic.com/maps-api-v3/api/js/20/9/stats.js', CClientScript::POS_HEAD);

	$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false&amp;ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile('http://maps.gstatic.com/maps-api-v3/api/js/20/9/main.js', CClientScript::POS_HEAD);



	$cs->registerScriptFile($layout_asset.'/js/jquery.prettyPhoto.js?ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/retina.js?ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/jquery.fitvids.js?ver=1.0', CClientScript::POS_HEAD);

	/*$cs->registerScriptFile($layout_asset.'/js/foresight.min.js?ver=1.0', CClientScript::POS_HEAD);*/

	$cs->registerScriptFile($layout_asset.'/js/jquery.cycle.lite.js?ver=1.0', CClientScript::POS_HEAD);	
     
	//$cs->registerScriptFile($layout_asset.'/js/jquery.flexslider-min.js?ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/infobubble.js?ver=1.0', CClientScript::POS_HEAD);

	/*$cs->registerScriptFile($layout_asset.'/js/markerwithlabel.js?ver=1.0', CClientScript::POS_HEAD);*/

	/*$cs->registerScriptFile($layout_asset.'/js/mapping.js?ver=1.0', CClientScript::POS_HEAD);*/

	$cs->registerScriptFile($layout_asset.'/js/modernizr.custom.js?ver=1.0', CClientScript::POS_HEAD);

/*	$cs->registerScriptFile($layout_asset.'/js/classie.js?ver=1.0', CClientScript::POS_HEAD);	*/

	$cs->registerScriptFile($layout_asset.'/js/jquery.hammer.min.js?ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/toucheffects.js?ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/base.js?ver=1.0', CClientScript::POS_HEAD);

	$cs->registerScriptFile($layout_asset.'/js/core.js?ver=1.0', CClientScript::POS_HEAD);
	//$cs->registerScriptFile($layout_asset.'/js/symple_tabs.js?ver=1.0', CClientScript::POS_HEAD);
	
	//$cs->registerScriptFile($layout_asset.'/js/jquery/ui/tabs.min.js?ver=1.11.4', CClientScript::POS_HEAD);
	
	 $cs->registerScriptFile($layout_asset.'/js/jq.js?ver=1.9.1 ', CClientScript::POS_HEAD);
	 $cs->registerScriptFile($layout_asset.'/js/jquery_cookies.js?ver=1.3.1', CClientScript::POS_HEAD);
	 $cs->registerScriptFile($layout_asset.'/js/json2.js?ver=1.0', CClientScript::POS_HEAD);
	 $cs->registerScriptFile($layout_asset.'/js/underscore.js?ver=1.4.4', CClientScript::POS_HEAD);
	 $cs->registerScriptFile($layout_asset.'/js/backbone.js?ver=1.0.0', CClientScript::POS_HEAD);
	 $cs->registerScriptFile($layout_asset.'/js/jquery-wishlist.js?ver=1.3.2', CClientScript::POS_HEAD);
	
	
?>



<!--[if lt IE 9]>

    <script src="js/respond.min.js"></script>

    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->



</html>