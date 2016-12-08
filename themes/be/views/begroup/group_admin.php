<?php 
$this->pageTitle=t('Manage BackLinks Group');
$this->pageHint=t('Here you can manage your BackLinks Groups'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Group')); ?>