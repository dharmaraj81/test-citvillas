<?php 
$this->pageTitle=t('Manage Property View');
$this->pageHint=t('Here you can manage all Views of property'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Pview')); ?>