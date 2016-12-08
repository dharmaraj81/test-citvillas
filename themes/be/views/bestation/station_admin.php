<?php 
$this->pageTitle=t('Manage Railway/Airport Information');
$this->pageHint=t('Here you can manage all Info for Railway/Airport'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Station')); ?>