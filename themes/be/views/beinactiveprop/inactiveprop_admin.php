<?php 
$this->pageTitle=t('Manage All Inactive Properties');
$this->pageHint=t('Here you can manage all Inactive Properties'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Inactiveprop')); ?>