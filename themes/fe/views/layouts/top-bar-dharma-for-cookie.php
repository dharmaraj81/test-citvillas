<?php
  if( isset($_GET['a']) && ($_GET['a']!='') && isset($_GET['s']) && ($_GET['s']!='') ) 
  {
	//Read the cookie, do you want to get the value from cookie, pls uncomment the following line
	//$value = isset(Yii::app()->request->cookies['CitVillaAgent']) ? (string)Yii::app()->request->cookies['CitVillaAgent']->value : '';
	
	//Set the cookie, if its not registered our cookie already
	if !isset(Yii::app()->request->cookies['cookie_name']) 
	{
		$cookie = new CHttpCookie('CitVillaAgent',  $_GET['a'].'|'.$_GET['s']); 
		$cookie->expire = time()+( (int)(Yii::app()->settings->get('system', 'agent_cookie_age')) );  
	}
  }
?>
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
      
      <div class="wpml-lang left"><div id="lang_sel"><ul><li>
	  <div class="label">Select Currency:</div>
       <?php 
         $this->widget('currencymanager.widgets.GetCurrencyDropdown'
                        //,array(
                            //'reloadgrid'=>true //Default False
                            //,'filterzeros'=>false //Default true
                            //)
         )
     ?>
       </li></ul></div></div>
      
     
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
