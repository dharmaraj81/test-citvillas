<!DOCTYPE html>
<html>
<head>
<?php     
       if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
	
	$cs=Yii::app()->clientScript;
    $cssCoreUrl = $cs->getCoreScriptUrl();
    $cs->registerCoreScript('jquery');
    $cs->registerCoreScript('jquery.ui');
	
	$cs->registerCssFile($backend_asset.'/css/stylesheets.css');
    //$cs->registerCssFile($backend_asset.'/css/stylesheet.css');
    $cs->registerCssFile($backend_asset.'/css/icons.css');
    $cs->registerCssFile($backend_asset.'/css/bootstrap.css');
    $cs->registerCssFile($backend_asset.'/css/bootstrap-responsive.css');
    $cs->registerCssFile($backend_asset.'/css/fullcalendar.css');
    $cs->registerCssFile($backend_asset.'/css/ui.css');
    $cs->registerCssFile($backend_asset.'/css/select2.css');
    $cs->registerCssFile($backend_asset.'/css/uniform.default.css');
    $cs->registerCssFile($backend_asset.'/css/validation.css');
    $cs->registerCssFile($backend_asset.'/css/mCustomScrollbar.css');
    $cs->registerCssFile($backend_asset.'/css/cleditor.css');
    $cs->registerCssFile($backend_asset.'/css/fancybox/jquery.fancybox.css');
    $cs->registerCssFile($backend_asset.'/css/login.css');
    //$cs->registerCssFile($backend_asset.'/css/fullcalendar.print.css');
    
    $cs->registerScriptFile($backend_asset.'/js/plugins/jquery/jquery.mousewheel.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/cookie/jquery.cookies.2.2.0.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/bootstrap.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/excanvas.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/jquery.flot.js', CClientScript::POS_HEAD);    
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/jquery.flot.stack.js', CClientScript::POS_HEAD);    
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/jquery.flot.pie.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/jquery.flot.resize.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/sparklines/jquery.sparkline.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/fullcalendar/fullcalendar.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/select2/select2.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/uniform/uniform.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/validation/languages/jquery.validationEngine-en.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/validation/jquery.validationEngine.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/animatedprogressbar/animated_progressbar.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/cleditor/jquery.cleditor.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/actions.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/charts.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/cookies.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/plugins.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/plugins/fancybox/jquery.fancybox.pack.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/plugins/dataTables/jquery.dataTables.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/plugins/cleditor/jquery.cleditor.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/backend.js', CClientScript::POS_HEAD);
    ?>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>
<div class="header"> <a class="logo" href="<?php echo bu().'/besite'; ?>"><img src="<?php echo $backend_asset; ?>/images/logo-inverse.png" alt="BookEasy - Ciao Italy Pty Ltd" title="BookEasy - Ciao Italy Pty Ltd" /></a>
  <div class="ciao-address">
    <p>CIT Europe Pty Ltd <br/>
      L3, 309 George Street <br/>
      Sydney NSW 2000 <br/>
      Australia +61 +61 292671255 ext 2133 <br/>
      Email:citvillas@cit.com.au</p>
  </div>
  <ul class="header_menu">
    <li class="list_icon"><a href="#">&nbsp;</a></li>
  </ul>
</div>
<div class="menu">
  <div class="breadLine">
    <div class="arrow"></div>
    <div class="adminControl active"> <?php echo t('Welcome'); ?>, <?php echo user()->getModel('display_name'); ?> </div>
  </div>
  <?php
  $user = User::model()->find(array('condition'=>"username='".Yii::app()->user->name."'"));
  $user->avatar;if($user->avatar!='') $imageurl = Yii::app()->baseUrl.'/../avatar/'.$user->avatar; else $imageurl = Yii::app()->baseUrl.'/../avatar/default.jpg';
  ?>
  <div class="admin">
    <?php if($user->avatar!='' && user()->isVillaOwner){?>
    <div class="image"><img src="<?php echo $imageurl; ?>" class="img-polaroid" width="50"/> </div>
    <?php } else if(!user()->isVillaOwner){?>
    <div class="image"><img src="<?php echo $imageurl; ?>" class="img-polaroid" width="50"/> </div>
    <?php } ?>
    <ul class="control">
      <?php if(!user()->isVillaOwner){?>
      <li><span class="icon-comment"></span> <a href="#"><?php echo t('Messages'); ?></a> <!-- <a href="#" class="caption red">12</a>--></li>
      <li><span class="icon-wrench"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/beuser/updatesettings"><?php echo t('Settings'); ?></a></li>
      <?php } ?>
      <li><span class="icon-lock"></span> <a href="<?php echo Yii::app()->request->baseUrl?>/beuser/changepass"><?php echo t('Change Password'); ?></a></li>
      <li><span class="icon-share-alt"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/besite/logout"><?php echo t('Logout'); ?></a></li>
    </ul>
    <!--
    <div class="row-form">
      <div class="span1">
        <?php	                                            
                                            $translate=Yii::app()->translate;
                                            echo $translate->dropdown();                                                                                       
                                             ?>
      </div>
    </div>
    --> 
  </div>
  <?php 
  
  		if((user()->isAgent) || (user()->isVillaOwner))
		{
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'navigation'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-power"></span><span class="text">'.t('Dashboard').'</span>', 'url'=>array('owners/index') ,
                                   'active'=> ((Yii::app()->controller->id=='besite') && (in_array(Yii::app()->controller->action->id,array('index')))) ? true : false
					    ),                               
												
					/*array('label'=>'<span class="isw-folder"></span><span class="text">'.t('Resource').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-retweet"></span><span class="text">'.t('Feed Partners').'</span>', 'url'=>array('/bevillaowner/admin'),)
					    ),'visible'=>(user()->isAgent) ? true : false,),*/

						array('label'=>'<span class="isw-empty_document"></span><span class="text">'.t('Property Details').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						/*array('label'=>'<span class="icon-leaf"></span><span class="text">'.t('Service Type').'</span>', 'url'=>array('/beadditional/admin'),'visible'=>(user()->isVillaOwner)?true:false),*/
						array('label'=>'<span class="icon-calendar"></span><span class="text">'.t('My Properties').'</span>', 'url'=>array('/bepinfo/admin'),'visible'=>(user()->isVillaOwner) ? true : false),
						array('label'=>'<span class="icon-calendar"></span><span class="text">'.t('Info').'</span>', 'url'=>array('/bepinfo/admin'),'visible'=>(user()->isAgent) ? true : false),
					    )),
						
						array('label'=>'<span class="isw-zoom"></span><span class="text">'.t('Planner  &amp; Bookings').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-search"></span><span class="text">'.t('Availability Calendar').'</span>', 'url'=>array('/bebooking/availabilitycalendar')),
						array('label'=>'<span class="icon-search"></span><span class="text">'.t('Availability').'</span>', 'url'=>array('/bebooking/availability')),
						
						array('label'=>'<span class="icon-gift"></span><span class="text">'.t('Bookings').'</span>', 'url'=>array('/bebooking/reserve'), )
						
					    ),'visible'=>( (user()->isAgent) ) ? true : false),
						
						array('label'=>'<span class="isw-list"></span><span class="text">'.t('My info').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Info').'</span>', 'url'=>array('/bevillaowner/myinfo/'),),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Company Info').'</span>', 'url'=>array('/becompany/company'),'visible'=>(user()->isAgent)?true:false)
					    ),'visible'=>( (user()->isAgent) ) ? true : false),
					    
					   array('label'=>'<span class="isw-list"></span><span class="text">'.t('My profile').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Profile Photo').'</span>', 'url'=>array('/bevillaowner/myprofile/'),),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Personal information').'</span>', 'url'=>array('/bevillaowner/myinfoview/'),),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Change My Password').'</span>', 'url'=>array('/beuser/changePass'),),
						
					    ),'visible'=>( (user()->isVillaOwner) ) ? true : false),		
						
				),
				
			));
		}
		else
		{
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'navigation'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-power"></span><span class="text">'.t('Dashboard').'</span>', 'url'=>array('/besite/index') ,
                                   'active'=> ((Yii::app()->controller->id=='besite') && (in_array(Yii::app()->controller->action->id,array('index')))) ? true : false
					    ),                               
					array('label'=>'<span class="isw-text_document"></span><span class="text">'.t('Web Page').'</span>',  'url'=>'#','itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-file"></span><span class="text">'.t('Pages').'</span>', 'url'=>array('/bepage/admin')),
						array('label'=>'<span class="icon-share"></span><span class="text">'.t('Tours Type').'</span>', 'url'=>array('/betourtype/admin')),
						array('label'=>'<span class="icon-plane"></span><span class="text">'.t('Tours').'</span>', 'url'=>array('/betour/admin'),)
					    ),'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)) ? true : false, ),
												
						
					array('label'=>'<span class="isw-folder"></span><span class="text">'.t('Resource').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						
						array('label'=>'<span class="icon-ok-sign"></span><span class="text">'.t('Content Links').'</span>', 'url'=>array('/beclink/admin')),
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Group creation').'</span>', 'url'=>array('/begroupcreation/admin')),
						array('label'=>'<span class="icon-ok-sign"></span><span class="text">'.t('Recipient').'</span>', 'url'=>array('/berecipient/admin')),
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Newsletters').'</span>', 'url'=>array('/benewsletter/admin')),
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Manage Mail Doc').'</span>', 'url'=>array('/bemaildoc/admin')),
						array('label'=>'<span class=" icon-list-alt"></span><span class="text">'.t('Table & Fields').'</span>', 'url'=>array('/betable/create')),	
					    array('label'=>'<span class=" icon-list-alt"></span><span class="text">'.t('Tool Tip').'</span>', 'url'=>array('/betooltip/create')),	
						array('label'=>'<span class="icon-picture"></span><span class="text">'.t('Photo Title').'</span>', 'url'=>array('/bephototitle/create')),
						/*array('label'=>'<span class="isb-right"></span><span class="text">'.t('BackLink Groups').'</span>', 'url'=>array('/begroup/admin')),*/
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Document Agreement').'</span>', 'url'=>array('/bedocagrrement/admin')),
						array('label'=>'<span class="icon-retweet"></span><span class="text">'.t('Feed Partners').'</span>', 'url'=>array('/befeedlist/admin'),),
/*						
*/					    ),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false),
						
						
						array('label'=>'<span class="isw-pin"></span><span class="text">'.t('Locations').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Countries').'</span>', 'url'=>array('/becountry/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Region').'</span>', 'url'=>array('/beregion/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Provinces').'</span>', 'url'=>array('/beprovince/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Towns').'</span>', 'url'=>array('/betown/admin'),)
						
					    ),'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)) ? true : false,),
						
						array('label'=>'<span class="isw-archive"></span><span class="text">'.t('Property Details').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-leaf"></span><span class="text">'.t('Property Type').'</span>', 'url'=>array('/betype/admin'),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false,),
						array('label'=>'<span class="icon-th"></span><span class="text">'.t('Property Location').'</span>', 'url'=>array('/beplocation/admin'),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false,),
						array('label'=>'<span class="icon-qrcode"></span><span class="text">'.t('Property View').'</span>', 'url'=>array('/bepview/admin'),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false,),
						array('label'=>'<span class="icon-leaf"></span><span class="text">'.t('Service Type').'</span>', 'url'=>array('/beadditional/admin'),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false,),
						array('label'=>'<span class="icon-home"></span><span class="text">'.t('Info').'</span>', 'url'=>array('/bepinfo/admin'),)
						
					    ),'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)) ? true : false,),
						
						array('label'=>'<span class="isw-calendar"></span><span class="text">'.t('Planner  &amp; Bookings').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						/*array('label'=>'<span class="icon-tasks"></span><span class="text">'.t('Availability Calendar').'</span>', 'url'=>array('/bebooking/availabilitycalendar')),*/
						array('label'=>'<span class="icon-search"></span><span class="text">'.t('Availability').'</span>', 'url'=>array('/bebooking/availability')),
						array('label'=>'<span class="icon-gift"></span><span class="text">'.t('Bookings').'</span>', 'url'=>array('/bebooking/reserve'), )
					    ),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false,),
						
						array('label'=>'<span class="isw-calc"></span><span class="text">'.t('Amenities Info').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-glass"></span><span class="text">'.t('Amenities Type').'</span>', 'url'=>array('/beamenitiestype/admin')),
						array('label'=>'<span class="icon-check"></span><span class="text">'.t('Amenities').'</span>', 'url'=>array('/beamenities/admin'), )
						
					    ) ,'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false, ),
						
						
						array('label'=>'<span class="isw-tag"></span><span class="text">'.t('Tags').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-tags"></span><span class="text">'.t('Tags').'</span>', 'url'=>array('/betag/admin'),)
					    ) ,'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) ) ? true : false, ),
						
						array('label'=>'<span class="isw-users"></span><span class="text">'.t('Manage People').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('All People').'</span>','url'=>array('/bevillaowner/admin')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Villa Owners').'</span>', 'url'=>array('/bevillaowner/admin/101')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Customers').'</span>', 'url'=>array('/bevillaowner/admin/100'),'visible'=>( (user()->isAdmin) ) ? true : false,),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Travel Agent').'</span>', 'url'=>array('/bevillaowner/admin/102')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Newsletter Subscriber').'</span>', 'url'=>array('/bevillaowner/admin/103')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('3rd Party Contacts').'</span>', 'url'=>array('/bevillaowner/admin/104')),
						array('label'=>'<span class="icon-tint"></span><span class="text">'.t('Category').'</span>', 'url'=>array('/becategory/admin'), )
					    ) ,'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false, ),
						
						
						array('label'=>'<span class="isw-users"></span><span class="text">'.t('Manage Suppliers').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('All Suppliers').'</span>','url'=>array('/besupplier/create')),
						array('label'=>'<span class="icon-tint"></span><span class="text">'.t('Suppliers Type').'</span>', 'url'=>array('/bescategory/create')),
						array('label'=>'<span class="icon-tint"></span><span class="text">'.t('Suppliers Source').'</span>', 'url'=>array('/bessource/create'))
						
					    ) ,'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false, ),
						
						
						
						array('label'=>'<span class="isw-chats"></span><span class="text">'.t('Manage Reveiws'), 'url'=>'#', 'itemOptions'=>array('class'=>'openable'),
					       'items'=>array(
						array('label'=>'<span class="icon-comment"></span><span class="text">'.t('Properties Reveiws').'</span>', 'url'=>array('/bereview/admin')),
						array('label'=>'<span class="icon-comment"></span><span class="text">'.t('Tour Reveiws').'</span>', 'url'=>array('/betreview/admin')),
						array('label'=>'<span class="icon-envelope"></span><span class="text">'.t('Enquiry').'</span>', 'url'=>array('beenquiry/admin'),)	
					    ),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false,),
						
						
						
							
                        array('label'=>'<span class="isw-mail"></span><span class="text">'.t('Mail Manager').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Manage Sender Mail ID').'</span>', 'url'=>array('/besender/create')),
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Manage Mail Doc').'</span>', 'url'=>array('/bemaildoc/admin')),
						array('label'=>'<span class="icon-inbox"></span><span class="text">'.t('Mail & Scheduler').'</span>', 'url'=>array('/bemailschedule/admin')),
					
					    ),'visible'=>((user()->isOperator) || (user()->isAdmin)) ? true : false,),
						
						
						
						
						
                        array('label'=>'<span class="isw-empty_document"></span><span class="text">'.t('Reports'), 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
						   'items'=>array(
							   array('label'=>'<span class="icon-home"></span><span class="text">'.t('Properties').'</span>', 'url'=>array('/bereports/properties')),
							   array('label'=>'<span class="icon-user"></span><span class="text">'.t('Owners').'</span>', 'url'=>array('/bereports/Manageownerreport')),
							   array('label'=>'<span class="icon-gift"></span><span class="text">'.t('Reservations').'</span>', 'url'=>array('/bereports/reservation')),
							   array('label'=>'<span class="icon-calendar"></span><span class="text">'.t('Arrival').'</span>', 'url'=>array('/bereports/arrival')),
							   array('label'=>'<span class="icon-calendar"></span><span class="text">'.t('GPS Report').'</span>', 'url'=>array('/bereports/gps')),
						),
							'visible'=>user()->isAdmin ? true : false,   
						),
						
						
						
					array('label'=>'<span class="isw-user"></span><span class="text">'.t('User').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					       'items'=>array(
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Create User').'</span>', 'url'=>array('/beuser/create')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Manage Users').'</span>', 'url'=>array('/beuser/admin')),
						array('label'=>'<span class="icon-ok-sign"></span><span class="text">'.t('Permission').'</span>', 'url'=>array('/rights/assignment'),'active'=>in_array(Yii::app()->controller->id,array('assignment','authItem')) ?true:false),
					    ),
                         'visible'=>user()->isAdmin ? true : false,   
					    ),
						
						
                        array('label'=>'<span class="isw-settings"></span><span class="text">'.t('Settings'), 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
                                           'items'=>array(
                                               array('label'=>'<span class="icon-wrench"></span><span class="text">'.t('General').'</span>', 'url'=>array('/besettings/general')),
                                               array('label'=>'<span class="icon-tasks"></span><span class="text">'.t('System').'</span>', 'url'=>array('/besettings/system')),
											   array('label'=>'<span class="icon-briefcase"></span><span class="text">'.t('Currency').'</span>', 'url'=>array('/besettings/currency')),
                                         
                                        ),
                                            'visible'=>user()->isAdmin ? true : false,   
                                        ),
										
						array('label'=>'<span class="isw-refresh"></span><span class="text">'.t('Caching').'</span>', 'url'=>array('/becaching/clear') ,
                                   'active'=> ((Yii::app()->controller->id=='becaching') && (in_array(Yii::app()->controller->action->id,array('index')))) ? true : false,'visible'=>user()->isAdmin ? true : false,   
					    ),  
						
				),
				
			));
		} ?>
</div>
<div class="content">
  <div class="breadLine">
    <?php if(user()->isAdmin){?>
    <ul class="buttons">
      <li> <a href="#" class="link_bcPopupList"><span class="icon-user"></span><span class="text">Users list</span></a>
        <div id="bcPopupList" class="popup">
          <div class="head">
            <div class="arrow"></div>
            <span class="isw-users"></span> <span class="name">List users</span>
            <div class="clear"></div>
          </div>
          <div class="body-fluid users">
            <?php
			$user = User::model()->findAll(array('condition'=>"login_status='1'"));
			foreach($user as $data):
				if($data->avatar!='') $imageurl = Yii::app()->baseUrl.'/../avatar/'.$data->avatar; else $imageurl = Yii::app()->baseUrl.'/../avatar/default.jpg';
			?>
            <div class="item">
              <div class="image"><a href="<?php echo Yii::app()->createUrl('beuser/view/'.$data->user_id);?>"><img src="<?php echo $imageurl;?>" width="32"/></a></div>
              <div class="info"> <a href="<?php echo Yii::app()->createUrl('beuser/view/'.$data->user_id);?>" class="name"><?php echo $data->display_name;?></a> <span>online</span> </div>
              <div class="clear"></div>
            </div>
            <?php endforeach;?>
          </div>
          <div class="footer">
            <?php if((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)){?>
            <a href="<?php echo Yii::app()->createUrl('beuser/create');?>">
            <button class="btn" type="button">Add new</button>
            </a>
            <?php } ?>
            <button class="btn btn-danger link_bcPopupList" type="button">Close</button>
          </div>
        </div>
      </li>
    </ul>
    <?php } ?>
  </div>
  <div class="workplace">
    <div class="row-fluid">
      <div class="span12">
        <div class="page-header">
          <?php if(isset($this->menu)) :?>
          <?php if(count($this->menu) >0 ): ?>
          <div class="header-info">
            <?php
                                       
                                        $this->widget('zii.widgets.CMenu', array(
                                                'items'=>$this->menu,
                                                'htmlOptions'=>array(),
                                        ));
                                       
                                ?>
          </div>
          <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php echo $content; ?> </div>
</div>
</div>

<!-- page -->

</body>
</html>
<?php $uservalue = User::model()->find(array('condition'=>"username='".Yii::app()->user->name."'")); ?>
<script>
   window.setInterval("check_activity('<?php  echo Yii::app()->request->baseUrl;?>/besite/checkloginstatus','<?php  echo $uservalue->user_id; ?>')",5000);
 function check_activity(url,curent_user)
  {
    url=url+"?curent_user="+curent_user;
    jQuery.get(url,{},function(data){ //alert(data);
	});
  }
</script>