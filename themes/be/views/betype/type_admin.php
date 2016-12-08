<?php 
$this->pageTitle=t('Manage Property Type');
$this->pageHint=t('Here you can manage all Types of property'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Type')); ?>