<?php 
$this->pageTitle=t('Manage Feed Partners');
$this->pageHint=t('Here you can manage all Feed Partners'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Feedlist')); ?>