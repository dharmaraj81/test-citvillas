
<div class="header-inner page-width clearfix">
  <div class="logo"> <a href="<?php echo FRONT_SITE_URL; ?>" title="<?php echo t('Florence Villas'); ?>"><img src="<?php echo $layout_asset; ?>/images/villas_logo.png" alt="<?php echo t('Florence Villas'); ?>" title="<?php echo t('Florence Villas'); ?>" /></a> </div>
  <div class="header-right clearfix">
    <div class="translate clearfix">
      <div id="google_translate_element"></div>
      <script type="text/javascript">
function googleTranslateElementInit() {
	
	//var userLang = navigator.language || navigator.userLanguage; 
    //alert ("The language is: " + userLang);
	
	$.getJSON("http://justmyip.org/api",function(result){

            console.dir(result);
            country_code = result.geo.country_code.toLowerCase();
	
  new google.translate.TranslateElement({pageLanguage: country_code, includedLanguages: 'ca,cs,da,de,es,et,fi,fr,hr,hu,it,iw,ja,ko,lt,nl,no,pl,pt,ro,ru,sk,sl,sv,tr,uk,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-30448-3'}, 'google_translate_element');
   });
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
    </div>
    <div class="header-right-top clearfix"> <span class="add-villa"><a href="<?php echo FRONT_SITE_URL.'villa-owner-enquiry'; ?>"><?php echo t('Add My Villa'); ?></a></span> <span class="login"><a href="<?php echo FRONT_SITE_URL.'besite/index'; ?>" title="<?php echo t('Login'); ?>"><?php echo t('Login'); ?></a></span> </div>
    <div class="contact-block">
      <p><?php echo t('Call us'); ?><span> +1 801-6062843</span></p>
    </div>
    <div class="skype"><a href="callto://florencevillas/" title="<?php echo t('Call Us'); ?>"><?php echo t('Skype'); ?></a><span>&nbsp;</span></div>
  </div>
</div>
