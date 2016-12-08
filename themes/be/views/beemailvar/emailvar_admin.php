<?php 
$this->pageTitle=t('Manage Email Variable');
$this->pageHint=t('Here you can manage all Email Variable'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Emailvar')); ?>