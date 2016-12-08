<?php 
$this->pageTitle=t('Manage Mail IDs');
$this->pageHint=t('Here you can manage all Mail Sender'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Sender')); ?>