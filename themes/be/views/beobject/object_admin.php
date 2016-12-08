<?php 
switch ($type){
    case ConstantDefine::OBJECT_STATUS_DRAFT :
        $this->pageTitle=t('Manage Drafted Webpages');
        $this->pageHint=t('Here you can manage all Drafted Webpages on your site'); 
        break;
    
    case ConstantDefine::OBJECT_STATUS_PENDING :
        $this->pageTitle=t('Manage Pending Webpages');
        $this->pageHint=t('Here you can manage all Pending Webpages on your site'); 
        break;
    
    case ConstantDefine::OBJECT_STATUS_PUBLISHED :
        $this->pageTitle=t('Manage Published Webpages');
        $this->pageHint=t('Here you can manage all Published Webpages on your site'); 
        break;
    
    default :       
        $this->pageTitle=t('Manage Webpages');
        $this->pageHint=t('Here you can manage all Webpages on your site'); 
        break;
}

?>
<?php $this->widget('cmswidgets.object.ObjectManageStatusWidget',array('type'=>$type)); 
?>