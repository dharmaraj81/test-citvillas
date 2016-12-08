<?php 
$this->pageTitle=t('Manage Seasons');
$this->pageHint=t('Here you can manage the Seasons'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Sdate')); ?>