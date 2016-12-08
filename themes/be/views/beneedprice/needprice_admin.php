<?php 
$this->pageTitle=t('Manage All Prices');
$this->pageHint=t('Here you can manage all Prices'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Needprice')); ?>