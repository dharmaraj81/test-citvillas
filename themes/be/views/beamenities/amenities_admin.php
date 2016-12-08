<?php 
$this->pageTitle=t('Manage Amenities');
$this->pageHint=t('Here you can manage all Amenities'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Amenities')); ?>