<?php 
$this->pageTitle=t('Manage Currency Settings');
$this->pageHint=t('Here you can manage all Site Currency Settings'); 
?>
<?php $this->widget('cmswidgets.settings.SettingsWidget',array('type'=>'currency')); 
?>