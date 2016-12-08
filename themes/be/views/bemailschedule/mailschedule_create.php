<?php 
$this->pageTitle=t('Add New Mail & Schedule');
$this->pageHint=t('Here you can add new Mail Schedule Here'); 

?>

<?php $this->widget('cmswidgets.mailschedule.MailscheduleCreateWidget',array()); ?>