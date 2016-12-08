<?php 
$this->pageTitle=t('Manage Mails');
$this->pageHint=t('Here you can Manage All Mails'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Crmmails')); ?>