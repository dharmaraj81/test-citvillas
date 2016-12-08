<?php 
$this->pageTitle=t('Manage Tags');
$this->pageHint=t('Here you can manage all Tags'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Tag')); ?>