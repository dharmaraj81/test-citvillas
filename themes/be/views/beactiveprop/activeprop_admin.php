<?php 
$this->pageTitle=t('Manage All Active Properties');
$this->pageHint=t('Here you can manage all Active Properties'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Activeprop')); ?>