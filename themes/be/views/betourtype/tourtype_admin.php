<?php 
$this->pageTitle=t('Manage Tour Type');
$this->pageHint=t('Here you can manage all Types of Tours'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Tourtype')); ?>