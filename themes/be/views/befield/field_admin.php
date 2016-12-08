<?php 
$this->pageTitle=t('Manage Fields');
$this->pageHint=t('Here you can manage all Fields'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Field')); ?>