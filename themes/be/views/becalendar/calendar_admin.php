<?php 
$this->pageTitle=t('Manage Classes');
$this->pageHint=t('Here you can manage your Class Dates'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Calendar')); 
?>