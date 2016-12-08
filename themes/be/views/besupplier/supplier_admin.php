<?php 
$this->pageTitle=t('Manage Supplier\'s Information');
$this->pageHint=t('Here you can manage all Info for this Supplier'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Supplier')); ?>