<?php 
$this->pageTitle=t('Manage Province Information');
$this->pageHint=t('Here you can manage all Info for this Province'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Province')); ?>