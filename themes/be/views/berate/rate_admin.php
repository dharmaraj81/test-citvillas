<?php 
$this->pageTitle=t('Manage Season Rates');
$this->pageHint=t('Here you can manage the Rates'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Rate')); ?>