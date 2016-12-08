<?php 
$this->pageTitle=t('Manage Group creation Information');
$this->pageHint=t('Here you can manage all Info for this Group caretion'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Groupcreation')); ?>