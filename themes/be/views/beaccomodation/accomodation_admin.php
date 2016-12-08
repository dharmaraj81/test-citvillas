<?php 
switch ($type){
    case ConstantDefine::OBJECT_STATUS_DRAFT :
        $this->pageTitle=t('Manage Drafted Accomodations');
        $this->pageHint=t('Here you can manage all Drafted Accomodation on your site'); 
        break;
    
    case ConstantDefine::OBJECT_STATUS_PENDING :
        $this->pageTitle=t('Manage Pending Accomodations');
        $this->pageHint=t('Here you can manage all Pending Accomodations on your site'); 
        break;
    
    case ConstantDefine::OBJECT_STATUS_PUBLISHED :
        $this->pageTitle=t('Manage Published Accomodations');
        $this->pageHint=t('Here you can manage all Published Accomodations on your site'); 
        break;
    
    default :       
        $this->pageTitle=t('Manage Accomodations');
        $this->pageHint=t('Here you can manage all Accomodations on your site'); 
        break;
}

?>
<?php $this->widget('cmswidgets.object.ObjectManageStatusWidget',array('type'=>$type)); 
?>