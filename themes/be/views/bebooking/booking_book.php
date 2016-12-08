<?php 
$this->pageTitle=t('Manage Bookings');
$this->pageHint=t('Here you can manage all Bookings'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Booking')); ?>