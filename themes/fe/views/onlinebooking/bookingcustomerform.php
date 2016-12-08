<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
?>
<style>
.black_overlay{
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: black;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}
.white_content {
	display: none;
	position: fixed;
	top: 25%;
	left: 25%;
	width: 50%;
	height: auto;
	padding: 16px;
	border:2px solid #1d3b4d;
	background-color: white;
	z-index:999999;
	overflow: auto;
}
.fa-times:before{
	content:"\f00d";
    color:red;
}
#light .fa:before{
	display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-size:20px;
    padding: 0px 2px 0px 0px;
}
.accept_tc a{
    text-decoration: underline;
}
</style>
<script>
 /*function disableSubmit() {
  document.getElementById("submit").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("submit").disabled = false;
       }
       else  {
        document.getElementById("submit").disabled = true;
      }

  } */
</script>
<body id="archive" class="archive author author-crob author-1" onload="disableSubmit()">
<div id="wrapper">
  <div id="masthead-anchor"></div>
  <?php $this->renderPartial('//layouts/top-bar',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/header-wrap-inner',array('layout_asset'=>$layout_asset)); ?>
  <section id="main-content">
    <?php $this->renderPartial('//layouts/breadcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta)); ?>
    <div class="container marT30">
      <article class="col span_12">
        <?php $f = Pinfo::model()->findByPk($prop_id); ?>
      </article>
      <article class="col span_8">
        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'customer-info-form','enableAjaxValidation'=>true)); ?>
        <?php //echo $form->errorSummary(array($customer, $CustomerUpdate)); ?>
        <div class="twocol left">
          <div class="input-prepend"><?php echo $form->labelEx($customer,'name'); ?> <?php echo $form->textField($customer,'name',array('tabindex'=>1)); ?> <?php echo $form->error($customer,'name'); ?> </div>
          <div class="input-prepend"><?php echo $form->labelEx($customer,'email'); ?> <?php echo $form->textField($customer,'email',array('tabindex'=>3)); ?> <?php echo $form->error($customer,'email'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($customer,'tele'); ?> <?php echo $form->textField($customer,'tele',array('tabindex'=>5)); ?> <?php echo $form->error($customer,'tele'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($customer,'town'); ?> <?php echo $form->textField($customer,'town',array('tabindex'=>7)); ?> <?php echo $form->error($customer,'town'); ?></div>
		  <div class="input-prepend"><?php echo $form->labelEx($customer,'country'); ?> <?php echo $form->dropDownList($customer, 'country', Countrylist::GetAll(false),array('tabindex'=>9)); ?> <?php echo $form->error($customer,'country'); ?></div>
          
        </div>
        <div class="twocol left last">
          <div class="input-prepend"><?php echo $form->labelEx($customer,'surname'); ?> <?php echo $form->textField($customer,'surname',array('tabindex'=>2)); ?> <?php echo $form->error($customer,'surname'); ?> </div>
		  <div class="input-prepend"><?php echo $form->labelEx($customer,'mobile'); ?> <?php echo $form->textField($customer,'mobile',array('tabindex'=>4)); ?> <?php echo $form->error($customer,'mobile'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($customer,'address1'); ?> <?php echo $form->textField($customer,'address1',array('tabindex'=>6)); ?> <?php echo $form->error($customer,'address1'); ?></div>
          <div class="input-prepend"><?php echo $form->labelEx($customer,'province'); ?> <?php echo $form->textField($customer,'province',array('tabindex'=>8)); ?> <?php echo $form->error($customer,'province'); ?></div>
		  <div class="input-prepend"><?php echo $form->labelEx($customer,'zip'); ?> <?php echo $form->textField($customer,'zip',array('tabindex'=>10)); ?> <?php echo $form->error($customer,'zip'); ?></div>
          

        </div>
        <div class="fourcol left last">
		<div class="input-prepend"><?php echo $form->labelEx($customer,'note'); ?> <?php echo $form->textArea($customer,'note',array('tabindex'=>10, 'maxlength' => 600, 'rows' => 6, 'cols' => 250)); ?> <?php echo $form->error($customer,'note'); ?></div>
          <div class="center"><br>
         
           <?php // echo $form->checkBox($customer,'terms_condition',array('tabindex'=>11)); ?>
		   
		   <input tabindex="12" name="Bcustomer[terms_condition]" id="Bcustomer_terms_condition" value="1" type="checkbox" onchange="activateButton(this)">
		   
		   
		   
			<span class="accept_tc">I have read & accept the <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Terms &amp; Conditions</a></span><br>
			<?php echo $form->error($customer,'terms_condition'); ?>
			
			<div id="light" class="white_content">
			
			<p>This is a testing purposes only not a usual pop up commomly using in terms and condtions, you can't close it until you read it from the top to buttom.</p>
	
			<p>**Terms and Condtions Process:</p>
			
	        <p>1. Terms and conditions checkbox</p>
				
			<p>2. Disable the submit button unless checkbox is seleced</p>

			<p>3. Terms and condtions pop up designs</p>

			<p>4. Terms and condtions content</p>

			<p>5. Terms and conditons checking</p>

			<p>6. Testing</p>
			
			<p>Note: if you can notice it was transparent background.The backgound box is working at the live site.</p>
			
			<p><a class="fa fa-times" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">CLOSE</a></p>
			
			</div>
            
			<input id="submit" class="booking_button" type="submit" value="Reserve <?php echo $f->tt_name; ?>" tabindex="12" >
          <br></div>
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
	    ?>
              <li>
                <figure> <a class="thumb" href="<?php echo $f->weburl; ?>"><img src="<?php echo Gallery::GetPropThumbnail($f->id); ?>" class="attachment-large wp-post-image" width="259" height="171" alt="<?php echo $f->tt_name; ?>"></a> </figure>
                <div class="grid-listing-info">
                  <header>
                    <h5 class="marB0"><a href="<?php echo $f->weburl; ?>"><?php echo $f->tt_name; ?></a></h5>
                    <p class="location marB0"><?php echo Province::GetName($f->province); ?> , <?php echo Town::GetName($f->town); ?></p>
                  </header>
                  <?php if(prop_min_price($f->id)!= 0 ) { ?>
                  <p class="price marB0"> <?php echo t('From'); ?> <?php echo Yii::app()->session['currency']; ?> <?php echo prop_min_price($f->id); ?>  </p>
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
