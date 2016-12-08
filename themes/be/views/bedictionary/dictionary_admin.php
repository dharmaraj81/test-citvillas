<?php 
$this->pageTitle=t('Manage Dictionary words');
$this->pageHint=t('Here you can manage Words in dictionary'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Dictionary')); ?>