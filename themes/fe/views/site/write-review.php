<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
?>

<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset,'seo' => $seo)); ?>
  <div id="main" class="site-main container_16">
    <div class="inner">
      <div id="primary" class="grid_11 suffix_1">
        <article class="single">
          <div class="entry-content">
            <div class="long-description">
              
               <h2><?php echo $seo->h2; ?></h2>
              <p> <?php echo $page->content; ?> </p>
            </div>
            <br />
            <br />
            <?php $this->render('cmswidgets.views.notification'); ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
        			'id'=>'contact-form',
        			'enableAjaxValidation'=>true,       
        		)); 
			?>
            <?php echo $form->errorSummary($model); ?>
            <p> <?php echo $form->textField($model, 'fname',array('class' => 'radius', 'placeholder'=>t('Name*'))); ?> <span class="clear"></span> </p>
            <p> <?php echo $form->textField($model, 'email',array('class' => 'radius', 'placeholder'=>t('Email Adress*'))); ?> <span class="clear"></span> </p>
            <p> <?php echo $form->dropDownList($model, 'parent', Temples::GetAll(), array('class' => 'radius', 'placeholder'=>t('Review About'))); ?> <span class="clear"></span> </p>
            <p> <?php echo $form->dropDownList($model, 'rating', array(1=>'Poor',2=>'Satisfied'), array('class' => 'radius', 'placeholder'=>t('Rating'))); ?> <span class="clear"></span> </p>
            <p> <?php echo $form->textField($model, 'title',array('class' => 'radius', 'placeholder'=>t('Title*'))); ?> <span class="clear"></span> </p>
            <p> <?php echo $form->textArea($model, 'description',array('class' => 'contactme-text required requiredField radius', 'placeholder'=>t('Comment*'),'cols'=>'10','rows'=>'10')); ?> <span class="clear"></span> </p>
            <p>
              
              <input  class="buttons radius send" value="<?php echo t('Add My Review'); ?>" type="submit" >
            </p>
            <?php $this->endWidget(); ?>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </article>
      </div>
      <?php $this->renderPartial('//layouts/right-side-bar2',array('layout_asset'=>$layout_asset)); ?>
      <div class="clear"></div>
    </div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
