<?php 
$this->pageTitle=t('Manage All Messages');
$this->pageHint=t('Here you can manage all Messages'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Cmessage')); ?>