<?php

	session_start();

	
	if( (Yii::app()->user->isAgent) ) 
	
	{  
	
		echo '<br>Affiliate id :'.Yii::app()->session->get('aid');
		echo '<br>Staff id :'.Yii::app()->session->get('sid');
		echo '<br>User id :'. Yii::app()->user->getId();
		
	}
	
	
 ?>
<style>
.fixed-width.cf{
	display:flex;
	flex-flow: row wrap;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    align-content: space-around;
}
.fixed_header {
    z-index:100000;
    transition:0.3s all;
    background:#002f5e;
    opacity:0;
    transform:translateY(-50%);
    width:100%;
    top:-50%;
    position:absolute;
    padding:10px;

}	
.fixed_header .left_header{
	width:30%;
	text-align: center;
}
.fixed_header .left_header a,
.fixed_header .right_header a{
	padding:10px;
	border-radius:2px;
	margin-right:10px;
    color:#ffffff;
}
.fixed_header .center_header{
	width:30%;
	text-align: center;
}
.fixed_header .right_header{
	width:35%;
}
.fixed_header .fa{padding:0px 6px 0px 0px;}
#topbar-wrap{
position: relative;
z-index: 9999999;
}
</style>

<script>
jQuery( document ).ready(function() {
	
	jQuery(window).scroll(function() {
		
			if(jQuery(window).scrollTop() >= 200){
				jQuery('.fixed_header').css({
						'position':'fixed',
						'transform':'translateY(0)',
						'opacity':'1',
					});
                               jQuery('.banner .op-logo img').css({
                                                 'max-width':'8em'
                                });
			}else{

				jQuery('.fixed_header').css({
						'opacity':'0',
						'transform':'translateY(-50%)'
					});
                              jQuery('.banner .op-logo img').css({
                                                 'max-width':'250px'
                                });
			}
		
	});	
	
});
</script>
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
		echo "Welcome ".Yii::app()->user->name." [<a href='http://staging.citvillas.com/besite/logout'> Logout </a>]";
		
	}
	
?>
</div>

	<script type="text/javascript">
		$(document).ready(function(){
			window.MYwishlist = $.Wishlist("wishlist");
		});
	</script>
	
    <div class="fixed_header " style="top: 0px;">
		<div class="fixed-width cf container">
			<div class="left_header">
				<a href="http://staging.citvillas.com/" id="live_chat"><i class="fa fa-home"></i>Home</a>
				<a href="http://staging.citvillas.com/contact-us/"><i class="fa fa-envelope-o"></i>Contact us</a>
			</div>
			<div class="center_header">
			<a href="/" class="top_logo"><img style="width:150px;" src="http://staging.citvillas.com/property-images/CIT-logo-2016-Trans-white.png"alt=""></a>
			</div>
			<div class="right_header">
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
					<a href="http://staging.citvillas.com/wishlisted/"><span>Wishlist Items:</span><span style="color:#fff;" class="wishCounter">0</span></a>
				</div>
			</div>
		</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
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
					<a style="color:#fff;"  href="http://staging.citvillas.com/wishlisted/"><span>Wishlist Items:</span><span style="color:#fff;" class="wishCounter">0</span></a>
				</div>
			</div>
		</div>
      
     
      <!-- <div class="wpml-lang left"><div id="lang_sel"><ul><li><a href="#" class="lang_sel_sel icl-en"><img class="iclflag" src="http://contempothemes.com/wp-real-estate-7/vacation-rentals-demo/wp-content/plugins/sitepress-multilingual-cms/res/flags/en.png" alt="en" title="English">
&nbsp;<span class="icl_lang_sel_current icl_lang_sel_native">English</span></a> </li></ul></div></div>-->
    <?php //use wishlist\widgets\WishlistButton; ?>
	<?php $this->widget('wishlist.widgets.WishlistButton',array('model' => $model)); ?>

<?php /* Выведет кнопку "добавить в избранное" с пользовательскими параметрами */ ?>
<?php
 /* WishlistButton::widget(array(
    'model' => $model, // модель для добавления
    'text' => 'Добавить мой список', // свой текст кнопки
    'htmlTag' => 'a', // тэг
    'cssClass' => 'custom_class', // свой класс
    'cssClassInList' => 'custom_class' // свой класс для добавленного объекта
	)) */ ?>
     
    </div>
    <div class="clear"></div>
  </div>
</div>