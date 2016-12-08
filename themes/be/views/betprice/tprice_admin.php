<?php 
$this->pageTitle=t('Manage Tour Price');
$this->pageHint=t('Here you can manage the Price'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Tprice')); ?>