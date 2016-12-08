<?php 
$this->pageTitle=t('Manage All Photos');
$this->pageHint=t('Here you can manage all Photos'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Needphotos')); ?>