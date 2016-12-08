<?php 
$this->pageTitle=t('Manage Opportunity');
$this->pageHint=t('Here you can manage all Opportunity'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Opportunity')); ?>