<?php 
$this->pageTitle=t('Manage All Tickets');
$this->pageHint=t('Here you can manage all Tickets'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Cticket')); ?>