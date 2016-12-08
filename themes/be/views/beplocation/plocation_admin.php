<?php 
$this->pageTitle=t('Manage Property Location');
$this->pageHint=t('Here you can manage all Location of property'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Plocation')); ?>