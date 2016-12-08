<?php 
$this->pageTitle=t('Manage Leads');
$this->pageHint=t('Here you can Manage Leads'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Leads')); ?>