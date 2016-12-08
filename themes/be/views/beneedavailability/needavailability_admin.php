<?php 
$this->pageTitle=t('Manage Availabilty');
$this->pageHint=t('Here you can manage availability'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Needavailability')); ?>