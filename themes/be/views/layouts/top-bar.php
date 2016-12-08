<?php

	session_start();

	
	if( (Yii::app()->user->isAgent) ) 
	
	{  
	
		//echo '<br>Affiliate id :'.Yii::app()->session->get('aid');
		//echo '<br>Staff id :'.Yii::app()->session->get('sid');
		//echo '<br>User id :'. Yii::app()->user->getId();
		
	}
	
	
 ?>

<div class="welcome">
<?php
if( isset($_GET['a']) && ($_GET['a']!='') && isset($_GET['s']) && ($_GET['s']!='') ) 
	{
		//Read the cookie, do you want to get the value from cookie, pls uncomment the following line
		//$value = isset(Yii::app()->request->cookies['CitVillaAgent']) ? (string)Yii::app()->request->cookies['CitVillaAgent']->value : '';
		//Set the cookie, if its not registered our cookie already
	if ( isset(Yii::app()->request->cookies['CitVillaAgent'])) 
		{
			unset(Yii::app()->request->cookies['CitVillaAgent']);
			$cookie = new CHttpCookie('CitVillaAgent',  $_GET['a'].'|'.$_GET['s']); 
			$cookie->expire = time()+( (int)(Yii::app()->settings->get('system', 'agent_cookie_age')) );  
			Yii::app()->request->cookies['CitVillaAgent'] = $cookie;
		} 
		else 
		{			
			$cookie = new CHttpCookie('CitVillaAgent',  $_GET['a'].'|'.$_GET['s']); 
			$cookie->expire = time()+( (int)(Yii::app()->settings->get('system', 'agent_cookie_age')) );
			Yii::app()->request->cookies['CitVillaAgent'] = $cookie;
		}
	}

	//Login Agent ( Welcome Message )
	
	if( (Yii::app()->user->isAgent) ) 
	{
		echo "Welcome ".Yii::app()->user->name." [<a href='http://www.citvillas.com/besite/logout'> Logout</a>]";
		
	}
	
?>
</div>

	<script type="text/javascript">
		$(document).ready(function(){
			window.MYwishlist = $.Wishlist("wishlist");
		});
	</script>
	

<div id="topbar-wrap">
  <div class="container">
    <div class="contact-top">
      <ul class="social">
        <li class="login"><a href="<?php echo FRONT_SITE_URL; ?>"> <i class="fa fa-home"></i> </a></li>
        <li class="login"><a href="<?php echo $this->createUrl('besite/index'); ?>"><i class="fa fa-sign-in"></i> <?php echo t('Login'); ?></a></li>
        <li class="register"><a href="<?php echo $this->createUrl('site/contactus'); ?>"><i class="fa fa-envelope-o"></i> <?php echo t('Contact Us'); ?></a></li>
        <li class="register"><a href="<?php echo $this->createUrl('site/villaownerenquiry'); ?>"><i class="fa fa-list-ul"></i> <?php echo t('List My Villa'); ?></a></li>
        <li class="facebook"><a href="https://www.facebook.com/CiaoItalyVillas" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li class="twitter"><a href="https://twitter.com/ciaoitalyvillas" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li class="linkedin"><a href="https://au.linkedin.com/in/elizabethmorrisciaoitalyvillas/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        <li class="google"><a href="https://plus.google.com/+Ciaoitalyvillas" target="_blank"><i class="fa fa-google-plus"></i></a></li>
        <li class="contact-phone">Call Today:  +1 300 380 992</li>
      </ul>
      
      <div class="wpml-lang left">
		  <div id="lang_sel">
			  <ul>
				  <li>
					<div class="label">Currency:</div>
					<?php 
					 $this->widget('currencymanager.widgets.GetCurrencyDropdown'
									//,array(
										//'reloadgrid'=>true //Default False
										//,'filterzeros'=>false //Default true
										//)
						)
					?>
				   </li>
			   </ul>
		   </div>
	   </div>
	   <div style="color:#fff; position:relative; float:left; padding-top:4px;">
	   <div class="userbar">
				<div class="right">
					<a style="color:#fff;"  href="<?php echo Yii::app()->createUrl('site/wishlist'); ?>"><span>Wishlist Items:</span><span style="color:#fff;" class="wishCounter">0</span></a>
				</div>
			</div>
		</div>
      
     
    </div>
    <div class="clear"></div>
  </div>
</div>