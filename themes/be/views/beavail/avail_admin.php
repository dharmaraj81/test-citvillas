<?php 
$this->pageTitle=t('Manage Offers');
$this->pageHint=t('Here you can manage the offers'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Soffer')); ?>