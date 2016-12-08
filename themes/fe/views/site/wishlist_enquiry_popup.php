<?php

 		if(YII_DEBUG)

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);

        else

            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);

?>

<!---START HERE-->

<?php

	if(isset($_COOKIE["wishlist_IDS"])) {
	
	$items_ids = json_decode($_COOKIE["wishlist_IDS"]);
	$items_ids = array_unique($items_ids); }
	else 
		$items_ids = array();
?>
<style>
#lightcase-nav a[class*='lightcase-icon-'].lightcase-icon-prev{
	display:none;
}
#lightcase-nav a[class*='lightcase-icon-'].lightcase-icon-next{
	display:none;
}
</style>
<!---END HERE-->

<body id="archive" class="archive author author-crob author-1">
<?php $this->renderPartial('//layouts/ga-code'); ?>
<div id="wrapper">
  <ul id="cbp-tm-menu" class="cbp-tm-menu">
  </ul>
  <section id="main-content">
    <div class="container">
      <article class="col span_12 first">
      	<h1 style="text-align:center;"> <?php echo 'Wishlish Enquiry Form'//.Pinfo::GetName($propid); ?> </h1>
		
        <?php $this->renderPartial('//layouts/prop-banner-popup',array('layout_asset'=>$layout_asset,'propid' => $propid)); ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contactform',
			'enableAjaxValidation'=>false,
			'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'formular marT20'))); ?>
        <div class="post-438 page type-page status-publish hentry col span_11 first">
          <?php if(Yii::app()->user->hasFlash('contactus')): echo Yii::app()->user->getFlash('contactus'); endif; ?>
          <div class="clear"></div>
        </div>
        <?php if($PostState == 0) { ?> 
        <div class="twocol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'fname'); ?> <?php echo $form->textField($model,'fname',array('tabindex'=>1)); ?> <?php echo $form->error($model,'fname'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'email_id'); ?> <?php echo $form->textField($model,'email_id',array('tabindex'=>3)); ?> <?php echo $form->error($model,'email_id'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'phone_no'); ?><?php echo $form->textField($model,'country_code',array('placeholder'=>'Code','maxlength'=>'6','style'=>'width:20%;','tabindex'=>5)); ?> - <?php echo $form->textField($model,'phone_no',array('style'=>'width:51%;','tabindex'=>6)); ?> <?php echo $form->error($model,'phone_no'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'address'); ?> <?php echo $form->textField($model,'address',array('tabindex'=>9)); ?> <?php echo $form->error($model,'address'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'town'); ?> <?php echo $form->textField($model,'town',array('tabindex'=>11)); ?> <?php echo $form->error($model,'town'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'country'); ?> <?php echo $form->dropDownList($model, 'country', Countrylist::GetAll(), array('tabindex'=>13)); ?> <?php echo $form->error($model,'country'); ?></div>
        </div>
        <div class="twocol left last">
          <div class="input-prepend"><?php echo $form->labelEx($model,'lname'); ?> <?php echo $form->textField($model,'lname',array('tabindex'=>2)); ?> <?php echo $form->error($model,'lname'); ?> </div>
          <div class="input-prepend"></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'phone_no2'); ?><?php echo $form->textField($model,'country_code',array('placeholder'=>'Code','maxlength'=>'6','style'=>'width:20%;','tabindex'=>7)); ?> - <?php echo $form->textField($model,'phone_no2',array('style'=>'width:51%;','tabindex'=>8)); ?> <?php echo $form->error($model,'phone_no2'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'address2'); ?> <?php echo $form->textField($model,'address2',array('tabindex'=>10)); ?> <?php echo $form->error($model,'address2'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'state'); ?> <?php echo $form->textField($model,'state',array('tabindex'=>12)); ?> <?php echo $form->error($model,'state'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($model,'zip_code'); ?> <?php echo $form->textField($model,'zip_code',array('tabindex'=>14)); ?> <?php echo $form->error($model,'zip_code'); ?></div>
        </div>
        <div class="clear"></div>
        <div class="onethirdcol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'adults'); ?> <?php echo $form->dropDownList($model, 'adults', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14'),array('empty'=>'Select','style'=>'width:60%;','tabindex'=>15)); ?> <?php echo $form->error($model,'adults'); ?></div>
        </div>
        <div class="onethirdcol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'children'); ?> <?php echo $form->dropDownList($model, 'children', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14'),array('empty'=>'Select','style'=>'width:60%;','tabindex'=>16)); ?> <?php echo $form->error($model,'children'); ?></div>
        </div>
        <div class="onethirdcol left last">
          <div class="input-prepend"><?php echo $form->labelEx($model,'infants'); ?> <?php echo $form->dropDownList($model, 'infants', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14'),array('empty'=>'Select','style'=>'width:60%;','tabindex'=>17)); ?> <?php echo $form->error($model,'infants'); ?></div>
        </div>
        <div class="clear"></div>
        <div class="twocol left">
          <div class="input-prepend"> <?php echo $form->labelEx($model,'arrival_date'); ?>
            <?php

						$this->widget('zii.widgets.jui.CJuiDatePicker', array(

    					'model' => $model,

    					'attribute' => 'arrival_date',
						
						

    					'htmlOptions' => array(

      						'class' => 'form-text-code',

							'placeholder' => 'Arrival Date',
							
							'tabindex'=>18

    						),

						'options' => array(

 						   'minDate' => 'today', // to allow selection of dates upto today only
						   'dateFormat' => 'dd/mm/yy',

						),

						));

					  ?>
            <?php echo $form->error($model,'arrival_date'); ?> </div>
        </div>
        <div class="twocol left last">
          <div class="input-prepend"> <?php echo $form->labelEx($model,'depature_date'); ?>
            <?php

						$this->widget('zii.widgets.jui.CJuiDatePicker', array(

    					'model' => $model,

    					'attribute' => 'depature_date',

    					'htmlOptions' => array(

      						'class' => 'form-text-code',

							'placeholder' => 'Depature Date',
							'tabindex'=>19

    						),

						'options' => array(

 						   'minDate' => 'today', // to allow selection of dates upto today only
						    'dateFormat' => 'dd/mm/yy',

						),

						));

					  ?>
            <?php echo $form->error($model,'depature_date'); ?> </div>
        </div>
        <div class="clear"></div>
		
		 <div class="fourcol left last">
		 <h4 class="border-bottom marB18"><?php echo t('Wishlist Properties Listed '); ?></h4>
		<?php  if ( isset($items_ids) && (count($items_ids )>0) ) { ?>
		<ul id="wishList">
			  <?php 
				  $node = 0;
				 
				/*foreach ($properties  as $f) {*/
				foreach ($items_ids as $id) {
				$f = Pinfo::model()->findByPk($id);
				$meta2 = Seo::model()->find(array(
					'condition'=>'uid = :UID AND layout = :LYT',
					'params'=>array(':UID'=> $f->uid, ':LYT'=>'prop' )));
					if($node == 0 ) {					
				?>
		 <li class="col span_3 first">
			<div class="grid-listing-info wishlisted">
			 <a style="color:#555555;" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo substr($f->tt_name, 0, 23); ?></a>
			</div>
		  </li>
		  
		<?php $node++; } else { ?>
		
		<li class="col span_3">
			<div class="grid-listing-info wishlisted">
			 <a style="color:#555555;" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo substr($f->tt_name, 0, 23); ?></a>
			</div>
		  </li>
		<?php $node++; } }  ?>
		</ul>
		<?php } ?>
		</div>
        <div class="clear"></div>
        <div class="fourcol left last">
          <?php 
		    $RegProp = Pinfo::model()->findByPk($propid);
			if(isset($RegProp) && count($RegProp)>0 ) {
				if( $RegProp->region == 1045 ) {
		  ?>
         
          <h4 class="border-bottom marB18"><?php echo t('Other areas of interest'); ?></h4>
          <table>
            <?php 
			$data=array('Cooking Courses'=>'Cooking Courses','Hot Air Ballooning'=>'Hot Air Ballooning','Weddings in Tuscany'=>'Weddings','Car or Van Hire with Driver'=>'Car or Van Hire with Driver','Customised Tuscany Tour'=>'Customised Tour');
			echo $form->checkBoxList($model,'interest',$data, array('template'=>'<tr><td style="width:5%">{input}</td><td>{label}</td></tr>','separator'=>'','tabindex'=>20));?>
          </table>
          <?php } } ?>
          
          <div class="input-prepend"><?php echo $form->label($model,'other_details'); ?> <?php echo $form->textArea($model,'other_details',array('tabindex'=>21)); ?> <?php echo $form->error($model,'other_details'); ?></div>
          <div class="center">
            <input id="submit" class="symple-button-inner" type="submit" value="Send My Enquiry">
          </div>
        </div>

        <?php echo $form->hiddenField($model,'parent',array('value'=>$propid)); ?>
        <?php } ?>
        <?php $this->endWidget(); ?>
        <div class="clear"></div>
      </article>
    </div>
    <div class="clear"></div>
  </section>
</div>
</body>
