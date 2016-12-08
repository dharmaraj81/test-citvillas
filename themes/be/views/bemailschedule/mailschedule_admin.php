<?php 
$this->pageTitle=t('Manage Mails & Schedule');
$this->pageHint=t('Here you can manage your Mails & Schedules'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Mailschedule')); ?>