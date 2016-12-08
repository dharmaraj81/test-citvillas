<?php 
$this->pageTitle=t('Manage Calendar Type');
$this->pageHint=t('Here you can manage all Types of People'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Caltype')); ?>