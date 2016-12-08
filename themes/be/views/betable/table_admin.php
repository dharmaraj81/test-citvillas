<?php 
$this->pageTitle=t('Manage Table Names');
$this->pageHint=t('Here you can manage all Table Names'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Table')); ?>