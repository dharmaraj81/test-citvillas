<?php 
$this->pageTitle=t('Manage Lead');
$this->pageHint=t('Here you can manage all Lead'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Lead')); ?>