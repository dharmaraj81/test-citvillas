<?php 
$this->pageTitle=t('Manage All Tours');
$this->pageHint=t('Here you can manage all Info about Tours'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Tour')); ?>