<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
?>

<body id="archive" class="archive author author-crob author-1">
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
    <div class="container marT30">
    <article class="col span_12">
     <?php $f = Pinfo::model()->findByPk($prop_id); ?>
     <?php $this->renderPartial('//layouts/prop-avail-calendar-booking',array('page'=>$f,'layout_asset'=>$layout_asset)); ?>
    </article>
      <article class="col span_8">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'date-check-form','enableAjaxValidation'=>true)); ?>
        <?php echo $form->errorSummary(array($model)); ?>
        <div class="twocol left">
          <div class="input-prepend"><?php echo $form->labelEx($model,'fdate'); ?>
            <?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'model' => $model,
    			'attribute' => 'fdate',
				'options'=>array(
				'maxDate'=>'+2Y',
				'minDate'=>5,
                'changeMonth'=>false,
	            'dateFormat'=>'dd-mm-yy',
                'numberOfMonths'=>1,
	            'showButtonPanel'=>true,
	            'closeText'=>'Clear Dates',
				'beforeShowDay'=>'js:editDays',
				'onClose' => 'js:function (selectedDate) {
					
					jQuery("#Bookingdate_tdate").val(""); 
					jQuery( "#Bookingdate_tdate" ).datepicker( "option", "minDate", selectedDate );

		if(jQuery("#Bookingdate_tdate").val()=="Departure Date" || jQuery("#Bookingdate_tdate").val()=="")
			{ 
					jQuery("#Bookingdate_tdate").datepicker("show");
					var arrival=jQuery("#Bookingdate_fdate").val(); 
					jQuery( "#Bookingdate_tdate" ).val(arrival); 
			}

		if (jQuery(window.event.srcElement).hasClass("ui-datepicker-close"))
			{ 
				jQuery("#Bookingdate_fdate").val(""); 
				jQuery("#Bookingdate_tdate").val(""); 
			}

		jQuery( "#Bookingdate_tdate" ).val("");
		jQuery("#Bookingdate_tdate").datepicker("show");

               }'))); ?>
            <?php echo $form->error($model,'fdate'); ?> </div>
          <div class="input-prepend"> <?php echo $form->labelEx($model,'peoples'); ?>
            <?php if($f->sleep>0) { echo $form->dropDownList($model,'peoples',range(1, $f->sleep));
		  } else {
			  echo $form->dropDownList($model,'peoples',range(1, 10));
		  }
		   ?>
            <?php echo $form->error($model,'peoples'); ?> </div>
        </div>
        <div class="twocol left last">
          <div class="input-prepend"> <?php echo $form->labelEx($model,'tdate'); ?>
            <?php 

				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    			'model' => $model,
    			'attribute' => 'tdate',
				'options'=>array(
				'minDate'=>1, 
	            'maxDate'=>'+2Y',
				'changeMonth'=>false,
				'changeYear' => false,
                'numberOfMonths'=>1,
	            'dateFormat'=>'dd-mm-yy',
	            'showButtonPanel'=>true,
				'beforeShowDay'=>'js:editDays',
	            'closeText'=>'Clear Dates',

               /* 'onClose' => 'js:function (selectedDate) {

		       jQuery( "#Booking_fdate" ).datepicker( "option", "maxDate", selectedDate );

		if(jQuery("#Booking_fdate").val()=="Arrival date" || jQuery("#Booking_fdate").val()==""){ jQuery("#Booking_fdate").datepicker("show"); jQuery( "#Booking_fdate" ).val(); }

		if (jQuery(window.event.srcElement).hasClass("ui-datepicker-close")){ jQuery("#Booking_fdate").val("");  }

              clear_amount();

			   }',*/

			   ),

				));

			?>
            <?php echo $form->error($model,'tdate'); ?> </div>
          <div class="input-prepend"><?php echo "<br>"; ?>
            <input id="submit" class="symple-button-inner" type="submit" value="Get Quote & Book">
          </div>
        </div>
        <?php $this->endWidget(); ?>
        <div class="clear"></div>
      </article>
      
     <div id="sidebar" class="col span_3">
        <div id="sidebar-inner about-us" class="about-us">
          <aside id="ct_listings-1" class="widget widget_ct_listings left">
            <h4><?php echo t('Property'); ?></h4>
            <ul>
              <?php 

	   	   $f = Pinfo::model()->findByPk($prop_id);
		   
		   if ( isset($f) && (count($f)>0) ) {
			   $meta2 = Seo::model()->find(array(
						'condition'=>'uid = :UID AND layout = :LYT',
						'params'=>array(':UID'=> $f->uid, ':LYT'=>'prop' )));
	    ?>
              <li>
                <figure> <a class="thumb" href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image" width="259" height="171" alt="<?php echo $f->tt_name; ?>"></a> </figure>
                <div class="grid-listing-info">
                  <header>
                    <h5 class="marB0"><a href="<?php echo Yii::app()->createUrl('property/index',array('region'=>GetRegionNURL($f->region),'province'=>GetProvinceNURL($f->province),'town'=>GetTownNURL($f->town),'property' => $meta2->slug)); ?>"><?php echo $f->tt_name; ?></a></h5>
                    <p class="location marB0"><?php echo Province::GetName($f->province); ?> , <?php echo Town::GetName($f->town); ?></p>
                  </header>
                  <?php if(prop_min_price($f->id)!= 0 ) { ?>
                  <p class="price marB0">
                    <?php echo t('From'); ?><?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?> 
                  </p>
                   <?php }  ?>
                  <p class="propinfo marB0"> <span class="beds"><?php echo $f->bedroom; ?> Bed</span><span class="baths"><?php echo $f->bathroom; ?> Bath</span>
                    <?php if($f->size != 0 ) { ?>
                    <span class="sqft"><?php echo $f->size; ?></span> Sq Ft
                    <?php } ?>
                  </p>
                  <div class="clear"></div>
                </div>
              </li>
              <?php }  ?>
            </ul>
          </aside>
        </div>
      </div>
      <div class="clear"></div>
      
    </div>
    <div class="clear"></div>
  </section>
  <?php $this->renderPartial('//layouts/footer-widget',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>

<?php
$Bdates = '["'.implode('", "', $AllDates).'"]';
Yii::app()->clientScript->registerScript('editDays', "
		function editDays(date) 
		{
			var disabledDates = ".$Bdates.";
            for (var i = 0; i < disabledDates.length; i++) 
			{
                if (new Date(disabledDates[i]).toString() == date.toString()) 
				{
                    return [false,''];
                }
            }
            return [true,''];
        }
");

?>
