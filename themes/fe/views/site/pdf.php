<?php if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false); ?>
<!DOCTYPE html>
<head>
    <title>PDF 1</title>
    <link href="<?php  echo $layout_asset; ?>/pdf/css/style.css" rel="stylesheet" />
				<link href="<?php  echo $layout_asset; ?>/pdf/css/pdf.css" rel="stylesheet"/>
    <link rel="stylesheet" media="all and (min-width: 641px)" href="<?php  echo $layout_asset; ?>/pdf/css/style-960.css" />
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' />
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' />
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' />
</head>

<body>
<div class="wrapper">
<div class="section">
<div class="banner"><img src="<?php echo Gallery::GetPropPdfLargeImg($model->id);?>" height="400px" /></div>
<div class="pdf-content">
<h4 style="margin:10px;"><?php echo $model->tt_name;?></h4>
<div class="text_content"><p><?php echo substr(strip_tags($model->content1),0,2400);?></p></div>
</div>
</div>
</div>


<div class="facility_content">
<div class="left-content">
<?php $model2=Gallery::model()->findAllBySql("SELECT * FROM  `tt_gallery` WHERE  `prop_id` =  '$model->id' LIMIT 1,2");?>
<div class="gal-image" style="height:410px;">
<?php foreach($model2 as $value){ ?>
<div class="pdf_image">
<img src="http://fv-prop-photos.s3.amazonaws.com/<?php echo $model->id;?>/fullsize/<?php echo $value['img_url'];?>" height="200px"/>
</div>
<?php }?>
</div>
<div class="pdf-content">
<div class="text_content"><p><?php echo substr(strip_tags($model->extra_cost),0,2400); ?></p></div>
</div>
</div>	

<div class="right-content">
<h4>Information</h4>
<h3>Location</h3>
<p></p>
<div style="height:5px;"></div>
<h5>Bedrooms</h5>
<ul>
 <?php if($model->sleep>0){?><li>Sleeps:<span><?php echo $model->sleep;?></span> </li><?php } ?>
 <?php if($model->bedroom>0){?><li>Total Bedrooms : <span> <?php echo $model->bedroom;?></span></li><?php } ?>
 <?php if($model->tbed>0){?><li>Twin Rooms : <span><?php echo $model->tbed;?></span></li><?php } ?>
 <?php if($model->sbed>0){?><li>Single Rooms: <span><?php echo $model->sbed;?></span></li><?php } ?>
 <?php if($model->ssbed>0){?><li>Sofa Beds : <span><?php echo $model->ssbed;?></span></li><?php } ?>
<?php /*?><li>Extra Beds: <span><?php echo $model->bedroom;?></span></li><?php */?>
</ul>
<div style="height:5px;"></div>
<h5>Bathrooms</h5>
<ul>
<?php if($model->bathroom>0){?><li>Total Bathrooms: <span><?php echo $model->bathroom;?></span></li><?php }?>
<?php if($model->bathwts>0){?><li>Bathrooms With Shower : <span><?php echo $model->bathwts;?></span></li><?php }?>
 <?php if($model->bathwtub>0){?><li>Bathrooms With Tub : <span><?php echo $model->bathwtub;?></span></li><?php }?>
</ul>
<div style="height:5px;"></div>
<h5>Location & facilities</h5>
<ul>
<?php if(Town::GetName($model->town)!=''){?><li>Town/Places: <span><?php echo Town::GetName($model->town);?></span></li><?php }?>
<?php if($model->address1!=''){?><li>Area : <span><?php echo $model->address1;?></span></li><?php } ?>
<?php if(Countrylist::GetName(Country::GetName($model->country))!=''){?><li>Country : <span><?php echo Countrylist::GetName(Country::GetName($model->country));?></span></li><?php }?>
 <?php if(Type::GetName($model->ptype)!=''){?><li>Property Type : <span><?php echo Type::GetName($model->ptype); ?></span></li><?php }?>
 <?php if(Province::GetName($model->province)!=''){?><li>Surface Area : <span><?php echo Province::GetName($model->province);?></span></li><?php }?>
 <?php if($model->view>0){?><li>Property View : <span><?php echo $model->view;?></span></li><?php }?>
</ul>
<div style="height:5px;"></div>
<h5>Features & Accessories</h5>
<table style="background:#dbf2de">
<tr><td colspan="6">&nbsp;</td></tr>
        <tr >
    <?php $ammenties_array=explode('|',$model->amenities); 
		  $amtt_array=array('1001','1007','1012','1017','1024','1029','1035','1042','1048','1055','1065','1070','1075','1092','1097','1103','1109','1114','1119','1125','1132','1137','1142','1147','1152','1157','1162','1167','1172','1177','1182','1187','1192','1197','1202','1207','1212','1217','1222','1242','1247','1252','1257','1262','1267','1272','1277','1282','1287','1292','1297','1302','1307','1312','1317','1322','1327','1332','1337','1342','1347','1352','1357','1362','1367','1372','1377','1382','1387','1392','1397','1402','1407','1412','1413','1414','1415');
		  $i=0;
		 if(!empty($ammenties_array))
		 {
			 foreach($amtt_array as $amant_value)
			 {
				 if(in_array($amant_value, $ammenties_array)) 
				 { $i=$i+1;
				 $amenities = Amenities::model()->find(array('condition'=>"id='$amant_value'"));
				 ?>
		 			<td width="35px;"><img src="<?php  echo $layout_asset; ?>/pdf/images/<?php echo $amant_value;?>-1.png" title="<?php echo $amenities->name;?>"/></td>
			<?php }  if($i==6){ echo '</tr><tr>'; $i=0;} } 
		 } 
?>        </tr>
        </table>
</div>
</div>


<div class="pdf-3">
	    <?php 
  $photos = Gallery::model()->findAll(array(
  	'condition'=>'prop_id="'.$model->id.'"',
  	'order' => 'img_order ASC','limit'=>15
  ));
  if($photos) {
  ?>
     <table width="85%" align="center">
    <tr>
     <?php $i=0;foreach ($photos as $ph) { $i=$i+1; ?>
      <td style="padding-bottom:20px;"><img src="<?php echo Gallery::GetThumbnail($ph); ?>" width="220px" height="150px"/></td>
       <?php if($i==3){ $i=0; echo '</tr><tr>'; } } ?>
    </tr>
    </table>
    <?php } ?>
</div>
</body>
</html>
